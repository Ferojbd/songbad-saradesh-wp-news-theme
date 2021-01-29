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
    <link href="<?php echo get_template_directory_uri(); ?>/templates/mob-v1/css/bootstrap.css?v=<?php echo rand(0,999);?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_template_directory_uri(); ?>/templates/mob-v1/css/style.css?v=<?php echo rand(0,999);?>" rel="stylesheet" type="text/css" />
     <link href="<?php echo get_template_directory_uri(); ?>/assets/css/mobile.css?v=<?php echo rand(0,999);?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo get_template_directory_uri(); ?>/templates/mob-v1/css/jquery.bxslider.css?v=1.0.6" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/templates/mob-v1/js/jquery.js"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/templates/mob-v1/js/js_calender.js?time=1.0.6"></script>
	<script src="<?php echo get_template_directory_uri(); ?>/templates/mob-v1/js/jquery.bxslider.min.js"></script>
	<script src="//cdn.jsdelivr.net/npm/jquery.marquee@1.5.0/jquery.marquee.min.js" type="text/javascript"></script>
   
    <script>
	$(function () {
		$('.marquee').marquee({
			duration: 5000
		});
	});
	</script>

   



<?php wp_head();?>
</head>

<body>
    <?php    
      global $options; 
      $options= get_option ('my_framework');
    ?>

    <div class="top_header">
        <div class="wrapper">
            <div class="row">
                <div class="col-xs-12">
                    <ul class="list-inline datetime">
                    <li>
                        <?php $todaydate = date(' D , j F Y '); echo bn2enSomeCommonString($todaydate)?>, 
                        <?php  echo bnMonthdate(); ?><br><span> <?php echo bn2enSomeCommonString(cusopenWeather());?></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="header" style="position: relative; width: 100%; box-shadow: none;">
        <div style="padding:10px 10px">
            <div class="row">
                <div class="col-xs-4">
                                <span id="all_menu"><i class="fa fa-bars" aria-hidden="true"></i></span>
                </div>
                <div class="col-xs-4">
                    <a href="<?php bloginfo('url');?>">
                        <img src="<?php echo $options['upload-logo']['url'];?>" class="img-responsive" alt="logo">
                    </a>
                </div>
                <div class="col-xs-4">
                    <span id="search_btn"><i class="fa fa-search" aria-hidden="true"></i></span>
                </div>
            </div>
            <div class="search_box">
                <div class="input-group input-group-md srch_form">
                <input type="text" name="q" class="form-control srch_keyword" placeholder="সার্চ করুন..." value=""> <span class="input-group-addon btn-primary"><i class="fa fa-search" id="srch_btn"></i></span>

                <span class="input-group-addon cross_btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i></span>
                </div>
            </div>
        </div>

    </div>

 

    <div class="megaMenuWrapper" style="display: none;">
        <div class="megaMenu_inner">
            <div class="social-icon">
                <a class="facebookBtn" target="_blank" href="<?php echo $options['fb-link'];?>"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                <a class="twitterBtn" target="_blank" href="<?php echo $options['twitter-link'];?>"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>
                <a class="youtubeBtn" target="_blank" href="<?php echo $options['yt-link'];?>"><i class="fa fa-youtube-square" aria-hidden="true"></i></a>           
            </div>
            <div class="clearfix"></div>
            <div class="megaMenu">
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

        </div>
    </div>


    <?php include_once get_template_directory(). '/inc/headlines.php';?>

  



 <script>

    $(document).ready(function(){
		$('.bxslider').bxSlider({
		  //pagerCustom: '#bx-pager'
		  auto:true,
		  controls:true,
		  pager:false,
		  pause: 5000
		});
		/*$("#shareBtn").click(function(){
			$(".header_social_plugin").toggle('slow');
		}); 
		$("#shareTopIcon").click(function(){
			$(".topIconSection").toggle('slow');
		});*/
		$('span#search_btn').click(function(){ 
			$('div.search_box').show();
			$('.megaMenuWrapper').css({'top':'110px'});
		});
		$('.cross_btn').click(function(){
			$('div.search_box').hide();
			$('.megaMenuWrapper').css({'top':'55px'});
		});
		function google_search(srchInputElm) {
            var keyword = srchInputElm.val().trim().toLowerCase().replace(/\s/g, '+');
            if (keyword == '') { srchInputElm.css({ 'background': '#FF9', 'color': '#444' }).focus() } else { var URL = '<?php bloginfo('url');?>/?s=' + keyword;
                window.location.href = URL; }
        }

		//if($('.srch_keyword').is(':visible')){
		$('span i#srch_btn').click(function(){
			google_search($('.srch_keyword'));
		});
		$('.srch_keyword').keypress(function(e) {
			var p = e.which;
			if(p==13) google_search($(this));        
		});
		$('span#all_menu').click(function(){
			if($('.megaMenuWrapper').css('display')=='none'){
				$('.megaMenuWrapper').show();
				$('.top_header').hide();
				$('body').css({'overflow':'hidden'});
				$('.header').css({'position':'fixed !important'});
			}
			else{
				$('.megaMenuWrapper').hide();
				$('.top_header').show();
				$('body').css({'overflow':'scroll'});
				$('.header').css({'position':'relative !important'});
			}
			icon = $(this).find("i");
			if($(icon).hasClass( "fa-times" )){
				icon.addClass('fa-bars');
				icon.removeClass('fa-times');
			}else{
				icon.removeClass('fa-bars');
				icon.addClass('fa-times');
			}
		});
		$('.breadcrumb_cat h3 i').click(function(){
			icon = $('.breadcrumb_cat h3').find("i");
			if($(icon).hasClass( "fa-chevron-down" )){
				icon.addClass('fa-chevron-up');
				icon.removeClass('fa-chevron-down');
			}else{
				icon.removeClass('fa-chevron-up');
				icon.addClass('fa-chevron-down');
			}
			if($('.breadcrumb_all_cat').css('display')=='none')
				$('.breadcrumb_all_cat').slideDown();
			else
				$('.breadcrumb_all_cat').slideUp();
		});
		var navpos = $('.header').offset();
		var wrapper_width = $('.header').innerWidth();
		$(window).bind('scroll', function() {
			if ($(window).scrollTop() > 0) {
				$('.header').css({'position':'fixed','width':'100%','top':'0px','z-index':'99999','background':'#fff','box-shadow':'0 4px 3px -3px black'});
			}else {
				$('.header').css({'position':'relative','width':'100%','box-shadow':'none'});
			}
		});
		if ($(window).scrollTop() > 0) {
				$('.header').css({'position':'fixed','width':'100%','top':'0px','z-index':'99999','background':'#fff','box-shadow':'0 4px 3px -3px black'});
			}else {
				$('.header').css({'position':'relative','width':'100%','box-shadow':'none'});
			}
    });
	$(function(){
		$('div.pollSubmit').click(function(){
			var poll_val = $("input[name='poll']:checked").val();
			if(poll_val=='' || poll_val==undefined){
				alert('Please select an option');
			}else{
				$('#pollResSum > form').submit();
			}
		});
	});
	$(function(){$(window).scroll(function(){if($(this).scrollTop()>150){$('#back-top').show();}else{$('#back-top').hide();}});
	$('#back-top a').click(function(){$('body,html').animate({scrollTop:0},'fast');return false;});
	});
    </script>