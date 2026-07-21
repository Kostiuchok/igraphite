<?php
/**
 * Fallback template: blog listing / archive. Post cards use the same
 * container structure as page.php for visual consistency.
 */
get_header();
?>

<section class="content-page">
    <div class="container">
        <div class="row">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-12 col-md-6 col-lg-4 mb-4">
                        <article <?php post_class(); ?>>
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                            <?php endif; ?>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p><?php echo esc_html(get_the_excerpt()); ?></p>
                        </article>
                    </div>
                <?php endwhile; ?>
                <div class="col-12"><?php the_posts_pagination(); ?></div>
            <?php else : ?>
                <div class="col-12"><p><?php esc_html_e('Nic nie znaleziono.', 'igraphite'); ?></p></div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
