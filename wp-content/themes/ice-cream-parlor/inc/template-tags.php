<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Ice Cream Parlor
 * @subpackage ice_cream_parlor
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function ice_cream_parlor_categorized_blog() {
	$ice_cream_parlor_category_count = get_transient( 'ice_cream_parlor_categories' );

	if ( false === $ice_cream_parlor_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$ice_cream_parlor_category_count = ice_cream_parlor_count( $categories );

		set_transient( 'ice_cream_parlor_categories', $ice_cream_parlor_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $ice_cream_parlor_category_count > 1;
}

if ( ! function_exists( 'the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since ice_cream_parlor
 */
function the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in ice_cream_parlor_categorized_blog.
 */
function ice_cream_parlor_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'ice_cream_parlor_categories' );
}
add_action( 'edit_category', 'ice_cream_parlor_category_transient_flusher' );
add_action( 'save_post',     'ice_cream_parlor_category_transient_flusher' );