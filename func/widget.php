<?php

function tritiyo_sidebar(){	
	//Include Framewrk 
	global $options; 
	$options= get_option ('my_framework');
	$footerColumn = $options['footer-column'];
	
	register_sidebar(array(
	  'name' => 'Home sidebar',
	  'description' => 'Add your home Widgets',
	  'id' => 'home-widget',
	  'before_widget' => '<div class="m-b-15"></div><div class="widget mt-2 mb-2">',
	  'after_widget' => '</div></div>',
	  'before_title' => '<div class="cat_summary_title"><h4>',
	  'after_title' => '</h4></div><div class="fa-ul" style="margin-left: 0px;"><div class="widget-content">',	
	));	
	
	register_sidebar(array(
	  'name' => 'Mobile Home Middle sidebar',
	  'description' => 'Add your home Widgets',
	  'id' => 'mob_home_middle_widget',
	  'before_widget' => '<div class="m-b-15"></div><div class="widget mt-2 mb-2">',
	  'after_widget' => '</div></div>',
	  'before_title' => '<div class="cat_summary_title"><h4 style="border-left:3px solid #d41b5d; padding-left:10px">',
	  'after_title' => '</h4></div><div class="fa-ul" style="margin-left: 0px;"><div class="widget-content">',	
	));	

	register_sidebar(array(
	  'name' => 'Mobile Home Bottom sidebar',
	  'description' => 'Add your home Widgets',
	  'id' => 'mob_home_bottom_widget',
	  'before_widget' => '<div class="m-b-15"></div><div class="widget mt-2 mb-2">',
	  'after_widget' => '</div></div>',
	  'before_title' => '<div class="cat_summary_title"><h4 style="border-left:3px solid #d41b5d; padding-left:10px">',
	  'after_title' => '</h4></div><div class="fa-ul" style="margin-left: 0px;"><div class="widget-content">',	
	));	

	register_sidebar(array(
	  'name' => 'Single Page Sidebar',
	  'description' => 'Add your Single Page Widgets',
	  'id' => 'single-widget',
	  //'before_widget' => '<div class="mb-3"><div class="widget m-2">',
	  //'after_widget' => '</div></div>',
	  //'before_title' => '<h4 class="widget-title">',
	  //'after_title' =>  '</h4><div class="fa-ul" style="margin-left: 0px;"><div class="widget-content">',	
	  'before_widget' => '<div class="m-b-15"></div><div class="widget mt-2 mb-2">',
	  'after_widget' => '</div></div>',
	  'before_title' => '<div class="cat_summary_title"><h4>',
	  'after_title' => '</h4></div><div class="fa-ul" style="margin-left: 0px;"><div class="widget-content">',	
	));	
	/*
	register_sidebar(array(
	  'name' => 'Footer Widget',
	  'description' => 'Add your footer Widgets',
	  'id' => 'footer-widget',
	  'before_widget' => '<div class="col-md-'.$footerColumn.' col-sm-6 col-xs-12 mb-4"><div class="footer_item"><div class="flist-unstyled">',
	  'after_widget' => '</div></div></div>',
	  'before_title' => '<h4 class="footer_widget-title">',
	  'after_title' => '</h4>',	
	));	
	*/

}
add_action('widgets_init' , 'tritiyo_sidebar');


//Load Custom TabPost Widget
include get_template_directory(). '/func/widget-element/tabpost.php';

include get_template_directory(). '/func/widget-element/category-posts/cat-posts.php';

?>