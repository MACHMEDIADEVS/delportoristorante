<?php

/**
 * Template part for displaying the Hero Home section.
 *
 * @package Del_Porto_Ristorante
 */

$video_url = get_field('video_hero_home');
$image_url = get_field('hero_background_image');

// Campos de texto y botones
$text_h1 = get_field('text_h1');
$title_h2 = get_field('title_h2');
$subtitle_description = get_field('subtitle_description');
$buttons_hero = get_field('buttons_hero');

?>

<section id="hero-front-page" class="hero-video-section">
    <div class="hero-video-bg-container">
        <?php if ($video_url) : ?>
            <video class="hero-video-element" autoplay muted loop playsinline poster="<?php echo esc_url($image_url); ?>">
                <source src="<?php echo esc_url($video_url); ?>" type="video/webm">
                <?php esc_html_e('Your browser does not support the video tag.', 'del-porto-ristorante'); ?>
            </video>
        <?php else : ?>
            <div class="image-background" style="background-image: url('<?php echo esc_url($image_url); ?>');"></div>
        <?php endif; ?>
    </div>
    <div class="hero-overlay"></div>
    <div class="container hero-content-container d-flex align-items-center">
        <div class="row w-100">
            <div class="col-12">
                <div class="hero-text-content">


                    <?php if ($title_h2) : ?>
                        <h2 class="hero-title animate__animated animate__fadeInDown"><?php echo esc_html($title_h2); ?></h2>
                    <?php endif; ?>

                    <?php if ($subtitle_description) : ?>
                        <p class="hero-tagline animate__animated animate__fadeInDown animate__delay-0-5s"><?php echo esc_html($subtitle_description); ?></p>
                    <?php endif; ?>
                    <?php if ($text_h1) : ?>
                        <h1 class="hero-subtitle animate__animated animate__fadeInDown animate__delay-0-3s"><?php echo esc_html($text_h1); ?></h1>
                    <?php endif; ?>

                    <div class="hero-actions animate__animated animate__fadeInUp animate__delay-1s">
                        <?php
                        if (!empty($buttons_hero) && is_array($buttons_hero)) :
                            // Para desktop
                            foreach ($buttons_hero as $index => $button) :
                                if (isset($button['txt_btnhero_cta']) && isset($button['url_btnhero_cta'])) :
                                    $class = ($index === 0) ? 'btn-primary me-md-3' : 'btn-outline-light';
                        ?>
                                    <a href="<?php echo esc_url($button['url_btnhero_cta']); ?>" class="btn <?php echo esc_attr($class); ?> btn-lg mb-3 mb-md-0 d-none d-md-inline-block">
                                        <?php echo esc_html($button['txt_btnhero_cta']); ?>
                                    </a>
                            <?php
                                endif;
                            endforeach;
                            ?>
                    </div>
                    <div class="d-md-none">
                        <div class="row g-2">
                            <?php
                            // Para mobile
                            foreach ($buttons_hero as $index => $button) :
                                if (isset($button['txt_btnhero_cta']) && isset($button['url_btnhero_cta'])) :
                                    $class = ($index === 0) ? 'btn-primary' : 'btn-outline-light';
                            ?>
                                    <div class="col-6">
                                        <a href="<?php echo esc_url($button['url_btnhero_cta']); ?>" class="btn <?php echo esc_attr($class); ?> btn-lg w-100">
                                            <?php echo esc_html($button['txt_btnhero_cta']); ?>
                                        </a>
                                    </div>
                            <?php
                                endif;
                            endforeach;
                            ?>
                        </div>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>