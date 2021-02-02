<?php    
    global $options; 
    $options= get_option ('my_framework');
?>
        </div>
    </div>
</div>

<div class="m-b-15"></div>
    <div class="footer_new hidden-print">
        <div class="footer_top">
            <div class="container">
                <div class="wrapper">
                    <div class="row">
                        <div class="col-md-2 col-sm-2">
                            <a href="index.html"><img src="<?php echo $options['upload-logo']['url'];?>" border="0" class="img-responsive" style="max-height:38px;" /></a>
                        </div>
                        <div class="col-md-10 col-sm-10">
                            <div class="app-container">
                                <?php if($options['android_link'] && $options['ios_link']) { ?>
									<h5>মোবাইল অ্যাপস ডাউনলোড করুন</h5>
									<a rel="nofollow" class="ios-aps-icon" href="<?php echo $options['android_link'];?>" target="_blank">&nbsp;
									</a>
									<a rel="nofollow" class="android-aps-icon" href="<?php echo $options['ios_link'];?>" target="_blank">&nbsp;
									</a>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="foot_content hidden-print">
        <div class="container">
            <div class="wrapper">
                <div class="bottom_menu">
                    <!-- Begin: bottom_menu -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="botlink_box">
                                <?php
                                    wp_nav_menu( array(
                                        'theme_location'  => 'footer',
                                        'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
                                        'container'       => 'ul',
                                        'container_class' => ' ',
                                        'container_id'    => ' ',
                                        'menu_class'      => ' ',
                                        'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                                        //'walker'          => new WP_Bootstrap_Navwalker(),
                                    ) );
                                    ?>
                            </div><!-- End: botlink_left -->
                        </div>
                    </div>
                </div><!-- End: bottom_menu -->
            </div>
        </div>
    </div>
    <div class="foot_content" style="background:#418f91;">
        <div class="container">
            <div class="wrapper">
                <div style="font-size:16px;">
                    <?php echo wpautop(str_replace("&nbsp;","<br/>", $options['copyright-text']));?>
                </div>
            </div>
        </div>
    </div>
    <div id="back-top" class="back-top hidden-print">
        <a href="#top"><i class="fa fa-angle-up fa-2x"></i></a>
    </div>



<?php wp_footer();?>
</body>
</html>