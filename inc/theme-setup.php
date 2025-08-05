<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @package Del_Porto_Ristorante
 */

if ( ! function_exists( 'del_porto_ristorante_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 */
	function del_porto_ristorante_setup() {
		// Haz que el theme esté disponible para traducción.
		load_theme_textdomain( 'del-porto-ristorante', get_template_directory() . '/languages' );

		// Agrega enlaces predeterminados de feeds RSS a la cabecera.
		add_theme_support( 'automatic-feed-links' );

		// Permite a WordPress gestionar el título del documento.
		add_theme_support( 'title-tag' );

		// Habilita el soporte para miniaturas de post.
		add_theme_support( 'post-thumbnails' );

		// Habilita el soporte para HTML5.
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Agrega soporte para el logo personalizado.
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'del_porto_ristorante_setup' );

/**
 * Establece el ancho del contenido en píxeles.
 *
 * @global int $content_width
 */
function del_porto_ristorante_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'del_porto_ristorante_content_width', 1200 ); // Adaptado a nuestro diseño.
}
add_action( 'after_setup_theme', 'del_porto_ristorante_content_width', 0 );