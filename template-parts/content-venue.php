<?php

/**
 * Template part for the Sub-Hero section (Happy Hour) on the homepage.
 *
 * @package Del_Porto_Ristorante
 */

$title = get_field('title_h2_venue') ?? 'Ready to Book? Start Here';

$info_subhero = get_field('info_subhero');

// Se obtienen los campos dentro del grupo
$subtitle = get_field('label_question_venue') ?? 'delportorestaurant@gmail.com';
$description = get_field('address_question_venue') ?? '91 Elizabeth Ave, Elizabeth, NJ | +1 (908) 409-8424';
$button_text = get_field('text_button_venue') ?? 'SUBMIT YOUR EVENT INFO';
$button_url = get_field('link_button_venue') ?? 'https://www.toasttab.com/invoice/lead?rx=19209e5d-b110-4f2c-a889-a719850ed967&ot=d22e38cc-6a2f-4963-8fa3-1bfcc0b6882b';

// La imagen se obtiene como un campo de nivel superior
$background_image = get_field('start_event_picture');

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