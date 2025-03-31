<?php
/**
 * Template part for displaying services section
 *
 * @package Ice Cream Parlor
 * @subpackage ice_cream_parlor
 */
?>

<?php
$ice_cream_parlor_aboutus = get_theme_mod('ice_cream_parlor_our_products_show_hide_section', true);

if ($ice_cream_parlor_aboutus) : ?>
<section id="product-section" class="my-5">
    <div class="row">
        <?php if ($ice_cream_parlor_small_title = get_theme_mod('ice_cream_parlor_featured_section_small_title', '')) : ?>
            <p class="text-center mb-2 small-title"><?php echo esc_html($ice_cream_parlor_small_title); ?></p>
        <?php endif; ?>
        
        <?php if ($ice_cream_parlor_title_first = get_theme_mod('ice_cream_parlor_featured_section_tittle_first', '')) : ?>
            <h2 class="text-center mb-4 text-capitalize"><?php echo esc_html($ice_cream_parlor_title_first); ?></h2>
        <?php endif; ?>
        
        <div class="container">
            <?php if ($ice_cream_parlor_product_category_first = get_theme_mod('ice_cream_parlor_our_product_product_category_first', '')) : ?>
                <div class="product-main owl-carousel owl-theme">
                    <?php if (class_exists('woocommerce')) : ?>
                        <?php
                        if ($ice_cream_parlor_product_category_first && $ice_cream_parlor_product_category_first !== 'none') {
                            $ice_cream_parlor_args = array(
                                'post_type'      => 'product',
                                'posts_per_page' => 50,
                                'product_cat'    => sanitize_text_field($ice_cream_parlor_product_category_first),
                                'order'          => 'ASC'
                            );
                            $ice_cream_parlor_loop = new WP_Query($ice_cream_parlor_args);
                            if ($ice_cream_parlor_loop->have_posts()) : 
                        ?>
                            <?php 
                            $ice_cream_parlor_bg_colors = ['#ffe7e7', '#eaf6d9', '#e2e4fe', '#c0edf0'];
                            $ice_cream_parlor_i = 0;
                            while ($ice_cream_parlor_loop->have_posts()) : $ice_cream_parlor_loop->the_post(); 
                            ?>
                                <div class="item">
                                    <div class="product-box mb-4 mb-md-3" style="background-color: <?php echo esc_attr($ice_cream_parlor_bg_colors[$ice_cream_parlor_i % count($ice_cream_parlor_bg_colors)]); ?>;">
                                        <?php global $product; ?>
                                        <div class="product-content-box p-2">
                                            <div class="row prod-row">
                                                <div class="col-lg-8 col-md-7 align-self-center">
                                                    <h3 class="mb-2 text-capitalize"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                                    <div class="product-description mb-3">
                                                      <?php
                                                        $content = get_the_content();
                                                        $excerpt = wp_trim_words($content, 13);
                                                        echo apply_filters('the_content', $excerpt);
                                                      ?>
                                                    </div>
                                                    <p class="mb-2 product-price">
                                                        <span class="selling-price"><?php echo wp_kses_post($product->get_price_html()); ?></span>
                                                    </p>
                                                    <div class="shop-btn mt-3">
                                                        <a href="<?php the_permalink(); ?>" class="text-capitalize me-2 mb-3 probtn-btn1"><?php esc_html_e('Shop Now', 'ice-cream-parlor'); ?><i class="ms-2 fa-solid fa-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-4 col-md-5 align-self-center">
                                                    <div class="product-image">
                                                        <?php echo woocommerce_get_product_thumbnail(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php $ice_cream_parlor_i++; ?>
                            <?php endwhile; ?>
                        <?php 
                            endif; 
                            wp_reset_postdata();
                        } 
                        ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>
