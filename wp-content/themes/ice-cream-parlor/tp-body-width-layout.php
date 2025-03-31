<?php

	$ice_cream_parlor_tp_theme_css = "";

$ice_cream_parlor_theme_lay = get_theme_mod( 'ice_cream_parlor_tp_body_layout_settings','Full');
if($ice_cream_parlor_theme_lay == 'Container'){
$ice_cream_parlor_tp_theme_css .='body{';
	$ice_cream_parlor_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
$ice_cream_parlor_tp_theme_css .='}';
$ice_cream_parlor_tp_theme_css .='@media screen and (max-width:575px){';
		$ice_cream_parlor_tp_theme_css .='body{';
			$ice_cream_parlor_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left: 0px';
		$ice_cream_parlor_tp_theme_css .='} }';
$ice_cream_parlor_tp_theme_css .='.page-template-front-page .menubar{';
	$ice_cream_parlor_tp_theme_css .='position: static;';
$ice_cream_parlor_tp_theme_css .='}';
$ice_cream_parlor_tp_theme_css .='.scrolled{';
	$ice_cream_parlor_tp_theme_css .='width: auto; left:0; right:0;';
$ice_cream_parlor_tp_theme_css .='}';
}else if($ice_cream_parlor_theme_lay == 'Container Fluid'){
$ice_cream_parlor_tp_theme_css .='body{';
	$ice_cream_parlor_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
$ice_cream_parlor_tp_theme_css .='}';
$ice_cream_parlor_tp_theme_css .='@media screen and (max-width:575px){';
		$ice_cream_parlor_tp_theme_css .='body{';
			$ice_cream_parlor_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
		$ice_cream_parlor_tp_theme_css .='} }';
$ice_cream_parlor_tp_theme_css .='.page-template-front-page .menubar{';
	$ice_cream_parlor_tp_theme_css .='width: 99%';
$ice_cream_parlor_tp_theme_css .='}';		
$ice_cream_parlor_tp_theme_css .='.scrolled{';
	$ice_cream_parlor_tp_theme_css .='width: auto; left:0; right:0;';
$ice_cream_parlor_tp_theme_css .='}';
}else if($ice_cream_parlor_theme_lay == 'Full'){
$ice_cream_parlor_tp_theme_css .='body{';
	$ice_cream_parlor_tp_theme_css .='max-width: 100%;';
$ice_cream_parlor_tp_theme_css .='}';
}

$ice_cream_parlor_scroll_position = get_theme_mod( 'ice_cream_parlor_scroll_top_position','Right');
if($ice_cream_parlor_scroll_position == 'Right'){
$ice_cream_parlor_tp_theme_css .='#return-to-top{';
    $ice_cream_parlor_tp_theme_css .='right: 20px;';
$ice_cream_parlor_tp_theme_css .='}';
}else if($ice_cream_parlor_scroll_position == 'Left'){
$ice_cream_parlor_tp_theme_css .='#return-to-top{';
    $ice_cream_parlor_tp_theme_css .='left: 20px;';
$ice_cream_parlor_tp_theme_css .='}';
}else if($ice_cream_parlor_scroll_position == 'Center'){
$ice_cream_parlor_tp_theme_css .='#return-to-top{';
    $ice_cream_parlor_tp_theme_css .='right: 50%;left: 50%;';
$ice_cream_parlor_tp_theme_css .='}';
}

    
//Social icon Font size
$ice_cream_parlor_social_icon_fontsize = get_theme_mod('ice_cream_parlor_social_icon_fontsize');
	$ice_cream_parlor_tp_theme_css .='.media-links a i{';
$ice_cream_parlor_tp_theme_css .='font-size: '.esc_attr($ice_cream_parlor_social_icon_fontsize).'px;';
$ice_cream_parlor_tp_theme_css .='}';

// site title font size option
$ice_cream_parlor_site_title_font_size = get_theme_mod('ice_cream_parlor_site_title_font_size', 30);{
$ice_cream_parlor_tp_theme_css .='.logo h1 , .logo p a{';
	$ice_cream_parlor_tp_theme_css .='font-size: '.esc_attr($ice_cream_parlor_site_title_font_size).'px;';
$ice_cream_parlor_tp_theme_css .='}';
}

//site tagline font size option
$ice_cream_parlor_site_tagline_font_size = get_theme_mod('ice_cream_parlor_site_tagline_font_size', 15);{
$ice_cream_parlor_tp_theme_css .='.logo p{';
	$ice_cream_parlor_tp_theme_css .='font-size: '.esc_attr($ice_cream_parlor_site_tagline_font_size).'px;';
$ice_cream_parlor_tp_theme_css .='}';
}

// related post
$ice_cream_parlor_related_post_mob = get_theme_mod('ice_cream_parlor_related_post_mob', true);
$ice_cream_parlor_related_post = get_theme_mod('ice_cream_parlor_remove_related_post', true);
$ice_cream_parlor_tp_theme_css .= '.related-post-block {';
if ($ice_cream_parlor_related_post == false) {
    $ice_cream_parlor_tp_theme_css .= 'display: none;';
}
$ice_cream_parlor_tp_theme_css .= '}';
$ice_cream_parlor_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($ice_cream_parlor_related_post == false || $ice_cream_parlor_related_post_mob == false) {
    $ice_cream_parlor_tp_theme_css .= '.related-post-block { display: none; }';
}
$ice_cream_parlor_tp_theme_css .= '}';

//return to header mobile				
$ice_cream_parlor_return_to_header_mob = get_theme_mod('ice_cream_parlor_return_to_header_mob', true);
$ice_cream_parlor_return_to_header = get_theme_mod('ice_cream_parlor_return_to_header', true);
$ice_cream_parlor_tp_theme_css .= '.return-to-header{';
if ($ice_cream_parlor_return_to_header == false) {
    $ice_cream_parlor_tp_theme_css .= 'display: none;';
}
$ice_cream_parlor_tp_theme_css .= '}';
$ice_cream_parlor_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($ice_cream_parlor_return_to_header == false || $ice_cream_parlor_return_to_header_mob == false) {
    $ice_cream_parlor_tp_theme_css .= '.return-to-header{ display: none; }';
}
$ice_cream_parlor_tp_theme_css .= '}';


//footer image
$ice_cream_parlor_footer_widget_image = get_theme_mod('ice_cream_parlor_footer_widget_image');
if($ice_cream_parlor_footer_widget_image != false){
$ice_cream_parlor_tp_theme_css .='#footer{';
	$ice_cream_parlor_tp_theme_css .='background: url('.esc_attr($ice_cream_parlor_footer_widget_image).');';
$ice_cream_parlor_tp_theme_css .='}';
}

// related product
$ice_cream_parlor_related_product = get_theme_mod('ice_cream_parlor_related_product',true);
if($ice_cream_parlor_related_product == false){
$ice_cream_parlor_tp_theme_css .='.related.products{';
	$ice_cream_parlor_tp_theme_css .='display: none;';
$ice_cream_parlor_tp_theme_css .='}';
}

//menu font size
$ice_cream_parlor_menu_font_size = get_theme_mod('ice_cream_parlor_menu_font_size', '');{
$ice_cream_parlor_tp_theme_css .='.main-navigation a, .main-navigation li.page_item_has_children:after,.main-navigation li.menu-item-has-children:after{';
	$ice_cream_parlor_tp_theme_css .='font-size: '.esc_attr($ice_cream_parlor_menu_font_size).'px;';
$ice_cream_parlor_tp_theme_css .='}';
}

// menu text tranform
$ice_cream_parlor_menu_text_tranform = get_theme_mod( 'ice_cream_parlor_menu_text_tranform','');
if($ice_cream_parlor_menu_text_tranform == 'Uppercase'){
$ice_cream_parlor_tp_theme_css .='.main-navigation a {';
	$ice_cream_parlor_tp_theme_css .='text-transform: uppercase;';
$ice_cream_parlor_tp_theme_css .='}';
}else if($ice_cream_parlor_menu_text_tranform == 'Lowercase'){
$ice_cream_parlor_tp_theme_css .='.main-navigation a {';
	$ice_cream_parlor_tp_theme_css .='text-transform: lowercase;';
$ice_cream_parlor_tp_theme_css .='}';
}
else if($ice_cream_parlor_menu_text_tranform == 'Capitalize'){
$ice_cream_parlor_tp_theme_css .='.main-navigation a {';
	$ice_cream_parlor_tp_theme_css .='text-transform: capitalize;';
$ice_cream_parlor_tp_theme_css .='}';
}

/*------------- Blog Page------------------*/
	$ice_cream_parlor_post_image_round = get_theme_mod('ice_cream_parlor_post_image_round', 0);
	if($ice_cream_parlor_post_image_round != false){
		$ice_cream_parlor_tp_theme_css .='.blog .box-image img{';
			$ice_cream_parlor_tp_theme_css .='border-radius: '.esc_attr($ice_cream_parlor_post_image_round).'px;';
		$ice_cream_parlor_tp_theme_css .='}';
	}

	$ice_cream_parlor_post_image_width = get_theme_mod('ice_cream_parlor_post_image_width', '');
	if($ice_cream_parlor_post_image_width != false){
		$ice_cream_parlor_tp_theme_css .='.blog .box-image img{';
			$ice_cream_parlor_tp_theme_css .='Width: '.esc_attr($ice_cream_parlor_post_image_width).'px;';
		$ice_cream_parlor_tp_theme_css .='}';
	}

	$ice_cream_parlor_post_image_length = get_theme_mod('ice_cream_parlor_post_image_length', '');
	if($ice_cream_parlor_post_image_length != false){
		$ice_cream_parlor_tp_theme_css .='.blog .box-image img{';
			$ice_cream_parlor_tp_theme_css .='height: '.esc_attr($ice_cream_parlor_post_image_length).'px;';
		$ice_cream_parlor_tp_theme_css .='}';
	}

// footer widget title font size
	$ice_cream_parlor_footer_widget_title_font_size = get_theme_mod('ice_cream_parlor_footer_widget_title_font_size', '');{
	$ice_cream_parlor_tp_theme_css .='#footer h3{';
		$ice_cream_parlor_tp_theme_css .='font-size: '.esc_attr($ice_cream_parlor_footer_widget_title_font_size).'px;';
	$ice_cream_parlor_tp_theme_css .='}';
	}

	// Copyright text font size
	$ice_cream_parlor_footer_copyright_font_size = get_theme_mod('ice_cream_parlor_footer_copyright_font_size', '');{
	$ice_cream_parlor_tp_theme_css .='#footer .site-info p{';
		$ice_cream_parlor_tp_theme_css .='font-size: '.esc_attr($ice_cream_parlor_footer_copyright_font_size).'px;';
	$ice_cream_parlor_tp_theme_css .='}';
	}

	// copyright padding
	$ice_cream_parlor_footer_copyright_top_bottom_padding = get_theme_mod('ice_cream_parlor_footer_copyright_top_bottom_padding', '');
	if ($ice_cream_parlor_footer_copyright_top_bottom_padding !== '') { 
	    $ice_cream_parlor_tp_theme_css .= '.site-info {';
	    $ice_cream_parlor_tp_theme_css .= 'padding-top: ' . esc_attr($ice_cream_parlor_footer_copyright_top_bottom_padding) . 'px;';
	    $ice_cream_parlor_tp_theme_css .= 'padding-bottom: ' . esc_attr($ice_cream_parlor_footer_copyright_top_bottom_padding) . 'px;';
	    $ice_cream_parlor_tp_theme_css .= '}';
	}
	
	// copyright position
	$ice_cream_parlor_copyright_text_position = get_theme_mod( 'ice_cream_parlor_copyright_text_position','Center');
	if($ice_cream_parlor_copyright_text_position == 'Center'){
	$ice_cream_parlor_tp_theme_css .='#footer .site-info p{';
	$ice_cream_parlor_tp_theme_css .='text-align:center;';
	$ice_cream_parlor_tp_theme_css .='}';
	}else if($ice_cream_parlor_copyright_text_position == 'Left'){
	$ice_cream_parlor_tp_theme_css .='#footer .site-info p{';
	$ice_cream_parlor_tp_theme_css .='text-align:left;';
	$ice_cream_parlor_tp_theme_css .='}';
	}else if($ice_cream_parlor_copyright_text_position == 'Right'){
	$ice_cream_parlor_tp_theme_css .='#footer .site-info p{';
	$ice_cream_parlor_tp_theme_css .='text-align:right;';
	$ice_cream_parlor_tp_theme_css .='}';
}

// Header Image title font size
$ice_cream_parlor_header_image_title_font_size = get_theme_mod('ice_cream_parlor_header_image_title_font_size', '32');{
$ice_cream_parlor_tp_theme_css .='.box-text h2{';
    $ice_cream_parlor_tp_theme_css .='font-size: '.esc_attr($ice_cream_parlor_header_image_title_font_size).'px;';
$ice_cream_parlor_tp_theme_css .='}';
}