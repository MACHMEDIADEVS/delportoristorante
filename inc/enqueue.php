<?php

/**
 * Enqueue scripts and styles.
 *
 * @package Del_Porto_Ristorante
 */

if (! function_exists('del_porto_ristorante_scripts')) :
    /**
     * Enqueue scripts and styles.
     */
    function del_porto_ristorante_scripts()
    {
        // Enqueue Bootstrap CSS from CDN.
        wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array(), '5.3.3');

        // Enqueue the main stylesheet with a dynamic version number.
        wp_enqueue_style('del-porto-ristorante-main-style', get_template_directory_uri() . '/css/main.css', array('bootstrap-css'), filemtime(get_template_directory() . '/css/main.css'));

        // Enqueue responsive stylesheet for mobile and tablet with a dynamic version number.
        wp_enqueue_style('del-porto-ristorante-responsive-style', get_template_directory_uri() . '/css/responsive.css', array('bootstrap-css', 'del-porto-ristorante-main-style'), filemtime(get_template_directory() . '/css/responsive.css'));

        // Enqueue the main theme stylesheet (style.css) with a dynamic version number.
        wp_enqueue_style('del-porto-ristorante-style', get_stylesheet_uri(), array('del-porto-ristorante-responsive-style'), filemtime(get_template_directory() . '/style.css'));


        // Enqueue jQuery from CDN.
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.7.1.min.js', array(), '3.7.1', true);

        // Enqueue Bootstrap JS from CDN.
        wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), '5.3.3', true);

        // Enqueue custom JavaScript file with a dynamic version number.
        wp_enqueue_script('del-porto-ristorante-custom-js', get_template_directory_uri() . '/js/main.js', array('jquery', 'bootstrap-js'), filemtime(get_template_directory() . '/js/main.js'), true);


        // Enqueue Swiper styles and scripts
        wp_enqueue_style('swiper-css', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.0.5');
        wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array('jquery'), '11.0.5', true);
        wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1');
        wp_enqueue_style( 'bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css', array(), '1.11.3' );
        wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1');



        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
endif;
add_action('wp_enqueue_scripts', 'del_porto_ristorante_scripts');
