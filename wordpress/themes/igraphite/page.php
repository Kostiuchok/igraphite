<?php
/**
 * Generic page template: page-title hero banner (matching the original
 * static site's section) + content. Individual migrated pages that need
 * the original page's specific extra sections (image galleries, tables,
 * etc.) should get their own dedicated template later - this covers the
 * common case for the initial scaffold.
 */
get_header();
?>

<?php while (have_posts()) : the_post(); ?>
    <section class="page-title page-title-1" id="page-title">
        <div class="page-title-wrap bg-overlay bg-overlay-dark-2">
            <div class="bg-section">
                <?php if (has_post_thumbnail()) : the_post_thumbnail('large'); else : ?>
                    <img src="/assets/images/page-titles/1.jpg" alt="Background"/>
                <?php endif; ?>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="title">
                            <h1 class="title-heading"><?php the_title(); ?></h1>
                            <?php if (has_excerpt()) : ?>
                                <p class="title-desc"><?php echo esc_html(get_the_excerpt()); ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb-wrap">
            <div class="container">
                <ol class="breadcrumb d-flex">
                    <li class="breadcrumb-item"><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php the_title(); ?></li>
                </ol>
            </div>
        </div>
    </section>

    <section class="content-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<?php endwhile; ?>

<?php get_footer(); ?>
