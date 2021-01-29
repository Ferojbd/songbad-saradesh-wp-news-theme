<div class="col-md-4 col-sm-4 col-xs-4 divider">
    <div class="cat_summary_block">
        <div class="cat_summary_title">
            <h4>
                <a href="<?php echo get_category_link($specific_cat_group_value['select-specific-news-cat']);?>">
                    <?php echo get_cat_name($specific_cat_group_value['select-specific-news-cat']);?><i class="fa fa-chevron-right"></i>
                </a>
            </h4>
        </div>
        <div class="cat_summary_display_single">
            <div class="row">
               <?php 
                $specific_cat_args = new WP_Query(array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'cat' => $specific_cat_group_value['select-specific-news-cat'],
                'posts_per_page' => '1',
                ));
                while($specific_cat_args->have_posts()) : $specific_cat_args->the_post();?>
                <div class="col-xs-12 col-md-12 menu_single">
                    <a href="<?php the_permalink();?>">
                        <div class="img_spc"><img alt="" src="<?php the_post_thumbnail_url('large');?>"></div>
                        <div class="hl">
                            <h4><?php echo get_the_title();?></h4>
                        </div>
                    </a>
                </div>
                <?php endwhile;?>
                <!--end col-md-6-->
                <div class="clearfix"></div>
                <div class="col-xs-12 col-md-12">
                    <div class="more_hl">
                        <?php 
                        $specific_cat_args = new WP_Query(array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'cat' => $specific_cat_group_value['select-specific-news-cat'],
                        'posts_per_page' => '4',
                        'offset' => '1',
                        ));
                        while($specific_cat_args->have_posts()) : $specific_cat_args->the_post();?>
                        <a href="<?php the_permalink();?>">
                            <div class="img">
                                <img alt="" src="<?php the_post_thumbnail_url('large');?>" max-height="70">
                            </div>
                            <div class="hl">
                                <h5><?php echo get_the_title();?></h5>
                            </div>
                        </a>
                        <?php endwhile;?>
                    </div>
                    <!--end more_hl-->
                </div>
                <!--end col-md-6-->
            </div>
            <!--end row-->
        </div>
        <!--end cat_summary_display_single-->
        <div class="clearfix spacebar"></div>
        <a href="<?php echo get_category_link($specific_cat_group_value['select-specific-news-cat']);?>" class="aro_khbr">আরও খবর <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
        </a>
    </div>
</div>