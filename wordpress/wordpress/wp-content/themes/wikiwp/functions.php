<?php
	// set content width for embedded media
	if ( ! isset( $content_width ) ) { $content_width = 1024; /* pixels */ }


	if ( ! function_exists( 'wikiwp_setup' ) ) :
	// Sets up theme defaults and registers support for various WordPress features.
	function wikiwp_setup() {
		// Make theme available for translation. Translations can be filed in the "/languages/" directory.
		load_theme_textdomain( 'wikiwp', get_template_directory() . '/languages' );        

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Add thumbnail suport
		if ( function_exists( 'add_theme_support' ) ) { 
			add_theme_support( 'post-thumbnails' );
			// default post thumbnail dimensions (cropped)
			the_post_thumbnail( 'thumbnail' );       // Thumbnail (default 150px x 150px max)
			the_post_thumbnail( 'medium' );          // Medium resolution (default 300px x 300px max)
			the_post_thumbnail( 'large' );           // Large resolution (default 640px x 640px max)
			the_post_thumbnail( 'full' );            // Full resolution (original size uploaded)
			// additional image sizes
			add_image_size( 'mini', 100, 100, true ); // 100px x 100px crop
			add_image_size( 'thumbnail-croped', 150, 150, true ); // 150px x 150px croped
			add_image_size( 'medium-croped', 300, 300, true ); // 150px x 150px croped
			add_image_size( 'medium-fix-width', 300, 9999, false ); // 300px wide and unlimited height
		}
        
        // Remove accents on media upload
        add_filter('sanitize_file_name', 'remove_accents' );
		
		// Switch default core markup for search form, comment form, and comments to output valid HTML5.
		add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
		) );
        
        // Set up the WordPress core custom header feature.
        $args = array(
            'flex-width'    => true,
            'flex-height'    => true,
        );
        add_theme_support( 'custom-header', $args );
        
        // Set up the WordPress core custom background feature.
        add_theme_support( 'custom-background', apply_filters( 'wikiwp_custom_background_args', array(
            'default-color' => 'F0F0F0',
            'default-image' => '',
        ) ) );
    }
	endif; // End of wikiwp_setup
	add_action( 'after_setup_theme', 'wikiwp_setup' );


	// loding stylesheet for bootstrap
	function wikiwp_load_bootstrap_styles() {                       
	  	wp_register_style( 'bootstrap-style', 
	    get_stylesheet_directory_uri().'/css/bootstrap.min.css', array(), false, 'all' );    
	  	wp_enqueue_style( 'bootstrap-style' );
	}
	add_action('wp_enqueue_scripts', 'wikiwp_load_bootstrap_styles');

    
    // loding stylesheet for the theme
	function wikiwp_load_styles() {                       
	  	wp_register_style( 'theme_style', 
	    get_stylesheet_directory_uri().'/style.css', array(), false, 'all' );    
	  	wp_enqueue_style( 'theme_style' );
	}
	add_action('wp_enqueue_scripts', 'wikiwp_load_styles');

    // loding stylesheet for navigation
	function wikiwp_load_navigation_side_styles() {                       
	  	wp_register_style( 'navigation-side-style', 
	    get_stylesheet_directory_uri().'/css/navigation-side.css', array(), false, 'all' );    
	  	wp_enqueue_style( 'navigation-side-style' );
	}
	add_action('wp_enqueue_scripts', 'wikiwp_load_navigation_side_styles');

    // loding stylesheet for wiki
	function wikiwp_load_wiki_styles() {                       
	  	wp_register_style( 'wiki-style', 
	    get_stylesheet_directory_uri().'/css/wiki.css', array(), false, 'all' );    
	  	wp_enqueue_style( 'wiki-style' );
	}
	add_action('wp_enqueue_scripts', 'wikiwp_load_wiki_styles');


    // Loading functions script
    function wikiwp_function_script() {
        wp_enqueue_script(
            'functions-script',
            get_stylesheet_directory_uri() . '/js/functions.js',
            array( 'jquery' )
        );
    }
    add_action( 'wp_enqueue_scripts', 'wikiwp_function_script' );


    // Custom logo uploader
    add_action( 'customize_register', 'wikiwp_customize_register' );
    function wikiwp_customize_register($wp_customize) {
        $wp_customize->add_section( 'wikiwp_custom_logo', array(
            'title'          => __('Logo', 'wikiwp'),
            'description'    => __('Use your own Logo instead of the blog name.', 'wikiwp'),
            'priority'       => 25,
        ) );

        $wp_customize->add_setting( 'custom_logo', array(
            'default'        => '',
            'sanitize_callback' => 'esc_url_raw'
        ) );

        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'custom_logo', array(
            'label'   => __('Set your own logo', 'wikiwp'),
            'section' => 'wikiwp_custom_logo',
            'settings'   => 'custom_logo',
        ) ) );
    }


    // ADD CUSTOM MENUS
    function wikiwp_custom_menus() {
        register_nav_menus(
            array(
            'main-menu' => __('Main', 'wikiwp'),
            'meta-menu' => __('Meta', 'wikiwp')
            )
        );
    }
    add_action( 'init', 'wikiwp_custom_menus' );


    // ORDER POSTS IN CATEGORIES
   add_action( 'pre_get_posts', 'custom_get_posts' );

function custom_get_posts( $query ) {
    if( (is_category('news')) ) {    
        $query->query_vars['orderby'] = 'modified';
        $query->query_vars['order'] = 'DESC';
    } else {
        $query->query_vars['orderby'] = 'name';
        $query->query_vars['order'] = 'ASC';
    }
}


	// Loding comment replay script
	function wikiwp_load_comment_replay_script(){
	if ( (!is_admin()) && is_singular() && comments_open() && get_option('thread_comments') )
	  	wp_enqueue_script( 'comment-reply' );
	}
	add_action('wp_print_scripts', 'wikiwp_load_comment_replay_script');


	// Automatic feed links
	add_theme_support( 'automatic-feed-links' );


	// SIDEBAR
	function wikiwp_register_sidebar_left() {
	    // Add sidebar support
        register_sidebar( array(
	        'name' => __( 'Sidebar', 'wikiwp' ),
	        'id' => 'sidebar-1',
	        'description' => __( 'Sidebar on the right hand of the website', 'wikiwp' ),
	        'before_title' => '',
	        'after_title' => '',
	    ) );

        // Custom sidebar navigation
        if ( function_exists('register_sidebar') ) {
            register_sidebar(array(
            'name' => 'Navigation',
            'id' => 'navigation',
            'description' => 'Appears as the sidebar beneath the navigation',
            'before_widget' => '<ul class="custom-sidebar-navigation"><hr>',
            'after_widget' => '</ul>',
            'before_title' => '<h3 class="widget-title">',
            'after_title' => '</h3>',
            ));
        }

        // Custom footer sidebar left
        if ( function_exists('register_sidebar') ) {
            register_sidebar(array(
            'name' => 'Footer left',
            'id' => 'footer-left',
            'description' => 'Place your widgets here for the left side of the footer',
            'before_widget' => '<ul class="custom-sidebar-footer-mid">',
            'after_widget' => '</ul>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
            ));
        }

        // Custom footer sidebar middle
        if ( function_exists('register_sidebar') ) {
            register_sidebar(array(
            'name' => 'Footer middle',
            'id' => 'footer-mid',
            'description' => 'Place your widgets here for the middle of the footer',
            'before_widget' => '<ul class="custom-sidebar-footer-mid">',
            'after_widget' => '</ul>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
            ));
        }

        // Custom footer sidebar right
        if ( function_exists('register_sidebar') ) {
            register_sidebar(array(
            'name' => 'Footer right',
            'id' => 'footer-right',
            'description' => 'Place your widgets here for the right side of the footer',
            'before_widget' => '<ul class="custom-sidebar-footer-right">',
            'after_widget' => '</ul>',
            'before_title' => '<h3>',
            'after_title' => '</h3>',
            ));
        }
    }
	add_action( 'widgets_init', 'wikiwp_register_sidebar_left' );
	

	// Changing excerpt more
	function wikiwp_excerpt_more($more) {
	global $post;
	return '... <a href="'. get_permalink($post->ID) . '">' . __('read more', 'wikiwp').' &raquo;</a>';
	}
	add_filter('excerpt_more', 'wikiwp_excerpt_more');