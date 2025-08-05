<?php
/**
 * Register custom navigation menus.
 *
 * @package Del_Porto_Ristorante
 */

if ( ! function_exists( 'del_porto_ristorante_nav_menus' ) ) :
	/**
	 * Register the 5 custom navigation menus.
	 */
	function del_porto_ristorante_nav_menus() {
		register_nav_menus(
			array(
				'main-menu'         => esc_html__( 'Main Menu', 'del-porto-ristorante' ),
				'navigation-menu'   => esc_html__( 'Navigation Menu', 'del-porto-ristorante' ),
				'legal-menu'        => esc_html__( 'Legal Menu', 'del-porto-ristorante' ),
				'footer-menu'     => esc_html__( 'Footer Menu 1', 'del-porto-ristorante' ),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'del_porto_ristorante_nav_menus' );