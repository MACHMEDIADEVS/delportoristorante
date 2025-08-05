<?php

/**
 * Template part for displaying the Google Reviews Carousel on the homepage.
 *
 * @package Del_Porto_Ristorante
 */

$section_title = get_field('sctn_customers_ttlh4');

// Datos codificados de las reseñas, extraídos de las capturas de pantalla.
$reviews = [
    [
        'name_customer' => 'K V',
        'date_customer' => '2025-03-18',
        'stars_customer' => 5,
        'edit_text_customer' => 'Food was absolutely delicious and the service was excellent. Five stars hands down will come back! Hosting service was amazing, thank you for making my clients and i feel so special.',
    ],
    [
        'name_customer' => 'jared wood',
        'date_customer' => '2025-03-17',
        'stars_customer' => 5,
        'edit_text_customer' => 'Ask for John Williams. He took amazing care of us.',
    ],
    [
        'name_customer' => 'R S',
        'date_customer' => '2025-03-17',
        'stars_customer' => 5,
        'edit_text_customer' => 'Carlos and J.W. were amazing. Very very kind and fast. The food was magnificent, the meatballs are to die for. Both guys are so funny and cool. Espresso Martini is the best I have ever drank. Love this place!',
    ],
    [
        'name_customer' => 'Rebeca Taipe',
        'date_customer' => '2025-03-16',
        'stars_customer' => 5,
        'edit_text_customer' => 'The food at this place is great! Our server Carlos was amazing and extremely attentive. Definitely recommend this place !',
    ],
    [
        'name_customer' => 'Mercy Koyongian',
        'date_customer' => '2025-03-20',
        'stars_customer' => 5,
        'edit_text_customer' => 'First time here to celebrate a birthday and food and service was amazing! John Tuden was our server and he made our dining experience special.',
    ],
    [
        'name_customer' => 'Monica Dailey',
        'date_customer' => '2025-03-19',
        'stars_customer' => 5,
        'edit_text_customer' => 'John was fabulous!',
    ],
    [
        'name_customer' => 'J Medina',
        'date_customer' => '2025-03-19',
        'stars_customer' => 5,
        'edit_text_customer' => 'great service from John William',
    ],
];

?>

<section class="google-reviews-carousel-section py-5 bg-dark animate__animated animate__fadeInUp">
    <div class="container py-5">
        <?php if ($section_title) : ?>
            <h4 class="text-center text-light mb-5 d-md-none animate__animated animate__fadeInUp"><?php echo esc_html($section_title); ?></h4>
        <?php endif; ?>

        <div class="row align-items-center">
            <div class="col-12 col-md-2 mb-4 mb-md-0 d-flex flex-column align-items-center text-center">
                <div class="google-info-content animate__animated animate__fadeInUp">
                    <h5 class="text-golden fw-bold">EXCELLENT</h5>
                    <div class="stars-rating text-golden mb-2">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                    </div>
                    <p class="ranking-card-dpr text-gold">
                        4.9
                    </p>
                    <p class="text-light small text-center">Based on 2631 reviews</p>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/google-logo.webp'); ?>" alt="Google Reviews" class="google-logo" />
                </div>
            </div>

            <div class="col-12 col-md-10">
                <div class="swiper reviews-swiper">
                    <div class="swiper-wrapper">
                        <?php
                        if ($reviews) :
                            foreach ($reviews as $review) :
                        ?>
                                <div class="swiper-slide animate__animated animate__fadeInUp">
                                    <?php get_template_part('template-parts/card', 'review', ['review' => $review]); ?>
                                </div>
                        <?php
                            endforeach;
                        endif;
                        ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </div>
</section>