<?php
/**
 * Template for displaying search forms in Real Estate Hub
 *
 * @package Real Estate Hub
 * @subpackage real_estate_hub
 */

?>

<?php $real_estate_hub_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<div class="Search-bg">
	<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" id="<?php echo esc_attr( $real_estate_hub_unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'real-estate-hub' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><i class="fas fa-search"></i></button>
</form>
</div>
