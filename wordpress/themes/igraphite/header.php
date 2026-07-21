<?php
/**
 * Header: top bar, main nav. Mirrors the markup from the original static
 * site's header so the existing /assets/css/style.css applies unchanged.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-PH2QTQF');</script>
    <!-- End Google Tag Manager -->
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <?php wp_head(); // Title tag, SEO meta (Yoast), enqueued styles/scripts hook in here ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PH2QTQF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div class="wrapper clearfix" id="wrapperParallax">
    <header class="header header-light header-topbar header-topbar2 header-shadow" id="navbar-spy">
        <div class="top-bar top-bar-2">
            <div class="block-left">
                <p class="headline"><i class="energia-alert-Icon"></i> now hiring: <a href="#">Sales technician on site</a></p>
            </div>
            <div class="block-right">
                <div class="top-contact">
                    <div class="contact-infos"><i class="energia-email--icon"></i>
                        <div class="contact-body">
                            <p>email: <a href="mailto:info@igraphite.pl">info@igraphite.pl</a></p>
                        </div>
                    </div>
                </div>
                <div class="social-links">
                    <a class="share-facebook" href="https://www.facebook.com/igraphite"><i class="energia-facebook"></i></a>
                    <a class="share-instagram" href="javascript:void(0)"><i class="energia-twitter"></i></a>
                    <a class="share-twitter" href="javascript:void(0)"><i class="energia-youtube"></i></a>
                </div>
                <div class="module module-language">
                    <?php if (function_exists('pll_the_languages')) : ?>
                        <?php
                        $current_lang = function_exists('pll_current_language') ? pll_current_language() : 'pl';
                        ?>
                        <div class="selected"><img src="/assets/images/module-language/<?php echo esc_attr($current_lang); ?>.png" alt="Language"/><span><?php echo esc_html($current_lang); ?></span><i class="fas fa-chevron-down"></i></div>
                        <div class="lang-list">
                            <ul>
                                <?php pll_the_languages(['dropdown' => 0, 'show_flags' => 0, 'show_names' => 1]); ?>
                            </ul>
                        </div>
                    <?php else : ?>
                        <!-- Polylang not configured yet - static PL-only placeholder -->
                        <div class="selected"><img src="/assets/images/module-language/pl.png" alt="Pl Language"/><span>pl</span><i class="fas fa-chevron-down"></i></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-sticky" id="primary-menu">
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <img class="logo logo-dark" src="/assets/images/logo/logo-dark.png" alt="<?php bloginfo('name'); ?>"/>
                <img class="logo logo-mobile" src="/assets/images/logo/logo-mobile.png" alt="<?php bloginfo('name'); ?>"/>
            </a>
            <div class="module-holder module-holder-phone">
                <div class="module module-search">
                    <div class="module-icon module-icon-search"><i class="energia-search-Icon"></i></div>
                </div>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navbarContent">
                <?php
                wp_nav_menu([
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'navbar-nav me-auto',
                    'fallback_cb'    => false,
                    'depth'          => 2,
                ]);
                ?>
                <div class="module-holder">
                    <div class="module-call"><i class="icons-energiaphone-call"></i>
                        <div>
                            <p>Zadzwoń do nas teraz: </p><a href="tel:37256995117">+37256995117</a><br/><a href="tel:48721566312">+48721566312</a>
                        </div>
                    </div>
                    <div class="module module-search">
                        <div class="module-icon module-icon-search"><i class="energia-search-Icon"></i></div>
                    </div>
                    <div class="module-contact module-contact-2"><a class="btn btn--primary" href="<?php echo esc_url(home_url('/kontakt/')); ?>">request a quote <i class="energia-arrow-right"></i></a></div>
                </div>
            </div>
        </nav>
    </header>
