<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Del_Porto_Ristorante
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<?php
	// Define la imagen por defecto para Open Graph
	$default_og_image = get_template_directory_uri() . '/assets/images/default-og-image.webp';
	$og_image_url = '';

	// Lógica para obtener la imagen de Open Graph
	if (is_singular()) {
		// Si la página tiene una imagen destacada, la usamos
		if (has_post_thumbnail()) {
			$og_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
		}
	} else {
		// Para la página principal, usamos una imagen destacada si existe, o un campo de ACF
		$og_image_url = get_field('hero_background_image'); // Usar el campo de ACF de tu hero
		if (empty($og_image_url)) {
			$og_image_url = $default_og_image;
		}
	}

	// Si la URL sigue vacía, usamos la imagen por defecto
	if (empty($og_image_url)) {
		$og_image_url = $default_og_image;
	}

	// Obtener el título y la descripción
	$og_title = get_bloginfo('name');
	$og_description = get_bloginfo('description');

	if (is_singular()) {
		$og_title = get_the_title() . ' | ' . get_bloginfo('name');
		$og_description = get_the_excerpt() ? get_the_excerpt() : $og_description;
	}
	?>

	<meta property="og:title" content="<?php echo esc_attr($og_title); ?>" />
	<meta property="og:description" content="<?php echo esc_attr($og_description); ?>" />
	<meta property="og:image" content="<?php echo esc_url($og_image_url); ?>" />
	<meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>" />
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="<?php echo esc_attr(get_bloginfo('name')); ?>" />

	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:title" content="<?php echo esc_attr($og_title); ?>" />
	<meta name="twitter:description" content="<?php echo esc_attr($og_description); ?>" />
	<meta name="twitter:image" content="<?php echo esc_url($og_image_url); ?>" />
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'del-porto-ristorante'); ?></a>

		<header id="masthead" class="site-header sticky-top">
			<div class="container-fluid px-md-4">
				<div class="row align-items-center gx-2 gx-md-3">

					<div class="col-auto col-md-4">
						<div class="site-header-left-actions d-flex align-items-center gap-2">
							<button class="navbar-toggler site-header-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMainMenu" aria-controls="offcanvasMainMenu" aria-label="<?php esc_attr_e('Toggle navigation', 'del-porto-ristorante'); ?>">
								<span class="navbar-toggler-icon"></span>
								<span class="site-header-toggler-text ms-2 d-none d-md-inline text-light"><?php esc_html_e('Menu', 'del-porto-ristorante'); ?></span>
							</button>

							<?php
							$phone_number_display = get_theme_mod('del_porto_phone_number', '+1 908 409 8423');
							$phone_number_link    = preg_replace('/\s+/', '', $phone_number_display);
							?>
							<a href="tel:<?php echo esc_attr($phone_number_link); ?>" class="btn btn-sm btn-outline-primary d-md-none site-header-action-btn site-header-action-btn-phone-mobile text-white" aria-label="<?php esc_attr_e('Call us', 'del-porto-ristorante'); ?>">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
									<path fill-rule="evenodd" d="M1.885.511a1.745.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.28 1.465l-.413 1.033a.698.698 0 0 0 .157.826l1.285 1.286a.698.698 0 0 0 .826.157l1.033-.413a1.437.437 0 0 1 1.465.28l2.305 1.769a1.745.745 0 0 1 .163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
								</svg>
							</a>
						</div>
					</div>

					<div class="col text-center site-branding">
						<?php
						if (has_custom_logo()) {
							the_custom_logo();
						} else {
							if (is_front_page() && is_home()) :
						?>
								<h1 class="site-title mb-0"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
							<?php
							else :
							?>
								<p class="site-title mb-0"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
							<?php
							endif;
							$del_porto_ristorante_description = get_bloginfo('description', 'display');
							if ($del_porto_ristorante_description || is_customize_preview()) :
							?>
								<p class="site-description small mb-0"><?php echo esc_html($del_porto_ristorante_description); ?></p>
						<?php
							endif;
						}
						?>
					</div>

					<div class="col-auto col-md-4 text-end site-header-actions">
						<?php
						$phone_number_display = get_theme_mod('del_porto_phone_number', 'BOOK VENUE');
						$phone_number_link    = preg_replace('/\s+/', '', $phone_number_display);
						?>
						<a href="tel:<?php echo esc_attr($phone_number_link); ?>" class="btn btn-sm btn-outline-light d-none d-md-inline-block me-2 site-header-action-btn" aria-label="<?php printf(esc_attr__('Call us at %s', 'del-porto-ristorante'), esc_attr($phone_number_display)); ?>">
							<?php echo esc_html($phone_number_display); ?>
						</a>

						<a href="https://shop.machmedianj.com/" class="btn btn-sm btn-primary site-header-action-btn site-header-action-btn-primary">
							<?php esc_html_e('SHOP', 'del-porto-ristorante'); ?>
						</a>
					</div>
				</div>
			</div>
		</header>

		<div class="offcanvas offcanvas-start site-offcanvas-menu" tabindex="-1" id="offcanvasMainMenu" aria-labelledby="offcanvasMainMenuLabel">
			<div class="offcanvas-header">
				<h5 id="offcanvasMainMenuLabel" class="offcanvas-title mb-0"><?php bloginfo('name'); ?></h5>
				<button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="<?php esc_attr_e('Close menu', 'del-porto-ristorante'); ?>"></button>
			</div>
			<div class="offcanvas-body">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main-menu',
						'menu_id'        => 'main-menu-offcanvas',
						'menu_class'     => 'nav flex-column site-offcanvas-nav',
						'container'      => false,
						'depth'          => 2,
						'walker'         => new WP_Bootstrap_Navwalker(),
					)
				);
				?>
				<div class="offcanvas-footer mt-auto pt-3 border-top border-offcanvas-border">
					<p class="text-white small"><?php esc_html_e('Follow Us:', 'del-porto-ristorante'); ?></p>
					<div class="social-icons">
						<a href="#" class="text-offcanvas-txt-secondary me-2"><i class="bi bi-facebook fs-4"></i></a>
						<a href="#" class="text-offcanvas-txt-secondary me-2"><i class="bi bi-instagram fs-4"></i></a>
						<a href="#" class="text-offcanvas-txt-secondary me-2"><i class="bi bi-twitter fs-4"></i></a>
					</div>
				</div>
			</div>
		</div>

		<div id="content" class="site-content">