<?php

/**
 * Template part for displaying an event card.
 *
 * @package Del_Porto_Ristorante
 */

$event_id = get_the_ID();
$flyer_event = get_field('flyer_event', $event_id);
$main_data = get_field('main_data', $event_id);
$date_hour_event = !empty($main_data['date_hour_event']) ? $main_data['date_hour_event'] : '';
$default_event_image = get_template_directory_uri() . '/assets/images/delportoristorante.webp';

// Nueva lógica para procesar la fecha de forma segura
$month = '';
$day = '';
$button_text = __('Reserve now', 'del-porto-ristorante');
$button_class = 'btn-primary';
$button_disabled = '';

if ($date_hour_event) {
    try {
        // Se corrige el formato para que coincida con el Date Picker de ACF (m/d/Y)
        $date_object = DateTime::createFromFormat('m/d/Y', $date_hour_event);
        if ($date_object) {
            $month = $date_object->format('M');
            $day = $date_object->format('d');
            
            if ($date_object < new DateTime()) {
                $button_text = __('Finished', 'del-porto-ristorante');
                $button_class = 'btn-secondary';
                $button_disabled = 'aria-disabled="true"';
            }
        }
    } catch (Exception $e) {
        // En caso de error, los valores se mantienen vacíos
    }
}

$image_src = has_post_thumbnail($event_id) ? get_the_post_thumbnail_url($event_id) : ($flyer_event ?: $default_event_image);
?>

<div class="card event-card h-100 border-0 rounded-0 w-100">
    <div class="position-relative">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo esc_url($image_src); ?>" class="card-img-top rounded-0" alt="<?php the_title_attribute(); ?>" />
        </a>
        <div class="event-date position-absolute top-0 start-0 p-2 text-center">
            <span class="d-block"><?php echo esc_html($month); ?></span>
            <span class="d-block"><?php echo esc_html($day); ?></span>
        </div>
    </div>
    <div class="card-body rounded-0 d-flex flex-column justify-content-between">
        <a href="<?php the_permalink(); ?>" class="text-decoration-none">
            <h5 class="card-title text-center"><?php echo nl2br(get_the_title()); ?></h5>
        </a>
        <div class="mt-auto">
            <a href="<?php the_permalink(); ?>" class="btn btn-sm <?php echo esc_attr($button_class); ?> w-100 fw-bold" style="text-transform: uppercase;" <?php echo $button_disabled; ?>>
                <?php echo esc_html($button_text); ?>
            </a>
        </div>
    </div>
</div>