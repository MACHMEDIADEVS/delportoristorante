<?php

/**
 * Template Name: Events
 *
 * @package Del_Porto_Ristorante
 */

get_header();
?>

<style>
    /*
 * # EVENTS PAGE HERO #
 * ----------------------------------------------------
 */
    .events-hero-section {
        height: 40vh;
        background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/events-hero-background.webp');
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

        <section class="events-hero-section position-relative d-flex align-items-center justify-content-center text-center text-light">
            <div class="hero-image-overlay"></div>
            <div class="container position-relative z-index-1">
                <h1 class="display-1 text-uppercase fw-bold"><?php the_title(); ?></h1>
            </div>
        </section>

        <div class="container py-5 text-light animate__animated animate__fadeInUp">
            <?php
            // Se obtienen todos los eventos en una sola consulta
            $all_events_query = new WP_Query(array(
                'post_type'      => 'event',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'meta_key'       => 'main_data_date_hour_event',
                'orderby'        => 'meta_value',
                'order'          => 'ASC',
            ));

            $events_with_dates = [];
            if ($all_events_query->have_posts()) {
                while ($all_events_query->have_posts()) {
                    $all_events_query->the_post();
                    $event_date_str = get_field('main_data')['date_hour_event'];

                    if ($event_date_str) {
                        $event_date_obj = DateTime::createFromFormat('m/d/Y', $event_date_str);
                        if ($event_date_obj) {
                            $events_with_dates[] = [
                                'id' => get_the_ID(),
                                'date_obj' => $event_date_obj,
                            ];
                        }
                    } else {
                        $events_with_dates[] = ['id' => get_the_ID(), 'date_obj' => null];
                    }
                }
                wp_reset_postdata();
            }

            // Ordena el array por fecha de forma cronológica, con los eventos sin fecha al final
            usort($events_with_dates, function ($a, $b) {
                if ($a['date_obj'] === $b['date_obj']) {
                    return 0;
                }
                if ($a['date_obj'] === null) {
                    return 1;
                }
                if ($b['date_obj'] === null) {
                    return -1;
                }
                return $a['date_obj'] <=> $b['date_obj'];
            });

            $upcoming_events_ids = [];
            $other_events_ids = [];
            $current_date = new DateTime();
            $count_upcoming = 0;

            foreach ($events_with_dates as $event) {
                if ($event['date_obj'] && $event['date_obj'] >= $current_date && $count_upcoming < 3) {
                    $upcoming_events_ids[] = $event['id'];
                    $count_upcoming++;
                } else {
                    $other_events_ids[] = $event['id'];
                }
            }

            // Consulta para los 3 eventos más próximos
            if (!empty($upcoming_events_ids)) :
                $upcoming_query = new WP_Query([
                    'post_type' => 'event',
                    'post__in'  => $upcoming_events_ids,
                    'orderby'   => 'post__in',
                ]);
            ?>
                <h2 class="fw-bold text-golden mb-4" style="text-transform: uppercase;">Upcoming Events</h2>
                <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-3 events-grid pb-5">
                    <?php
                    $index = 0;
                    while ($upcoming_query->have_posts()) :
                        $upcoming_query->the_post();
                    ?>
                        <div class="col d-flex animate__animated animate__fadeInUp" style="animation-delay: <?php echo esc_attr($index * 0.1); ?>s;">
                            <?php get_template_part('template-parts/card', 'event'); ?>
                        </div>
                    <?php
                        $index++;
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            <?php endif; ?>

            <?php
            if (!empty($other_events_ids)) :
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $other_query = new WP_Query([
                    'post_type'      => 'event',
                    'post__in'       => $other_events_ids,
                    'posts_per_page' => 12,
                    'paged'          => $paged,
                    'orderby'        => 'date',
                    'order'          => 'ASC',
                ]);
            ?>
                <h2 class="fw-bold text-golden mt-5 mb-4" style="text-transform: uppercase;">Other Events</h2>
                <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-4 past-events-grid">
                    <?php
                    $index = 0;
                    while ($other_query->have_posts()) :
                        $other_query->the_post();
                    ?>
                        <div class="col d-flex animate__animated animate__fadeInUp" style="animation-delay: <?php echo esc_attr($index * 0.1); ?>s;">
                            <?php get_template_part('template-parts/card', 'event'); ?>
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
                        'total'     => $other_query->max_num_pages,
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
