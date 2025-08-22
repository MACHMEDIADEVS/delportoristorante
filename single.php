<?php

/**
 * The template for displaying all single posts
 *
 * @package Del_Porto_Ristorante
 */

get_header(); ?>

<style>
	/*
	 * # SINGLE - BLOG #
	 * ----------------------------------------------------
	 */
	.single-blog-page {
		background-color: var(--bg-darker);

		.blog-hero {
			height: 40vh;
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

		.blog-content-col,
		.blog-aside-col {

			position: relative;
			z-index: 10;

			.entry-content p {
				font-size: 1.1rem;
				line-height: 1.8;
				color: var(--txt-light);
			}
		}

		.blog-aside-col {
			.widget-title {
				font-size: 1.2rem !important;
				font-weight: bold;
				text-transform: uppercase;
			}

			.widget-categories ul li a {
				color: var(--txt-light);
				text-decoration: none;
				transition: color 0.3s ease;

				&:hover {
					color: var(--golden-color);
				}
			}
		}
	}

	.single-blog-page .entry-content {

		/* This rule makes all images, videos, and figures responsive */
		img,
		figure,
		video,
		embed,
		iframe,
		object {
			max-width: 100%;
			height: auto;
		}

		/* Adjusts wide and full-width blocks from Gutenberg */
		.wp-block-cover,
		.wp-block-image.alignwide,
		.wp-block-image.alignfull {
			margin-left: -50px;
			margin-right: -50px;
			max-width: unset;
		}

		/* Ensures tables are responsive */
		table {
			max-width: 100%;
			overflow-x: auto;
		}
	}

	h1 {
		font-size: 2rem !important;
		padding: 1rem 0rem !important;
	}

	/* RESPONSIVE - IPHONE */
	@media (max-width: 768px) {
		h1 {
			font-size: 1.3rem !important;
			padding: 1rem 0rem !important;
		}

		.single-blog-page {

			.entry-content {


				h2 {
					font-size: 1.2rem !important;
				}

				h3,
				h4,
				h5,
				h6 {
					font-size: 1.1rem !important;
				}
			}
		}
	}
</style>

<div id="primary" class="content-area single-blog-page">
	<main id="main" class="site-main">
		<?php while (have_posts()) : the_post(); ?>

			<?php
			$featured_image_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
			$post_title = get_the_title();
			?>

			<section class="blog-hero position-relative d-flex align-items-center justify-content-center text-center text-light" style="background-image: url('<?php echo esc_url($featured_image_url); ?>');">
				<div class="hero-image-overlay"></div>
				<div class="container position-relative z-index-1">
				</div>
			</section>

			<div class="container py-5">
				<div class="row">
					<div class="col-lg-9 blog-content-col">

						<article id="post-<?php the_ID(); ?>" <?php post_class('bg-dark p-4 p-md-5'); ?>>

							<h1 class="text-uppercase fw-bold text-white"><?php echo esc_html($post_title); ?></h1>

							<header class="entry-header mb-4">
								<div class="entry-meta text-white">
									<span class="author-info"><?php esc_html_e('By', 'del-porto-ristorante'); ?> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="text-golden fw-bold"><?php the_author(); ?></a></span>
									<span class="separator text-muted mx-2">|</span>
									<span class="posted-on"><time class="entry-date published" datetime="<?php echo esc_attr(get_the_date('c')); ?>"><?php echo esc_html(get_the_date()); ?></time></span>
								</div>
							</header>

							<div class="entry-content text-light">
								<?php the_content(); ?>
							</div>
						</article>
					</div>

					<div class="col-lg-3 blog-aside-col">
						<aside id="secondary" class="widget-area">
							<div class="bg-dark p-4 widget widget-social">
								<h3 class="widget-title text-golden mb-3"><?php esc_html_e('Follow us:', 'del-porto-ristorante'); ?></h3>
								<div class="social-links-grid d-flex gap-3">
									<a href="https://www.facebook.com/delportoristorantenj" class="text-golden"><i class="bi bi-facebook fs-4"></i></a>
									<a href="https://www.instagram.com/delportoitalianristorante" class="text-golden"><i class="bi bi-instagram fs-4"></i></a>
									<a href="https://www.tiktok.com/@delportoristorante" class="text-golden"><i class="bi bi-tiktok fs-4"></i></a>
								</div>
							</div>

							<div class="bg-dark p-4 widget widget-categories mt-4">
								<h3 class="widget-title text-golden mb-3"><?php esc_html_e('Categories', 'del-porto-ristorante'); ?></h3>
								<ul class="list-unstyled">
									<?php wp_list_categories(['title_li' => '', 'style' => 'none', 'class' => 'list-unstyled']); ?>
								</ul>
							</div>

							<div class="bg-dark p-4 widget widget-recent-posts mt-4">
								<h3 class="widget-title text-golden mb-3"><?php esc_html_e('Articles', 'del-porto-ristorante'); ?></h3>
								<ul class="list-unstyled">
									<?php
									$recent_posts = new WP_Query([
										'posts_per_page' => 3,
										'post__not_in' => [get_the_ID()],
									]);
									if ($recent_posts->have_posts()) :
										while ($recent_posts->have_posts()) : $recent_posts->the_post();
									?>
											<li class="mb-3 pb-3 border-bottom border-secondary">
												<a href="<?php the_permalink(); ?>" class="text-white text-decoration-none d-block fw-bold"><?php the_title(); ?></a>
												<div class="mt-2 d-flex flex-wrap gap-2">
													<?php
													$categories = get_the_category();
													if (!empty($categories)) {
														foreach ($categories as $category) {
															$category_link = get_category_link($category->term_id);
															echo '<a href="' . esc_url($category_link) . '" class="btn btn-outline-light btn-sm rounded-0">' . esc_html($category->name) . '</a>';
														}
													}
													?>
												</div>
											</li>
									<?php
										endwhile;
										wp_reset_postdata();
									endif;
									?>
								</ul>
							</div>
						</aside>
					</div>
				</div>
			</div>

		<?php endwhile; ?>
	</main>
</div>

<?php get_footer(); ?>