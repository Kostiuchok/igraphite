<?php
/**
 * Generic page template. Migrated content already carries its own
 * page-title/hero/breadcrumb markup from the original static site
 * (preserved as a raw HTML block), so this template just outputs it -
 * no extra wrapper, to avoid double hero sections.
 */
get_header();
while (have_posts()) : the_post();
    the_content();
endwhile;
get_footer();
