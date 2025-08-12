<?php

/**
 * Template Name: Gallery
 *
 * @package Del_Porto_Ristorante
 */

get_header();

$gallery_title = get_field('title_gallery');
$gallery_description = get_field('description_gallery');
$gallery_images = get_field('dpr_gallery');

?>

<style>
    /*
 * # GALLERY TEMPLATE #
 * ----------------------------------------------------
 */
    .page-template-template-gallery {
        background: radial-gradient(ellipse at top, #282828, #000000) !important;

        .gallery-page-container {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }

    .grid-wrapper {
        display: grid;
        grid-gap: 10px;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        grid-auto-rows: 200px;
        grid-auto-flow: dense;

        &>div {
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 5px;
            overflow: hidden;

            &>img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                vertical-align: middle;
                display: inline-block;
                transition: transform 0.3s ease;

                &:hover {
                    transform: scale(1.05);
                }
            }
        }

        .wide {
            grid-column: span 2;
        }

        .tall {
            grid-row: span 2;
        }

        .big {
            grid-column: span 2;
            grid-row: span 2;
        }
    }

    .image-modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.85);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease-in-out, visibility 0.3s ease-in-out;

        &.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            position: relative;
            max-width: 90vw;
            max-height: 70vh;
            display: flex;
            justify-content: center;
            align-items: center;

            img {
                max-width: 100%;
                max-height: 100%;
                display: block;
                border-radius: 5px;
                box-shadow: 0 0 15px 5px var(--golden-color);
                transform: scale(0.8);
                opacity: 0;
                transition: transform 0.3s ease-out, opacity 0.3s ease-out,
                    box-shadow 0.3s ease-out;
            }
        }

        &.active .modal-content img {
            transform: scale(1);
            opacity: 1;
            max-height: 80%;
            position: fixed;
        }

        .modal-close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: #fff;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
            transition: color 0.2s ease-in-out;

            &:hover {
                color: #ddd;
            }
        }
    }
</style>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <div class="container py-5 gallery-page-container">
            <header class="entry-header text-center my-5 pt-lg-5">
                <?php if ($gallery_title) : ?>
                    <h1 class="text-golden fw-bold"><?php echo esc_html($gallery_title); ?></h1>
                <?php endif; ?>
                <?php if ($gallery_description) : ?>
                    <p class="mt-3 text-white"><?php echo esc_html($gallery_description); ?></p>
                <?php endif; ?>
            </header>

            <div class="grid-wrapper">
                <?php
                if ($gallery_images) :
                    $index = 0;
                    foreach ($gallery_images as $image_url) :
                        $item_class = '';
                        // Lógica para asignar clases que controlan el tamaño en la cuadrícula
                        if ($index % 11 === 0) {
                            $item_class = 'big';
                        } elseif ($index % 5 === 0) {
                            $item_class = 'wide';
                        } elseif ($index % 7 === 0) {
                            $item_class = 'tall';
                        }
                ?>
                        <div class="<?php echo esc_attr($item_class); ?>">
                            <img src="<?php echo esc_url($image_url); ?>" alt="<?php printf(esc_attr__('Gallery Image %d', 'del-porto-ristorante'), $index + 1); ?>" loading="lazy" data-full-image="<?php echo esc_url($image_url); ?>">
                        </div>
                <?php
                        $index++;
                    endforeach;
                endif;
                ?>
            </div>
        </div>

    </main>
</div>

<div class="image-modal-overlay">
    <div class="modal-content">
        <img src="" alt="Full-size Gallery Image">
        <span class="modal-close">&times;</span>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const body = document.body;
        // La clase del selector ha sido corregida para que coincida con la nueva estructura de la galería.
        const galleryItems = document.querySelectorAll('.grid-wrapper > div');
        const modalOverlay = document.querySelector('.image-modal-overlay');
        const modalImage = modalOverlay.querySelector('img');
        const modalClose = modalOverlay.querySelector('.modal-close');

        // Añadir la clase para activar la animación escalonada al cargar
        body.classList.add('gallery-loaded');

        // Manejar la apertura del modal
        galleryItems.forEach(item => {
            item.addEventListener('click', () => {
                const fullImageUrl = item.querySelector('img').getAttribute('data-full-image');
                if (fullImageUrl) {
                    modalImage.src = fullImageUrl;
                    modalOverlay.classList.add('active');
                }
            });
        });

        // Manejar el cierre del modal
        modalClose.addEventListener('click', () => {
            modalOverlay.classList.remove('active');
        });

        modalOverlay.addEventListener('click', (e) => {
            if (e.target === modalOverlay) {
                modalOverlay.classList.remove('active');
            }
        });
    });
</script>

<?php
get_footer();
