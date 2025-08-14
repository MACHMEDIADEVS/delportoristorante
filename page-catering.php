<?php

/**
 * Template Name: Catering
 *
 * @package Del_Porto_Ristorante
 */

get_header();

// Obtener los campos de ACF
$info_catering = get_field('info-catering');
$title_page_h1 = $info_catering['title_page_h1'] ?? '';
$subtitle_text_h3 = $info_catering['subtitle_text_h3'] ?? '';
$editor_description_page = $info_catering['editor_description_page'] ?? '';
$cards_services = $info_catering['cards_services'] ?? [];

$info_contact_catering = get_field('info_contact_catering');
$email_dpr_link = $info_contact_catering['email_dpr_link'] ?? '';
$number_phone_dpr = $info_contact_catering['number_phone_dpr'] ?? '';
$buttons_catering_cta = $info_contact_catering['buttons_catering_cta'] ?? [];

$closing_text_catering = get_field('closing_text_catering');
$banner_lateral_url = get_field('banner_lateral');
?>

<style>
    /* --------------------------------------------------------------
   # Estilos para la Plantilla de Página "Catering"
   -------------------------------------------------------------- */

    #page-catering-template {
        color: var(--txt-light);

        .row {
            min-height: calc(100vh - 6em);
        }

        .catering-content-col {
            background-color: var(--bg-dark);
            color: var(--txt-light);
            padding: 5rem 4rem;
            display: flex;
            flex-direction: column;
            justify-content: center;

            &>div {
                opacity: 0;
                animation: fadeInUp 0.8s ease-out forwards;
            }

            .catering-intro {
                margin-bottom: 2.5rem;
                animation-delay: 0.2s;

                h1 {
                    font-size: 3rem;
                    font-weight: 700;
                    line-height: 1.2;
                    color: var(--golden-color);
                    margin-bottom: 1rem;
                }

                .motto {
                    font-size: 1.6rem;
                    margin-bottom: 2rem;
                }

                .description {
                    color: var(--txt-light);
                    line-height: 1.8;
                }
            }

            .catering-features {
                margin-bottom: 2.5rem;
                animation-delay: 0.4s;

                .menu-grid {
                    display: grid;
                    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
                    gap: 1rem;
                    margin-bottom: 2rem;

                    .grid-item {
                        border: 1px solid var(--border-dark);
                        padding: 1rem;
                        text-align: center;
                        font-weight: 500;
                    }
                }

                .tray-guide {
                    text-align: center;
                    color: var(--txt-muted);
                    margin-bottom: 2rem;

                    strong {
                        color: var(--txt-light);
                    }
                }

                .notice-bar {
                    background-color: var(--bg-darker);
                    border: 1px solid var(--border-dark);
                    color: var(--txt-light);
                    padding: 0.75rem;
                    display: flex;
                    justify-content: space-around;
                    text-align: center;
                    font-size: 0.8rem;

                    span {
                        padding: 0 0.5rem;
                    }
                }
            }

            .catering-cta {
                background-color: var(--bg-darker);
                border: 1px solid var(--border-dark);
                padding: 2rem;
                text-align: center;
                animation-delay: 0.6s;

                .contact-info {
                    margin-bottom: 1.5rem;
                    color: var(--txt-muted);

                    p {
                        margin-bottom: 0.5rem;
                    }

                    a {
                        color: var(--txt-light);
                        text-decoration: none;

                        &:hover {
                            color: var(--golden-color);
                        }
                    }
                }

                .cta-buttons .btn {
                    margin: 0.5rem;
                    position: relative;
                    overflow: hidden;

                    &::before {
                        content: '';
                        position: absolute;
                        left: var(--x);
                        top: var(--y);
                        transform: translate(-50%, -50%);
                        background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 80%);
                        width: 250px;
                        height: 250px;
                        opacity: 0;
                        transition: opacity 0.4s ease;
                    }

                    &:hover::before {
                        opacity: 1;
                    }
                }
            }

            .catering-closing {
                margin-top: 2.5rem;
                text-align: center;
                font-style: italic;
                color: var(--txt-muted);
                animation-delay: 0.8s;
            }
        }

        .catering-image-col {
            background-size: cover;
            background-position: center;
            min-height: 500px;
        }
    }

    .accordion {
        .accordion-item {
            border: 1px solid var(--border-dark);

            .accordion-header {
                .accordion-button {
                    background-color: var(--bg-darker);
                    color: var(--txt-light);
                    font-weight: bold;

                    &:not(.collapsed) {
                        color: var(--golden-color);
                        background-color: var(--bg-darker);
                    }

                    &:focus {
                        box-shadow: none;
                        border-color: var(--golden-color);
                    }
                }
            }

            .accordion-body {
                background-color: var(--bg-dark);
                color: var(--txt-light);
            }
        }
    }

    @media (max-width: 991.98px) {
        #page-catering-template {
            .catering-content-col {
                padding: 4rem 1.5rem;

                h1 {
                    font-size: 2.2rem;
                }
            }
        }
    }
</style>

<main id="primary" class="site-main">
    <div id="page-catering-template">
        <div class="row g-0">
            <div class="col-lg-7 catering-content-col">

                <div class="catering-intro pt-5 animate__animated animate__fadeInUp">
                    <?php if ($title_page_h1) : ?>
                        <h1 class="text-golden"><?php echo esc_html($title_page_h1); ?></h1>
                    <?php endif; ?>
                    <?php if ($subtitle_text_h3) : ?>
                        <h2 class="motto text-light"><?php echo esc_html($subtitle_text_h3); ?></h2>
                    <?php endif; ?>
                    <div class="description animate__animated animate__fadeInUp animate__delay-0-3s">
                        <?php echo $editor_description_page; ?>
                    </div>
                </div>

                <div class="catering-features animate__animated animate__fadeInUp animate__delay-0-5s">
                    <?php if ($cards_services) : ?>
                        <div class="menu-grid row g-3">
                            <?php foreach ($cards_services as $service) : ?>
                                <div class="col-lg-4">
                                    <div class="card bg-dark text-light border-golden h-100">
                                        <div class="card-body text-center">
                                            <h5 class="card-title text-golden"><?php echo esc_html($service['title_service']); ?></h5>
                                            <p class="card-text small"><?php echo esc_html($service['description_service']); ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <p class="tray-guide"><strong>Half Tray:</strong> Serves ~8 people | <strong>Full Tray:</strong> Serves ~16 people</p>
                    <div class="notice-bar">
                        <span>Free Delivery</span> |
                        <span>Call 2 Days in Advance</span> |
                        <span>Tax Not Included</span>
                    </div>
                </div>

                <div class="catering-cta animate__animated animate__fadeInUp animate__delay-0-7s">
                    <div class="contact-info">
                        <?php if ($number_phone_dpr) : ?>
                            <p><strong>Call Now to Place Your Order:</strong> <a href="tel:<?php echo esc_attr($number_phone_dpr); ?>"><?php echo esc_html($number_phone_dpr); ?></a></p>
                        <?php endif; ?>
                        <?php if ($email_dpr_link) : ?>
                            <p><strong>Email Us:</strong> <a href="mailto:<?php echo esc_attr($email_dpr_link); ?>"><?php echo esc_html($email_dpr_link); ?></a></p>
                        <?php endif; ?>
                    </div>
                    <div class="cta-buttons">
                        <?php foreach ($buttons_catering_cta as $button) : ?>
                            <a href="<?php echo esc_url($button['link_button']); ?>" class="btn btn-primary" data-text="<?php echo esc_attr($button['text_button']); ?>"><?php echo esc_html($button['text_button']); ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <?php if ($closing_text_catering) : ?>
                    <div class="catering-closing animate__animated animate__fadeInUp animate__delay-0-9s">
                        <p><?php echo esc_html($closing_text_catering); ?></p>
                    </div>
                <?php endif; ?>
            </div>

            <div class="col-lg-5 d-none d-lg-block catering-image-col" style="background-image: url('<?php echo esc_url($banner_lateral_url); ?>');">
            </div>
        </div>
    </div>

    <!-- FAQs -->
    <section class="faq-section mx-lg-5 py-5">
        <h2 class="text-golden text-center mb-4"><?php esc_html_e('FAQs', 'del-porto-ristorante'); ?></h2>
        <div class="accordion accordion-flush" id="faqAccordion">
            <?php
            if (have_rows('question')) :
                $index = 0;
                while (have_rows('question')) : the_row();
                    $question_text = get_sub_field('question_catering');
                    $answer_text = get_sub_field('answers_catering');
            ?>
                    <div class="accordion-item bg-darker text-light rounded-0 border-0 mb-2 animate__animated animate__fadeInUp" style="animation-delay: <?php echo esc_attr($index * 0.1); ?>s;">
                        <h3 class="accordion-header" id="heading-<?php echo esc_attr($index); ?>">
                            <button class="accordion-button collapsed bg-darker text-light fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo esc_attr($index); ?>" aria-expanded="false" aria-controls="collapse-<?php echo esc_attr($index); ?>">
                                <?php echo esc_html($question_text); ?>
                            </button>
                        </h3>
                        <div id="collapse-<?php echo esc_attr($index); ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?php echo esc_attr($index); ?>" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <?php echo esc_html($answer_text); ?>
                            </div>
                        </div>
                    </div>
            <?php
                    $index++;
                endwhile;
            endif;
            ?>
        </div>
    </section>

</main>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const buttons = document.querySelectorAll('.catering-cta .btn');

        buttons.forEach(button => {
            button.addEventListener('mousemove', function(e) {
                const rect = button.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                button.style.setProperty('--x', `${x}px`);
                button.style.setProperty('--y', `${y}px`);
            });
        });
    });
</script>

<?php
get_footer();
?>