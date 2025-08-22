<?php

/**
 * Template part for the Happy Hour Slider on the homepage.
 *
 * @package Del_Porto_Ristorante
 */

$slider_experiences = get_field('slider_experiences');

if ($slider_experiences) :
?>

    <style>
        /*
        * # HAPPY HOUR SLIDER #
        * ----------------------------------------------------
        */
        .happy-hour-slider-section {
            .happy-hour-slide {
                height: 40vh;
                min-height: 400px;
                background-size: cover;
                background-position: center;
                display: flex;
                align-items: center;
                color: var(--txt-light);
                padding: 4em 0em !important;
                position: relative;
            }

            .hero-image-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                /* Filtro oscuro */
                z-index: 1;
            }

            .happy-hour-slide .hero-content {
                position: relative;
                z-index: 2;
            }

            /* Estilos de los controles de Swiper */
            .swiper-button-next,
            .swiper-button-prev {
                color: var(--golden-color) !important;
                top: 50%;
                transform: translateY(-50%);
                width: 40px;
                height: 40px;
                background-color: rgba(0, 0, 0, 0.5);
                border-radius: 0;
                opacity: 0.8;
                transition: opacity 0.3s ease, background-color 0.3s ease;
                z-index: 10;

                &:hover {
                    opacity: 1;
                    background-color: rgba(0, 0, 0, 0.7);
                }

                &::after {
                    font-size: 1.2rem;
                }
            }

            .swiper-button-prev {
                left: 10px;
            }

            .swiper-button-next {
                right: 10px;
            }

            .swiper-pagination-bullet {
                background-color: var(--txt-muted);
                opacity: 0.8;
                transition: background-color 0.3s ease;

                &-active {
                    background-color: var(--golden-color) !important;
                    opacity: 1;
                }
            }
        }
    </style>

    <div class="container text-center py-4">
        <h4 class="text-center text-golden">DEL PORTO EXPERIENCES</h4>
        <p>Ogni settimana è una festa da Del Porto - Sapori, amici e momenti da ricordare
            Every week is a celebration at Del Porto - Flavors, friends, and moments to remember</p>
    </div>

    <section class="happy-hour-slider-section bg-dark text-light animate__animated animate__fadeInUp">
        <div class="swiper happy-hour-swiper">
            <div class="swiper-wrapper">
                <?php
                foreach ($slider_experiences as $slide) :
                    $title = $slide['sctn_happy_hour_ttlh4'] ?? '';
                    $subtitle = $slide['subtitle_happy_hour'] ?? '';
                    $background_image = $slide['image_happy_hour'] ?? '';
                    $description = $slide['description_happy_hour'] ?? '';
                    $button_text = $slide['cta_btn_happy_hour'] ?? '';
                    $button_url = $slide['url_btn_happy_hour'] ?? '';

                    if (!$background_image) {
                        $background_image = get_template_directory_uri() . '/assets/images/catering.webp';
                    }
                ?>
                    <div class="swiper-slide happy-hour-slide position-relative" style="background-image: url('<?php echo esc_url($background_image); ?>');">
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
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            new Swiper('.happy-hour-swiper', {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                speed: 800, // Transición más lenta
                autoplay: {
                    delay: 8000, // Mayor tiempo de espera
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>
<?php endif; ?>