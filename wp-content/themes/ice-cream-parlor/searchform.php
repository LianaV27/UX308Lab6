<?php
/**
 * Template for displaying search forms in Ice Cream Parlor
 *
 * @package Ice Cream Parlor
 * @subpackage ice_cream_parlor
 */
?>

<?php $ice_cream_parlor_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">	
	<input type="search" id="<?php echo esc_attr( $ice_cream_parlor_unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'ice-cream-parlor' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button', 'ice-cream-parlor' ); ?></button>
</form>