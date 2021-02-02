<?php

function aftertheme_default_functions() {
    
    // Add Title Tag   
    add_theme_support ('title-tag');
	
	//add_theme_support (title-tag);
	add_theme_support ('post-thumbnails');
    add_theme_support( 'html5', array( 'gallery', 'caption' ) );
		
	//excerpt
	function excerpt($limit){
		$content = preg_replace("/<img(.*?)>/si", "", get_the_content());
		//$post_content = explode(" " , get_the_content());
		$post_content = explode(" " , $content);
		$less_content = array_slice ($post_content, 0, $limit);
		echo implode (" ", $less_content);
	}	
	function tnews_custom_excerpt_length( $length ) {
    return 20;
    }
    add_filter( 'excerpt_length', 'tnews_custom_excerpt_length', 999 );
}
add_action('after_setup_theme' , 'aftertheme_default_functions');


//Load Nav Menu
register_nav_menus( array(
    'primary' => __( 'Primary Menu', '' ),
    'secondary' => __( 'Secondary Menu', '' ),
	'secondary_bottom' => __( 'Secondary Bottom Menu', '' ),
    'footer' => __( 'Footer Menu', '' ),
) );


//Load BD EN Number

function bn2enNumber($number)
{
    $search_array = ['১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', '-'];
    $replace_array = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '-'];
    $en_number = str_replace($replace_array, $search_array, $number);
    return $en_number;
}

function en2bnNumber($number)
{
    $search_array = ['১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', '-'];
    $replace_array = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '-'];
    $en_number = str_replace($replace_array, $search_array, $number);
    return $en_number;
}

function bn2enSomeCommonString($string)
{
    $search_array = ['Female', 'Male', 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December', 'pm', 'am', 'Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'min', 'mins','1', '2', '3', '4', '5', '6', '7', '8', '9', '0', '-','Views','View', '°C'];
    $replace_array = ['মহিলা', 'পুরুষ', 'জানুয়ারী', 'ফেব্রুয়ারি', 'মার্চ', 'এপ্রিল', 'মে', 'জুন', 'জুলাই', 'আগস্ট', 'সেপ্টেম্বর', 'অক্টোবর', 'নভেম্বর', 'ডিসেম্বর', 'পিএম', 'এএম', 'শনিবার', 'রোববার', 'সোমবার', 'মঙ্গলবার', 'বুধবার', 'বৃহস্পতিবার', 'শুক্রবার', 'মিনিট', 'মিনিট','১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০', '-','বার','বার', '°সে'];
    $en_number = str_replace($search_array, $replace_array, $string);
    return $en_number;
}
//Load Bangla Month
include get_template_directory(). '/func/bangla_month_date.php';

function bnMonthdate(){
    $bn_date = new BanglaDate( time() );
    $date = $bn_date->get_date();
    return $date[0].', '.$date[1].', '.$date[2];
}

//Load weather
function cusopenWeather(){
    $apiKey = "ca0f00f3cd925be7019622a43a985981";
    $cityId = "1185241"; //Dhaka
    $googleApiUrl = "http://api.openweathermap.org/data/2.5/weather?id=" . $cityId . "&units=metric&APPID=" . $apiKey;

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $response = curl_exec($ch);

    curl_close($ch);
    $data = json_decode($response);
    $currentTime = time();
    return $data->main->temp_max.'°C';
}

//Load framework
include_once get_template_directory(). '/framework/init.php';
include_once get_template_directory(). '/framework/options.php';

//Load Register Sidebar
include_once get_template_directory(). '/func/widget.php';



// //Store Post View Count into DB

//Load Most Viewed Counter Post

function nipun_set_post_views($postID) {
    $count_key = 'nipun_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

//To keep the count accurate, lets get rid of prefetching
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

//Show Post View
function nipun_get_post_views($postID){
    $count_key = 'nipun_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

//Load ajax archive 
require_once ("assets/lib/ajax-archive-calendar/ajax-archive-calendar.php");

//Load Prayer time plug
require_once ("assets/lib/muslim-prayer-time-bd/muslim-prayer-time.php");
require_once ("assets/lib/muslim-prayer-time-bd/admin-settings.php");

//Load paginition

include get_template_directory(). '/func/paginition.php';

//Latest News Link Build
function latest_news_template_redirect( ){
    if ($_SERVER['REQUEST_URI'] == '/news-latest') {
        global $wp_query;
        $wp_query->is_404 = false;
        status_header(200);
        include(dirname(__FILE__) . '/latest-news.php');
        exit();
    }
}
add_action( 'template_redirect', 'latest_news_template_redirect' );

//Popular News Link Build
function popular_news_template_redirect( ){
    if ($_SERVER['REQUEST_URI'] == '/news-popular') {
        global $wp_query;
        $wp_query->is_404 = false;
        status_header(200);
        include(dirname(__FILE__) . '/popular-news.php');
        exit();
    }
}
add_action( 'template_redirect', 'popular_news_template_redirect' );


require_once get_template_directory(). '/vendor/loader.php';