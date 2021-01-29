 <div class="homeTop">
    <div class="every-menu">
        <div class="home_menu_inner">
            <div class="home_menu_online">
                <h4 style="border-left:3px solid #f47c20">
                    <a href="<?php echo get_category_link($specific_cat_group_value['select-specific-news-cat']);?>">
                        <?php echo get_cat_name($specific_cat_group_value['select-specific-news-cat']);?>
                    </a>
                </h4>
            </div>
        </div>
        <div class="cat-box-content">
            <?php 
                $mobspecific_cat_args = new WP_Query(array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'cat' => $specific_cat_group_value['select-specific-news-cat'],
                'posts_per_page' => '1',
                ));
                while($mobspecific_cat_args->have_posts()) : $mobspecific_cat_args->the_post();?>
                <div class="first_news">
                    <div class="news_img">
                        <a href="<?php the_permalink();?>">
                            <img alt="" src="<?php the_post_thumbnail_url('large');?>">
                            <h2><?php echo get_the_title();?></h2>
                        </a>
                    </div>
                </div>
                <?php endwhile;?>
                <div class="menu-news-content">
                    <?php 
                        $mobspecific_cat_args = new WP_Query(array(
                        'post_type' => 'post',
                        'post_status' => 'publish',
                        'cat' => $specific_cat_group_value['select-specific-news-cat'],
                        'posts_per_page' => '4',
                        'offset' => '1',
                        ));
                        while($mobspecific_cat_args->have_posts()) : $mobspecific_cat_args->the_post();?>
                        <div class="menu_news_list">
                            <a href="<?php the_permalink();?>">
                                <div class="img">
                                    <img alt="" src="<?php the_post_thumbnail_url('large');?>" max-height="70">
                                </div>
                                <div class="hl">
                                    <h4><?php echo get_the_title();?></h4>
                                </div>
                            </a>
                        </div>
                        <?php endwhile;?>
                </div>
                <!--end menu-news-content-->
        </div>
        <!--end cat_summary_display_single-->
        <a href="<?php echo get_category_link($specific_cat_group_value['select-specific-news-cat']);?>" class="aro_khbr">আরও খবর <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i>
        </a>
    </div>
</div>
<div class="spacebar"></div>