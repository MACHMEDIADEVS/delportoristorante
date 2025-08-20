<?php

/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package Del_Porto_Ristorante
 */

get_header();
?>

<style>
	/*
 * # 404 PAGE #
 * ----------------------------------------------------
 */
	.not-found-page {
		min-height: 80vh;
		/* Ensures the content is centered on a taller screen */

		.container {
			h1.display-1 {
				font-size: 8rem;
			}

			h2.display-4 {
				font-size: 3rem;
			}
		}
	}
</style>

<div id="primary" class="content-area">
	<main id="main" class="site-main not-found-page text-light d-flex align-items-center justify-content-center text-center">
		<div class="container py-5">
			<h1 class="display-1 fw-bold text-golden">404</h1>
			<h2 class="display-4 fw-bold">Page Not Found</h2>
			<p class="lead mt-3">The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
			<a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-primary btn-lg mt-4 text-uppercase">
				Go to Homepage
			</a>
		</div>
	</main>
</div>

<?php
get_footer();
