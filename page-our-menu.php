<?php

/**
 * Template Name: Our Menu
 *
 * @package Del_Porto_Ristorante
 */

get_header();
?>
<style>
    /*
 * # OUR MENU PAGE HERO #
 * ----------------------------------------------------
 */
    .our-menu-hero-section {
        height: 40vh;
        background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/menu-hero-background.webp');
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

        <section class="our-menu-hero-section position-relative d-flex align-items-center justify-content-center text-center text-light">
            <div class="hero-image-overlay"></div>
            <div class="container position-relative z-index-1">
                <h1 class="text-golden text-uppercase fw-bold"><?php the_title(); ?></h1>
            </div>
        </section>

        <div class="container py-5 text-light animate__animated animate__fadeInUp">
            <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-4 menu-grid-uniform">
                <?php
                $menus_query = new WP_Query(array(
                    'post_type'      => 'menu',
                    'posts_per_page' => -1, // Muestra todos los menús
                    'post_status'    => 'publish',
                    'orderby'        => 'title',
                    'order'          => 'ASC',
                ));

                if ($menus_query->have_posts()) :
                    $index = 0;
                    while ($menus_query->have_posts()) :
                        $menus_query->the_post();
                        $menu_data = array(
                            'id' => get_the_ID(),
                            'title' => get_the_title(),
                            'slug' => get_post_field('post_name', get_the_ID()),
                            'image_card' => get_field('image_card', get_the_ID()),
                        );
                ?>
                        <div class="col d-flex">
                            <?php get_template_part('template-parts/card', 'menu', [
                                'menu' => $menu_data,
                                'itemIndex' => $index,
                            ]); ?>
                        </div>
                <?php
                        $index++;
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </main>
</div>

<?php
get_footer();
