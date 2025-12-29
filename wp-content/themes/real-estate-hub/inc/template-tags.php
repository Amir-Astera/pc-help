<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Real Estate Hub
 * @subpackage real_estate_hub
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function real_estate_hub_categorized_blog() {
	$real_estate_hub_category_count = get_transient( 'real_estate_hub_categories' );

	if ( false === $real_estate_hub_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$real_estate_hub_categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$real_estate_hub_category_count = count( $real_estate_hub_categories );

		set_transient( 'real_estate_hub_categories', $real_estate_hub_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $real_estate_hub_category_count > 1;
}

if ( ! function_exists( 'real_estate_hub_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Real Estate Hub
 */
function real_estate_hub_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in real_estate_hub_categorized_blog.
 */
function real_estate_hub_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'real_estate_hub_categories' );
}
add_action( 'edit_category', 'real_estate_hub_category_transient_flusher' );
add_action( 'save_post',     'real_estate_hub_category_transient_flusher' );
