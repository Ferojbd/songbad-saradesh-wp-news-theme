<div class="homeTop">
    <div class="udriti">
        <h3>
            <a href="<?php echo get_category_link($specific_cat_group_value['select-specific-news-cat']);?>">
                <?php echo get_cat_name($specific_cat_group_value['select-specific-news-cat']);?>
            </a>
        </h3>
    </div>
    <div class="video_container">
        <div class="every_row">
            <div class="thumb_container">
                <div class="thumb">
                    
                        <?php 
                        $mobspecific_cat_args = new WP_Query(array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'cat' => $specific_cat_group_value['select-specific-news-cat'],
                        'posts_per_page' => '1',
                        ));
                        while($mobspecific_cat_args->have_posts()) : $mobspecific_cat_args->the_post();?>
                            <a href="<?php the_permalink();?>">
                                <div class="video-img-innner">
                                    <!-- <div class="show_btn-big"></div> -->
                                        <!--<i class="fa fa-youtube-play play-icon-big" aria-hidden="true"></i>-->
                                    <img class="img-responsive top-thumb" alt="" src="<?php the_post_thumbnail_url('large');?>">
                                </div>
                                <span><?php echo get_the_title();?></span>
                            </a>
                        <?php endwhile;?>
                </div>
            </div>
        </div>
    </div>

    <div class="video_container" style="border-bottom:none;">
        <div class="row">
            <?php 
                $lead_posts_args = new WP_Query(array(
                    'post_type'  => 'post',
                    'post_status' => 'publish',
                    'cat' => $lead_select_cat,
                    'posts_per_page' => '2',
                    'offset'          => '1', 
                    'order'           => 'DESC',
                ));
                $i = 1;
                if($lead_posts_args->have_posts()) : while($lead_posts_args->have_posts()) : $lead_posts_args->the_post();?>

                <div class="every_row">
                    <div class="thumb_container">
                        <div class="thumb">
                            <a href="<?php the_permalink();?>">
                                <div class="col-md-4 col-sm-4 col-xs-4">
                                    <div class="video-img-innner">
                                        <!-- <div class="show_btn"></div> -->
                                        <div class="icon-vedio">
                                            <!--<i class="fa fa-youtube-play play-icon" aria-hidden="true"></i>-->
                                            <img class="img-responsive thumb_img" alt="" src="<?php the_post_thumbnail_url('large');?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8 col-sm-8 col-xs-8">
                                    <span><?php echo get_the_title();?></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <?php endwhile; endif;?>
        </div>
    </div>

    <div class="clearfix"></div>
    <div class="divider"></div>
</div>