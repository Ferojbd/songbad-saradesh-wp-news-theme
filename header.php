<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>
       <?php      
        if (is_home()) { 
            bloginfo('name'); echo ' | '; bloginfo('description'); 
          } else { 
             wp_title(); 
          }
        ?> 
    </title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Developed By" content="riptware.com" />
    <meta name="robots" content="ALL" />
    <meta name="robots" content="index, follow" />
    <meta name="googlebot" content="index, follow" />
    <meta http-equiv="refresh" content="1200" /><!-- <link rel="icon" type="image/png" href="/fav.png" /> -->
    <link rel="shortcut icon" href="<?php  $options= get_option ('my_framework'); echo $options['upload-favicon']['url'] ;?>" type="image/x-icon" />
    <link type="text/css" href="<?php echo get_template_directory_uri(); ?>/templates/riptware-v1/css/bootstrap7c60.css?v=1.0.14" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/templates/riptware-v1/css/style7c60.css?v=1.0.14" />
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/style.css" />
    <script src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery-1.11.1.min.js"></script>
    <script async src="<?php echo get_template_directory_uri(); ?>/templates/riptware-v1/js/bootstrap.js"></script>
   
    <script type="text/javascript">
    $("#back-top").hide();
    $(function() {
        $(window).scroll(function() { if ($(this).scrollTop() > 150) { $('#back-top').fadeIn(); } else { $('#back-top').fadeOut(); } });
        $('#back-top a').click(function() { $('body,html').animate({ scrollTop: 0 }, 'fast'); return false; });
    });

    $(document).ready(function() {

        var navpos = $('.header-inner').offset();
        var wrapper_width = $('.top_header').innerWidth();

        $(window).bind('scroll', function() {
            if ($(window).scrollTop() > navpos.top) {
                $('.header-inner').css({ 'position': 'fixed', 'width': wrapper_width + 'px', 'top': '0px', 'z-index': '99999', 'background': '#fff' });
                $('.header').css({ 'border-bottom': 'none', 'box-shadow': '0 4px 3px -3px black' });
                if ($('.megaMenuWrapper').css('display') == 'block') {
                    $('.megaMenuWrapper').slideUp('fast');
                    $('div.menu_category').show();
                    icon = $('.others_menu ul li span#all_menu').find("i");
                    icon.removeClass('fa-times');
                    icon.addClass('fa-bars');
                }
            } else {
                $('.header-inner').css({ 'position': 'relative', 'width': '100%' });
                $('.header').css({ 'border-bottom': '2px solid steelblue', 'box-shadow': 'none' });
            }

        });
    });


    //}
    </script><!-- Global site tag (gtag.js) - Google Analytics -->
<?php wp_head();?>
</head>

<body>
    <?php    
      global $options; 
      $options= get_option ('my_framework');
    ?>
    <div class="container">
        <div class="top_header hidden-print">
            <div class="wrapper">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-7">
                        <ul class="list-inline datetime">
                            <li>
                                <?php $todaydate = date(' D , j F Y '); echo bn2enSomeCommonString($todaydate)?> , 
                                <?php  echo bnMonthdate(); ?>&nbsp;&nbsp;|&nbsp;&nbsp;
                                <span> <?php echo bn2enSomeCommonString(cusopenWeather());?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-5">
                        <ul class="list-inline datetime">
                           
                        </ul>
                        <div id="social">
                            <a class="facebookBtn" target="_blank" href="<?php echo $options['fb-link'];?>"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                            <a class="twitterBtn" target="_blank" href="<?php echo $options['twitter-link'];?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                            <a class="youtubeBtn" target="_blank" href="<?php echo $options['yt-link'];?>"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="header-inner">
                <div class="header">
                    <div class="search_box">
                        <div class="input-group input-group-lg srch_form">
                            <input type="text" name="s" class="form-control srch_keyword" placeholder="সার্চ করুন..." value="" />
                            <span class="input-group-addon btn-primary"><i class="fa fa-search srch_btn"></i></span>
                            <span class="input-group-addon cross_btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                        </div>
                    </div>
                    <div class="header_wrapper">
                        <div class="header_left">
                            <a href="<?php bloginfo('url');?>"><img src="<?php echo $options['upload-logo']['url'];?>" class="img-responsive"></a>
                        </div>
                        <div class="header_right hidden-print">
                            <div class="menu_category">
                             <?php
                                wp_nav_menu( array(
                                    'theme_location'  => 'primary',
                                    'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
                                    'container'       => 'ul',
                                    'container_class' => ' ',
                                    'container_id'    => ' ',
                                    'menu_class'      => ' ',
                                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                    //'walker'          => new WP_Bootstrap_Navwalker(),
                                ) );
                                ?>
                            </div>
                            <div class="others_menu">
                                <ul>
                                    <li><span id="all_menu"><i class="fa fa-bars" aria-hidden="true"></i></span></li>
                                    <li><span id="search_btn"><i class="fa fa-search" aria-hidden="true"></i></span></li>
                                </ul>
                            </div>
                            <div style="clear:both"></div>
                        </div>
                    </div>
                    <div class="megaMenuWrapper">
                        <div class="wrapper">
                            <div class="megaMenu">
                                <ul>
                                    <?php
                                        wp_nav_menu( array(
                                            'theme_location'  => 'secondary',
                                            'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
                                            'container'       => 'ul',
                                            'container_class' => ' ',
                                            'container_id'    => ' ',
                                            'menu_class'      => ' ',
                                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                            //'walker'          => new WP_Bootstrap_Navwalker(),
                                        ) );
                                    ?>
                                </ul>
                            </div>
							<div class="megaMenuBtm">
							  <ul>
								  <?php
                                        wp_nav_menu( array(
                                            'theme_location'  => 'secondary_bottom',
                                            'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
                                            'container'       => 'ul',
                                            'container_class' => ' ',
                                            'container_id'    => ' ',
                                            'menu_class'      => ' ',
                                            'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                            //'walker'          => new WP_Bootstrap_Navwalker(),
                                        ) );
                                    ?>						  
							  </ul>
						  </div>
						  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
        $(document).ready(function() {

            $('#search_btn').click(function() {
                $('div.header_wrapper').hide();
                $('div.search_box').show();
            });
            $('.cross_btn').click(function() {
                $('div.header_wrapper').show();
                $('div.search_box').hide();
            });
            $('#all_menu').click(function() {
                $('div.menu_category').toggle();

                icon = $(this).find("i");
                if ($(icon).hasClass("fa-times")) {
                    icon.addClass('fa-bars');
                    icon.removeClass('fa-times');
                } else {
                    icon.removeClass('fa-bars');
                    icon.addClass('fa-times');
                }

                if ($('.megaMenuWrapper').css('display') == 'none')
                    $('.megaMenuWrapper').slideDown('fast');
                else
                    $('.megaMenuWrapper').slideUp('fast');

            });
        });

        function google_search(srchInputElm) {
            var keyword = srchInputElm.val().trim().toLowerCase().replace(/\s/g, '+');
            if (keyword == '') { srchInputElm.css({ 'background': '#FF9', 'color': '#444' }).focus() } else { var URL = '<?php bloginfo('url');?>/?s=' + keyword;
                window.location.href = URL; }
        }

        //if($('.srch_keyword').is(':visible')){
        $('.srch_btn').click(function() {

            google_search($('.srch_keyword'));
        });
        $('.srch_keyword').keypress(function(e) {

            var p = e.which;

            if (p == 13) google_search($(this));
        });
        </script>
        <div class="m-b-15"></div>
        <div class="wrapper">

        <?php include_once get_template_directory(). '/inc/headlines.php';?>
        <div class="clr"></div>