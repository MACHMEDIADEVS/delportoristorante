<?php

/**
 * Template part for displaying a post card.
 *
 * @package Del_Porto_Ristorante
 */

$post_id = get_the_ID();
$image_src = has_post_thumbnail($post_id) ? get_the_post_thumbnail_url($post_id, 'medium_large') : get_template_directory_uri() . '/assets/images/delportoristorante.webp';

$post_title = get_the_title();
$short_title = (strlen($post_title) > 203) ? substr($post_title, 0, 203) . '...' : $post_title;
?>

<style>
    /*
     * # BLOG CARD #
     * ----------------------------------------------------
    */
    .blog-card {
        background-color: var(--bg-darker);
        color: var(--txt-light);
        border: 1px solid var(--border-dark);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;

        &:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
        }

        .card-img-top {
            height: 200px;
            /* Altura fija para todas las imágenes */
            object-fit: cover;
            /* Las imágenes se ajustan para cubrir el espacio */
            filter: brightness(0.8);
        }

        .card-body {
            background-color: var(--bg-dark);
            border-top: 1px solid var(--border-dark);
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            justify-content: space-between;

            h5.card-title {
                color: var(--golden-color);
                font-size: 1.5rem !important;
                font-weight: bold;
                margin-bottom: 0.5rem;

                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
            }

            
        }
    }
</style>

<div class="card blog-card h-100 border-0 rounded-0 w-100">
    <div class="position-relative">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo esc_url($image_src); ?>" class="card-img-top rounded-0" alt="<?php the_title_attribute(); ?>" />
        </a>
    </div>
    <div class="card-body rounded-0 d-flex flex-column justify-content-between">
        <div class="blog-card-meta mb-2">
            <?php
            $categories = get_the_category($post_id);
            if (!empty($categories)) {
                foreach ($categories as $category) {
                    $category_link = get_category_link($category->term_id);
                    echo '<a href="' . esc_url($category_link) . '" class="btn btn-outline-light btn-sm rounded-0 me-2">' . esc_html($category->name) . '</a>';
                }
            }
            ?>
        </div>
        <a href="<?php the_permalink(); ?>" class="text-decoration-none">
            <h5 class="card-title text-start"><?php echo nl2br(esc_html($short_title)); ?></h5>
        </a>
        <div class="mt-auto pt-1">
            <a href="<?php the_permalink(); ?>" class="btn btn-sm btn-primary w-100 fw-bold" style="text-transform: uppercase;">
                <?php esc_html_e('Read more', 'del-porto-ristorante'); ?>
            </a>
        </div>
    </div>
</div>