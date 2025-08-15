<?php

/**
 * Template Name: Event Venue
 *
 * @package Del_Porto_Ristorante
 */

get_header();

$start_event_picture_url = get_field('start_event_picture');
$featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');

$our_packages = get_field('our_packages');
?>

<style>
    /*
    * # PAGE - EVENT VENUE #
    * ----------------------------------------------------
    */
    .event-venue-hero {
        height: 40vh;
        min-height: 250px;
        background-image: url('<?php echo esc_url($featured_image_url); ?>');
        background-size: cover;
        background-position: center;
        position: relative;
        color: var(--txt-light);

        .hero-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
    }

    .accordion {
        .accordion-item {
            border: 1px solid var(--border-dark);

            .accordion-header {
                .accordion-button {
                    background-color: var(--bg-darker);
                    color: var(--txt-light);
                    font-weight: bold;

                    &:not(.collapsed) {
                        color: var(--golden-color);
                        background-color: var(--bg-darker);
                    }

                    &:focus {
                        box-shadow: none;
                        border-color: var(--golden-color);
                    }
                }
            }

            .accordion-body {
                background-color: var(--bg-dark);
                color: var(--txt-light);
            }
        }
    }

    .event-venue-page-content {

        h1,
        h2,
        h3,
        h4,
        h5 {
            color: var(--txt-light);
        }

        .lead-seo {
            font-style: italic;
            font-size: 1.1rem;
        }

        .packages-section {
            .card {
                border: 1px solid var(--border-dark);
            }

            .package-card-image {
                flex: 0 0 40%;

                img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }
            }
        }

        .faq-accordion-columns {
            @media (min-width: 992px) {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 2rem;
            }
        }
    }

    h2 {
        font-size: 3rem !important;
    }

    @media (max-width: 480px) {
        h2 {
            font-size: 2rem !important;
        }
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <?php if ($featured_image_url) : ?>
            <section class="event-venue-hero position-relative d-flex align-items-center justify-content-center text-center text-light">
                <div class="hero-image-overlay"></div>
                <div class="container position-relative z-index-1">
                    <h1 class="display-3 text-uppercase fw-bold animate__animated animate__fadeInUp"><?php the_title(); ?></h1>
                </div>
            </section>
        <?php endif; ?>

        <div class="container py-5 event-venue-page-content text-light">

            <div class="row justify-content-center mb-5 text-center animate-on-scroll">
                <div class="col-lg-8">
                    <h2 class="text-golden fw-bold"><?php esc_html_e('Host Your Event at Del Porto', 'del-porto-ristorante'); ?></h2>
                    <p class="lead fw-bold text-light"><?php esc_html_e('Italian Flavors | Personalized Service | Unforgettable Moments', 'del-porto-ristorante'); ?></p>
                    <br>
                    <p class="lead-seo text-light mb-4"><?php esc_html_e('Plan your next celebration at Del Porto Ristorante with curated Italian menus, tailored event packages, and expert service for gatherings from 15 to 120 guests.', 'del-porto-ristorante'); ?></p>
                </div>
                 <div class="long-description">
                        <p><?php esc_html_e('Thank you for considering Del Porto Italian Ristorante to host your next event. Whether it\'s an intimate gathering, a milestone celebration, or a corporate meeting, we offer curated Italian menus, elegant service, and personalized packages to ensure your event is seamless and memorable.', 'del-porto-ristorante'); ?></p>
                        <p><?php esc_html_e('Choose from lunch or dinner menus, buffet or plated options, open bar or custom drink menus and let our team handle the rest.', 'del-porto-ristorante'); ?></p>
                    </div>
            </div>

            <div class="row justify-content-center mb-5 animate-on-scroll">
                <div class="col-lg-8 text-center">

                   
                </div>
            </div>

            <section class="event-process-section my-5 animate-on-scroll">
                <h2 class="text-golden text-center mb-4"><?php esc_html_e('3 Steps Booking Process', 'del-porto-ristorante'); ?></h2>
                <div class="row text-center g-4">
                    <div class="col-md-4 animate__animated animate__fadeInUp">
                        <div class="card h-100 bg-darker text-light rounded-0 bg-dark text-white border-golden">
                            <div class="card-body">
                                <h3 class="h4 fw-bold mb-2"><?php esc_html_e('Step 1:', 'del-porto-ristorante'); ?></h3>
                                <p><?php esc_html_e('Submit Info Form', 'del-porto-ristorante'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-0-3s">
                        <div class="card h-100 bg-darker text-light rounded-0 bg-dark text-white border-golden">
                            <div class="card-body">
                                <h3 class="h4 fw-bold mb-2"><?php esc_html_e('Step 2:', 'del-porto-ristorante'); ?></h3>
                                <p><?php esc_html_e('Receive Estimate & Guide', 'del-porto-ristorante'); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-0-5s">
                        <div class="card h-100 bg-darker text-light rounded-0 bg-dark text-white border-golden">
                            <div class="card-body">
                                <h3 class="h4 fw-bold mb-2"><?php esc_html_e('Step 3:', 'del-porto-ristorante'); ?></h3>
                                <p><?php esc_html_e('Pay Deposit & Confirm', 'del-porto-ristorante'); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- PACKAGE -->
            <section class="packages-section my-5 animate-on-scroll">
                <h2 class="text-golden text-center mb-4"><?php esc_html_e('Our Packages', 'del-porto-ristorante'); ?></h2>
                <div class="row g-4">
                    <?php
                    if (have_rows('our_packages')) :
                        $index = 0;
                        while (have_rows('our_packages')) : the_row();
                            $title_package = get_sub_field('title_package') ?? '';
                            $subtitle_package = get_sub_field('subtitle_package') ?? '';
                            $info_package = get_sub_field('info_package');
                            $description_package = $info_package['description_package'] ?? '';
                    ?>
                            <div class="col-md-6 col-lg-4 animate__animated animate__fadeInUp" style="animation-delay: <?php echo esc_attr($index * 0.1); ?>s;">
                                <div class="card bg-darker text-light h-100 rounded-0">
                                    <div class="card-body bg-dark">
                                        <h5 class="card-title text-golden fw-bold"><?php echo esc_html($title_package); ?></h5>
                                        <p class="card-title text-golden fw-bold"><?php echo esc_html($subtitle_package); ?></p>
                                        <p class="card-text"><?php echo $description_package; ?></p>
                                    </div>
                                </div>
                            </div>
                    <?php
                            $index++;
                        endwhile;
                    endif;
                    ?>
                </div>
            </section>
        </div>

        <!-- READY TO BOOK? -->
        <?php get_template_part('template-parts/content', 'venue'); ?>

        <!-- FAQs -->
        <section class="faq-section mx-lg-5 py-5">
            <h2 class="text-golden text-center mb-4"><?php esc_html_e('Event Guidelines & FAQs', 'del-porto-ristorante'); ?></h2>
            <div class="accordion accordion-flush" id="faqAccordion">
                <?php
                if (have_rows('question')) :
                    $index = 0;
                    while (have_rows('question')) : the_row();
                        $question_text = get_sub_field('question_venue');
                        $answer_text = get_sub_field('answers_venue');
                ?>
                        <div class="accordion-item bg-darker text-light rounded-0 border-0 mb-2 animate__animated animate__fadeInUp" style="animation-delay: <?php echo esc_attr($index * 0.1); ?>s;">
                            <h3 class="accordion-header" id="heading-<?php echo esc_attr($index); ?>">
                                <button class="accordion-button collapsed bg-darker text-light fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo esc_attr($index); ?>" aria-expanded="false" aria-controls="collapse-<?php echo esc_attr($index); ?>">
                                    <?php echo esc_html($question_text); ?>
                                </button>
                            </h3>
                            <div id="collapse-<?php echo esc_attr($index); ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo esc_attr($index); ?>" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <?php echo esc_html($answer_text); ?>
                                </div>
                            </div>
                        </div>
                <?php
                        $index++;
                    endwhile;
                endif;
                ?>
            </div>
            <hr>
            <div class="final-note text-center my-5 animate-on-scroll">
                <p class="fst-italic text-white"><?php esc_html_e('At Del Porto, every event is treated with care, flavor, and elegance. Let us bring Italian hospitality to your special day.', 'del-porto-ristorante'); ?></p>
            </div>

        </section>
    </main>
</div>

<?php
get_footer();
