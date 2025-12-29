<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Real Estate Hub
 * @subpackage real_estate_hub
 */

get_header(); ?>

<div class="container">
	<main id="tp_content" role="main">
		<div id="primary" class="content-area">
			<section class="error-404 not-found">
				<h1 class="page-title text-center pt-3"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'real-estate-hub' ); ?></h1>
				<div class="page-content text-center">
					<p class="py-3"><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'real-estate-hub' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</section>
		</div>
	</main>
</div>

<?php get_footer();