<?php
/**
 * Template part for displaying the Services section on the homepage.
 *
 * @package Del_Porto_Ristorante
 */
$services = get_field('main_services');
$default_image_url = get_template_directory_uri() . '/assets/images/delportoristorante.webp';
?>


<section id="services-section-desktop" class="animate__animated animate__fadeInUp">
    <?php
    if ($services) :
        foreach ($services as $index => $service) :
            // El campo de la imagen se obtiene directamente del array del repetidor
            $image_background = ! empty($service['image_background_service']) ? $service['image_background_service'] : $default_image_url;
            $info_service = $service['info_service']; // Accede al campo grupo 'info_service'

            // Los demás campos se obtienen del grupo
            $title_service = ! empty($info_service['title_service']) ? $info_service['title_service'] : '';
            $link_cta = ! empty($info_service['link_cta']) ? $info_service['link_cta'] : esc_html__('Explore', 'del-porto-ristorante');
            $explore_link = ! empty($info_service['explore_link']) ? $info_service['explore_link'] : '#';
    ?>
            <div class="dpr-service-slide animate__animated animate__fadeInUp" style="animation-delay: <?php echo esc_attr($index * 0.2); ?>s; background-image: url('<?php echo esc_url($image_background); ?>');">
                <div class="dpr-flex-content">
                    <div class="dpr-flex-title">
                        <h5 class="title-service-home"><?php echo esc_html($title_service); ?></h5>
                    </div>
                    <div class="dpr-flex-about">
                        <a href="<?php echo esc_url($explore_link); ?>" class="btn btn-outline-light btn-lg text-uppercase">
                            <?php echo esc_html($link_cta); ?>
                        </a>
                    </div>
                </div>
            </div>
    <?php
        endforeach;
    endif;
    ?>
</section>

<section id="services-section-mobile" class="animate__animated animate__fadeInUp d-block d-md-none bg-dark">
    <?php
    if ($services) :
        foreach ($services as $index => $service) :
            // El campo de la imagen se obtiene directamente del array del repetidor
            $image_background = ! empty($service['image_background_service']) ? $service['image_background_service'] : $default_image_url;
            $info_service = $service['info_service']; // Accede al campo grupo 'info_service'

            // Los demás campos se obtienen del grupo
            $title_service = ! empty($info_service['title_service']) ? $info_service['title_service'] : '';
            $link_cta = ! empty($info_service['link_cta']) ? $info_service['link_cta'] : esc_html__('Explore', 'del-porto-ristorante');
            $explore_link = ! empty($info_service['explore_link']) ? $info_service['explore_link'] : '#';
    ?>
            <div class="dpr-accordion-item animate__animated animate__fadeInUp m-3" style="animation-delay: <?php echo esc_attr($index * 0.2); ?>s; background-image: url('<?php echo esc_url($image_background); ?>');">
                <div class="dpr-accordion-overlay"></div>
                <div class="dpr-accordion-header">
                    <h5><?php echo esc_html($title_service); ?></h5>
                </div>
                <div class="dpr-accordion-content">
                    <a href="<?php echo esc_url($explore_link); ?>" class="btn btn-outline-light text-uppercase">
                        <?php echo esc_html($link_cta); ?>
                    </a>
                </div>
            </div>
    <?php
        endforeach;
    endif;
    ?>
</section>