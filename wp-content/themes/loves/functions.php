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

 ?>