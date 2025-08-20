<?php

/**
 * The template for displaying the homepage.
 *
 * @package Del_Porto_Ristorante
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    while (have_posts()) :
        the_post();

        // Llama a la plantilla para el Hero
        get_template_part('template-parts/content', 'hero-home');

        // Llama a la plantilla para la sección de Historia
        get_template_part('template-parts/content', 'history');

        // Llama a la plantilla para la sección de Servicios
        get_template_part('template-parts/content', 'services');

        // Llama a la plantilla para la sección de Eventos
        get_template_part('template-parts/content', 'events');
        
        // Llama a la plantilla para el Happy Hour
        get_template_part('template-parts/content', 'happy-hour');

        // Llama a la plantilla para la sección del Menú
        get_template_part('template-parts/content', 'menu');

        // Llama a la plantilla para la sección de Reseñas
        get_template_part('template-parts/content', 'reviews');

        // Llama a la plantilla para el Sub-Hero
        get_template_part('template-parts/content', 'make-event');

        get_template_part('template-parts/content', 'blogs');

        // Llama a la plantilla para la sección de Horario de Operación
        get_template_part('template-parts/content', 'hours');

        // Llama a la plantilla para el Catering
        get_template_part('template-parts/content', 'catering');

        // Llama a la plantilla para la sección de Newsletter
        get_template_part('template-parts/content', 'newsletter');

    endwhile;
    ?>

</main><?php
        get_footer();
