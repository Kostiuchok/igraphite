<?php

if (!defined('ABSPATH')) {
    exit;
}

/*
 * Assets (css/js/images/fonts) intentionally stay at the domain root (/assets/)
 * instead of living inside the theme. That's where they already are on the
 * live server, migrated as-is from the old static site - keeping one copy
 * avoids duplicating tens of MB of images and keeps the same URLs working
 * after the static site is replaced by this WordPress install.
 */

/*
 * WordPress prepends site_url() to any enqueued src that doesn't start
 * with "http"/"//" - a bare leading "/" is NOT treated as domain-root-
 * absolute by wp_enqueue_style/script, so we build the real domain root
 * explicitly here instead.
 */
function igraphite_asset_url($path) {
    $parts = wp_parse_url(home_url());
    $root = $parts['scheme'] . '://' . $parts['host'] . (isset($parts['port']) ? ':' . $parts['port'] : '');
    return $root . $path;
}

function igraphite_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption']);

    register_nav_menus([
        'primary' => __('Primary Menu', 'igraphite'),
    ]);
}
add_action('after_setup_theme', 'igraphite_setup');

/*
 * The theme's CSS/JS (ported from the original static site) styles dropdown
 * submenus via .has-dropdown / .dropdown-menu (Bootstrap-style), not
 * WordPress's default .menu-item-has-children / .sub-menu - without these,
 * submenus render as a permanently-expanded plain list instead of a hover
 * dropdown.
 */
function igraphite_nav_menu_li_class($classes, $item) {
    if (in_array('menu-item-has-children', $classes, true)) {
        $classes[] = 'has-dropdown';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'igraphite_nav_menu_li_class', 10, 2);

function igraphite_nav_menu_submenu_class($classes) {
    $classes[] = 'dropdown-menu';
    return $classes;
}
add_filter('nav_menu_submenu_css_class', 'igraphite_nav_menu_submenu_class');

function igraphite_nav_menu_link_attributes($atts, $item, $args, $depth) {
    if (in_array('menu-item-has-children', $item->classes, true)) {
        $atts['data-toggle'] = 'dropdown';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'igraphite_nav_menu_link_attributes', 10, 4);

function igraphite_enqueue_assets() {
    wp_enqueue_style('igraphite-fonts', 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap', [], null);
    wp_enqueue_style('igraphite-vendor', igraphite_asset_url('/assets/css/vendor.min.css'), [], '1.0.0');
    wp_enqueue_style('igraphite-style', igraphite_asset_url('/assets/css/style.css'), ['igraphite-vendor'], '1.0.0');

    wp_enqueue_script('igraphite-jquery', igraphite_asset_url('/assets/js/vendor/jquery-3.6.0.min.js'), [], null, true);
    wp_enqueue_script('igraphite-vendor', igraphite_asset_url('/assets/js/vendor.js'), ['igraphite-jquery'], null, true);
    wp_enqueue_script('igraphite-functions', igraphite_asset_url('/assets/js/functions.js'), ['igraphite-jquery', 'igraphite-vendor'], null, true);
}
add_action('wp_enqueue_scripts', 'igraphite_enqueue_assets');

/*
 * Contact form handler - replaces the old PHPMailer/Gmail-OAuth setup
 * (assets/phpmailer_src/*) that held live, exposed credentials. Uses
 * wp_mail() instead, which on this host goes through the server's own
 * mail transport - no OAuth, no stored secrets. The migrated form's
 * class was renamed away from "contactForm" so the old shared
 * /assets/js/functions.js validation plugin (still used by the legacy
 * static site) doesn't intercept the submit and AJAX it to the dead
 * old endpoint - this one is a plain POST with a redirect-back.
 */
function igraphite_handle_contact() {
    // Honeypot: real users never fill this hidden field.
    if (!empty($_POST['website'])) {
        wp_safe_redirect(wp_get_referer());
        exit;
    }

    $name    = isset($_POST['contact-name']) ? sanitize_text_field($_POST['contact-name']) : '';
    $email   = isset($_POST['contact-email']) ? sanitize_email($_POST['contact-email']) : '';
    $phone   = isset($_POST['contact-phone']) ? sanitize_text_field($_POST['contact-phone']) : '';
    $service = isset($_POST['contact-service']) ? sanitize_text_field($_POST['contact-service']) : '';
    $message = isset($_POST['contact-infos']) ? sanitize_textarea_field($_POST['contact-infos']) : '';

    $status = 'error';
    if ($name && is_email($email)) {
        $body = "Name: $name\nEmail: $email\nPhone: $phone\nService: $service\n\nMessage:\n$message";
        $sent = wp_mail(
            get_option('admin_email'),
            'New contact request from ' . $name,
            $body,
            ['Reply-To: ' . $email]
        );
        $status = $sent ? 'success' : 'error';
    }

    wp_safe_redirect(add_query_arg('contact_status', $status, wp_get_referer()) . '#contact-result');
    exit;
}
add_action('admin_post_igraphite_contact', 'igraphite_handle_contact');
add_action('admin_post_nopriv_igraphite_contact', 'igraphite_handle_contact');

function igraphite_contact_result_script() {
    if (empty($_GET['contact_status'])) {
        return;
    }
    $success = $_GET['contact_status'] === 'success';
    $html = $success
        ? '<div class="alert alert-success" role="alert"><strong>Thank you. We will contact you shortly.</strong></div>'
        : '<div class="alert alert-danger" role="alert">Something went wrong, please try again.</div>';
    ?>
    <script>
    document.querySelectorAll('.contact-result').forEach(function (el) {
        el.innerHTML = <?php echo wp_json_encode($html); ?>;
    });
    </script>
    <?php
}
add_action('wp_footer', 'igraphite_contact_result_script');

function igraphite_favicon() {
    echo '<link href="/assets/images/favicon/favicon.png" rel="icon"/>' . "\n";
}
add_action('wp_head', 'igraphite_favicon');
