<?php
/**
 * Template part for displaying the Menu Categories grid on the homepage.
 *
 * @package Del_Porto_Ristorante
 */

$section_title = get_field('sctn_menus_ttlh4');
$section_description = get_field('sctn_description_menu');
$button_text = get_field('txt_bttn_menu');
$button_link = get_field('url_button_menu');

$menus_query = new WP_Query(array(
    'post_type'      => 'menu',
    'posts_per_page' => 8,
    'post_status'    => 'publish',
    'meta_query'     => array(
        array(
            'key'     => 'homepage_carta',
            'value'   => 1,
            'compare' => '=',
            'type'    => 'NUMERIC'
        )
    ),
    'orderby'        => 'meta_value_num',
    'order'          => 'ASC', 
    'meta_key'       => 'order_frontpage',
));
?>

<section id="menu-categories-section" class="py-5 bg-darker animate__animated animate__fadeInUp">
    <div class="container py-1">
        <div class="text-center mb-5">
            <?php if ($section_title) : ?>
                <h4 class="text-center text-golden animate__animated animate__fadeInUp"><?php echo esc_html($section_title); ?></h4>
            <?php endif; ?>
            <?php if ($section_description) : ?>
                <p class="animate__animated animate__fadeInUp animate__delay-0-3s text-white"><?php echo esc_html($section_description); ?></p>
            <?php endif; ?>
            <?php if ($button_text && $button_link) : ?>
                <a href="<?php echo esc_url($button_link); ?>" class="btn btn-primary mt-3 animate__animated animate__fadeInUp animate__delay-0-5s"><?php echo esc_html($button_text); ?></a>
            <?php endif; ?>
        </div>

        <div class="row g-4 row-cols-1 row-cols-md-2 row-cols-lg-4 menu-grid-uniform">
            <?php
            if ($menus_query->have_posts()) :
                $index = 0;
                while ($menus_query->have_posts()) :
                    $menus_query->the_post();
                    $menu_id = get_the_ID();
                    $menu_data = array(
                        'id' => $menu_id,
                        'title' => get_the_title(),
                        'slug' => get_post_field('post_name', $menu_id),
                        'image_card' => get_field('image_card', $menu_id),
                    );
            ?>
                    <div class="col d-flex">
                        <?php get_template_part('template-parts/card', 'menu', [
                            'menu' => $menu_data,
                            'itemIndex' => $index,
                        ]); ?>
                    </div>
            <?php
                    $index++;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>
</section>