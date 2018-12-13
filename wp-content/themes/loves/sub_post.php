<?php

//Remove Posts from admin menu
function post_remove (){
   remove_menu_page('edit.php');
}
add_action('admin_menu', 'post_remove'); 

add_action('init', 'homeweavers_pro');
function homeweavers_pro() { 
    $labels = array(
        'name' =>_x('Posts', 'post type general name'),
        'singular_name' =>_x('Post', 'post type singular name'),
        'all_items'           => __( 'All Posts'),
        'add_new' =>_x('Add New', 'Post'),
        'add_new_item' =>__('Add New Post'),
        'edit_item' =>__('Edit Post'),
        'new_item' =>__('New Post'),
        'view_item' =>__('View Post'),
        'search_items' =>__('Search Post'),
        'not_found' =>__('Nothing found'),
        'not_found_in_trash' =>__('Nothing found in Trash'),
        'parent_item_colon' =>''
    );
    $args = array(
        'labels' =>$labels,
        'public' =>true,
        'publicly_queryable' =>true,
        'show_ui' =>true,
        'show_in_nav_menus'=>true,
        'query_var' =>true,
        'menu_icon' =>'dashicons-admin-post',
        'rewrite' => array( 'slug' => '', 'with_front' => false ),
        'capability_type' =>'post',
        'hierarchical' =>true,
        'menu_position' =>'',
        'supports' =>array('title','editor','thumbnail','excerpt'),
        'has_archive' =>true,
        'taxonomies' => array('post_tag','category'),
         'menu_position'=>4,

      ); 
    register_post_type('project',$args );
     flush_rewrite_rules();
}







// sub tabs children
add_action('admin_menu','remove_tabs_admin_menu');
 function remove_tabs_admin_menu() { remove_meta_box('pageparentdiv', 'spg_children', 'normal');}
add_action('add_meta_boxes','add_tabs_meta');
 function add_tabs_meta() { add_meta_box('tabs_children-parent', 'Parent Sub Post', 'tabs_children_attributes_meta_box', 'tabs_children', 'side', 'high');}





function tabs_children_attributes_meta_box($post) {
    $post_type_object = get_post_type_object($post->post_type);
    if ( $post_type_object->hierarchical ) {
      if ($post->post_parent == 0)
        $parent = $_GET['project'];
      else
        $parent = $post->post_parent;
      $pages = wp_dropdown_pages(array('post_type' => 'project', 'selected' => $parent, 'name' => 'parent_id', 'show_option_none' => __('(Select One)'), 'sort_column'=> 'menu_order, post_title', 'echo' => 0));
      if ( ! empty($pages) ) {
        echo $pages;
      }
    }
    echo '<p><a href="post.php?post='.$parent.'&action=edit">Go Back</a>'."\n";
 }

 
// Setup the children custom post type
function post_type_tabs_children() {
  $labels   = array('name' => __('Sub Post'), 
            'singular_name' => __('Sub Post'), 
            'add_new_item' => __('Add New Sub Post'), 
            'edit_item' => __('Edit Sub Post'), 
            'parent_item_colon' => __('Parent'));

  $supports = array('title','thumbnail','editor','excerpt','page-attributes');

  $args     = array('labels' => $labels,
   'public' => true, 
   'hierarchical' => true,
     'supports' => $supports,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'show_in_menu' => 'edit.php?post_type=project',
        'capability_type' => 'page'


      );
    register_post_type('tabs_children', $args);

}
  
add_action('init', 'post_type_tabs_children');


// Remove the children menu item as it will be managed under the parent item.
// function remove_tabs_children_menu() {
//   remove_menu_page('edit.php?post_type=tabs_children');
// }
// add_action('admin_menu', 'remove_tabs_children_menu');



// Add meta box to display children items in parent
add_action("admin_init", "add_tabs_parents_meta_boxes");
 
function add_tabs_parents_meta_boxes(){
  add_meta_box("tabs_children-meta", "Sub Posts", "tabs_children_meta", "project", "normal", "high");
}





function tabs_children_meta() {
 

  global $post;
  if (get_post_status($post->ID) == 'publish')
    echo '<p><a style="color:green;"href="post-new.php?post_type=tabs_children&project='. $post->ID .'">Add New</a>'."\n";
  $my_wp_query = new WP_Query();
  $all_wp_children = $my_wp_query->query(array('post_type' => 'tabs_children',
                                              'order' => 'ASC',
                                              'orderby' => 'menu_order',
                                              'posts_per_page' => 1000

                                                
                                                
                              ));
  $children = get_page_children($post->ID, $all_wp_children);

 $i=1;

 echo '<ul id="sortable">';
 echo '<li>';
  foreach ($children as $child)
      {
        


        echo '<li id='.$child->ID.'><code class="hndle" style="margin-right:10px;" >'. "Order :    " . $i . '</code>
        <a href="post.php?post='. $child->ID .'&action=edit">'. $child->post_title .'</a></li>';
        
    
      $i++;
  }
  echo '</ul>';
  ?>


 <script type="text/javascript">
 var getUrlParameter = function getUrlParameter(sParam) 
        {
            var sPageURL = decodeURIComponent(window.location.search.substring(1)),
                sURLVariables = sPageURL.split('&'),
                sParameterName,
                i;

            for (i = 0; i < sURLVariables.length; i++) {
                sParameterName = sURLVariables[i].split('=');

                if (sParameterName[0] === sParam) {
                    return sParameterName[1] === undefined ? true : sParameterName[1];
                }
            }
        };


    jQuery(document).ready(function($) {     
    var resourceSort = $('#sortable');

    resourceSort.sortable({
                                                        'items': 'li',
                                                        'axis': 'y',
                                                        'update' : function(e, ui) {
                                                           
                                                            var post_type           =   jQuery('input[name="post_type"]').val();
                                                            var order               =   jQuery('#sortable').sortable('serialize');
                                                            
                                                            
                                                            var paged       =   getUrlParameter('paged');
                                                            if(typeof paged === 'undefined')
                                                                paged   =   1;
                                                            
                                                            var queryString = { "action": "update-custom-type-order-archive", "post_type" : post_type, "order" : order ,"paged": paged, "archive_sort_nonce"    :   CPTO.archive_sort_nonce};
                                                            //send the data through ajax
                                                            jQuery.ajax({
                                                              type: 'POST',
                                                              url: ajaxurl,
                                                              data: queryString,
                                                              cache: false,
                                                              dataType: "html",
                                                              success: function(data){
                                                
                                                              },
                                                              error: function(html){

                                                                  }
                                                            });
                                                        
                                                        }
       
    }); 
});
        </script>

        <?php




}
 



// Delete all children when the parent is deleted
add_action('delete_post', 'delete_tabs_children_when_parent_deleted');
function delete_tabs_children_when_parent_deleted($post_id) {
  $post = get_post($post_id);
  if ($post->post_type == 'project') {
    $my_wp_query = new WP_Query();
    $all_wp_children = $my_wp_query->query(array('post_type' => 'tabs_children'));
    $children = get_page_children($post->ID, $all_wp_children);
    foreach($children as $child) {
      wp_delete_post($child->ID);
    }
  }
}



function locate_plugin_template_tabs($template_names, $load = false, $require_once = true )
{
    if ( !is_array($template_names) )
        return '';
    
    $located = '';
    
    $this_plugin_dir = WP_PLUGIN_DIR.'/'.str_replace( basename( __FILE__), "", plugin_basename(__FILE__) );
    
    foreach ( $template_names as $template_name ) {
        if ( !$template_name )
            continue;
        if ( file_exists(STYLESHEETPATH . '/' . $template_name)) {
            $located = STYLESHEETPATH . '/' . $template_name;
            break;
        } else if ( file_exists(TEMPLATEPATH . '/' . $template_name) ) {
            $located = TEMPLATEPATH . '/' . $template_name;
            break;
        } else if ( file_exists( $this_plugin_dir .  $template_name) ) {
            $located =  $this_plugin_dir . $template_name;
            break;
        }
    }
    
    if ( $load && '' != $located )
        load_template( $located, $require_once );
    
    return $located;
}

add_filter( 'single_template', 'get_custom_single_template_tabs' );
function get_custom_single_template_tabs($template)
{
    global $wp_query;
    $object = $wp_query->get_queried_object();
    
    if ( 'project' == $object->post_type ) {
        $templates = array('single-' . $object->post_type . '.php', 'single.php');
        $template = locate_plugin_template_tabs($templates);
    }
    // return apply_filters('single_template', $template);
    return $template;
}

function tabs_activation() {
  flush_rewrite_rules( false );
}

register_activation_hook(__FILE__, 'tabs_activation');



// Creating the widget 
class subpost_widget extends WP_Widget {

function __construct() {
parent::__construct('subpost_widget',__('Display Latest Projects', 'subpost_widget_domain'), array( 'description' => __( 'This widget Display created projects', 'subpost_widget_domain' ), ) 
);
}

// widget form creation
function form($instance) {

// Check values
if( $instance) {
     $title = esc_attr($instance['title']);
     $count = esc_attr($instance['count']);
} else {
     $title = __( 'Latest Projects', 'subpost_widget_domain' );
     $count = 0;
}
?>

<p>
<label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title', 'subpost_widget'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>

<p>
<label for="<?php echo $this->get_field_id('count'); ?>"><?php _e('No of Projects to display:', 'subpost_widget'); ?></label>
<input class="widefat" id="<?php echo $this->get_field_id('count'); ?>" name="<?php echo $this->get_field_name('count'); ?>" type="text" value="<?php echo $count; ?>" />
</p>


<?php
}

// update widget
function update($new_instance, $old_instance) {
      $instance = $old_instance;
      // Fields
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['count'] = strip_tags($new_instance['count']);
     return $instance;
}

// display widget
function widget($args, $instance) {
    // these are the widget options
    $title = apply_filters('widget_title', $instance['title']);
    $count = $instance['count'];
    
    
    $title = apply_filters( 'widget_title', $instance['title'] );
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
    echo $args['before_title'] . $title . $args['after_title'];
    echo '<ul>';
    
    project_wp_list_pages(array('title_li'=>'','depth'=>1,'post_type'=>'project','sort_column'=>'post_date','sort_order'=>'DESC'),$count);
    echo '</ul>';
    // This is where you run the code and display the output
    echo $args['after_widget'];

}

}

// Register and load the widget
function wpb_load_widget() {
    register_widget( 'subpost_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );

function project_wp_list_pages($args = '',$limit=10) {
    if ( is_array($args) )
        $r = &$args;
    else
        parse_str($args, $r);

    $defaults = array('depth' => 0, 'show_date' => '', 'date_format' => get_option('date_format'),
        'child_of' => 0, 'exclude' => '', 'title_li' => __('Pages'), 'echo' => 1, 'authors' => '');
    $r = array_merge($defaults, $r);

    $output = '';
    $current_page = 0;

    // sanitize, mostly to keep spaces out
    $r['exclude'] = preg_replace('[^0-9,]', '', $r['exclude']);

    // Allow plugins to filter an array of excluded pages
    $r['exclude'] = implode(',', apply_filters('wp_list_pages_excludes', explode(',', $r['exclude'])));

    // Query pages.
    $pages = get_pages($r);

    $p2 = array_chunk($pages, $limit);

    $pages = $p2[0];

    if ( !empty($pages) ) {
        if ( $r['title_li'] )
            $output .= '<li class="pagenav">' . $r['title_li'] . '<ul>';

        global $wp_query;
        if ( is_page() )
            $current_page = $wp_query->get_queried_object_id();
        $output .= walk_page_tree($pages, $r['depth'], $current_page, $r);

        if ( $r['title_li'] )
            $output .= '</ul></li>';
    }

    $output = apply_filters('wp_list_pages', $output);

    if ( $r['echo'] )
        echo $output;
    else
        return $output;
}


// page template
class custom_post_type_page_template {

    function custom_post_type_page_template() {
        add_action( 'init', array(&$this, 'custom_post_type_page_template_init') );
        add_action( 'admin_init', array(&$this, 'custom_post_type_page_template_admin_init') );
        add_action( 'admin_menu', array(&$this, 'custom_post_type_page_template_admin_menu') );
        add_action( 'save_post', array(&$this, 'custom_post_type_page_template_save_post') );
        add_filter( 'template_include', array(&$this, 'custom_post_type_page_template_template_include') );     
        add_action( 'template_redirect', array(&$this, 'custom_post_type_page_template_template_redirect') );       
        add_filter( 'body_class', array(&$this, 'custom_post_type_page_template_body_classes') );
    }

    function custom_post_type_page_template_init() {
        if ( function_exists('load_plugin_textdomain') ) {
            if ( !defined('WP_PLUGIN_DIR') ) {
                load_plugin_textdomain( 'custom-post-type-page-template', str_replace( ABSPATH, '', dirname(__FILE__) ) );
            } else {
                load_plugin_textdomain( 'custom-post-type-page-template', false, dirname( plugin_basename(__FILE__) ) );
            }
        }
    }

    function custom_post_type_page_template_admin_init() {
        $options = get_option('custom_post_type_page_template');
        if ( !empty($options['post_types']) && is_array($options['post_types']) ) :
            foreach( $options['post_types'] as $post_type ) :
                add_meta_box( 'pagetemplatediv', __('Page Template', 'custom-post-type-page-template'), array(&$this, 'custom_post_type_page_template_meta_box'), $post_type, 'side', 'core');
            endforeach;
        endif;
    }

    function custom_post_type_page_template_admin_menu() {
        add_options_page( __('Custom Post Type Page Template', 'custom-post-type-page-template'), __('Custom Post Type Page Template', 'custom-post-type-page-template'), 'manage_options', basename(__FILE__), array(&$this, 'custom_post_type_page_template_options_page') );
    }

    function custom_post_type_page_template_meta_box($post) {
        $template = get_post_meta($post->ID, '_wp_page_template', true);
?>
<label class="screen-reader-text" for="page_template"><?php _e('Page Template', 'custom-post-type-page-template') ?></label><select name="page_template" id="page_template">
<option value='default'><?php _e('Default Template', 'custom-post-type-page-template'); ?></option>
<?php page_template_dropdown($template); ?>
</select>
<?php
    }

    function custom_post_type_page_template_save_post( $post_id ) {
        if ( !empty($_POST['page_template']) ) :
            if ( $_POST['page_template'] != 'default' ) :
                update_post_meta($post_id, '_wp_page_template', $_POST['page_template']);
            else :
                delete_post_meta($post_id, '_wp_page_template');
            endif;
        endif;
    }

    function custom_post_type_page_template_template_include($template) {
        global $wp_query, $post;

        if ( is_singular() && !is_page() ) :
            $id = get_queried_object_id();
            $new_template = get_post_meta( $id, '_wp_page_template', true );
            if ( $new_template && file_exists(get_query_template( 'page', $new_template )) ) :
                $wp_query->is_page = 1;
                $templates[] = $new_template;
                return get_query_template( 'page', $templates );
            endif;
        endif;
        return $template;
    }
    
    function custom_post_type_page_template_template_redirect() {
        $options = get_option('custom_post_type_page_template');
        if ( empty($options['enforcement_mode']) ) return;

        global $wp_query;
        
        if ( is_singular() && !is_page() ) :
            wp_cache_delete($wp_query->post->ID, 'posts');
            $GLOBALS['post']->post_type = 'page';
            wp_cache_add($wp_query->post->ID, $GLOBALS['post'], 'posts');
        endif;
    }

    function custom_post_type_page_template_body_classes( $classes ) {
        if ( is_singular() && is_page_template() ) :
            $classes[] = 'page-template';
            $classes[] = 'page-template-' . sanitize_html_class( str_replace( '.', '-', get_page_template_slug( get_queried_object_id() ) ) );          
        endif;
        return $classes;
    }

    function custom_post_type_page_template_options_page() {
        $options = get_option('custom_post_type_page_template');

        if ( !empty($_POST) ) :
            if ( !empty($_POST['enforcement_mode']) ) $options['enforcement_mode'] = 1;
            else unset($options['enforcement_mode']);
            if ( empty($_POST['post_types']) ) :
                delete_option('custom_post_type_page_template', $options);
                unset($options['post_types']);
            else :
                $options['post_types'] = $_POST['post_types'];
                update_option('custom_post_type_page_template', $options);
            endif;
        endif;
?>
<div class="wrap">
<div id="icon-plugins" class="icon32"><br/></div>
<h2><?php _e('Custom Post Type Page Template', 'custom-post-type-page-template'); ?></h2>

<?php
        if ( !empty($_GET['settings-updated']) ) :
?>
<div id="message" class="updated"><p><strong><?php _e( 'Settings saved.', 'custom-post-type-page-template' ); ?></strong></p></div>
<?php
        endif;
?>

<form action="?page=functions.php&settings-updated=true" method="post">
<table class="form-table">
<tbody>
<tr>
<th><label for="post_types"><?php _e('Custom Post Types', 'custom-post-type-page-template'); ?></label></th>
<td>
<?php
    $post_types = get_post_types(array('public'=>true));
    foreach( $post_types as $key => $val ) :
        if ( $key == 'attachment' || $key == 'page' ) continue;
?>
<label><input type="checkbox" name="post_types[]" value="<?php echo $key; ?>"<?php if ( is_array($options['post_types']) && in_array($key, $options['post_types'])) echo ' checked="checked"'; ?> /> <?php echo $key; ?></label><br />
<?php
    endforeach;
?>
</p>
</td>
</tr>
<tr>
<th><label for="enforcement_mode"><?php _e('Enforcement Mode', 'custom-post-type-page-template'); ?></label></th>
<td><label><input type="checkbox" name="enforcement_mode" id="enforcement_mode" value="1" <?php if ( !empty($options['enforcement_mode']) ) echo ' checked="checked"'; ?> /> <?php _e('Check this in case of using  themes like Twenty Eleven, Twenty Twelve, etc.', 'custom-post-type-page-template'); ?></label></td>
</tr>
</tbody>
</table>
<p class="submit"><input type="submit" value="<?php _e('Save Changes', 'custom-post-type-page-template'); ?>" class="button-primary" id="submit" name="submit"></p>
</form>
<?php
    }
}
global $custom_post_type_page_template;
$custom_post_type_page_template = new custom_post_type_page_template();


// Category for page taxomy
function page_custom_taxonomies(){

    $labels=array(
        'name'=>'Pages',
        'singular_name'=>'Page',
        'search_items'=>'Search Pages',
        'all_items'=>'All Pages',
        'parent_item'=>'Parent Pages',
        'parent_item_colon'=>'Parent Pages:',
        'edit_item'=>'Edit Pages',
        'update_item'=>'Update Pages',
        'add_new_item'=>'Add New Pages',
        'new_item_name'=>'New Pages Name',
        'menu_name'=>'page category'
    );
    $args=array(
        'hierarchical'=>true,
        'labels'=>$labels,
        'show_ui'=>true,
        'show_admin_column'=>true,
        'query_var'=>true,
        'rewrite'=>array('slug'=>'page-name')
    );
    register_taxonomy('page-name',array('project','title'),$args);

}
add_action('init','page_custom_taxonomies');



?>