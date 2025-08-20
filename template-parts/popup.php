<div id="website-popup" class="website-popup">
    <div class="popup-content">
        <button class="popup-close-btn">&times;</button>
        <div class="popup-inner">
            <h2><?php the_title(); ?></h2>
            <div class="popup-body">
                <?php the_content(); ?>
            </div>
            <?php if (get_field('popup_button_url')) : ?>
                <a href="<?php echo esc_url(get_field('popup_button_url')); ?>" class="btn btn-primary popup-btn">
                    <?php echo esc_html(get_field('popup_button_text')); ?>
                </a>
            <?php endif; ?>
        </div>
    </div>
</div>