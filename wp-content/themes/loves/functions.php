<?php 

	function add_style(){
	        
	    wp_enqueue_style('style-test',get_template_directory_uri()."/assets/css/style.css");
	}
	add_action('wp_enqueue_scripts','add_style');


	/*add menu*/

	function register_menus() {
	    register_nav_menus(
            array(
                'header-menu'                =>   __('Header Menu'),
                'footer-partner-menu'        =>   __('Footer Partner Menu'),
                'footer-widget-menu'         =>   __('Footer Widget Menu'),
                'footer-menu'                =>   __('Footer Menu'),
                'sidebar-menu'               =>   __('Sidebar Menu'),
                'social-menu'                =>   __('Social Menu'),
            ) );
	}
	add_action( 'init', 'register_menus' );
	/*class active*/
	add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

	function special_nav_class ($classes, $item) {
	    if (in_array('current-menu-item', $classes) ){
	        $classes[] = 'active ';
	    }
	    return $classes;
	}

	// add category
	function custom_taxonomy() {

	    register_taxonomy(
	        'your_custom_category_name',
	        'your_custom_post_type_name',
	        array(
	            'label' => __( 'Your_category_label_name' ),
	            'rewrite' => array( 'slug' => 'your_custom_category_slug' ),
	            'hierarchical' => true,
	        )
	    );
	}
add_action( 'init', 'custom_taxonomy' );

	/*add thumbnail*/
	function register_feature_image(){
		add_theme_support( 'title-tag' );
		add_theme_support('post-thumbnails');

	}
	add_action('after_setup_theme','register_feature_image');


	// Creates Service Custom Post Type
	function custom_init() {
	   register_post_type('photos', array(
	    'supports' => array('title', 'editor', 'thumbnail'),
	    'public' => true,
	    'labels' => array(
	      'name' => 'Photo Sidebar',
	      'add_new_item' => 'Add New photos',
	      'edit_item' => 'Edit photos',
	      'all_items' => 'All photos',
	      'singular_name' => 'photos',

	    ),
	    'menu_icon' => 'dashicons-welcome-learn-more',
	    'taxonomies'	=> array('category')
	  ));


	}
	add_action( 'init', 'custom_init');

	// home right sidebar
	function custom_init_editor() {
	   register_post_type('editor', array(
	    'supports' => array('title', 'editor', 'thumbnail'),
	    'public' => true,
	    'labels' => array(
	      'name' => 'Editor Sidebar',
	      'add_new_item' => 'Add New photos',
	      'edit_item' => 'Edit photos',
	      'all_items' => 'All photos',
	      'singular_name' => 'editor'
	    ),
	    'menu_icon' => 'dashicons-welcome-learn-more',
	    'taxonomies'	=> array('category')
	  ));


	}
	add_action( 'init', 'custom_init_editor');

	// home blog
	function custom_init_blog() {
	   register_post_type('blog', array(
	    'supports' => array('title', 'editor', 'thumbnail'),
	    'public' => true,
	    'labels' => array(
	      'name' => 'Blog',
	      'add_new_item' => 'Add New photos',
	      'edit_item' => 'Edit photos',
	      'all_items' => 'All photos',
	      'singular_name' => 'blog'
	    ),
	    'menu_icon' => 'dashicons-welcome-learn-more',
	    'taxonomies'	=> array('category')
	  ));


	}
	add_action( 'init', 'custom_init_blog');

	// home news event
	function custom_init_event() {
	   register_post_type('event', array(
	    'supports' => array('title', 'editor', 'thumbnail'),
	    'public' => true,
	    'labels' => array(
	      'name' => 'New Event',
	      'add_new_item' => 'Add New photos',
	      'edit_item' => 'Edit photos',
	      'all_items' => 'All photos',
	      'singular_name' => 'event'
	    ),
	    'menu_icon' => 'dashicons-welcome-learn-more',
	    'taxonomies'	=> array('category')
	  ));


	}
	add_action( 'init', 'custom_init_event');

	// home daily update
	function custom_init_daily() {
	    register_post_type('daily', array(
	    'supports' => array('title', 'editor', 'custom-fields'),
	    'public' => true,
	    'labels' => array(
	      'name' => 'Daily Update',
	      'add_new_item' => 'Add New photos',
	      'edit_item' => 'Edit photos',
	      'all_items' => 'All photos',
	      'singular_name' => 'daily'
	    ),
	    'menu_icon' => 'dashicons-welcome-learn-more',
	    'taxonomies'	=> array('category')
	  ));
	}
	add_action( 'init', 'custom_init_daily');

 ?>