<?php

/**
 * Del Porto Ristorante functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Del_Porto_Ristorante
 */

// Define la constante de la versión del theme.
if (! defined('_S_VERSION')) {
	define('_S_VERSION', '1.0.0');
}

// Carga los archivos modulares de la carpeta /inc
// Separamos la lógica para tener un código más limpio y mantenible.
$inc_path = get_template_directory() . '/inc/';

// Funciones principales del theme, setup, y registro de funcionalidades de WordPress.
require_once $inc_path . 'theme-setup.php';

// Manejo de la carga de scripts y estilos del theme.
require_once $inc_path . 'enqueue.php';

// Funciones de plantilla personalizadas, como las etiquetas de publicación.
require_once $inc_path . 'template-tags.php';

// Archivo para registrar los 5 menús de navegación.
require_once $inc_path . 'custom-nav-menus.php';

// Archivo para el navwalker de Bootstrap 5.
require_once $inc_path . 'bootstrap-navwalker.php';


function restrict_file_uploads($mime_types)
{
	// Desactivar los tipos de archivos predeterminados
	$mime_types = array();

	// Permitir solamente los tipos de archivo especificados
	$mime_types['webp'] = 'image/webp';
	$mime_types['webm'] = 'video/webm';

	return $mime_types;
}
add_filter('upload_mimes', 'restrict_file_uploads');
