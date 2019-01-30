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
	//add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);

	// function special_nav_class ($classes, $item) {
	//     if (in_array('current-menu-item', $classes) ){
	//         $classes[] = 'active ';
	//     }
	//     return $classes;
	// }

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


	// home entertainment
	function custom_init_entertain() {
	   register_post_type('entertain', array(
	    'supports' => array('title', 'editor', 'thumbnail'),
	    'public' => true,
	    'rewrite' => array('slug' => 'entertain'),
	    'has_archive' => true,
	    'labels' => array(
	      'name' => 'Entertainment',
	      'add_new_item' => 'Add New Entertain',
	      'edit_item' => 'Edit entertain',
	      'all_items' => 'All entertain',
	      'singular_name' => 'post'
	    ),
	    'menu_icon' => 'dashicons-welcome-learn-more',
	    'taxonomies'	=> array('category')
	  ));


	}
	add_action( 'init', 'custom_init_entertain');

	// home blog
	function custom_init_computer() {
	   register_post_type('computer', array(
	    'supports' => array('title', 'editor', 'thumbnail'),
	    'public' => true,
	    'labels' => array(
	      'name' => 'Computer S',
	      'add_new_item' => 'Add New Computer S',
	      'edit_item' => 'Edit computer s',
	      'all_items' => 'All computer s',
	      'singular_name' => 'post'
	    ),
	    'menu_icon' => 'dashicons-welcome-learn-more',
	    'taxonomies'	=> array('category')
	  ));


	}
	add_action( 'init', 'custom_init_computer');

	// side bar title
	function custom_init_menu() {
	   register_post_type('menu', array(
	    'supports' => array('title', 'editor', 'thumbnail'),
	    'public' => true,
	    'rewrite' => array('slug' => 'menu'),
	    'has_archive' => true,
	    'labels' => array(
	      'name' => 'Menu',
	      'add_new_item' => 'Add New Menu',
	      'edit_item' => 'Edit menu',
	      'all_items' => 'All menu',
	      'singular_name' => 'post'
	    ),
	    'menu_icon' => 'dashicons-welcome-learn-more',
	    'taxonomies'	=> array('category')
	  ));


	}
	add_action( 'init', 'custom_init_menu');

	// home subject
	function custom_init_studentDocs() {
	   register_post_type('studentDocs', array(
	    'supports' => array('title', 'editor', 'thumbnail'),
	    'rewrite' => array('slug' => 'studentDocs'),
	    'has_archive' => true,
	    'public' => true,
	    'labels' => array(
	      'name' => 'New studentDocs',
	      'add_new_item' => 'Add New student Docs',
	      'edit_item' => 'Edit studentDocs',
	      'all_items' => 'All studentDocs',
	      'singular_name' => 'post'
	    ),
	    'menu_icon' => 'dashicons-welcome-learn-more',
	     'taxonomies'	=> array('category')
	  ));


	}
	add_action( 'init', 'custom_init_studentDocs');


	/* Returns a "Continue Reading" link for excerpts, with 'nofollow' set */
function your_theme_continue_reading_link() {
    return ' <a href="'. get_permalink() . '" rel="nofollow">' .
        '<span class="meta-nav">&rarr;</span> Continue reading</a>';
}
/* Replaces "[...]" (appended to automatically generated excerpts) */
function your_theme_auto_excerpt_more( $more ) {
    return ' &hellip;' . your_theme_continue_reading_link();
}
add_filter( 'excerpt_more', 'your_theme_auto_excerpt_more' );


	/*copyright*/
        function copyright_add_admin_page(){
                add_menu_page('Copyright Theme Options','Copyright','manage_options','copyright_options','theme_create_box','dashicons-rss',40);
                add_action('admin_init','custom_box_setting');
        }
        add_action('admin_menu','copyright_add_admin_page');

        function custom_box_setting(){
                register_setting('setting_group','copy_right');
                add_settings_section('copyright_section','Copyright Option','customize_information','copyright_options');
                add_settings_field('copyright-footer','copyright footer','frm_input','copyright_options','copyright_section');
        }
        function customize_information(){
                echo'customize your copyright information';
        }
        function frm_input(){
                $copyright=esc_attr(get_option('copy_right'));    
                echo '<input type="text" name="copy_right" value="'.$copyright.'" placeholder="input type copyright"/>';
        }
        function theme_create_box(){
                // require_once(get_template_directory().'/copyright.php');
                ?>
                <h1>Copyright Theme Options</h1>
                <?php settings_errors();?>
                <form action="options.php" method="post">
                        <?php settings_fields('setting_group');?>        
                        <?php do_settings_sections('copyright_options');?>        
                        <?php submit_button();?>        
                </form>
                <?php
        }

	// post category only
    function custom_taxonomy_about() {

        
	    register_taxonomy(
	        'about',
	        'post',
	        array(
	            'label' => __( 'About' ),
	            'rewrite' => array( 'slug' => 'about' ),
	            'hierarchical' => true,
	        )
	    );
	}
	add_action( 'init', 'custom_taxonomy_about' );


	


    // include sub post
	require_once "sub_post.php";

	function wpb_widgets_init() {

    register_sidebar( array(
        'name'          => 'Custom Header Widget Area',
        'id'            => 'custom-header-widget',
        'before_widget' => '<div class="tesing widget %2$s" id="%1$s">',
        'after_widget' => '</div>',
    ) );

}
add_action( 'widgets_init', 'wpb_widgets_init' );


 ?>