<?php

/**
 * Template Name: Blogs
 *
 * @package Del_Porto_Ristorante
 */

get_header();
?>

<style>
    /*
     * # BLOGS PAGE HERO #
     * ----------------------------------------------------
     */
    .blogs-hero-section {
        height: 40vh;
        background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/blogs-hero-background.webp');
        background-size: cover;
        background-position: center;
        position: relative;

        .hero-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <section class="blogs-hero-section position-relative d-flex align-items-center justify-content-center text-center text-light">
            <div class="hero-image-overlay"></div>
            <div class="container position-relative z-index-1">
                <h1 class="display-1 text-uppercase fw-bold"><?php the_title(); ?></h1>
            </div>
        </section>

        <div class="container py-5 bg-dark text-light animate__animated animate__fadeInUp">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $blogs_query = new WP_Query([
                'post_type'      => 'post',
                'posts_per_page' => 12,
                'paged'          => $paged,
                'post_status'    => 'publish',
                'orderby'        => 'date',
                'order'          => 'DESC',
            ]);

            if ($blogs_query->have_posts()) :
            ?>
                <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-3 blogs-grid">
                    <?php
                    $index = 0;
                    while ($blogs_query->have_posts()) :
                        $blogs_query->the_post();
                    ?>
                        <div class="col d-flex animate__animated animate__fadeInUp" style="animation-delay: <?php echo esc_attr($index * 0.1); ?>s;">
                            <?php get_template_part('template-parts/card', 'post'); ?>
                        </div>
                    <?php
                        $index++;
                    endwhile;
                    ?>
                </div>

                <div class="mt-5 d-flex justify-content-center">
                    <?php
                    the_posts_pagination(array(
                        'prev_text' => '<i class="bi bi-arrow-left"></i>',
                        'next_text' => '<i class="bi bi-arrow-right"></i>',
                        'mid_size'  => 2,
                    ));
                    ?>
                </div>

            <?php
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </main>
</div>

<?php
get_footer();
