<?php

/**
 * Template part for the Newsletter section on the homepage.
 *
 * @package Del_Porto_Ristorante
 */

?>

<style>
    /*
    * # NEWSLETTER SECTION #
    * ----------------------------------------------------
    */
    .newsletter-section {
        .input-group {
            input {
                background-color: var(--bg-dark);
                border-color: var(--border-dark);
                color: var(--txt-light);

                &:focus {
                    background-color: var(--bg-dark);
                    border-color: var(--golden-color);
                    box-shadow: 0 0 0 0.25rem rgba(var(--golden-color-rgb), 0.25);
                    color: var(--txt-light);
                }

                &::placeholder {
                    color: var(--txt-muted);
                }
            }

            .btn {
                font-weight: bold;
            }
        }
    }

    .wpcf7 form.sent .wpcf7-response-output {
        border-color: #fff !important;
    }

    .wpcf7-response-output {
        color: #fff !important;
    }

    body {
        color: #fff !important;

    }
</style>

<section class="newsletter-section py-5 bg-dark animate__animated animate__fadeInUp">
    <div class="container text-center">
        <h2 class="mb-4 text-light animate__animated animate__fadeInUp">Subscribe to Our Newsletter</h2>
        <p class="text-light animate__animated animate__fadeInUp animate__delay-0-3s">Stay updated on our special events, exclusive offers, and news.</p>
        <div class="d-flex justify-content-center mt-4 animate__animated animate__fadeInUp animate__delay-0-5s">
            <div style="max-width: 500px;">
                <?php echo do_shortcode('[contact-form-7 id="05715c4" title="Newsletter"]'); ?>
            </div>
        </div>
    </div>
</section>