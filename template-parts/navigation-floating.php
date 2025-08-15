<?php

/**
 * Template part for the floating navigation menu.
 *
 * @package Del_Porto_Ristorante
 */

if (has_nav_menu('navigation-menu')) :
?>
    <style>
        @media (max-width: 768px) {
            .floating-app-menu {
                .p-3 {
                    padding: 0.5rem !important;
                }
            }
        }
    </style>

    <nav id="floating-app-menu" class="floating-app-menu fixed-bottom padd-nav row">
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
    </nav>

<?php endif; ?>