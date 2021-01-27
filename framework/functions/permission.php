<?php
/* OPTION CREATED BY NOUSHAD NIPUN*/
//Change Title WP Login
function custom_login_title( $login_title ) {
return str_replace(array( ' &lsaquo;', ' &#8212; WordPress'), array( ' &bull;', ' Admin Panel'),$login_title );
}
add_filter( 'login_title', 'custom_login_title' );

//Change Title WP Admin
function custom_admin_title( $login_title ) {
return str_replace(array( ' &lsaquo;', ' &#8212; WordPress'), array( ' &bull;', ' Admin Panel'),$login_title );
}
add_filter( 'admin_title', 'custom_admin_title' );

//login logo change

function my_login_logo() { ?>
    <style type="text/css">
	    body, html {
            x-background: #83c37391 !important;
        }
        #login h1 a, .login h1 a {
          background-image: url(<?php echo get_template_directory_uri()?>/assets/images/brand.png);
      		height:65px;
      		width:320px;
      		background-size: 320px 65px;
      		background-repeat: no-repeat;
        	padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

add_filter( 'login_headerurl', 'custom_loginlogo_url' );
function custom_loginlogo_url($url) {
    return 'http://riptware.com';
}
function my_url_login_hover(){
     return 'Powered By riptware IT';
}
add_filter('login_headertitle', 'my_url_login_hover');

// hide admin bar	
	
function my_function_admin_bar(){ return false; }
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

// remove unnecessary
function remove_menus(){
  
  //remove_menu_page( 'index.php' );                  //Dashboard
  remove_submenu_page( 'index.php', 'update-core.php' );
  remove_menu_page( 'themes.php' );                  //Appereance
  remove_menu_page( 'plugins.php' );                  //plugins
  //remove_menu_page( 'edit.php' );                   //Posts
  remove_menu_page( 'edit-comments.php' );          //Comments
  remove_menu_page( 'tools.php' );                  //Tools
  //remove_menu_page( 'upload.php' );                 //Media
 
  

  $page = remove_submenu_page( 'themes.php', 'customize.php?return=%2Fwpngo%2Fwp-admin%2Fthemes.php' );  // Customize
  $page = remove_submenu_page( 'options-general.php', 'options-discussion.php' );  //Discussion
  //$page = remove_submenu_page( 'options-general.php', 'options-media.php' );  // Sub Media
  $page = remove_submenu_page( 'options-general.php', 'options-writing.php' );  // Sub Writing
  $page = remove_submenu_page( 'options-general.php', 'privacy.php' );  // Sub Writing
  
  
   remove_action('admin_menu', '_add_themes_utility_last', 101);  //theme editor
   remove_submenu_page( 'plugins.php','plugin-editor.php' );

     // Move Menu widget from apperance
     global $submenu;
     unset($submenu['themes.php'][10]); // Removes Menu   
     add_menu_page(__('Menu', 'mav-menus'), __('Navigation', 'nav-menus'), 'edit_themes', 'nav-menus.php', '', '', 20);
     
     global $widgetu;
     unset($submenu['themes.php'][7]); // Remove widget  
     add_menu_page(__('Widget', 'widget'), __('Sidebar', 'widget'), 'edit_themes', 'widgets.php', '', '', 25);



}

add_action( 'admin_menu', 'remove_menus' );

// Change Post Label

function revcon_change_post_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'Blog';
    $submenu['edit.php'][5][0] = 'Blog';
    $submenu['edit.php'][10][0] = 'Add New Blog Post';
    $submenu['edit.php'][16][0] = 'Blog Tags';
}
function revcon_change_post_object() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Blogs';
    $labels->singular_name = 'Blogs';
    $labels->add_new = 'Add New Blog Post';
    $labels->add_new_item = 'Add Blog Post';
    $labels->edit_item = 'Edit Blog Post';
    $labels->new_item = 'Blog Post';
    $labels->view_item = 'View Blog Post';
    $labels->search_items = 'Search Blog';
    $labels->not_found = 'No Blog Post found';
    $labels->not_found_in_trash = 'No Blog Post found in Trash';
    $labels->all_items = 'All Blog Post';
    $labels->menu_name = 'Blog';
    $labels->name_admin_bar = 'Blog';
}
 
add_action( 'admin_menu', 'revcon_change_post_label' );
add_action( 'init', 'revcon_change_post_object' );



// Create the function to use in the action hook
function wpexplorer_remove_dashboard_widget () {
  remove_meta_box ( 'dashboard_quick_press', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_plugins', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_secondary', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_recent_drafts', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_right_now', 'dashboard', 'normal' );
	remove_meta_box( 'dashboard_activity', 'dashboard', 'normal');
	remove_meta_box( 'dashboard_welcome', 'dashboard', 'normal');
	remove_action( 'welcome_panel', 'wp_welcome_panel' );     
}
add_action ('wp_dashboard_setup', 'wpexplorer_remove_dashboard_widget');

function wpexplorer_add_dashboard_widgets() {
	wp_add_dashboard_widget(
		'wpexplorer_dashboard_widget', // Widget slug.
		get_bloginfo('name'), // Title.
		'wpexplorer_dashboard_widget_function' // Display function.
	);
}
add_action( 'wp_dashboard_setup', 'wpexplorer_add_dashboard_widgets' );

function wpexplorer_dashboard_widget_function() {
	echo "Welcome To " . home_url();
}

// replace WP Howdy 
function replace_howdy( $wp_admin_bar ) {
    $my_account=$wp_admin_bar->get_node('my-account');
    $newtitle = str_replace( 'Howdy,', 'Logged in as', $my_account->title );            
    $wp_admin_bar->add_node( array(
        'id' => 'my-account',
        'title' => $newtitle,
    ) );
}
add_filter( 'admin_bar_menu', 'replace_howdy',25 );


//Remove Admin ThemeMenu page
function remove_menu_pages() {
    remove_menu_page( 'blue_admin' );  // admin-theme
    remove_menu_page( 'wp-hide' );     // hide-wp
    remove_menu_page( 'wp_megamenu' );     // hide-wp-megamenu
    remove_menu_page( 'festi-cart-popup' );  // hide cart pop up
}
add_action( 'admin_init', 'remove_menu_pages' );



//Remove Top help tab
function mytheme_remove_help_tabs() {
    $screen = get_current_screen();
    $screen->remove_help_tabs();
}
add_action('admin_head', 'mytheme_remove_help_tabs');



//Remove WordPress menu from admin bar
function remove_wp_logo( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
	$wp_admin_bar->remove_node('updates');
}

add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );


function remove_version_info() {
     return '';
}
add_filter('the_generator', 'remove_version_info');

remove_action('wp_head', 'wp_generator');


//Disable all update

function remove_core_updates(){
    global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');


/** Plugin Name: Admin Footer Text Remover **/
add_filter( 'admin_footer_text', '__return_empty_string', 11 );
add_filter( 'update_footer',     '__return_empty_string', 11 );



//custom admin theme
require_once get_template_directory() . ('/assets/lib/admin-dashboard/index.php');


// Hide Plugin List
function hide_plugin_riptware() {
  global $wp_list_table;
  $hidearr = array('woocommerce/woocommerce.php' , 'wp-hide-security-enhancer/wp-hide.php', 'all-bd-mobile-payments-gateway/index.php', 'woocommerce-woocart-popup-lite/plugin.php', 'email-subscribers/email-subscribers.php', 'yith-essential-kit-for-woocommerce-1/init.php' , 'yith-woocommerce-compare/init.php' ,'yith-woocommerce-wishlist/init.php' );
  $myplugins = $wp_list_table->items;
  foreach ($myplugins as $key => $val) {
    if (in_array($key,$hidearr)) {
      unset($wp_list_table->items[$key]);
    }
  }
}
 
//add_filter('all_plugins', '__return_empty_array'); 
add_action('pre_current_active_plugins', 'hide_plugin_riptware');

//



?>