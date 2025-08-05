<?php

/**
 * Template part for displaying a menu card.
 *
 * @package Del_Porto_Ristorante
 */

$menu = $args['menu'] ?? null;
$item_index = $args['itemIndex'] ?? 0;
$default_menu_image = get_template_directory_uri() . '/assets/images/delportoristorante.webp';

if (!$menu) {
  return;
}

// Lógica para obtener la imagen:
// 1. Usar la imagen destacada del post.
// 2. Si no hay imagen destacada, usar el campo de ACF 'image_card'.
// 3. Si ninguno existe, usar la imagen por defecto.
$image_src = has_post_thumbnail($menu['id']) ? get_the_post_thumbnail_url($menu['id']) : ($menu['image_card'] ?: $default_menu_image);

?>

<a href="<?php echo esc_url(get_permalink($menu['id'])); ?>" class="card-menu animate__animated animate__fadeInUp" style="animation-delay: <?php echo esc_attr($item_index * 0.1); ?>s;">
  <img src="<?php echo esc_url($image_src); ?>" class="card-menu-img" alt="<?php echo esc_attr($menu['title']); ?>" />

  <div class="card-menu-overlay-visible">
    <h5 class="card-menu-title"><?php echo esc_html($menu['title']); ?></h5>
  </div>

  <div class="card-menu-overlay-hover">
    <h5 class="card-menu-title text-center btn-primary"><?php echo esc_html($menu['title']); ?></h5>
  </div>
</a>