<?php
/**
 * Template part for a full-width hero with a black overlay.
 *
 * @package Del_Porto_Ristorante
 */

$hero_image_url = $args['hero_image_url'] ?? '';
$hero_title     = $args['hero_title'] ?? '';

?>

<section class="menu-hero-image-container position-relative d-flex align-items-center justify-content-center text-center text-light" style="background-image: url('<?php echo esc_url($hero_image_url); ?>');">
    <div class="hero-image-overlay"></div>
    <div class="container position-relative z-index-1">
        <?php if ($hero_title) : ?>
            <h1 class="text-golden text-uppercase fw-bold mt-5"><?php echo esc_html($hero_title); ?></h1>
        <?php endif; ?>
    </div>
</section>