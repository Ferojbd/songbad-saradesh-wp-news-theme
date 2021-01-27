<div class="col-md-12 col-sm-12 col-xs-12 divider">
    <div class="cat_summary_block">
        <div class="cat_summary_title">
            <h4>
                <a href="<?php echo get_category_link($specific_cat_group_value['select-specific-news-cat']);?>">
                    <?php echo get_cat_name($specific_cat_group_value['select-specific-news-cat']);?><i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="first_news">
                    <div class="row">
                    <?php 
                        $semi_specific_cat_args = new WP_Query(array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'cat' => $specific_cat_group_value['select-specific-news-cat'],
                            'posts_per_page' => '2',
                        ));
                        while($semi_specific_cat_args->have_posts()) : $semi_specific_cat_args->the_post();?>
                        <div class="col-md-6 col-sm-6 khela_news_block">
                            <a href="<?php the_permalink();?>">
                                <div class="img">
                                    <img alt="" class="img-responsive" src="<?php the_post_thumbnail_url('large');?>">
                                </div>
                                <div class="hl">
                                    <h4 style="color:; font-size:18px; font-weight:bold;"><?php echo get_the_title();?></h4>
                                </div>
                            </a>
                        </div>
                        <?php endwhile;?>
                    </div>
                </div>
            </div>
        </div>
        <div class="spacebar"></div>
        <div class="row">
         <?php 
            $semi_specific_cat_args = new WP_Query(array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'cat' => $specific_cat_group_value['select-specific-news-cat'],
                'posts_per_page' => '3',
                'offset' => '2',
            ));
            while($semi_specific_cat_args->have_posts()) : $semi_specific_cat_args->the_post();?>
            <div class="col-md-4 col-sm-4 khela_news_block">
                <a href="<?php the_permalink();?>">
                    <div class="body_img">
                        <img alt="" src="<?php the_post_thumbnail_url('large');?>">
                    </div>
                    <div class="hl">
                        <h4 style="color:"><?php echo get_the_title();?></h4>
                    </div>
                </a>
            </div>
            <?php endwhile;?>
            <div class="clearfix"></div>
            <div class="spacebar"></div>
        </div>
        <a href="<?php echo get_category_link($specific_cat_group_value['select-specific-news-cat']);?>" class="aro_khbr">আরও খবর <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></a>
        <div class="clearfix"></div>
    </div>
</div>