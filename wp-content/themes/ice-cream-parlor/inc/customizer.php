<?php
/**
 * Ice Cream Parlor: Customizer
 *
 * @package Ice Cream Parlor
 * @subpackage ice_cream_parlor
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function Ice_Cream_Parlor_Customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
	$wp_customize->register_control_type( 'Ice_Cream_Parlor_Toggle_Control' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'Ice_Cream_Parlor_Control_Sortable' );	

	//add home page setting pannel
	$wp_customize->add_panel( 'ice_cream_parlor_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'ice-cream-parlor' ),
	    'description' => __( 'Description of what this panel does.', 'ice-cream-parlor' ),
	) );

	//TP Genral Option
	$wp_customize->add_section('ice_cream_parlor_tp_general_settings',array(
        'title' => __('TP General Option', 'ice-cream-parlor'),
        'priority' => 1,
        'panel' => 'ice_cream_parlor_panel_id'
    ) );
 	$wp_customize->add_setting('ice_cream_parlor_tp_body_layout_settings',array(
		'default' => 'Full',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_choices'
	));

 	$wp_customize->add_control('ice_cream_parlor_tp_body_layout_settings',array(
		'type' => 'radio',
		'label'     => __('Body Layout Setting', 'ice-cream-parlor'),
		'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'ice-cream-parlor'),
		'section' => 'ice_cream_parlor_tp_general_settings',
		'choices' => array(
		'Full' => __('Full','ice-cream-parlor'),
		'Container' => __('Container','ice-cream-parlor'),
		'Container Fluid' => __('Container Fluid','ice-cream-parlor')
		),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('ice_cream_parlor_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'ice_cream_parlor_sanitize_choices'
	));
	$wp_customize->add_control('ice_cream_parlor_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Post Sidebar Position', 'ice-cream-parlor'),
     'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'ice-cream-parlor'),
     'section' => 'ice_cream_parlor_tp_general_settings',
     'choices' => array(
         'full' => __('Full','ice-cream-parlor'),
         'left' => __('Left','ice-cream-parlor'),
         'right' => __('Right','ice-cream-parlor'),
         'three-column' => __('Three Columns','ice-cream-parlor'),
         'four-column' => __('Four Columns','ice-cream-parlor'),
         'grid' => __('Grid Layout','ice-cream-parlor')
     ),
	) );

	// Add Settings and Controls for single post sidebar Layout
	$wp_customize->add_setting('ice_cream_parlor_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'ice_cream_parlor_sanitize_choices'
	));
	$wp_customize->add_control('ice_cream_parlor_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'ice-cream-parlor'),
        'description'   => __('This option work for single blog page', 'ice-cream-parlor'),
        'section' => 'ice_cream_parlor_tp_general_settings',
        'choices' => array(
            'full' => __('Full','ice-cream-parlor'),
            'left' => __('Left','ice-cream-parlor'),
            'right' => __('Right','ice-cream-parlor'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('ice_cream_parlor_sidebar_page_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'ice_cream_parlor_sanitize_choices'
	));
	$wp_customize->add_control('ice_cream_parlor_sidebar_page_layout',array(
     'type' => 'radio',
     'label'     => __('Page Sidebar Position', 'ice-cream-parlor'),
     'description'   => __('This option work for pages.', 'ice-cream-parlor'),
     'section' => 'ice_cream_parlor_tp_general_settings',
     'choices' => array(
         'full' => __('Full','ice-cream-parlor'),
         'left' => __('Left','ice-cream-parlor'),
         'right' => __('Right','ice-cream-parlor')
     ),
	) );
	//tp typography option
	$ice_cream_parlor_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	$wp_customize->add_section('ice_cream_parlor_typography_option',array(
		'title'         => __('TP Typography Option', 'ice-cream-parlor'),
		'priority' => 1,
		'panel' => 'ice_cream_parlor_panel_id'
   	));

   	$wp_customize->add_setting('ice_cream_parlor_heading_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_choices',
	));
	$wp_customize->add_control(	'ice_cream_parlor_heading_font_family', array(
		'section' => 'ice_cream_parlor_typography_option',
		'label'   => __('heading Fonts', 'ice-cream-parlor'),
		'type'    => 'select',
		'choices' => $ice_cream_parlor_font_array,
	));

	$wp_customize->add_setting('ice_cream_parlor_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_choices',
	));
	$wp_customize->add_control(	'ice_cream_parlor_body_font_family', array(
		'section' => 'ice_cream_parlor_typography_option',
		'label'   => __('Body Fonts', 'ice-cream-parlor'),
		'type'    => 'select',
		'choices' => $ice_cream_parlor_font_array,
	));

	//TP Color Option
	$wp_customize->add_section('ice_cream_parlor_color_option',array(
     'title'         => __('TP Color Option', 'ice-cream-parlor'),
     'priority' => 1,
     'panel' => 'ice_cream_parlor_panel_id'
    ) );
    
	$wp_customize->add_setting( 'ice_cream_parlor_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_parlor_tp_color_option', array(
			'label'     => __('Theme First Color', 'ice-cream-parlor'),
	    'description' => __('It will change the complete theme color in one click.', 'ice-cream-parlor'),
	    'section' => 'ice_cream_parlor_color_option',
	    'settings' => 'ice_cream_parlor_tp_color_option',
  	)));

	//TP Preloader Option
	$wp_customize->add_section('ice_cream_parlor_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'ice-cream-parlor'),
		'priority' => 1,
		'panel' => 'ice_cream_parlor_panel_id'
	) );
	$wp_customize->add_setting( 'ice_cream_parlor_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'ice-cream-parlor' ),
		'section'     => 'ice_cream_parlor_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_preloader_show_hide',
	) ) );
	$wp_customize->add_setting( 'ice_cream_parlor_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_parlor_tp_preloader_color1_option', array(
			'label'     => __('Preloader First Ring Color', 'ice-cream-parlor'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'ice-cream-parlor'),
	    'section' => 'ice_cream_parlor_prelaoder_option',
	    'settings' => 'ice_cream_parlor_tp_preloader_color1_option',
  	)));
  	$wp_customize->add_setting( 'ice_cream_parlor_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_parlor_tp_preloader_color2_option', array(
			'label'     => __('Preloader Second Ring Color', 'ice-cream-parlor'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'ice-cream-parlor'),
	    'section' => 'ice_cream_parlor_prelaoder_option',
	    'settings' => 'ice_cream_parlor_tp_preloader_color2_option',
  	)));
  	$wp_customize->add_setting( 'ice_cream_parlor_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_parlor_tp_preloader_bg_color_option', array(
			'label'     => __('Preloader Background Color', 'ice-cream-parlor'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'ice-cream-parlor'),
	    'section' => 'ice_cream_parlor_prelaoder_option',
	    'settings' => 'ice_cream_parlor_tp_preloader_bg_color_option',
  	)));

	//TP Blog Option
	$wp_customize->add_section('ice_cream_parlor_blog_option',array(
		'title' => __('TP Blog Option', 'ice-cream-parlor'),
		'priority' => 1,
		'panel' => 'ice_cream_parlor_panel_id'
	) );

	$wp_customize->add_setting('ice_cream_parlor_edit_blog_page_title',array(
		'default'=> 'Home',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ice_cream_parlor_edit_blog_page_title',array(
		'label'	=> __('Change Blog Page Title','ice-cream-parlor'),
		'section'=> 'ice_cream_parlor_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment', 'category'),
        'sanitize_callback' => 'ice_cream_parlor_sanitize_sortable',
    ));
    $wp_customize->add_control(new Ice_Cream_Parlor_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'ice-cream-parlor'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'ice-cream-parlor') ,
        'section' => 'ice_cream_parlor_blog_option',
        'choices' => array(
            'date' => __('date', 'ice-cream-parlor') ,
            'author' => __('author', 'ice-cream-parlor') ,
            'comment' => __('comment', 'ice-cream-parlor') ,
            'category' => __('category', 'ice-cream-parlor') ,
        ) ,
    )));

    $wp_customize->add_setting( 'ice_cream_parlor_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'ice_cream_parlor_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'ice_cream_parlor_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','ice-cream-parlor' ),
		'section'     => 'ice_cream_parlor_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	 $wp_customize->add_setting('ice_cream_parlor_post_image_round', array(
	  'default' => '0',
      'sanitize_callback' => 'ice_cream_parlor_sanitize_number_range',
	));
	$wp_customize->add_control(new ice_cream_parlor_Range_Slider($wp_customize, 'ice_cream_parlor_post_image_round', array(
       'section' => 'ice_cream_parlor_blog_option',
      'label' => esc_html__('Edit Post Image Border Radius', 'ice-cream-parlor'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 180,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('ice_cream_parlor_post_image_width', array(
	  'default' => '',
      'sanitize_callback' => 'ice_cream_parlor_sanitize_number_range',
	));
	$wp_customize->add_control(new ice_cream_parlor_Range_Slider($wp_customize, 'ice_cream_parlor_post_image_width', array(
       'section' => 'ice_cream_parlor_blog_option',
      'label' => esc_html__('Edit Post Image Width', 'ice-cream-parlor'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 367,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('ice_cream_parlor_post_image_length', array(
	  'default' => '',
      'sanitize_callback' => 'ice_cream_parlor_sanitize_number_range',
	));
	$wp_customize->add_control(new ice_cream_parlor_Range_Slider($wp_customize, 'ice_cream_parlor_post_image_length', array(
       'section' => 'ice_cream_parlor_blog_option',
      'label' => esc_html__('Edit Post Image height', 'ice-cream-parlor'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 900,
        'step' => 1
    )
	)));

	$wp_customize->add_setting('ice_cream_parlor_read_more_text',array(
		'default'=> __('Read More','ice-cream-parlor'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ice_cream_parlor_read_more_text',array(
		'label'	=> __('Edit Button Text','ice-cream-parlor'),
		'section'=> 'ice_cream_parlor_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'ice_cream_parlor_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'ice-cream-parlor' ),
		'section'     => 'ice_cream_parlor_blog_option',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_remove_read_button',
	) ) );

    $wp_customize->selective_refresh->add_partial( 'ice_cream_parlor_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'Ice_Cream_Parlor_Customize_partial_ice_cream_parlor_remove_read_button',
	 ));

	 $wp_customize->add_setting( 'ice_cream_parlor_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'ice-cream-parlor' ),
		'section'     => 'ice_cream_parlor_blog_option',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_remove_tags',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'ice_cream_parlor_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'Ice_Cream_Parlor_Customize_partial_ice_cream_parlor_remove_tags',
	));
	$wp_customize->add_setting( 'ice_cream_parlor_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'ice-cream-parlor' ),
		'section'     => 'ice_cream_parlor_blog_option',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_remove_category',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'ice_cream_parlor_remove_category', array(
		'selector' => '.box-content a[rel="category"]',
		'render_callback' => 'Ice_Cream_Parlor_Customize_partial_ice_cream_parlor_remove_category',
	));
	$wp_customize->add_setting( 'ice_cream_parlor_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'ice-cream-parlor' ),
	 'section'     => 'ice_cream_parlor_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'ice_cream_parlor_remove_comment',
	) ) );

	$wp_customize->add_setting( 'ice_cream_parlor_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'ice-cream-parlor' ),
	 'section'     => 'ice_cream_parlor_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'ice_cream_parlor_remove_related_post',
	) ) );
	$wp_customize->add_setting( 'ice_cream_parlor_related_post_per_page', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'ice_cream_parlor_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'ice_cream_parlor_related_post_per_page', array(
		'label'       => esc_html__( 'Related Post Per Page','ice-cream-parlor' ),
		'section'     => 'ice_cream_parlor_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 3,
			'max'              => 9,
		),
	) );

	// Social Link
	$wp_customize->add_section( 'ice_cream_parlor_social_media', array(
    	'title'      => __( 'Social Media Links', 'ice-cream-parlor' ),
    	'description' => __( 'Add your Social Links', 'ice-cream-parlor' ),
		'panel' => 'ice_cream_parlor_panel_id',
      'priority' => 2,
	) );

	$wp_customize->add_setting( 'ice_cream_parlor_header_fb_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_header_fb_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'ice-cream-parlor' ),
		'section'     => 'ice_cream_parlor_social_media',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_header_fb_new_tab',
	) ) );

	$wp_customize->add_setting('ice_cream_parlor_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('ice_cream_parlor_facebook_url',array(
		'label'	=> __('Facebook Link','ice-cream-parlor'),
		'section'=> 'ice_cream_parlor_social_media',
		'type'=> 'url'
	));

	$wp_customize->selective_refresh->add_partial( 'ice_cream_parlor_facebook_url', array(
		'selector' => '.social-media',
		'render_callback' => 'Ice_Cream_Parlor_Customize_partial_ice_cream_parlor_facebook_url',
	) );

	$wp_customize->add_setting('ice_cream_parlor_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ice_Cream_Parlor_Icon_Changer(
        $wp_customize,'ice_cream_parlor_facebook_icon',array(
		'label'	=> __('Facebook Icon','ice-cream-parlor'),
		'transport' => 'refresh',
		'section'	=> 'ice_cream_parlor_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'ice_cream_parlor_header_twt_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );

	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_header_twt_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'ice-cream-parlor' ),
		'section'     => 'ice_cream_parlor_social_media',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_header_twt_new_tab',
	) ) );
	$wp_customize->add_setting('ice_cream_parlor_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('ice_cream_parlor_twitter_url',array(
		'label'	=> __('Twitter Link','ice-cream-parlor'),
		'section'=> 'ice_cream_parlor_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('ice_cream_parlor_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ice_Cream_Parlor_Icon_Changer(
        $wp_customize,'ice_cream_parlor_twitter_icon',array(
		'label'	=> __('Twitter Icon','ice-cream-parlor'),
		'transport' => 'refresh',
		'section'	=> 'ice_cream_parlor_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'ice_cream_parlor_header_ins_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_header_ins_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'ice-cream-parlor' ),
		'section'     => 'ice_cream_parlor_social_media',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_header_ins_new_tab',
	) ) );

	$wp_customize->add_setting('ice_cream_parlor_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('ice_cream_parlor_instagram_url',array(
		'label'	=> __('Instagram Link','ice-cream-parlor'),
		'section'=> 'ice_cream_parlor_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('ice_cream_parlor_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ice_Cream_Parlor_Icon_Changer(
        $wp_customize,'ice_cream_parlor_instagram_icon',array(
		'label'	=> __('Instagram Icon','ice-cream-parlor'),
		'transport' => 'refresh',
		'section'	=> 'ice_cream_parlor_social_media',
		'type'		=> 'icon'
	)));
	
	$wp_customize->add_setting( 'ice_cream_parlor_header_pint_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_header_pint_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'ice-cream-parlor' ),
		'section'     => 'ice_cream_parlor_social_media',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_header_pint_new_tab',
	) ) );

	$wp_customize->add_setting('ice_cream_parlor_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('ice_cream_parlor_pint_url',array(
		'label'	=> __('Pinterest Link','ice-cream-parlor'),
		'section'=> 'ice_cream_parlor_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('ice_cream_parlor_pint_icon',array(
		'default'	=> 'fab fa-pinterest',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ice_Cream_Parlor_Icon_Changer(
        $wp_customize,'ice_cream_parlor_pint_icon',array(
		'label'	=> __('Pinterest Icon','ice-cream-parlor'),
		'transport' => 'refresh',
		'section'	=> 'ice_cream_parlor_social_media',
		'type'		=> 'icon'
	)));

 	 //MENU TYPOGRAPHY
	$wp_customize->add_section( 'ice_cream_parlor_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'ice-cream-parlor' ),
    	'priority' => 2,
		'panel' => 'ice_cream_parlor_panel_id'
	) );

	$wp_customize->add_setting('ice_cream_parlor_menu_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_choices',
	));
	$wp_customize->add_control(	'ice_cream_parlor_menu_font_family', array(
		'section' => 'ice_cream_parlor_menu_typography',
		'label'   => __('Menu Fonts', 'ice-cream-parlor'),
		'type'    => 'select',
		'choices' => $ice_cream_parlor_font_array,
	));

	$wp_customize->add_setting('ice_cream_parlor_menu_text_tranform',array(
		'default' => '',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_choices'
 	));
 	$wp_customize->add_control('ice_cream_parlor_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','ice-cream-parlor'),
		'section' => 'ice_cream_parlor_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','ice-cream-parlor'),
		   'Lowercase' => __('Lowercase','ice-cream-parlor'),
		   'Capitalize' => __('Capitalize','ice-cream-parlor'),
		),
	) );
	
	$wp_customize->add_setting('ice_cream_parlor_menu_font_size', array(
	  'default' => '',
      'sanitize_callback' => 'ice_cream_parlor_sanitize_number_range',
	));
	$wp_customize->add_control(new Ice_Cream_Parlor_Range_Slider($wp_customize, 'ice_cream_parlor_menu_font_size', array(
       'section' => 'ice_cream_parlor_menu_typography',
      'label' => esc_html__('Font Size', 'ice-cream-parlor'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 20,
        'step' => 1
    )
	)));

	$wp_customize->add_setting( 'ice_cream_parlor_menu_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_parlor_menu_color', array(
			'label'     => __('Change Menu Color', 'ice-cream-parlor'),
	    'section' => 'ice_cream_parlor_menu_typography',
	    'settings' => 'ice_cream_parlor_menu_color',
  	)));

	//home page slider
	$wp_customize->add_section( 'ice_cream_parlor_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'ice-cream-parlor' ),
		'panel' => 'ice_cream_parlor_panel_id',
      'priority' => 6,
	) );

	$wp_customize->add_setting( 'ice_cream_parlor_slider_arrows', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'ice-cream-parlor' ),
		'section'     => 'ice_cream_parlor_slider_section',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_slider_arrows',
	) ) );

    $wp_customize->selective_refresh->add_partial( 'ice_cream_parlor_slider_arrows', array(
		'selector' => '#slider .carousel-caption',
		'render_callback' => 'Ice_Cream_Parlor_Customize_partial_ice_cream_parlor_slider_arrows',
	) );

	for ( $ice_cream_parlor_count = 1; $ice_cream_parlor_count <= 4; $ice_cream_parlor_count++ ) {

	// Add color scheme setting and control.
	$wp_customize->add_setting( 'ice_cream_parlor_slider_page' . $ice_cream_parlor_count, array(
		'default'           => '',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_dropdown_pages'
	) );

	$wp_customize->add_control( 'ice_cream_parlor_slider_page' . $ice_cream_parlor_count, array(
		'label'    => __( 'Select Slide Image Page', 'ice-cream-parlor' ),
		'section'  => 'ice_cream_parlor_slider_section',
		'type'     => 'dropdown-pages'
	) );
	}
	
	/*=========================================
	product Section
	=========================================*/
	$wp_customize->add_section(
		'ice_cream_parlor_our_products_section', array(
			'title' => esc_html__( 'Our Products Section', 'ice-cream-parlor' ),
			'priority' => 7,
			'panel' => 'ice_cream_parlor_panel_id',
		)
	);

	// About Us Hide/ Show Setting // 
	$wp_customize->add_setting( 
		'ice_cream_parlor_our_products_show_hide_section' , 
			array(
			'default' => true,
			'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
			'capability' => 'edit_theme_options',
			'priority' => 2,
		) 
	);
	$wp_customize->add_control(
	'ice_cream_parlor_our_products_show_hide_section', 
		array(
			'label'	      => esc_html__( 'Hide / Show Section', 'ice-cream-parlor' ),
			'section'     => 'ice_cream_parlor_our_products_section',
			'settings'    => 'ice_cream_parlor_our_products_show_hide_section',
			'type'        => 'checkbox'
		) 
	);

	$wp_customize->add_setting('ice_cream_parlor_featured_section_small_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ice_cream_parlor_featured_section_small_title',array(
		'label'	=> __('Add Small Title','ice-cream-parlor'),
		'section'	=> 'ice_cream_parlor_our_products_section',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('ice_cream_parlor_featured_section_tittle_first',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ice_cream_parlor_featured_section_tittle_first',array(
		'label'	=> __('Add Main Title','ice-cream-parlor'),
		'section'	=> 'ice_cream_parlor_our_products_section',
		'type'		=> 'text'
	));

	$ice_cream_parlor_args = array(
	    'type'           => 'product',
	    'child_of'       => 0,
	    'parent'         => '',
	    'orderby'        => 'term_group',
	    'order'          => 'ASC',
	    'hide_empty'     => false,
	    'hierarchical'   => 1,
	    'number'         => '',
	    'taxonomy'       => 'product_cat',
	    'pad_counts'     => false
	);

	$categories = get_categories($ice_cream_parlor_args);
	$ice_cream_parlor_cats = array();
	$i = 0;
	foreach ($categories as $category) {
	    if ($i == 0) {
	        $default = $category->slug;
	        $i++;
	    }
	    $ice_cream_parlor_cats[$category->slug] = $category->name;
	}

	// Set the default value to "none"
	$ice_cream_parlor_default_value = 'none';

	// Add "None" as an option in the select dropdown
	$ice_cream_parlor_cats_with_none = array_merge(array('none' => 'None'), $ice_cream_parlor_cats);


	$wp_customize->add_setting(
	    'ice_cream_parlor_our_product_product_category_first',
	    array(
	        'default'           => $ice_cream_parlor_default_value,
	        'sanitize_callback' => 'ice_cream_parlor_sanitize_select',
	    )
	);
	$wp_customize->add_control(
	    'ice_cream_parlor_our_product_product_category_first',
	    array(
	        'type'    => 'select',
	        'choices' => $ice_cream_parlor_cats_with_none,
	        'label'   => __('Select Special Menu Category', 'ice-cream-parlor'),
	        'section' => 'ice_cream_parlor_our_products_section',
	    )
	);

	//footer
	$wp_customize->add_section('ice_cream_parlor_footer_section',array(
		'title'	=> __('Footer Widget Settings','ice-cream-parlor'),
		'panel' => 'ice_cream_parlor_panel_id',
		'priority' => 7,
	));

	// footer columns
	$wp_customize->add_setting('ice_cream_parlor_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'ice_cream_parlor_sanitize_number_absint'
	));
	$wp_customize->add_control('ice_cream_parlor_footer_columns',array(
		'label'	=> __('Footer Widget Columns','ice-cream-parlor'),
		'section'	=> 'ice_cream_parlor_footer_section',
		'setting'	=> 'ice_cream_parlor_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
	$wp_customize->add_setting( 'ice_cream_parlor_tp_footer_bg_color_option', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_parlor_tp_footer_bg_color_option', array(
			'label'     => __('Footer Widget Background Color', 'ice-cream-parlor'),
			'description' => __('It will change the complete footer widget backgorund color.', 'ice-cream-parlor'),
			'section' => 'ice_cream_parlor_footer_section',
			'settings' => 'ice_cream_parlor_tp_footer_bg_color_option',
	)));

	$wp_customize->add_setting('ice_cream_parlor_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'ice_cream_parlor_footer_widget_image',array(
        'label' => __('Footer Widget Background Image','ice-cream-parlor'),
         'section' => 'ice_cream_parlor_footer_section'
	)));

	//footer widget title font size
	$wp_customize->add_setting('ice_cream_parlor_footer_widget_title_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'ice_cream_parlor_sanitize_number_absint'
	));
	$wp_customize->add_control('ice_cream_parlor_footer_widget_title_font_size',array(
		'label'	=> __('Change Footer Widget Title Font Size in PX','ice-cream-parlor'),
		'section'	=> 'ice_cream_parlor_footer_section',
	    'setting'	=> 'ice_cream_parlor_footer_widget_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'ice_cream_parlor_footer_widget_title_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_parlor_footer_widget_title_color', array(
			'label'     => __('Change Footer Widget Title Color', 'ice-cream-parlor'),
	    'section' => 'ice_cream_parlor_footer_section',
	    'settings' => 'ice_cream_parlor_footer_widget_title_color',
  	)));
  	
	$wp_customize->add_setting( 'ice_cream_parlor_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'ice-cream-parlor' ),
		'section'     => 'ice_cream_parlor_footer_section',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_return_to_header',
	) ) );

    $wp_customize->add_setting('ice_cream_parlor_scroll_top_icon',array(
	  'default'	=> 'fas fa-arrow-up',
	  'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Ice_Cream_Parlor_Icon_Changer(
	        $wp_customize,'ice_cream_parlor_scroll_top_icon',array(
		'label'	=> __('Scroll to top Icon','ice-cream-parlor'),
		'transport' => 'refresh',
		'section'	=> 'ice_cream_parlor_footer_section',
			'type'		=> 'icon'
	)));

    // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('ice_cream_parlor_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'ice_cream_parlor_sanitize_choices'
	));
	$wp_customize->add_control('ice_cream_parlor_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'ice-cream-parlor'),
        'description'   => __('This option work for scroll to top', 'ice-cream-parlor'),
       'section' => 'ice_cream_parlor_footer_section',
       'choices' => array(
            'Right' => __('Right','ice-cream-parlor'),
            'Left' => __('Left','ice-cream-parlor'),
            'Center' => __('Center','ice-cream-parlor')
     ),
	) );

	//footer
	$wp_customize->add_section('ice_cream_parlor_footer_copyright_section',array(
		'title'	=> __('Footer Copyright Settings','ice-cream-parlor'),
		'description'	=> __('Add copyright text.','ice-cream-parlor'),
		'panel' => 'ice_cream_parlor_panel_id',
		'priority' => 7,
	));

	$wp_customize->add_setting('ice_cream_parlor_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ice_cream_parlor_footer_text',array(
		'label'	=> __('Copyright Text','ice-cream-parlor'),
		'section'	=> 'ice_cream_parlor_footer_copyright_section',
		'type'		=> 'text'
	));

	//footer widget title font size
	$wp_customize->add_setting('ice_cream_parlor_footer_copyright_font_size',array(
		'default'	=> '',
		'sanitize_callback'	=> 'ice_cream_parlor_sanitize_number_absint'
	));
	$wp_customize->add_control('ice_cream_parlor_footer_copyright_font_size',array(
		'label'	=> __('Change Footer Copyright Font Size in PX','ice-cream-parlor'),
		'section'	=> 'ice_cream_parlor_footer_copyright_section',
	    'setting'	=> 'ice_cream_parlor_footer_copyright_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'ice_cream_parlor_footer_copyright_text_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_parlor_footer_copyright_text_color', array(
			'label'     => __('Change Footer Copyright Text Color', 'ice-cream-parlor'),
	    'section' => 'ice_cream_parlor_footer_copyright_section',
	    'settings' => 'ice_cream_parlor_footer_copyright_text_color',
  	)));

  	$wp_customize->add_setting('ice_cream_parlor_footer_copyright_top_bottom_padding',array(
		'default'	=> '',
		'sanitize_callback'	=> 'ice_cream_parlor_sanitize_number_absint'
	));
	$wp_customize->add_control('ice_cream_parlor_footer_copyright_top_bottom_padding',array(
		'label'	=> __('Change Footer Copyright Padding in PX','ice-cream-parlor'),
		'section'	=> 'ice_cream_parlor_footer_copyright_section',
	    'setting'	=> 'ice_cream_parlor_footer_copyright_top_bottom_padding',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	// Add Settings and Controls for copyright
	$wp_customize->add_setting('ice_cream_parlor_copyright_text_position',array(
        'default' => 'Center',
        'sanitize_callback' => 'ice_cream_parlor_sanitize_choices'
	));
	$wp_customize->add_control('ice_cream_parlor_copyright_text_position',array(
        'type' => 'radio',
        'label'     => __('Copyright Text Position', 'ice-cream-parlor'),
        'description'   => __('This option work for Copyright', 'ice-cream-parlor'),
        'section' => 'ice_cream_parlor_footer_copyright_section',
        'choices' => array(
            'Right' => __('Right','ice-cream-parlor'),
            'Left' => __('Left','ice-cream-parlor'),
            'Center' => __('Center','ice-cream-parlor')
        ),
	) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'Ice_Cream_Parlor_Customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'Ice_Cream_Parlor_Customize_partial_blogdescription',
	) );

	//Mobile Respnsive
	$wp_customize->add_section('ice_cream_parlor_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'ice-cream-parlor'),
		'description' => __('Control will not function if the toggle in the main settings is off.', 'ice-cream-parlor'),
		'priority' => 8,
		'panel' => 'ice_cream_parlor_panel_id'
	) );
	$wp_customize->add_setting( 'ice_cream_parlor_return_to_header_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'ice-cream-parlor' ),
		'section'     => 'ice_cream_parlor_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_return_to_header_mob',
	) ) );
	$wp_customize->add_setting( 'ice_cream_parlor_related_post_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_related_post_mob', array(
		'label'       => esc_html__( 'Show / Hide Related Post', 'ice-cream-parlor' ),
		'section'     => 'ice_cream_parlor_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_related_post_mob',
	) ) );

	//Site Identity
	$wp_customize->add_setting( 'ice_cream_parlor_site_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_site_title', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'ice-cream-parlor' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_site_title',
	) ) );
	$wp_customize->add_setting('ice_cream_parlor_site_title_font_size',array(
		'default'	=> 30,
		'sanitize_callback'	=> 'ice_cream_parlor_sanitize_number_absint'
	));
	$wp_customize->add_control('ice_cream_parlor_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','ice-cream-parlor'),
		'section'	=> 'title_tagline',
		'setting'	=> 'ice_cream_parlor_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 80,
		),
	));

	$wp_customize->add_setting( 'ice_cream_parlor_site_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_parlor_site_tagline_color', array(
			'label'     => __('Change Site Title Color', 'ice-cream-parlor'),
	    'section' => 'title_tagline',
	    'settings' => 'ice_cream_parlor_site_tagline_color',
  	)));
  	
	$wp_customize->add_setting( 'ice_cream_parlor_site_tagline', array(
	    'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_site_tagline', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'ice-cream-parlor' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_site_tagline',
	) ) );

	// logo site tagline size
	$wp_customize->add_setting('ice_cream_parlor_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'ice_cream_parlor_sanitize_number_absint'
	));
	$wp_customize->add_control('ice_cream_parlor_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','ice-cream-parlor'),
		'section'	=> 'title_tagline',
	    'setting'	=> 'ice_cream_parlor_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));

	$wp_customize->add_setting( 'ice_cream_parlor_logo_tagline_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_parlor_logo_tagline_color', array(
			'label'     => __('Change Site Tagline Color', 'ice-cream-parlor'),
	    'section' => 'title_tagline',
	    'settings' => 'ice_cream_parlor_logo_tagline_color',
  	)));

    $wp_customize->add_setting('ice_cream_parlor_logo_width',array(
		'default' => 50,
		'sanitize_callback'	=> 'ice_cream_parlor_sanitize_number_absint'
	));
	$wp_customize->add_control('ice_cream_parlor_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','ice-cream-parlor'),
		'section'	=> 'title_tagline',
		'type'		=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 150,
		),
	));

	//Woo Coomerce
	$wp_customize->add_setting('ice_cream_parlor_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'ice_cream_parlor_sanitize_number_absint'
	));
	$wp_customize->add_control('ice_cream_parlor_per_columns',array(
		'label'	=> __('Product Per Row','ice-cream-parlor'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting('ice_cream_parlor_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'ice_cream_parlor_sanitize_number_absint'
	));
	$wp_customize->add_control('ice_cream_parlor_product_per_page',array(
		'label'	=> __('Product Per Page','ice-cream-parlor'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
   	$wp_customize->add_setting( 'ice_cream_parlor_product_sidebar', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'ice-cream-parlor' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_product_sidebar',
	) ) );

	$wp_customize->add_setting( 'ice_cream_parlor_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'ice-cream-parlor' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_single_product_sidebar',
	) ) );
	$wp_customize->add_setting( 'ice_cream_parlor_related_product', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'ice_cream_parlor_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Ice_Cream_Parlor_Toggle_Control( $wp_customize, 'ice_cream_parlor_related_product', array(
		'label'       => esc_html__( 'Show / Hide related product', 'ice-cream-parlor' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'ice_cream_parlor_related_product',
	) ) );

	//add home page setting pannel
	$wp_customize->add_panel( 'ice_cream_parlor_page_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Page Template Settings', 'ice-cream-parlor' ),
	    'description' => __( 'Description of what this panel does.', 'ice-cream-parlor' ),
	) );

	// 404 PAGE
	$wp_customize->add_section('ice_cream_parlor_404_page_section',array(
		'title'         => __('404 Page', 'ice-cream-parlor'),
		'description'   => 'Here you can customize 404 Page content.',
		'panel' => 'ice_cream_parlor_page_panel_id'
	) );

	$wp_customize->add_setting('ice_cream_parlor_edit_404_title',array(
		'default'=> __('Oops! That page cant be found.','ice-cream-parlor'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('ice_cream_parlor_edit_404_title',array(
		'label'	=> __('Edit Title','ice-cream-parlor'),
		'section'=> 'ice_cream_parlor_404_page_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('ice_cream_parlor_edit_404_text',array(
		'default'=> __('It looks like nothing was found at this location. Maybe try a search?','ice-cream-parlor'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ice_cream_parlor_edit_404_text',array(
		'label'	=> __('Edit Text','ice-cream-parlor'),
		'section'=> 'ice_cream_parlor_404_page_section',
		'type'=> 'text'
	));

	// Search Results
	$wp_customize->add_section('ice_cream_parlor_no_result_section',array(
		'title'         => __('Search Results', 'ice-cream-parlor'),
		'description'   => 'Here you can customize Search Result content.',
		'panel' => 'ice_cream_parlor_page_panel_id'
	) );

	$wp_customize->add_setting('ice_cream_parlor_edit_no_result_title',array(
		'default'=> __('Nothing Found','ice-cream-parlor'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('ice_cream_parlor_edit_no_result_title',array(
		'label'	=> __('Edit Title','ice-cream-parlor'),
		'section'=> 'ice_cream_parlor_no_result_section',
		'type'=> 'text',
	));

	$wp_customize->add_setting('ice_cream_parlor_edit_no_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','ice-cream-parlor'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('ice_cream_parlor_edit_no_result_text',array(
		'label'	=> __('Edit Text','ice-cream-parlor'),
		'section'=> 'ice_cream_parlor_no_result_section',
		'type'=> 'text'
	));

	 // Header Image Height
    $wp_customize->add_setting(
        'ice_cream_parlor_header_image_height',
        array(
            'default'           => 350,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'ice_cream_parlor_header_image_height',
        array(
            'label'       => esc_html__( 'Header Image Height', 'ice-cream-parlor' ),
            'section'     => 'header_image',
            'type'        => 'number',
            'description' => esc_html__( 'Control the height of the header image. Default is 350px.', 'ice-cream-parlor' ),
            'input_attrs' => array(
                'min'  => 220,
                'max'  => 1000,
                'step' => 1,
            ),
        )
    );

    // Header Background Position
    $wp_customize->add_setting(
        'ice_cream_parlor_header_background_position',
        array(
            'default'           => 'center',
            'sanitize_callback' => 'sanitize_text_field',
        )
    );
    $wp_customize->add_control(
        'ice_cream_parlor_header_background_position',
        array(
            'label'       => esc_html__( 'Header Background Position', 'ice-cream-parlor' ),
            'section'     => 'header_image',
            'type'        => 'select',
            'choices'     => array(
                'top'    => esc_html__( 'Top', 'ice-cream-parlor' ),
                'center' => esc_html__( 'Center', 'ice-cream-parlor' ),
                'bottom' => esc_html__( 'Bottom', 'ice-cream-parlor' ),
            ),
            'description' => esc_html__( 'Choose how you want to position the header image.', 'ice-cream-parlor' ),
        )
    );

    // Header Image Parallax Effect
    $wp_customize->add_setting(
        'ice_cream_parlor_header_background_attachment',
        array(
            'default'           => 1,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'ice_cream_parlor_header_background_attachment',
        array(
            'label'       => esc_html__( 'Header Image Parallax', 'ice-cream-parlor' ),
            'section'     => 'header_image',
            'type'        => 'checkbox',
            'description' => esc_html__( 'Add a parallax effect on page scroll.', 'ice-cream-parlor' ),
        )
    );

    $wp_customize->add_setting(
        'ice_cream_parlor_header_image_title_font_size',
        array(
            'default'           => 32,
            'sanitize_callback' => 'absint',
        )
    );
    $wp_customize->add_control(
        'ice_cream_parlor_header_image_title_font_size',
        array(
            'label'       => esc_html__( 'Change Header Image Title Font Size', 'ice-cream-parlor' ),
            'section'     => 'header_image',
            'type'        => 'number',
            'description' => esc_html__( 'Control the font Size of the header image title. Default is 32px.', 'ice-cream-parlor' ),
            'input_attrs' => array(
                'min'  => 10,
                'max'  => 200,
                'step' => 1,
            ),
        )
    );

	$wp_customize->add_setting( 'ice_cream_parlor_header_image_title_text_color', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ice_cream_parlor_header_image_title_text_color', array(
			'label'     => __('Change Header Image Title Color', 'ice-cream-parlor'),
	    'section' => 'header_image',
	    'settings' => 'ice_cream_parlor_header_image_title_text_color',
  	)));

}
add_action( 'customize_register', 'Ice_Cream_Parlor_Customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Ice Cream Parlor 1.0
 * @see Ice_Cream_Parlor_Customize_register()
 *
 * @return void
 */
function Ice_Cream_Parlor_Customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Ice Cream Parlor 1.0
 * @see Ice_Cream_Parlor_Customize_register()
 *
 * @return void
 */
function Ice_Cream_Parlor_Customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'ICE_CREAM_PARLOR_PRO_THEME_NAME' ) ) {
	define( 'ICE_CREAM_PARLOR_PRO_THEME_NAME', esc_html__( 'Ice Cream Parlor Pro', 'ice-cream-parlor' ));
}
if ( ! defined( 'ICE_CREAM_PARLOR_PRO_THEME_URL' ) ) {
	define( 'ICE_CREAM_PARLOR_PRO_THEME_URL', esc_url('https://www.themespride.com/products/dessert-wordpress-theme'));
}
if ( ! defined( 'ICE_CREAM_PARLOR_DOCS_URL' ) ) {
	define( 'ICE_CREAM_PARLOR_DOCS_URL', esc_url('https://page.themespride.com/demo/docs/ice-cream-parlor/'));
}
if ( ! defined( 'ICE_CREAM_PARLOR_DEMO_TITLE' ) ) {
	define( 'ICE_CREAM_PARLOR_DEMO_TITLE', esc_html__( 'Click to View Site', 'ice-cream-parlor' ));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Ice_Cream_Parlor_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Ice_Cream_Parlor_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Ice_Cream_Parlor_Customize_Section_Pro(
				$manager,
				'ice_cream_parlor_section_pro',
				array(
					'priority'   => 9,
					'title'    => ICE_CREAM_PARLOR_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'ice-cream-parlor' ),
					'pro_url'  => esc_url( ICE_CREAM_PARLOR_PRO_THEME_URL, 'ice-cream-parlor' ),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new ice_cream_parlor_Customize_Section_Pro(
				$manager,
				'ice_cream_parlor_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'ice-cream-parlor' ),
					'pro_text' => esc_html__( 'Click Here', 'ice-cream-parlor' ),
					'pro_url'  => esc_url( ICE_CREAM_PARLOR_DOCS_URL, 'ice-cream-parlor'),
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new ice_cream_parlor_Customize_Section_Pro(
				$manager,
				'ice_cream_parlor_section_pro_demo',
				array(
					'priority'   => 9,
					'title'    => ICE_CREAM_PARLOR_DEMO_TITLE,
					'pro_text' => esc_html__( 'View Site', 'ice-cream-parlor' ),
					'pro_url'  => esc_url( home_url() ),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ice-cream-parlor-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ice-cream-parlor-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Ice_Cream_Parlor_Customize::get_instance();
