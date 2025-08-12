<?php

/**
 * Template Name: Join Our Team
 *
 * @package Del_Porto_Ristorante
 */

get_header();

$banner_jot_url = get_field('banner_jot');
$default_banner_image = get_template_directory_uri() . '/assets/images/jot-banner.webp';

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container py-5 jot-page-container bg-dark text-light px-lg-5">
            <header class="text-center my-5 pt-lg-5">
                <?php if (get_field('title_contact')) : ?>
                    <h2 class="text-golden mt-lg-5 fw-bold animate__animated animate__fadeInUp" style="text-transform: uppercase;"><?php echo esc_html(get_field('title_contact')); ?></h2>
                <?php endif; ?>
                <?php if (get_field('subtitle_contact')) : ?>
                    <p class="lead text-light animate__animated animate__fadeInUp animate__delay-0-3s"><?php echo esc_html(get_field('subtitle_contact')); ?></p>
                <?php endif; ?>
            </header>

            <div class="row g-4 mb-5 justify-content-center overflow-hidden">
                <div class="col-lg-6 animate__animated animate__fadeInUp animate__delay-0-5s">
                    <?php if (get_field('description_jot')) : ?>
                        <?php the_field('description_jot'); ?>
                    <?php endif; ?>
                    <?php if ($banner_jot_url) : ?>
                        <div class="jot-banner-image mt-4">
                            <img src="<?php echo esc_url($banner_jot_url); ?>" alt="Join Our Team Banner" class="img-fluid rounded-0">
                        </div>
                    <?php endif; ?>
                </div>

                <div class="col-lg-6 animate__animated animate__fadeInUp animate__delay-0-7s">
                    <?php if (get_field('shortcode_jot')) : ?>
                        <?php echo do_shortcode(get_field('shortcode_jot')); ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="careers-section mb-5 animate__animated animate__fadeInUp animate__delay-1s">
                <h2 class="text-golden mb-4">Current Openings</h2>
                <?php if (have_rows('carrers_dpr')) : ?>
                    <ul class="list-unstyled">
                        <?php while (have_rows('carrers_dpr')) : the_row(); ?>
                            <li class="career-item d-flex justify-content-between align-items-center p-3 mb-2 border-bottom border-secondary">
                                <span class="position-title fw-bold text-light"><?php the_sub_field('ttl_position'); ?></span>
                                <?php
                                $status = get_sub_field('status_position');
                                $status_class = '';
                                if ($status === 'Open') {
                                    $status_class = 'text-success';
                                } elseif ($status === 'New') {
                                    $status_class = 'text-golden';
                                } else {
                                    $status_class = 'text-danger';
                                }
                                ?>
                                <span class="position-status <?php echo esc_attr($status_class); ?>"><?php echo esc_html($status); ?></span>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>

        </div>
    </main>
</div>

<?php
get_footer();