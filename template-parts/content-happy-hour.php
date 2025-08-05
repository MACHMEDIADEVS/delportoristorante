<?php

/**
 * Template part for the Sub-Hero section (Happy Hour) on the homepage.
 *
 * @package Del_Porto_Ristorante
 */

$title = get_field('sctn_happy_hour_ttlh4');
$subtitle = get_field('subtitle_happy_hour');
$background_image = get_field('image_happy_hour');
$description = get_field('description_happy_hour');
$features = get_field('features_happy_hour');
$button_text = get_field('cta_btn_happy_hour');
$button_url = get_field('url_btn_happy_hour');

// Fallback para la imagen de fondo si no se ha subido ninguna
if (!$background_image) {
    $background_image = get_template_directory_uri() . '/assets/images/catering.webp';
}
?>

<section id="book-your-event-section" class="book-your-event-hero" style="background-image: url('<?php echo esc_url($background_image); ?>');">
    <div class="hero-image-overlay"></div>
    <div class="container hero-content text-start p-4 px-md-5 col-lg-8">
        <div class="col animate__animated animate__fadeInUp">
            <?php if ($title) : ?>
                <h4 class="text-light"><?php echo esc_html($title); ?></h4>
            <?php endif; ?>
            <p class="text-light" style="font-size: 1.5rem;">
                <?php echo esc_html($subtitle); ?>
            </p>
            <?php if ($description) : ?>
                <p class="text-light text-start animate__animated animate__fadeInUp animate__delay-0-3s" style="font-size:1rem !important;"><?php echo esc_html($description); ?></p>
            <?php endif; ?>
        </div>


        <?php if ($button_text && $button_url) : ?>
            <a href="<?php echo esc_url($button_url); ?>" class="btn btn-primary mt-3 animate__animated animate__fadeInUp animate__delay-1s"><?php echo esc_html($button_text); ?></a>
        <?php endif; ?>
    </div>
</section>