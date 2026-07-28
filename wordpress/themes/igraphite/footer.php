<?php
/**
 * Footer: mirrors the original static site's footer markup.
 * TODO: move the link columns to an editable WP menu/widget area once
 * content migration is further along - kept static for the initial scaffold.
 *
 * Link columns are hardcoded per language (not just per-URL translation)
 * because two source PL pages (grafit-charakterystyka, jakosc-i-bezpieczenstwo,
 * grafit-wlasciwosci) have no distinct EN translation in Polylang yet - they
 * fall back to the EN homepage, matching what Polylang itself does site-wide.
 */
$igraphite_footer_lang = function_exists('pll_current_language') ? pll_current_language() : 'pl';
?>
    <footer class="footer footer-1">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                        <div class="footer-widget widget-links">
                            <?php if ($igraphite_footer_lang === 'en') : ?>
                            <div class="footer-widget-title"><h5>Company</h5></div>
                            <div class="widget-content">
                                <ul>
                                    <li><a href="<?php echo esc_url(home_url('/en/about-us/')); ?>">About us</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/en/home-en/')); ?>">Quality and safety</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/en/blog-en/')); ?>">Blog</a></li>
                                </ul>
                            </div>
                            <?php else : ?>
                            <div class="footer-widget-title"><h5>Spółka</h5></div>
                            <div class="widget-content">
                                <ul>
                                    <li><a href="<?php echo esc_url(home_url('/o-nas/')); ?>">O nas</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/jakosc-i-bezpieczenstwo/')); ?>">Jakość i bezpieczeństwo</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a></li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                        <div class="footer-widget widget-links">
                            <?php if ($igraphite_footer_lang === 'en') : ?>
                            <div class="footer-widget-title"><h5>Graphite</h5></div>
                            <div class="widget-content">
                                <ul>
                                    <li><a href="<?php echo esc_url(home_url('/en/graphite/')); ?>">Graphite</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/en/home-en/')); ?>">Characteristics</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/en/home-en/')); ?>">Properties</a></li>
                                </ul>
                            </div>
                            <?php else : ?>
                            <div class="footer-widget-title"><h5>Grafit</h5></div>
                            <div class="widget-content">
                                <ul>
                                    <li><a href="<?php echo esc_url(home_url('/grafit/')); ?>">Grafit</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/grafit-charakterystyka/')); ?>">Charakterystyka</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/grafit-wlasciwosci/')); ?>">Właściwości</a></li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-5">
                        <div class="footer-widget widget-links widget-icon">
                            <?php if ($igraphite_footer_lang === 'en') : ?>
                            <div class="footer-widget-title"><h5>Applications</h5></div>
                            <div class="widget-content">
                                <ul>
                                    <li><a href="<?php echo esc_url(home_url('/en/products-refractories/')); ?>">Powder metallurgy</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/en/products-batteries/')); ?>">Graphite for battery production</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/en/projects-standard/')); ?>">Traditional use</a></li>
                                </ul>
                            </div>
                            <?php else : ?>
                            <div class="footer-widget-title"><h5>Zastosowania</h5></div>
                            <div class="widget-content">
                                <ul>
                                    <li><a href="<?php echo esc_url(home_url('/zastosawania-metalurgia-proszkow/')); ?>">Metalurgia proszków</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/zastosawania-grafit-do-produkcji-baterii/')); ?>">Grafit do produkcji baterii</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/zastosawania-tradycyjne/')); ?>">Tradycyjne zastosowanie</a></li>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="footer-widget widget-contact">
                            <div class="widget-content">
                                <ul>
                                    <li class="phone"><a href="tel:+48504120655">+48 504 120 655</a></li>
                                    <li class="phone"><a href="tel:+48602608552">+48 602 608 552</a></li>
                                    <li class="phone"><a href="tel:+380503303816">+38 050 330 38 16</a></li>
                                    <li class="email">Email: <a href="mailto:info@igraphite.pl">info@igraphite.pl</a></li>
                                    <li class="address"><p>28124010661111001167974605<br/>BALFORD SP z o.o. z siedzibą przy ul. Garbarska 3 lok. 1, 40-421 Katowice, Polska<br/>KRS 0001239195, NIP 9542907681, REGON 544639471</p></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="footer-copyright">
                            <div class="copyright">
                                <?php if ($igraphite_footer_lang === 'en') : ?>
                                <span>&copy; <?php echo esc_html(date('Y')); ?> igraphite.pl. All rights reserved.</span>
                                <?php else : ?>
                                <span>&copy; <?php echo esc_html(date('Y')); ?> igraphite.pl. Wszelkie prawa zastrzeżone.</span>
                                <?php endif; ?>
                                <ul class="list-unstyled social-icons">
                                    <li><a class="share-facebook" href="https://www.facebook.com/igraphite" target="_blank"><i class="energia-facebook"></i>facebook</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="back-top" id="back-to-top" data-hover=""><i class="energia-arrow-up"></i></div>
</div>
<!-- End .wrapper -->
<?php wp_footer(); ?>
</body>
</html>
