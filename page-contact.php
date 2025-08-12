<?php

/**
 * Template Name: Contact
 *
 * @package Del_Porto_Ristorante
 */

get_header();

$image_contact = get_field('image_contact');
$description_contact = get_field('description_contact');
$shortcode_contact = get_field('shortcode_contact');
$timetable_contact = get_field('timetable_contact');
$main_info = get_field('main_info');

?>

<style>
    /*
 * # CONTACT PAGE MAP #
 * ----------------------------------------------------
 */
    .contact-map-section {
        .map-container {
            width: 100%;
            height: 450px;

            iframe {
                width: 100%;
                height: 100%;
                border: 0;
                filter: grayscale(100%);
            }
        }
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="contact-hero-section position-relative d-flex align-items-center justify-content-center text-center text-light" style="background-image: url('<?php echo esc_url($image_contact); ?>');">
            <div class="hero-image-overlay"></div>
            <div class="container position-relative z-index-1">
                <h1 class="text-uppercase fw-bold"><?php the_title(); ?></h1>
            </div>
        </section>

        <div class="container py-5 contact-page-container bg-dark text-light">
            <div class="row g-4 contact-content-wrapper">
                <div class="col-lg-6 animate__animated animate__fadeInUp">
                    <div class="contact-form-block p-4 bg-darker">
                        <h3 class="mb-4 text-golden">Contact Us</h3>
                        <?php if ($shortcode_contact) : ?>
                            <?php echo do_shortcode($shortcode_contact); ?>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="col-lg-6 animate__animated animate__fadeInUp animate__delay-0-3s">
                    <div class="contact-info-block p-4 bg-darker">
                        <h3 class="mb-4 text-golden">Contact Us</h3>
                        <?php if ($description_contact) : ?>
                            <div class="contact-description mb-4">
                                <?php echo $description_contact; ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($main_info) : ?>
                            <div class="contact-main-info mb-4">
                                <div class="row g-2 justify-content-center text-center">
                                    <div class="col-lg-6 d-flex flex-column align-items-center justify-content-center bg-dark p-2">
                                        <p class="mb-1"><i class="bi bi-geo-alt-fill me-2 text-golden"></i></p>
                                        <p class="mb-1"><a href="#"><?php echo esc_html($main_info['address_contact']); ?></a></p>
                                    </div>
                                    <div class="col-lg-6 d-flex flex-column align-items-center justify-content-center bg-dark p-2">
                                        <p class="mb-1"><i class="bi bi-envelope-fill me-2 text-golden"></i></p>
                                        <p class="mb-1"><a href="mailto:<?php echo esc_attr($main_info['email_contact']); ?>"><?php echo esc_html($main_info['email_contact']); ?></a></p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php if ($timetable_contact) : ?>
                            <div class="contact-timetable">
                                <?php echo $timetable_contact; ?>
                            </div>
                        <?php endif; ?>

                        <?php if (!empty($main_info['phone_contact'])) : ?>
                            <a href="tel:<?php echo esc_attr($main_info['phone_contact']); ?>" class="btn btn-primary btn-lg w-100 mt-4 mt-5">
                                <i class="bi bi-telephone-fill me-2"></i>
                                <?php echo esc_html($main_info['phone_contact']); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <section class="contact-map-section animate__animated animate__fadeInUp animate__delay-0-5s">
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3023.238549646487!2d-74.20815182399997!3d40.73979063711913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25143a9f939e1%3A0x6b4c107f9c2d159a!2s91%20Elizabeth%20Ave%2C%20Elizabeth%2C%20NJ%2007206%2C%20USA!5e0!3m2!1sen!2shu!4v1722971212879!5m2!1sen!2shu" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>

    </main>
</div>

<?php
get_footer();