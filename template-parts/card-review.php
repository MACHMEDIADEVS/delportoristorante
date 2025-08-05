<?php
/**
 * Template part for displaying a single review card.
 *
 * @package Del_Porto_Ristorante
 */

$review = $args['review'] ?? null;
$default_review_image = get_template_directory_uri() . '/assets/images/user-placeholder.webp';

if (!$review) {
    return;
}

// Se remueven los datos del photo customer
$review_text = $review['edit_text_customer'];
$is_long_text = strlen($review_text) > 50;
$short_text = $is_long_text ? substr($review_text, 0, 100) . '...' : $review_text;
?>

<div class="card review-card text-start h-100 border-0 rounded-0">
    <div class="card-body d-flex flex-column justify-content-between p-4">
        <div class="review-header mb-2">
            <p class="user-name mb-1"><?php echo esc_html($review['name_customer']); ?></p>
            <div class="d-flex align-items-center mb-2">
                <div class="stars-rating text-golden me-2">
                    <?php
                    $stars = isset($review['stars_customer']) ? intval($review['stars_customer']) : 0;
                    for ($i = 0; $i < 5; $i++) {
                        if ($i < $stars) {
                            echo '<i class="bi bi-star-fill"></i>';
                        } else {
                            echo '<i class="bi bi-star"></i>';
                        }
                    }
                    ?>
                </div>
                <span class="review-date small"><?php echo esc_html($review['date_customer']); ?></span>
            </div>
        </div>
        <div class="review-text flex-grow-1 mb-4">
            <p class="fst-italic text-light review-text-content">"<?php echo esc_html($short_text); ?>"</p>
            <?php if ($is_long_text) : ?>
                <p class="d-none fst-italic text-light review-text-full">"<?php echo esc_html($review_text); ?>"</p>
                <a href="#" class="view-more-toggle text-golden small text-decoration-none" data-bs-toggle="collapse" data-bs-target="#review-full-<?php echo esc_attr($review['name_customer']); ?>"><?php esc_html_e('View more', 'del-porto-ristorante'); ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>