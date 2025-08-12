<?php

/**
 * Template Name: Catering
 */
get_header();
?>

<style>
    /* --------------------------------------------------------------
   # Estilos para la Plantilla de Página "Catering"
   -------------------------------------------------------------- */

    /* --- INICIO: CÓDIGO DE ANIMACIÓN AÑADIDO --- */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* --- FIN: CÓDIGO DE ANIMACIÓN AÑADIDO --- */

    #page-catering-template {
        color: var(--txt-light);

        .row {
            min-height: calc(100vh - 6em);
            /* Altura completa menos el header */
        }

        .catering-content-col {
            background-color: var(--bg-light-hover);
            color: var(--txt-dark);
            padding: 5rem 4rem;
            display: flex;
            flex-direction: column;
            justify-content: center;

            /* --- INICIO: CÓDIGO DE ANIMACIÓN AÑADIDO --- */
            /* Aplicar animación a los elementos principales */
            .catering-intro,
            .catering-features,
            .catering-cta,
            .catering-closing {
                opacity: 0;
                /* Ocultos al inicio */
                animation: fadeInUp 0.8s ease-out forwards;
            }

            /* --- FIN: CÓDIGO DE ANIMACIÓN AÑADIDO --- */


            .catering-intro {
                margin-bottom: 2.5rem;
                animation-delay: 0.2s;
                /* Retraso escalonado */

                h1 {
                    font-size: 3rem;
                    font-weight: 700;
                    line-height: 1.2;
                    color: var(--txt-light);
                    margin-bottom: 1rem;
                }

                .motto {
                    font-family: 'Times New Roman', Times, serif;
                    /* O una fuente cursiva elegante */
                    font-style: italic;
                    font-size: 1.3rem;
                    color: var(--gold);
                    margin-bottom: 2rem;
                }

                .description {
                    color: var(--txt-dark);
                    line-height: 1.8;
                }
            }

            .catering-features {
                margin-bottom: 2.5rem;
                animation-delay: 0.4s;
                /* Retraso escalonado */

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
                    color: var(--bg-dark-secondary);
                    margin-bottom: 2rem;

                    strong {
                        color: var(--offcanvas-txt-secondary);
                    }
                }

                .notice-bar {
                    background-color: #111;
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
                background-color: #111;
                border: 1px solid var(--border-dark);
                padding: 2rem;
                text-align: center;
                animation-delay: 0.6s;
                /* Retraso escalonado */

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
                            color: var(--gold);
                        }
                    }
                }

                .cta-buttons .btn {
                    margin: 0.5rem;

                    /* --- INICIO: CÓDIGO DE ANIMACIÓN AÑADIDO (GLOSS) --- */
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

                    /* --- FIN: CÓDIGO DE ANIMACIÓN AÑADIDO (GLOSS) --- */
                }
            }

            .catering-closing {
                margin-top: 2.5rem;
                text-align: center;
                font-style: italic;
                color: var(--txt-muted);
                animation-delay: 0.8s;
                /* Retraso escalonado */
            }
        }

        .catering-image-col {
            background-image: url('<?php echo get_template_directory_uri() . '/assets/images/delportoristorante.webp'; ?>');
            background-size: cover;
            background-position: center;
            min-height: 500px;
        }

        @media (max-width: 991.98px) {
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

                <div class="catering-intro pt-5">
                    <h1 style="color: var(--gold);">Catering at Your Location<br><span style="font-weight: 600; color:var(--txt-dark)">Authentic Italian, Unmatched Service</span> </h1>
                    <p class="">Buon cibo. Buona compagnia. Bellissimo evento.</p>
                    <div class="description">
                        <p>Del Porto Italian Ristorante offers full-service catering that brings the heart of Italian cuisine directly to your celebration. Whether you're hosting a corporate gathering, private dinner, wedding, or holiday party, we provide freshly prepared Italian dishes, customizable menus, and professional service. Our team of trained servers and bartenders ensures your event is seamless and memorable.</p>
                        <p>Choose from a variety of antipasti, homemade pastas, entrees like Chicken Parmigiana and Braised Short Ribs, and classic desserts such as Tiramisu and Cannoli. We accommodate groups of all sizes, and offer half and full tray options to suit your guest count. Let us handle the food and service—so you can focus on enjoying your guests.</p>
                    </div>
                </div>

                <div class="catering-features">
                    <p class="tray-guide"><strong>Half Tray:</strong> Serves ~8 people | <strong>Full Tray:</strong> Serves ~16 people</p>
                    <div class="notice-bar">
                        <span>Free Delivery</span> |
                        <span>Call 2 Days in Advance</span> |
                        <span>Tax Not Included</span>
                    </div>
                </div>

                <div class="catering-cta">
                    <div class="contact-info">
                        <p><strong>Call Now to Place Your Order:</strong> <a href="tel:+19084098424">(908) 409-8424</a></p>
                        <p><strong>Email Us:</strong> <a href="mailto:delportorestaurant@gmail.com">delportorestaurant@gmail.com</a></p>
                    </div>
                    <div class="cta-buttons">
                        <a href="https://www.toasttab.com/invoice/lead?rx=19209e5d-b110-4f2c-a889-a719850ed967&ot=4bc47384-d489-457a-bdc5-6bc795792d08" class="btn btn-primary">INQUIRY NOW</a>
                        <a href="#-sample-menu.pdf" class="btn btn-outline-primary">Download Sample Menu</a>
                    </div>
                </div>

                <div class="catering-closing">
                    <p>At Del Porto, every catered event is a reflection of our passion for Italian food and hospitality. From intimate gatherings to large celebrations, let us create an unforgettable dining experience for you and your guests — wherever you are.</p>
                </div>

            </div>

            <div class="col-lg-5 d-none d-lg-block catering-image-col">
            </div>
        </div>
    </div>
</main>

<?php
get_footer();
?>

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