<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="menuname">
        <h2>
            <a href="<?php echo get_category_link($specific_cat_group_value['select-specific-news-cat']);?>">
                <?php echo get_cat_name($specific_cat_group_value['select-specific-news-cat']);?> <i class="fa fa-chevron-right"></i>
            </a>
        </h2>
    </div>
    <div class="video_container mb10 ">
        <div class="every_row">
            <div class="thumb_container">
                <div class="thumb">
                    <div class="row">
                        <?php 
                        $specific_cat_args = new WP_Query(array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'cat' => $specific_cat_group_value['select-specific-news-cat'],
                        'posts_per_page' => '1',
                        ));
                        while($specific_cat_args->have_posts()) : $specific_cat_args->the_post();?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <a href="<?php the_permalink();?>">
                                <div class="video-img-innner">
                                    <!-- <div class="show_btn-big"></div> -->
                                    <div class="icon-vedio">
                                        <!--<i class="fa fa-youtube-play play-icon-big" aria-hidden="true"></i>-->
                                        <img class="img-responsive top-thumb" alt="" src="<?php the_post_thumbnail_url('large');?>">
                                    </div>
                                </div>
                                <h4 class="video-title"><?php echo get_the_title();?></h4>
                            </a>
                        </div>
                        <?php endwhile;?>
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
                        <div class="col-md-4 col-sm-4 col-xs-4">
                            <div class="every_row">
                                <div class="thumb_container">
                                    <div class="thumb">
                                        <a href="<?php the_permalink();?>">
                                            <div class="video-img-innner">
                                                <!-- <div class="show_btn"></div> -->
                                                <div class="icon-vedio">
                                                    <!--<i class="fa fa-youtube-play play-icon" aria-hidden="true"></i>-->
                                                    <img class="img-responsive thumb_img" alt="" src="<?php the_post_thumbnail_url('large');?>">
                                                </div>
                                            </div>
                                            <h4 class="headline-title-small-video"><?php echo get_the_title();?></h4>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; endif;?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="divider"></div>
</div>