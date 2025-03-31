<?php

$ice_cream_parlor_tp_theme_css = '';

$ice_cream_parlor_tp_color_option = get_theme_mod('ice_cream_parlor_tp_color_option');

// 1st color
$ice_cream_parlor_tp_color_option = get_theme_mod('ice_cream_parlor_tp_color_option', '#F06B9A');
if ($ice_cream_parlor_tp_color_option) {
	$ice_cream_parlor_tp_theme_css .= ':root {';
	$ice_cream_parlor_tp_theme_css .= '--color-primary1: ' . esc_attr($ice_cream_parlor_tp_color_option) . ';';
	$ice_cream_parlor_tp_theme_css .= '}';
}

//preloader

$ice_cream_parlor_tp_preloader_color1_option = get_theme_mod('ice_cream_parlor_tp_preloader_color1_option');
$ice_cream_parlor_tp_preloader_color2_option = get_theme_mod('ice_cream_parlor_tp_preloader_color2_option');
$ice_cream_parlor_tp_preloader_bg_color_option = get_theme_mod('ice_cream_parlor_tp_preloader_bg_color_option');

if($ice_cream_parlor_tp_preloader_color1_option != false){
$ice_cream_parlor_tp_theme_css .='.center1{';
	$ice_cream_parlor_tp_theme_css .='border-color: '.esc_attr($ice_cream_parlor_tp_preloader_color1_option).' !important;';
$ice_cream_parlor_tp_theme_css .='}';
}
if($ice_cream_parlor_tp_preloader_color1_option != false){
$ice_cream_parlor_tp_theme_css .='.center1 .ring::before{';
	$ice_cream_parlor_tp_theme_css .='background: '.esc_attr($ice_cream_parlor_tp_preloader_color1_option).' !important;';
$ice_cream_parlor_tp_theme_css .='}';
}
if($ice_cream_parlor_tp_preloader_color2_option != false){
$ice_cream_parlor_tp_theme_css .='.center2{';
	$ice_cream_parlor_tp_theme_css .='border-color: '.esc_attr($ice_cream_parlor_tp_preloader_color2_option).' !important;';
$ice_cream_parlor_tp_theme_css .='}';
}
if($ice_cream_parlor_tp_preloader_color2_option != false){
$ice_cream_parlor_tp_theme_css .='.center2 .ring::before{';
	$ice_cream_parlor_tp_theme_css .='background: '.esc_attr($ice_cream_parlor_tp_preloader_color2_option).' !important;';
$ice_cream_parlor_tp_theme_css .='}';
}
if($ice_cream_parlor_tp_preloader_bg_color_option != false){
$ice_cream_parlor_tp_theme_css .='.loader{';
	$ice_cream_parlor_tp_theme_css .='background: '.esc_attr($ice_cream_parlor_tp_preloader_bg_color_option).';';
$ice_cream_parlor_tp_theme_css .='}';
}

// footer-bg-color
$ice_cream_parlor_tp_footer_bg_color_option = get_theme_mod('ice_cream_parlor_tp_footer_bg_color_option');

if($ice_cream_parlor_tp_footer_bg_color_option != false){
$ice_cream_parlor_tp_theme_css .='#footer{';
	$ice_cream_parlor_tp_theme_css .='background: '.esc_attr($ice_cream_parlor_tp_footer_bg_color_option).' !important;';
$ice_cream_parlor_tp_theme_css .='}';
}

// logo tagline color
$ice_cream_parlor_site_tagline_color = get_theme_mod('ice_cream_parlor_site_tagline_color');

if($ice_cream_parlor_site_tagline_color != false){
$ice_cream_parlor_tp_theme_css .='.logo h1 a, .logo p a{';
$ice_cream_parlor_tp_theme_css .='color: '.esc_attr($ice_cream_parlor_site_tagline_color).';';
$ice_cream_parlor_tp_theme_css .='}';
}

$ice_cream_parlor_logo_tagline_color = get_theme_mod('ice_cream_parlor_logo_tagline_color');
if($ice_cream_parlor_logo_tagline_color != false){
$ice_cream_parlor_tp_theme_css .='p.site-description{';
$ice_cream_parlor_tp_theme_css .='color: '.esc_attr($ice_cream_parlor_logo_tagline_color).';';
$ice_cream_parlor_tp_theme_css .='}';
}

// footer widget title color
$ice_cream_parlor_footer_widget_title_color = get_theme_mod('ice_cream_parlor_footer_widget_title_color');
if($ice_cream_parlor_footer_widget_title_color != false){
$ice_cream_parlor_tp_theme_css .='#footer h3{';
$ice_cream_parlor_tp_theme_css .='color: '.esc_attr($ice_cream_parlor_footer_widget_title_color).';';
$ice_cream_parlor_tp_theme_css .='}';
}

// copyright text color
$ice_cream_parlor_footer_copyright_text_color = get_theme_mod('ice_cream_parlor_footer_copyright_text_color');
if($ice_cream_parlor_footer_copyright_text_color != false){
$ice_cream_parlor_tp_theme_css .='#footer .site-info p, #footer .site-info a {';
$ice_cream_parlor_tp_theme_css .='color: '.esc_attr($ice_cream_parlor_footer_copyright_text_color).';';
$ice_cream_parlor_tp_theme_css .='}';
}

// header image title color
$ice_cream_parlor_header_image_title_text_color = get_theme_mod('ice_cream_parlor_header_image_title_text_color');
if($ice_cream_parlor_header_image_title_text_color != false){
$ice_cream_parlor_tp_theme_css .='.box-text h2{';
$ice_cream_parlor_tp_theme_css .='color: '.esc_attr($ice_cream_parlor_header_image_title_text_color).';';
$ice_cream_parlor_tp_theme_css .='}';
}

// menu color
$ice_cream_parlor_menu_color = get_theme_mod('ice_cream_parlor_menu_color');
if($ice_cream_parlor_menu_color != false){
$ice_cream_parlor_tp_theme_css .='.main-navigation a{';
$ice_cream_parlor_tp_theme_css .='color: '.esc_attr($ice_cream_parlor_menu_color).';';
$ice_cream_parlor_tp_theme_css .='}';
}