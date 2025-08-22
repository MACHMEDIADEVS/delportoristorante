<?php

/**
 * Template Name: Legal
 *
 * @package Del_Porto_Ristorante
 */

get_header(); ?>

<style>
    /*
     * # LEGAL PAGE #
     * ----------------------------------------------------
     */
    .legal-page {
        background-color: var(--bg-darker);

        .legal-hero-section {
            height: 30vh;
            background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/legal-hero-background.webp');
            background-size: cover;
            background-position: center;
            position: relative;

            .hero-image-overlay {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
            }
        }

        .legal-content-col {
            margin-top: -60px;
            /* Superpone el contenido sobre el hero */
            position: relative;
            z-index: 10;
        }

        .legal-content {
            .entry-content {
                font-size: 1.1rem;
                line-height: 1.8;
                color: var(--txt-light);

                h2,
                h3,
                h4,
                h5,
                h6 {
                    color: var(--golden-color);
                    margin-top: 1.5rem;
                    margin-bottom: 1rem;
                }

                ul,
                ol {
                    margin-left: 1.5rem;
                }

                a {
                    color: var(--golden-color);
                    text-decoration: underline;

                    &:hover {
                        color: var(--txt-light);
                    }
                }
            }
        }
    }
</style>

<div id="primary" class="content-area legal-page">
    <main id="main" class="site-main">

        <?php if (has_post_thumbnail()) : ?>
            <section class="legal-hero-section position-relative d-flex align-items-center justify-content-center text-center text-light">
                <div class="hero-image-overlay"></div>
                <div class="container position-relative z-index-1">
                    <h1 class="display-3 text-uppercase fw-bold"><?php the_title(); ?></h1>
                </div>
            </section>
        <?php endif; ?>

        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-8 legal-content-col">
                    <?php while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class('legal-content bg-dark p-4 p-md-5'); ?>>
                            <div class="entry-content text-light">
                                <?php the_content(); ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>

    </main>
</div>

<?php get_footer();
