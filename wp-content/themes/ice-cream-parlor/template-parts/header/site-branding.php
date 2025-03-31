<?php
/*
* Display header
*/
?>

<div class="headerbox">
    <div class="header-main container">
        <div class="row mx-0">
            <div class="col-lg-4 col-md-4 align-self-center">
                <div class="social-media text-md-start text-center my-3 my-md-2">
                  <?php
                    $ice_cream_parlor_header_fb_new_tab = esc_attr(get_theme_mod('ice_cream_parlor_header_fb_new_tab', 'true'));
                    $ice_cream_parlor_header_twt_new_tab = esc_attr(get_theme_mod('ice_cream_parlor_header_twt_new_tab', 'true'));
                    $ice_cream_parlor_header_ins_new_tab = esc_attr(get_theme_mod('ice_cream_parlor_header_ins_new_tab', 'true'));
                    $ice_cream_parlor_header_pint_new_tab = esc_attr(get_theme_mod('ice_cream_parlor_header_pint_new_tab', 'true'));
                  ?>
                  <?php if (get_theme_mod('ice_cream_parlor_facebook_url') != '') : ?>
                    <a <?php if ($ice_cream_parlor_header_fb_new_tab != false) : ?>target="_blank" <?php endif; ?>href="<?php echo esc_url(get_theme_mod('ice_cream_parlor_facebook_url', '')); ?>"><i class="me-3 <?php echo esc_attr(get_theme_mod('ice_cream_parlor_facebook_icon', 'fab fa-facebook-f')); ?>"></i></a>
                  <?php endif; ?>
                  <?php if (get_theme_mod('ice_cream_parlor_twitter_url') != '') : ?>
                    <a <?php if ($ice_cream_parlor_header_twt_new_tab != false) : ?>target="_blank" <?php endif; ?>href="<?php echo esc_url(get_theme_mod('ice_cream_parlor_twitter_url', '')); ?>"><i class="me-3 <?php echo esc_attr(get_theme_mod('ice_cream_parlor_twitter_icon', 'fab fa-twitter')); ?>"></i></a>
                  <?php endif; ?>
                  <?php if (get_theme_mod('ice_cream_parlor_instagram_url') != '') : ?>
                    <a <?php if ($ice_cream_parlor_header_ins_new_tab != false) : ?>target="_blank" <?php endif; ?>href="<?php echo esc_url(get_theme_mod('ice_cream_parlor_instagram_url', '')); ?>"><i class="me-3 <?php echo esc_attr(get_theme_mod('ice_cream_parlor_instagram_icon', 'fab fa-instagram')); ?>"></i></a>
                  <?php endif; ?>
                  <?php if (get_theme_mod('ice_cream_parlor_pint_url') != '') : ?>
                    <a <?php if ($ice_cream_parlor_header_pint_new_tab != false) : ?>target="_blank" <?php endif; ?>href="<?php echo esc_url(get_theme_mod('ice_cream_parlor_pint_url', '')); ?>"><i class="<?php echo esc_attr(get_theme_mod('ice_cream_parlor_pinterest_icon', 'fab fa-pinterest')); ?>"></i></a>
                  <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 align-self-center">
                <div class="logo text-center">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php endif; ?>

                    <?php if (get_theme_mod('ice_cream_parlor_site_title', true)) : ?>
                        <?php if (is_front_page() && is_home()) : ?>
                            <h1 class="text-capitalize">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                            </h1>
                        <?php else : ?>
                            <p class="text-capitalize site-title">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a>
                            </p>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php
                    $ice_cream_parlor_description = get_bloginfo('description', 'display');
                    if ($ice_cream_parlor_description || is_customize_preview()) :
                        if (get_theme_mod('ice_cream_parlor_site_tagline', false)) :
                    ?>
                            <p class="site-description my-1 text-capitalize"><?php echo esc_html($ice_cream_parlor_description); ?></p>
                    <?php
                        endif;
                    endif;
                    ?>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 align-self-center text-md-end text-center my-md-2 my-3">
                <span class="search-bar text-md-end">
                    <button type="button" class="open-search"><i class="fas fa-search"></i></button>
                </span>
                <?php if (get_theme_mod('ice_cream_parlor_cart_icon', true) != '') : ?>
                    <?php if (class_exists('woocommerce')) : ?>
                        <span class="product-cart text-center position-relative">
                            <a href="<?php if (function_exists('wc_get_cart_url')) {
                                            echo esc_url(wc_get_cart_url());
                                        } ?>" title="<?php esc_attr_e('shopping cart', 'ice-cream-parlor'); ?>"><i class="fas fa-shopping-cart"></i></a>
                            <?php
                            $ice_cream_parlor_cart_count = WC()->cart->get_cart_contents_count();
                            if ($ice_cream_parlor_cart_count > 0) : ?>
                                <span class="cart-count"><?php echo esc_html($ice_cream_parlor_cart_count); ?></span>
                            <?php endif; ?>
                        </span>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="search-outer">
                <div class="inner_searchbox w-100 h-100">
                    <?php get_search_form(); ?>
                </div>
                <button type="button" class="search-close"><?php esc_html_e('CLOSE', 'ice-cream-parlor'); ?></button>
            </div> 
        </div>
    </div>
</div>
 <div class="clearfix"></div>
<div class="main-navhead">
    <div class="menubox text-center">
        <div class="container">
            <div class="menu-content">
                <?php get_template_part('template-parts/navigation/site-nav'); ?>
            </div>
        </div>
    </div>
</div>
