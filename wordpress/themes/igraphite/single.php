<?php
/**
 * Single blog post template. Same approach as page.php - migrated post
 * content already carries its own page-title/hero markup, so just
 * output it as-is.
 */
get_header();
while (have_posts()) : the_post();
    the_content();
endwhile;
get_footer();
