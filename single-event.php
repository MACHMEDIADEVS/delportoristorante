<?php

/**
 * The template for displaying single Event posts.
 *
 * @package Del_Porto_Ristorante
 */

get_header();

while (have_posts()) : the_post();

    $flyer_url = get_field('flyer_event');
    $main_data = get_field('main_data');
    $status_event = $main_data['status_event'] ?? '';
    $location_event = $main_data['location_event'] ?? '';
    $date_event = $main_data['date_hour_event'] ?? '';
    $text_button_event = $main_data['text_button_event'] ?? __('Reserve Now', 'del-porto-ristorante');
    $url_button_event = $main_data['url_button_event'] ?? '';
    $sponsors = get_field('sponsors');
    $description_event = get_field('description_event');
    $subtitle = get_field('subtitle');

    $booking_url = $url_button_event;
    $booking_title = $text_button_event;
    $booking_target = '_blank';
    $featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
?>

    <style>
        /*
         * # SINGLE - CPT EVENT #
         * ----------------------------------------------------
         */
        .single-event-page {
            background-color: var(--bg-dark);
            color: var(--txt-light);

            h2,
            h3,
            h4,
            h5,
            h6 {
                color: var(--txt-light) !important;
            }

            .event-article {
                .event-header {
                    .badge {
                        font-size: 0.8rem;
                        font-weight: 500;
                    }
                }

                .event-meta {
                    background-color: var(--bg-darker) !important;
                    border: 1px solid var(--border-dark);
                    padding: 1rem !important;

                    p {
                        color: var(--txt-light) !important;
                    }
                }
            }

            .event-date-box {
                background-color: var(--bg-darker);
                color: var(--txt-light);
                border-radius: 0px;
                padding: 10px 15px;
                text-align: center;
                line-height: 1.1;
                min-width: 75px;
                border: 1px solid var(--border-dark);

                .month {
                    display: block;
                    font-size: 1rem;
                    font-weight: bold;
                    text-transform: uppercase;
                    letter-spacing: 1px;
                }

                .day {
                    display: block;
                    font-size: 2.5rem;
                    font-weight: 700;
                }
            }

            .event-timetable-section {
                border: 1px solid var(--border-dark);
                padding: 1.5rem !important;
                background-color: var(--bg-darker) !important;

                h5 {
                    color: var(--txt-light) !important;
                }
            }

            .flyer-container img {
                max-height: 85vh;
                object-fit: contain;
                width: 100%;
            }

            .sponsors-section {
                padding-top: 3rem !important;
                margin-top: 3rem !important;
                border-top: 1px solid var(--border-dark) !important;

                h4 {
                    color: var(--txt-light) !important;
                    text-transform: uppercase;
                }

                .sponsors-container {
                    display: flex;
                    flex-wrap: wrap;
                    justify-content: center;
                    align-items: center;
                    gap: 40px;
                }

                .sponsor-logo img {
                    max-height: 80px;
                    max-width: 200px;
                    object-fit: contain;
                    filter: grayscale(100%);
                    opacity: 0.8;
                    transition: all 0.3s ease;

                    &:hover {
                        filter: grayscale(0%);
                        opacity: 1;
                    }
                }
            }
        }

        h1 {
            font-size: 3rem !important;
        }

        /* RESPONSIVE - IPHONE */
        @media (max-width: 767px) {
            h1 {
                font-size: 1.8rem !important;
            }
        }
    </style>

    <main id="primary" class="site-main single-event-page">
        <article id="post-<?php the_ID(); ?>" <?php post_class('event-article'); ?>>

            <?php if ($featured_image_url) : ?>
                <section class="single-event-hero position-relative d-flex align-items-center justify-content-center text-center text-light" style="background-image: url('<?php echo esc_url($featured_image_url); ?>'); min-height: 25dvh;">
                    <div class="hero-image-overlay"></div>
                    <div class="container position-relative z-index-1">
                        <?php if ($subtitle) : ?>
                            <h2 class="text-light mt-5 text-uppercase fw-bold"><?php echo esc_html($subtitle); ?></h2>
                        <?php endif; ?>
                    </div>
                </section>
            <?php endif; ?>

            <div class="container py-lg-5 event-padding">
                <div class="row gx-lg-5">
                    <div class="col-lg-7">
                        <div class="event-header d-flex align-items-center my-3">
                            <?php
                            if ($date_event) {
                                $date_object = DateTime::createFromFormat('m/d/Y', $date_event);
                                if ($date_object) {
                                    $month = strtoupper($date_object->format('M'));
                                    $day = $date_object->format('d');
                            ?>
                                    <div class="event-date-box me-lg-4 me-3 mt-lg-3">
                                        <span class="month"><?php echo esc_html($month); ?></span>
                                        <span class="day"><?php echo esc_html($day); ?></span>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                            <div class="title-wrapper d-flex align-items-center">
                                <h1 class="fw-bold mb-0 text-golden"><?php the_title(); ?></h1>

                            </div>
                        </div>

                        <div class="event-meta mb-3 bg-light p-3">
                            <div class="row">
                                <?php if ($location_event) : ?>
                                    <div class="col-auto">
                                        <p class="location mb-0"><i class="bi bi-geo-alt me-2"></i><?php echo esc_html($location_event); ?></p>
                                    </div>
                                <?php endif; ?>
                                <?php
                                $main_data = get_field('main_data');
                                $hour_clock_event = $main_data['hour_clock_event'] ?? '';
                                if ($hour_clock_event) :
                                ?>
                                    <div class="col-auto">
                                        <p class="hour-clock mb-0"><i class="bi bi-clock me-2"></i><?php echo esc_html($hour_clock_event); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if ($url_button_event && $status_event !== 'Sold Out' && $status_event !== 'Finished') : ?>
                            <a href="<?php echo esc_url($url_button_event); ?>" target="<?php echo esc_attr($booking_target); ?>" class="btn btn-primary btn-lg mb-4"><?php echo esc_html($booking_title); ?></a>
                        <?php endif; ?>

                        <div class="entry-content mb-5">
                            <?php echo $description_event; ?>
                        </div>
                    </div>

                    <?php if ($flyer_url) : ?>
                        <div class="col-lg-5 d-flex align-items-start justify-content-center mt-4 mt-lg-0">
                            <figure class="flyer-container">
                                <img src="<?php echo esc_url($flyer_url); ?>" alt="<?php esc_attr_e('Event Flyer', 'del-porto-ristorante'); ?>" class="img-fluid rounded shadow-sm">
                            </figure>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($sponsors) : ?>
                    <div class="sponsors-section border-top py-5 mt-5">
                        <h4 class="text-center text-uppercase fw-bold mb-5"><?php esc_html_e('Our Sponsors', 'del-porto-ristorante'); ?></h4>
                        <div class="sponsors-container">
                            <?php foreach ($sponsors as $sponsor) :
                                $logo_url = $sponsor['logo'] ?? '';
                                $sponsor_title = $sponsor['title_sponsor'] ?? '';
                                $sponsor_link = $sponsor['link_sponsor'] ?? '';
                                if ($logo_url) : ?>
                                    <div class="sponsor-logo">
                                        <a href="<?php echo esc_url($sponsor_link); ?>" target="_blank" rel="noopener">
                                            <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr($sponsor_title); ?>">
                                        </a>
                                    </div>
                            <?php endif;
                            endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </article>
    </main>

<?php endwhile;
get_footer(); ?>