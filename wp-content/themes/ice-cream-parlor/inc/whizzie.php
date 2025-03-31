<?php 
if (isset($_GET['import-demo']) && $_GET['import-demo'] == true) {

    // Function to install and activate plugins
    function ice_cream_parlor_import_demo_content() {
        // Define the plugins you want to install and activate
        $plugins = array(
            array(
                'slug' => 'woocommerce',
                'file' => 'woocommerce/woocommerce.php',
                'url'  => 'https://downloads.wordpress.org/plugin/woocommerce.latest-stable.zip'
            ),
        );

        // Include required files for plugin installation
        include_once(ABSPATH . 'wp-admin/includes/plugin-install.php');
        include_once(ABSPATH . 'wp-admin/includes/file.php');
        include_once(ABSPATH . 'wp-admin/includes/misc.php');
        include_once(ABSPATH . 'wp-admin/includes/class-wp-upgrader.php');

        // Loop through each plugin
        foreach ($plugins as $plugin) {
            $plugin_file = WP_PLUGIN_DIR . '/' . $plugin['file'];

            // Check if the plugin is installed
            if (!file_exists($plugin_file)) {
                // If the plugin is not installed, download and install it
                $upgrader = new Plugin_Upgrader();
                $result = $upgrader->install($plugin['url']);

                // Check for installation errors
                if (is_wp_error($result)) {
                    error_log('Plugin installation failed: ' . $plugin['slug'] . ' - ' . $result->get_error_message());
                    echo 'Error installing plugin: ' . esc_html($plugin['slug']) . ' - ' . esc_html($result->get_error_message());
                    continue;
                }
            }

            // If the plugin exists but is not active, activate it
            if (file_exists($plugin_file) && !is_plugin_active($plugin['file'])) {
                $result = activate_plugin($plugin['file']);

                // Check for activation errors
                if (is_wp_error($result)) {
                    error_log('Plugin activation failed: ' . $plugin['slug'] . ' - ' . $result->get_error_message());
                    echo 'Error activating plugin: ' . esc_html($plugin['slug']) . ' - ' . esc_html($result->get_error_message());
                }
            }
        }
    }

    // Call the import function
    ice_cream_parlor_import_demo_content();

    // ------- Create Nav Menu --------
$ice_cream_parlor_menuname = 'Main Menus';
$ice_cream_parlor_bpmenulocation = 'primary-menu';
$ice_cream_parlor_menu_exists = wp_get_nav_menu_object($ice_cream_parlor_menuname);

if (!$ice_cream_parlor_menu_exists) {
    $ice_cream_parlor_menu_id = wp_create_nav_menu($ice_cream_parlor_menuname);

    // Create Home Page
    $ice_cream_parlor_home_title = 'Home';
    $ice_cream_parlor_home = array(
        'post_type' => 'page',
        'post_title' => $ice_cream_parlor_home_title,
        'post_content' => '',
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'home'
    );
    $ice_cream_parlor_home_id = wp_insert_post($ice_cream_parlor_home);

    // Assign Home Page Template
    add_post_meta($ice_cream_parlor_home_id, '_wp_page_template', 'page-template/front-page.php');

    // Update options to set Home Page as the front page
    update_option('page_on_front', $ice_cream_parlor_home_id);
    update_option('show_on_front', 'page');

    // Add Home Page to Menu
    wp_update_nav_menu_item($ice_cream_parlor_menu_id, 0, array(
        'menu-item-title' => __('Home', 'ice-cream-parlor'),
        'menu-item-classes' => 'home',
        'menu-item-url' => home_url('/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $ice_cream_parlor_home_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create About Us Page with Dummy Content
    $ice_cream_parlor_about_title = 'About Us';
    $ice_cream_parlor_about_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $ice_cream_parlor_about = array(
        'post_type' => 'page',
        'post_title' => $ice_cream_parlor_about_title,
        'post_content' => $ice_cream_parlor_about_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'about-us'
    );
    $ice_cream_parlor_about_id = wp_insert_post($ice_cream_parlor_about);

    // Add About Us Page to Menu
    wp_update_nav_menu_item($ice_cream_parlor_menu_id, 0, array(
        'menu-item-title' => __('About Us', 'ice-cream-parlor'),
        'menu-item-classes' => 'about-us',
        'menu-item-url' => home_url('/about-us/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $ice_cream_parlor_about_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Services Page with Dummy Content
    $ice_cream_parlor_services_title = 'Services';
    $ice_cream_parlor_services_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $ice_cream_parlor_services = array(
        'post_type' => 'page',
        'post_title' => $ice_cream_parlor_services_title,
        'post_content' => $ice_cream_parlor_services_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'services'
    );
    $ice_cream_parlor_services_id = wp_insert_post($ice_cream_parlor_services);

    // Add Services Page to Menu
    wp_update_nav_menu_item($ice_cream_parlor_menu_id, 0, array(
        'menu-item-title' => __('Services', 'ice-cream-parlor'),
        'menu-item-classes' => 'services',
        'menu-item-url' => home_url('/services/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $ice_cream_parlor_services_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Pages Page with Dummy Content
    $ice_cream_parlor_pages_title = 'Pages';
    $ice_cream_parlor_pages_content = '<h2>Our Pages</h2>
    <p>Explore all the pages we have on our website. Find information about our services, company, and more.</p>';
    $ice_cream_parlor_pages = array(
        'post_type' => 'page',
        'post_title' => $ice_cream_parlor_pages_title,
        'post_content' => $ice_cream_parlor_pages_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'pages'
    );
    $ice_cream_parlor_pages_id = wp_insert_post($ice_cream_parlor_pages);

    // Add Pages Page to Menu
    wp_update_nav_menu_item($ice_cream_parlor_menu_id, 0, array(
        'menu-item-title' => __('Pages', 'ice-cream-parlor'),
        'menu-item-classes' => 'pages',
        'menu-item-url' => home_url('/pages/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $ice_cream_parlor_pages_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Create Contact Page with Dummy Content
    $ice_cream_parlor_contact_title = 'Contact';
    $ice_cream_parlor_contact_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam...<br>

             Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960 with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br> 

                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which dont look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isnt anything embarrassing hidden in the middle of text.<br> 

                All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.';
    $ice_cream_parlor_contact = array(
        'post_type' => 'page',
        'post_title' => $ice_cream_parlor_contact_title,
        'post_content' => $ice_cream_parlor_contact_content,
        'post_status' => 'publish',
        'post_author' => 1,
        'post_slug' => 'contact'
    );
    $ice_cream_parlor_contact_id = wp_insert_post($ice_cream_parlor_contact);

    // Add Contact Page to Menu
    wp_update_nav_menu_item($ice_cream_parlor_menu_id, 0, array(
        'menu-item-title' => __('Contact', 'ice-cream-parlor'),
        'menu-item-classes' => 'contact',
        'menu-item-url' => home_url('/contact/'),
        'menu-item-status' => 'publish',
        'menu-item-object-id' => $ice_cream_parlor_contact_id,
        'menu-item-object' => 'page',
        'menu-item-type' => 'post_type'
    ));

    // Set the menu location if it's not already set
    if (!has_nav_menu($ice_cream_parlor_bpmenulocation)) {
        $locations = get_theme_mod('nav_menu_locations'); // Use 'nav_menu_locations' to get locations array
        if (empty($locations)) {
            $locations = array();
        }
        $locations[$ice_cream_parlor_bpmenulocation] = $ice_cream_parlor_menu_id;
        set_theme_mod('nav_menu_locations', $locations);
    }
}

        //---Header--//
        set_theme_mod('ice_cream_parlor_header_fb_new_tab', 'true');
        set_theme_mod('ice_cream_parlor_facebook_url', '#');
        set_theme_mod('ice_cream_parlor_facebook_icon', 'fab fa-facebook-f');

        set_theme_mod('ice_cream_parlor_header_twt_new_tab', 'true');
        set_theme_mod('ice_cream_parlor_twitter_url', '#');
        set_theme_mod('ice_cream_parlor_twitter_icon', 'fab fa-twitter');

        set_theme_mod('ice_cream_parlor_header_ins_new_tab', 'true');
        set_theme_mod('ice_cream_parlor_instagram_url', '#');
        set_theme_mod('ice_cream_parlor_instagram_icon', 'fab fa-instagram');

        set_theme_mod('ice_cream_parlor_header_pint_new_tab', 'true');
        set_theme_mod('ice_cream_parlor_pint_url', '#');
        set_theme_mod('ice_cream_parlor_pint_icon', 'fab fa-pinterest');


        // Slider Section
        set_theme_mod('ice_cream_parlor_slider_arrows', true);

        for ($i = 1; $i <= 4; $i++) {
            $ice_cream_parlor_title = 'Sweet Ice Cream';
            $ice_cream_parlor_content = 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,';

            // Create post object
            $my_post = array(
                'post_title'    => wp_strip_all_tags($ice_cream_parlor_title),
                'post_content'  => $ice_cream_parlor_content,
                'post_status'   => 'publish',
                'post_type'     => 'page',
            );

            // Insert the post into the database
            $post_id = wp_insert_post($my_post);

            if ($post_id) {
                // Set the theme mod for the slider page
                set_theme_mod('ice_cream_parlor_slider_page' . $i, $post_id);

                $image_url = get_template_directory_uri() . '/assets/images/slider-img.png';
                $image_id = media_sideload_image($image_url, $post_id, null, 'id');

                if (!is_wp_error($image_id)) {
                    // Set the downloaded image as the post's featured image
                    set_post_thumbnail($post_id, $image_id);
                }
            }
        }

        // Best Seller Section
        set_theme_mod('ice_cream_parlor_our_products_show_hide_section', 'true');
        set_theme_mod('ice_cream_parlor_featured_section_small_title', 'Sweeny’s');
        set_theme_mod('ice_cream_parlor_featured_section_tittle_first', 'Special Menu');
        set_theme_mod('ice_cream_parlor_our_product_product_category_first', 'productcategory1');

        // Define product category names and product titles
        $ice_cream_parlor_category_names = array('productcategory1');
        $ice_cream_parlor_title_array = array(
            array("strawberry ice cream", "Havmor Ice Cream", "Vanilla ice cream", "Strawberry Ice Cream"),
        );

        foreach ($ice_cream_parlor_category_names as $ice_cream_parlor_index => $ice_cream_parlor_category_name) {
            // Create or retrieve the product category term ID
            $ice_cream_parlor_term = term_exists($ice_cream_parlor_category_name, 'product_cat');
            if ($ice_cream_parlor_term === 0 || $ice_cream_parlor_term === null) {
                // If the term does not exist, create it
                $ice_cream_parlor_term = wp_insert_term($ice_cream_parlor_category_name, 'product_cat');
            }

            if (is_wp_error($ice_cream_parlor_term)) {
                error_log('Error creating category: ' . $ice_cream_parlor_term->get_error_message());
                continue; // Skip to the next iteration if category creation fails
            }

            $ice_cream_parlor_term_id = is_array($ice_cream_parlor_term) ? $ice_cream_parlor_term['term_id'] : $ice_cream_parlor_term;

            // Loop to create 4 products for each category
            for ($ice_cream_parlor_i = 0; $ice_cream_parlor_i < 4; $ice_cream_parlor_i++) {
                // Create product content
                $ice_cream_parlor_title = $ice_cream_parlor_title_array[$ice_cream_parlor_index][$ice_cream_parlor_i];

                // Create product post object
                $ice_cream_parlor_my_post = array(
                    'post_title' => wp_strip_all_tags($ice_cream_parlor_title),
                    'post_status' => 'publish',
                    'post_type' => 'product', // Post type set to 'product'
                );

                // Insert the product into the database
                $ice_cream_parlor_post_id = wp_insert_post($ice_cream_parlor_my_post);

                if (is_wp_error($ice_cream_parlor_post_id)) {
                    error_log('Error creating product: ' . $ice_cream_parlor_post_id->get_error_message());
                    continue; // Skip to the next product if creation fails
                }

                // Assign the category to the product
                wp_set_object_terms($ice_cream_parlor_post_id, (int)$ice_cream_parlor_term_id, 'product_cat');

                // Add product meta (price, etc.)
                update_post_meta($ice_cream_parlor_post_id, '_regular_price', '15'); // Regular price
                update_post_meta($ice_cream_parlor_post_id, '_sale_price', '14'); // Sale price
                update_post_meta($ice_cream_parlor_post_id, '_price', '14'); // Active price

                // Handle the featured image using media_sideload_image
                $ice_cream_parlor_image_url = get_template_directory_uri() . '/assets/images/product-img' . ($ice_cream_parlor_i + 1) . '.png';
                $ice_cream_parlor_image_id = media_sideload_image($ice_cream_parlor_image_url, $ice_cream_parlor_post_id, null, 'id');

                if (is_wp_error($ice_cream_parlor_image_id)) {
                    error_log('Error downloading image: ' . $ice_cream_parlor_image_id->get_error_message());
                    continue; // Skip to the next product if image download fails
                }

                // Assign featured image to product
                set_post_thumbnail($ice_cream_parlor_post_id, $ice_cream_parlor_image_id);
            }
        }


    }

?>