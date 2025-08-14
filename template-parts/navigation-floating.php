<?php

/**
 * Template part for the floating navigation menu.
 *
 * @package Del_Porto_Ristorante
 */

if (has_nav_menu('navigation-menu')) :
?>
    <nav id="floating-app-menu" class="floating-app-menu fixed-bottom p-3 row">
        <div class="col">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'navigation-menu',
                'container'      => false,
                'menu_class'     => 'nav nav-pills justify-content-around',
                'depth'          => 1,
                'walker'         => new WP_Bootstrap_Navwalker(),
            ));
            ?>
        </div>
        <div class="col-auto">
            <a href="tel:<?php echo esc_attr($phone_link); ?>" class="phone-icon-btn ms-auto">
                <i class="bi bi-telephone-fill"></i>
            </a>
        </div>
    </nav>

<?php endif; ?>