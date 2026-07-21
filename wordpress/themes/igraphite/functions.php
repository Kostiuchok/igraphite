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

function igraphite_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption']);

    register_nav_menus([
        'primary' => __('Primary Menu', 'igraphite'),
    ]);
}
add_action('after_setup_theme', 'igraphite_setup');

function igraphite_enqueue_assets() {
    wp_enqueue_style('igraphite-fonts', 'https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap', [], null);
    wp_enqueue_style('igraphite-vendor', '/assets/css/vendor.min.css', [], '1.0.0');
    wp_enqueue_style('igraphite-style', '/assets/css/style.css', ['igraphite-vendor'], '1.0.0');

    wp_enqueue_script('igraphite-jquery', '/assets/js/vendor/jquery-3.6.0.min.js', [], null, true);
    wp_enqueue_script('igraphite-vendor', '/assets/js/vendor.js', ['igraphite-jquery'], null, true);
    wp_enqueue_script('igraphite-functions', '/assets/js/functions.js', ['igraphite-jquery', 'igraphite-vendor'], null, true);
}
add_action('wp_enqueue_scripts', 'igraphite_enqueue_assets');

function igraphite_favicon() {
    echo '<link href="/assets/images/favicon/favicon.png" rel="icon"/>' . "\n";
}
add_action('wp_head', 'igraphite_favicon');
