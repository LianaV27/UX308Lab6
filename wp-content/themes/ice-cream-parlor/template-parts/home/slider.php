<?php
/**
 * Template part for displaying slider section
 *
 * @package Ice Cream Parlor
 * @subpackage ice_cream_parlor
 */

?>
<?php $ice_cream_parlor_static_image = get_stylesheet_directory_uri() . '/assets/images/header_img.png'; ?>

<?php if (get_theme_mod('ice_cream_parlor_slider_arrows', true)) : ?>
<section id="slider">
    <div id="owl-carousel" class="owl-carousel">
        <?php
        $ice_cream_parlor_slide_pages = array();
        for ($ice_cream_parlor_count = 1; $ice_cream_parlor_count <= 4; $ice_cream_parlor_count++) {
            $ice_cream_parlor_mod = intval(get_theme_mod('ice_cream_parlor_slider_page' . $ice_cream_parlor_count));
            if ('page-none-selected' !== $ice_cream_parlor_mod) {
                $ice_cream_parlor_slide_pages[] = $ice_cream_parlor_mod;
            }
        }
        if (!empty($ice_cream_parlor_slide_pages)) :
            $ice_cream_parlor_args = array(
                'post_type' => 'page',
                'post__in' => $ice_cream_parlor_slide_pages,
                'orderby' => 'post__in'
            );
            $ice_cream_parlor_query = new WP_Query($ice_cream_parlor_args);
            if ($ice_cream_parlor_query->have_posts()) :
                while ($ice_cream_parlor_query->have_posts()) : $ice_cream_parlor_query->the_post(); ?>
                    <div class="item">
                        <?php if (has_post_thumbnail()) { ?>
                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" />
                        <?php } else { ?>
                            <img src="<?php echo esc_url($ice_cream_parlor_static_image); ?>" alt="<?php esc_attr_e('Default Image', 'ice-cream-parlor'); ?>" />
                        <?php } ?>
                        <div class="carousel-caption">
                            <div class="inner_carousel">
                                <h1 class="custom-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                                <p class="mb-2"><?php echo esc_html(wp_trim_words(get_the_content(), 30)); ?></p>
                                <div class="more-btn mt-4">
                                    <a href="<?php the_permalink(); ?>" class="text-capitalize me-2 mb-3 slider-btn1"><?php esc_html_e('View Products', 'ice-cream-parlor'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            <?php else : ?>
                <div class="no-postfound"><?php esc_html_e('No posts found.', 'ice-cream-parlor'); ?></div>
            <?php endif;
        endif; ?>
    </div>
</section>
<?php endif; ?>
