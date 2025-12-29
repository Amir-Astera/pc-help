<?php
/**
 * The front page template file
 *
 * @package Real Estate Hub
 * @subpackage real_estate_hub
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php do_action( 'real_estate_hub_before_slider' ); ?>

	<?php get_template_part( 'template-parts/home/slider' ); ?>
	<?php do_action( 'real_estate_hub_after_slider' ); ?>

	<?php get_template_part( 'template-parts/home/project' ); ?>
	<?php do_action( 'real_estate_hub_after_project' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'real_estate_hub_after_home_content' ); ?>
</main>

<?php get_footer();
