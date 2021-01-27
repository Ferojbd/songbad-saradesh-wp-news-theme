<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/assets/css/jquery.bxslider-1.0b5af.css?v=1610700959" media="all">
<div class="col-md-12 col-sm-12 col-xs-12 divider">
    <div class="cat_summary_block photo_gal_block">
        <div class="cat_summary_title">
            <h4>
                <a href="<?php echo get_category_link($specific_cat_group_value['select-specific-news-cat']);?>">
                    <?php echo get_cat_name($specific_cat_group_value['select-specific-news-cat']);?><i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <!--end cat_summary_title-->
        <div class="photo_album_list">
            <div class="row">
                <div class="col-xs-12 col-md-12">
                    <div class="sheershaphtGallery">
                        <ul class="bxslider" style="height:420px; overflow:hidden;" id="bxslider">
                        <?php 
                            $specific_cat_args = new WP_Query(array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'cat' => $specific_cat_group_value['select-specific-news-cat'],
                            'posts_per_page' => '5',
                            ));
                            while($specific_cat_args->have_posts()) : $specific_cat_args->the_post();?>
                            <li>
                                <a href="<?php the_permalink();?>">
                                    <img class="img-responsive" src="<?php the_post_thumbnail_url('large');?>" style="width:100%; height:420px" title="<?php echo get_the_title();?>" alt="">
                                </a>
                                <div id="phtglryTT"><?php echo get_the_title();?></div>
                            </li>
                            <?php endwhile;?>
                        </ul>
                        <div class="m-b-5"></div>
                        <ul id="bxslider-pager">
                        <?php 
                            $specific_cat_args = new WP_Query(array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'cat' => $specific_cat_group_value['select-specific-news-cat'],
                            'posts_per_page' => '5',
                            ));
                            $cou = 0;
                            while($specific_cat_args->have_posts()) : $specific_cat_args->the_post();?>
                                <li data-slideIndex="<?php echo $cou;?>"><a href="#"><img style="height:80px" src="<?php the_post_thumbnail_url('full');?>" /></a></li>

                            <?php $cou++; endwhile;?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/jquery.bxslider.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.bxslider').bxSlider({
            //pagerCustom: '#bx-pager'
            auto: false,
            controls: true,
            pager: false
        });

        $('.sheershaphtGallery').mouseover(function() {
            $('div.bx-controls-direction').css('display', 'block');
        });

        $('.sheershaphtGallery').mouseout(function() {
            $('div.bx-controls-direction').css('display', 'none');
        });

        $('.bxslider li').hover(function() {
            $(this).find('div#phtglryTT').slideDown();
        }, function() {
            $(this).find('div#phtglryTT').slideUp();
        });

    });
    </script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/assets/js/bxcustom.js"></script>