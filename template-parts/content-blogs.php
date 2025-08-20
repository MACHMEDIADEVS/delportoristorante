<?php

/**
 * Template part for displaying the Blogs section on the homepage.
 *
 * @package Del_Porto_Ristorante
 */
?>

<style>
    /*
 * # BLOGS SECTION #
 * ----------------------------------------------------
 */
    .blogs-carousel-section {
        background-color: var(--bg-dark);

        .swiper-button-next,
        .swiper-button-prev {
            color: var(--golden-color) !important;
            width: 30px;
            height: 30px;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 0;
            opacity: 0.8;
            transition: opacity 0.3s ease, background-color 0.3s ease;

            &::after {
                font-size: 1rem;
            }

            &:hover {
                opacity: 1;
                background-color: rgba(0, 0, 0, 0.7);
            }
        }

        .swiper-pagination-bullet-active {
            background-color: var(--golden-color) !important;
        }

        .blog-card {
            h5.card-title {
                font-size: 1.2rem;
                color: var(--txt-light);
                font-weight: bold;
            }
        }
    }
</style>

<section class="blogs-carousel-section py-5 bg-darker animate__animated animate__fadeInUp">
    <div class="container">
        <h2 class="text-center fw-bold text-golden pt-3" style="text-transform: uppercase;"><?php esc_html_e('Elizabeth Journal', 'del-porto-ristorante'); ?></h2>
        <?php
        $blogs_query = new WP_Query([
            'post_type'      => 'post',
            'posts_per_page' => 6,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
        ]);

        if ($blogs_query->have_posts()) : ?>
            <div class="swiper blogs-swiper pt-5">
                <div class="swiper-wrapper">
                    <?php while ($blogs_query->have_posts()) : $blogs_query->the_post(); ?>
                        <div class="swiper-slide animate__animated animate__fadeInUp">
                            <?php get_template_part('template-parts/card', 'post'); ?>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata(); ?>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        <?php endif; ?>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Inicializa el carrusel de blogs
        new Swiper('.blogs-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            breakpoints: {
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                },
            },
        });
    });
</script>