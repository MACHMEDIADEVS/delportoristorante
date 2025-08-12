<?php

/**
 * Template part for the floating navigation menu.
 *
 * @package Del_Porto_Ristorante
 */

if (has_nav_menu('navigation-menu')) :
?>
    <nav id="floating-app-menu" class="floating-app-menu fixed-bottom p-3">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'navigation-menu',
            'container'      => false,
            'menu_class'     => 'nav nav-pills justify-content-around',
            'depth'          => 1,
            'walker'         => new WP_Bootstrap_Navwalker(),
        ));
        ?>
    </nav>
<?php endif; ?>