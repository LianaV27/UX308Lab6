<?php
/**
 * Template Name: Custom Home Page
 *
 * @package Ice Cream Parlor
 * @subpackage ice_cream_parlor
 */

get_header(); ?>

<main id="tp_content" role="main">
	<div>
		<?php do_action('ice_cream_parlor_before_slider'); ?>
		<?php get_template_part('template-parts/home/slider'); ?>
		<?php do_action('ice_cream_parlor_after_slider'); ?>
	</div>
	<div>
		<?php get_template_part('template-parts/home/our-products'); ?>
		<?php do_action('ice_cream_parlor_after_our_products'); ?>
		<?php get_template_part('template-parts/home/home-content'); ?>
		<?php do_action('ice_cream_parlor_after_home_content'); ?>
	</div>
</main>

<?php get_footer(); ?>
