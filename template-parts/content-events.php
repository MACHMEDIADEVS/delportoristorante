<?php

/**
 * Template part for displaying the Events section on the homepage.
 *
 * @package Del_Porto_Ristorante
 */

$section_title = get_field('sctn_events_ttlh4');
$upcoming_events = new WP_Query(array(
    'post_type'      => 'event',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC',
));
?>

<section class="events-carousel-section py-5 bg-darker animate__animated animate__fadeInUp">
    <div class="container">
        <?php if ($section_title) : ?>
            <h4 class="text-center text-golden"><?php echo esc_html($section_title); ?></h4>
        <?php endif; ?>
        <?php if ($upcoming_events->have_posts()) : ?>
            <div class="swiper events-swiper pt-5">
                <div class="swiper-wrapper">
                    <?php
                    while ($upcoming_events->have_posts()) :
                        $upcoming_events->the_post();
                    ?>
                        <div class="swiper-slide animate__animated animate__fadeInUp">
                            <?php get_template_part('template-parts/card', 'event'); ?>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        <?php endif; ?>
    </div>
</section>