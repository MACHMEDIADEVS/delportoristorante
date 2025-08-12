<?php

/**
 * The template for displaying single menu posts
 *
 * @package Del_Porto_Ristorante
 */

get_header(); ?>

<style>
    /*
     * # SINGLE - CPT MENU #
     * ----------------------------------------------------
     */
    .single-menu-page {
        background-color: var(--bg-dark-secondary);

        p {
            color: var(--txt-light) !important;
        }

        ul {
            margin: 0 0 1.5em 0.2rem;
        }

        .menu-article {
            .entry-header {
                .entry-title {
                    color: var(--txt-light);
                    text-transform: uppercase;
                    letter-spacing: 0.05em;
                }

                .lead {
                    font-size: 1.1rem;
                }
            }
        }

        .menu-hero-image-container {
            height: 40vh;
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

        .menu-content {
            .menu-introduction.entry-content {
                /* max-width: 800px; */
                margin-left: auto;
                margin-right: auto;
                text-align: center;
            }
        }

        .menu-categories-grid {}

        .menu-category-column {
            .menu-category-title {
                font-family: var(--dpr-font-headings, sans-serif);
                font-size: 1.5rem;
                color: var(--txt-light);
                padding-bottom: 0.5rem;
                display: inline-block;
            }
        }

        .menu-items-list {
            .menu-item {
                padding-bottom: 0.75rem;
                border-bottom: 1px dotted var(--border-dark);

                &:last-child {
                    border-bottom: none;
                    margin-bottom: 0;
                }

                .menu-item-header {}

                .menu-item-name {
                    font-family: var(--dpr-font-body, sans-serif);
                    font-size: 1rem !important;
                    color: var(--txt-light);
                    text-transform: uppercase;
                }

                .menu-item-price {
                    font-family: var(--dpr-font-body, sans-serif);
                    font-size: 1rem;
                    color: var(--txt-light);
                    min-width: 2.5em;
                    text-align: right;
                }

                .menu-item-description {
                    font-family: var(--dpr-font-body, sans-serif);
                    font-size: 0.85rem;
                    line-height: 1.4;
                    margin-top: 0.1rem;
                    width: 80% !important;
                }
            }
        }

        h4 {
            font-size: 1.5rem;
        }
    }

    /*
     * # SINGLE CPT MENU RESPONSIVE #
     * ----------------------------------------------------
     */
    @media (max-width: 991.98px) {
        .single-menu-page {
            .menu-category-column {}
        }
    }

    @media (max-width: 767.98px) {
        .single-menu-page {
            .menu-category-column {
                margin-bottom: 2.5rem;
            }

            .menu-article {
                .entry-header {
                    .entry-title {
                        font-size: 2rem;
                    }
                }
            }

            .menu-category-column {
                .menu-category-title {
                    font-size: 1.5rem;
                }
            }
        }
    }
</style>

<div id="primary" class="content-area single-menu-page">
    <main id="main" class="site-main">
        <?php while (have_posts()) : the_post(); ?>

            <?php
            // Preparamos los datos que necesita tanto el Hero como el resto de la página.
            $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
            $menu_page_title = get_field('title');
            $menu_page_subtitle = get_field('subtitle');
            $display_title = !empty($menu_page_title) ? $menu_page_title : get_the_title();

            // Llamamos a la plantilla del Hero y le pasamos los datos.
            get_template_part('template-parts/hero/hero-black', null, [
                'hero_image_url' => $featured_image_url,
                'hero_title'     => $display_title,
            ]);
            ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class('menu-article container py-5'); ?>>
                <header class="entry-header text-center mb-5">
                    <h2 class="entry-title text-light fw-bold"><?php echo esc_html($display_title); ?></h2>
                    <?php if (!empty($menu_page_subtitle)) : ?>
                        <p class="lead text-muted"><?php echo esc_html($menu_page_subtitle); ?></p>
                    <?php endif; ?>
                </header>

                <div class="menu-content">
                    <?php if (get_the_content()) : ?>
                        <div class="menu-introduction mb-5 entry-content">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    // Obtenemos todas las filas del repetidor para poder contarlas.
                    $categories = get_field('category');

                    // Verificamos si existen categorías.
                    if ($categories) :

                        // Contamos las categorías y definimos la clase de la columna.
                        $category_count = count($categories);
                        if ($category_count === 1) {
                            $column_class = 'col-lg-12'; // Una categoría ocupa todo el ancho.
                        } elseif ($category_count === 2) {
                            $column_class = 'col-lg-6';  // Dos categorías ocupan la mitad cada una.
                        } else {
                            $column_class = 'col-lg-4';  // Tres o más categorías, un tercio cada una.
                        }
                    ?>
                        <div class="menu-categories-grid row">
                            <?php while (have_rows('category')) : the_row(); ?>
                                <?php
                                $category_title = get_sub_field('title_category');
                                ?>
                                <div class="menu-category-column <?php echo esc_attr($column_class); ?> col-md-6 mb-4">
                                    <?php if ($category_title) : ?>
                                        <h2 class="menu-category-title text-uppercase fw-bold text-golden mb-0 pb-5"><?php echo esc_html($category_title); ?></h2>
                                    <?php endif; ?>

                                    <?php if (have_rows('list')) : ?>
                                        <ul class="list-unstyled menu-items-list">
                                            <?php while (have_rows('list')) : the_row(); ?>
                                                <?php
                                                $plate_name = get_sub_field('name_plate');
                                                $plate_description = get_sub_field('description_name');
                                                $is_single_price = get_sub_field('single_price');
                                                $price_display_output = '';

                                                if ($is_single_price) {
                                                    $single_price_value = get_sub_field('price');
                                                    if ($single_price_value !== '' && $single_price_value !== null) {
                                                        $price_display_output = esc_html(number_format(floatval($single_price_value), 2));
                                                    }
                                                } else {
                                                    $dual_price_value = get_sub_field('dual_price');
                                                    if ($dual_price_value) {
                                                        $price_display_output = esc_html($dual_price_value);
                                                    }
                                                }
                                                ?>
                                                <li class="menu-item mb-3">
                                                    <div class="menu-item-header d-flex justify-content-between align-items-start">
                                                        <h5 class="menu-item-name h6 fw-bold mb-0 me-2"><?php echo esc_html($plate_name); ?></h5>
                                                        <?php if (!empty($price_display_output)) : ?>
                                                            <span class="menu-item-price fw-bold"><?php echo $price_display_output; ?></span>
                                                        <?php endif; ?>
                                                    </div>
                                                    <?php if ($plate_description) : ?>
                                                        <p class="menu-item-description small text-muted mb-0"><?php echo esc_html($plate_description); ?></p>
                                                    <?php endif; ?>
                                                </li>
                                            <?php endwhile; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php else : ?>
                        <p><?php esc_html_e('No menu categories found for this menu.', 'del-porto-ristorante'); ?></p>
                    <?php endif; ?>
                </div>

            </article>

        <?php endwhile; ?>
    </main>
</div>

<?php get_footer();
