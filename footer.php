<?php

/**
 * The template for displaying the footer
 *
 * @package Del_Porto_Ristorante
 */
?>

<style>
	/*
	 * # FLOATING MENU #
	 * ----------------------------------------------------
	 */
	#floating-app-menu {
		position: fixed;
		bottom: 20px;
		left: 50%;
		transform: translateX(-50%);
		z-index: 150;
		background: rgba(25, 25, 25, 0.7);
		backdrop-filter: blur(12px);
		-webkit-backdrop-filter: blur(12px);
		border-radius: 0px;
		padding: 0.5rem;
		box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
		border: 1px solid rgba(255, 255, 255, 0.1);

		.nav-pills {
			.nav-item {
				.nav-link {
					color: var(--txt-light);
					text-transform: uppercase;
					font-weight: bold;
					transition: background-color 0.3s ease;
					padding: 0.5rem 1rem;
					border-radius: 0;
				}

				.nav-link:hover {
					background-color: var(--bg-dark);
					color: var(--golden-color);
				}

				&.current-menu-item>a {
					background-color: var(--gold);
					color: var(--bg-light-hover);
				}
			}
		}
	}

	footer {
		z-index: 10;
	}

	@media (max-width: 768px) {

		/* FOOTER */
		#floating-app-menu {
			width: 100vw;
			bottom: 0px;
			max-height: 8vh;
			border-radius: 0px;
			padding: 0.5rem;
			box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
			border: 1px solid rgba(255, 255, 255, 0.1);

			.nav-pills {
				gap: 0.2rem;
				justify-content: space-evenly;
			}

			ul {
				margin: 0px !important;

				li {
					font-size: 1rem !important;
					margin: 0px !important;

					a {
						font-size: 1rem !important;
						margin: 0px !important;
					}
				}
			}
		}
	}
</style>

<?php get_template_part('template-parts/navigation', 'floating'); ?>
<?php wp_footer(); ?>

<footer id="colophon" class="site-footer">
	<div class="footer-content-wrapper">
		<div class="row g-2 p-4">
			<!-- BRAND -->
			<div class="col-lg-3 footer-content-col">
				<div class="footer-grid">
					<div class="footer-block footer-contact-info">
						<?php if (function_exists('the_custom_logo')) {
							the_custom_logo();
						} ?>
					</div>
				</div>
			</div>
			<!-- INFO -->
			<div class="col-lg-9 footer-content-col">
				<div class="footer-grid">
					<div class="col-auto">
						<h5 class="widget-title text-light"><?php esc_html_e('Benvenuti alla Famiglia', 'del-porto-ristorante'); ?></h5>
						<p class="text-golden"><?php esc_html_e('An authentic Italian experience where every dish tells a story of tradition, flavor, and family.', 'del-porto-ristorante'); ?></p>

						<div class="social-and-copyright">
							<?php
							/* Menú Social Footer */
							if (has_nav_menu('social-footer-menu')) {
								wp_nav_menu(array(
									'theme_location' => 'social-footer-menu',
									'container'      => 'nav',
									'container_class' => 'footer-social-nav',
									'menu_class'     => 'footer-social-menu d-flex list-unstyled',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>',
									'walker'         => new WP_Bootstrap_Navwalker(),
								));
							}
							?>

						</div>
					</div>

					<div class="col-auto">
						<h5 class="widget-title text-light"><?php esc_html_e('Contact Us', 'del-porto-ristorante'); ?></h5>
						<p class="text-golden">
							<a href="mailto:delportorestaurant@gmail.com">delportorestaurant@gmail.com</a><br>
							<a href="tel:+19084098424">(908) 409-8424</a><br>
							91 Elizabeth Ave, Elizabeth, NJ 07206
						</p>
					</div>

					<div class="col-auto">
						<h5 class="widget-title text-light"><?php esc_html_e('Explore', 'del-porto-ristorante'); ?></h5>
						<?php
						/* Menú Footer */
						if (has_nav_menu('footer-menu')) {
							wp_nav_menu(array(
								'theme_location' => 'footer-menu',
								'container'      => 'ul',
								'menu_class'     => 'footer-links list-unstyled',
								'depth'          => 1,
								'walker'         => new WP_Bootstrap_Navwalker(),
							));
						}
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid bg-dark text-center py-2">
		<div class="container text-white developer-vbar">
			<p class="copyright-text">
				<?php esc_html_e('Powered by', 'del-porto-ristorante'); ?> <a href="https://machmedianyc.com" target="_blank" rel="noopener"><?php esc_html_e('MACHMEDIA', 'del-porto-ristorante'); ?></a> &copy; <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>.
			</p>
		</div>
	</div>

</footer>
</div>

<?php if (has_nav_menu('floating-menu')) : ?>
	<nav id="floating-app-menu" class="floating-app-menu fixed-bottom">
		<?php
		wp_nav_menu(array(
			'theme_location' => 'floating-menu',
			'container'      => false,
			'menu_class'     => 'nav nav-pills justify-content-around',
			'depth'          => 1,
			'walker'         => new WP_Bootstrap_Navwalker(),
		));
		?>
	</nav>
<?php endif;
wp_footer(); ?>
</body>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		const preloader = document.getElementById('page-preloader');
		if (!preloader) return;

		// Oculta el preloader después de 1.5 segundos
		setTimeout(function() {
			preloader.classList.add('preloader-hidden');
		}, 1500);

		// Muestra el preloader al hacer clic en enlaces internos
		const internalLinks = document.querySelectorAll('a[href^="<?php echo esc_url(home_url('/')); ?>"]:not([target="_blank"]):not([data-bs-toggle]):not([href^="#"])');

		internalLinks.forEach(link => {
			link.addEventListener('click', function(event) {
				const href = this.getAttribute('href');
				if (href && !href.startsWith('#')) {
					event.preventDefault();
					preloader.classList.remove('preloader-hidden');
					setTimeout(function() {
						window.location.href = href;
					}, 500);
				}
			});
		});

		// Asegura que el preloader desaparezca al navegar hacia atrás
		window.onpageshow = function(event) {
			if (event.persisted) {
				preloader.classList.add('preloader-hidden');
			}
		};
	});
</script>

</html>