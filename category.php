<?php

/**
 * The template for displaying Category pages
 *
 * @package Del_Porto_Ristorante
 */

get_header(); ?>

<style>
    /*
     * # CATEGORY PAGE #
     * ----------------------------------------------------
     */
    .category-page {
        background-color: var(--bg-darker);

        .category-hero-section {
            height: 40vh;
            background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/category-hero-background.webp');
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

        .category-posts-col,
        .category-aside-col {
            margin-top: -60px;
            /* Superpone el contenido sobre el hero */
            position: relative;
            z-index: 10;

            .widget-title {
                font-size: 1.5rem;
                font-weight: bold;
                text-transform: uppercase;
            }

            .widget-categories ul li a {
                color: var(--txt-light);
                text-decoration: none;
                transition: color 0.3s ease;

                &:hover {
                    color: var(--golden-color);
                }
            }
        }
    }
</style>

<div id="primary" class="content-area category-page">
    <main id="main" class="site-main">

        <section class="category-hero-section position-relative d-flex align-items-center justify-content-center text-center text-light">
            <div class="hero-image-overlay"></div>
            <div class="container position-relative z-index-1">
                <h1 class="display-3 text-uppercase fw-bold"><?php single_cat_title(); ?></h1>
            </div>
        </section>

        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-8 category-posts-col">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $category_query = new WP_Query([
                        'cat'            => get_query_var('cat'),
                        'posts_per_page' => 9,
                        'paged'          => $paged,
                    ]);

                    if ($category_query->have_posts()) :
                    ?>
                        <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-3 blogs-grid">
                            <?php
                            $index = 0;
                            while ($category_query->have_posts()) :
                                $category_query->the_post();
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
                    else :
                    ?>
                        <p><?php esc_html_e('No posts found in this category.', 'del-porto-ristorante'); ?></p>
                    <?php endif; ?>
                </div>

                <div class="col-lg-4 category-aside-col">
                    <aside id="secondary" class="widget-area">
                        <div class="bg-dark p-4 widget widget-categories">
                            <h3 class="widget-title text-golden mb-3"><?php esc_html_e('Other Categories', 'del-porto-ristorante'); ?></h3>
                            <ul class="list-unstyled">
                                <?php
                                $current_cat_id = get_query_var('cat');
                                $categories = get_categories(['exclude' => $current_cat_id]);
                                if (!empty($categories)) :
                                    foreach ($categories as $category) :
                                ?>
                                        <li><a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" class="text-white text-decoration-none d-block fw-bold"><?php echo esc_html($category->name); ?></a></li>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>

    </main>
</div>

<?php get_footer();
