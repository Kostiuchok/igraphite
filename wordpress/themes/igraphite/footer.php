<?php
/**
 * Footer: mirrors the original static site's footer markup.
 * TODO: move the link columns to an editable WP menu/widget area once
 * content migration is further along - kept static for the initial scaffold.
 */
?>
    <footer class="footer footer-1">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                        <div class="footer-widget widget-links">
                            <div class="footer-widget-title"><h5>Spółka</h5></div>
                            <div class="widget-content">
                                <ul>
                                    <li><a href="<?php echo esc_url(home_url('/o-nas/')); ?>">O nas</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/jakosc-i-bezpieczenstwo/')); ?>">Jakość i bezpieczeństwo</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/blog/')); ?>">Blog</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-2">
                        <div class="footer-widget widget-links">
                            <div class="footer-widget-title"><h5>Grafit</h5></div>
                            <div class="widget-content">
                                <ul>
                                    <li><a href="<?php echo esc_url(home_url('/grafit/')); ?>">Grafit</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/grafit-charakterystyka/')); ?>">Charakterystyka</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/grafit-wlasciwosci/')); ?>">Właściwości</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-5">
                        <div class="footer-widget widget-links widget-icon">
                            <div class="footer-widget-title"><h5>Zastosowania</h5></div>
                            <div class="widget-content">
                                <ul>
                                    <li><a href="<?php echo esc_url(home_url('/zastosawania-metalurgia-proszkow/')); ?>">Metalurgia proszków</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/zastosawania-grafit-do-produkcji-baterii/')); ?>">Grafit do produkcji baterii</a></li>
                                    <li><a href="<?php echo esc_url(home_url('/zastosawania-tradycyjne/')); ?>">Tradycyjne zastosowanie</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="footer-widget widget-contact">
                            <div class="widget-content">
                                <ul>
                                    <li class="phone">+3<a href="tel:+37256995117"> 7256995117</a></li>
                                    <li class="email">Email: <a href="mailto:info@igraphite.pl">info@igraphite.pl</a></li>
                                    <li class="address"><p>Przedstawicielstwo w Kijowie: ul. Szumskogo 1A, Ukraina, Kijów</p></li>
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
                                <span>&copy; <?php echo esc_html(date('Y')); ?> igraphite.pl. Wszelkie prawa zastrzeżone.</span>
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
