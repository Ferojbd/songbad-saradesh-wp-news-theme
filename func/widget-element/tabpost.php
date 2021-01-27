<?php

class riptware_popular_post_tab_widget extends WP_Widget {

    public function __construct() {

    	parent::__construct('riptware_popular_post_tab_widget', 'Popular & Current Post Tab', array(
            'description' => 'Show Popular and Current day Post',
    	));
    }

    public function widget($args, $instance) {
    ?>
     <?php    
      global $options; 
      $options= get_option ('my_framework');
    ?>
        <div class="row mb-3">
            <div class="col-md-12 col-lg-12 col-sm-6 ">
                <div class="tab_bar_block">
                    <ul class="list-inline" id="nav-tab" role="tablist">
                        <li class="active" tabindex="latest_list_block">সর্বশেষ</li>
                        <li tabindex="popular_list_block" class="">সর্বাধিক পঠিত</li>
                    </ul>
                </div>    
                <div class="tab-content" id="nav-tabContent">
                    <div class="list_display_block" id="latest_list_block" style="display: block;">
                        <div class="list_display_inner">
                            
                                <?php
                                    //$day = date('j');
                                    //query_posts('day='.$day);
                                    //if (have_posts()) : while (have_posts()) : the_post();
                                    $latest_posts_args = new WP_Query(array(
                                        'posts_per_page' => 20,
                                        'order'=> 'DESC',
                                        'post_type' => 'post',
                                        'post_status' => 'publish',
                                    ));
                                if($latest_posts_args->have_posts()) : while($latest_posts_args->have_posts()) : $latest_posts_args->the_post()?>    
                                <div class="editor_picks_list">
                                    <a href="<?php the_permalink();?>">
                                        <div class="img">
                                            <img src="<?php the_post_thumbnail_url('large');?>" title="" alt="">
                                        </div>
                                        <div class="hl">
                                            <h4><?php the_title();?></h4>
                                        </div>
                                    </a>
                                </div>
                                <?php endwhile; ?><?php endif; ?>
                        </div>
                        <div align="right"><a class="allNews" href="<?php bloginfo ('url');?>/news-latest">সব খবর </a></div>
                    </div>
                    <div class="list_display_block" id="popular_list_block" style="display: none;">
                        <div class="list_display_inner">

                                    <?php 
                                    $popular_posts_args = new WP_Query (array(
                                        'posts_per_page' => 20,
                                        'meta_key' => 'nipun_post_views_count',
                                        'orderby' => 'meta_value_num',
                                        'order'=> 'DESC'
                                    ));                        
                                if($popular_posts_args->have_posts()) : while($popular_posts_args->have_posts()) : $popular_posts_args->the_post()?>
                                 <div class="editor_picks_list">
                                    <a href="<?php the_permalink();?>">
                                        <div class="img">
                                            <img src="<?php the_post_thumbnail_url('large');?>" title="" alt="">
                                        </div>
                                        <div class="hl">
                                            <h4><?php the_title();?></h4>
                                        </div>
                                    </a>
                                </div>

                                <?php endwhile; else: ?>
                                    No Posts
                                <?php endif; wp_reset_query();?>
                        </div>
                        <div align="right"><a class="allNews" href="<?php bloginfo ('url');?>/news-popular">সব খবর </a></div>
                    </div>
                </div>

                <script type="text/javascript">
                $('.tab_bar_block li').on('click',function(){
                    if(!$(this).hasClass('active')){
                        var tabIndex = $(this).attr('tabIndex');
                        $('.tab_bar_block li').removeClass('active');
                        $(this).addClass('active');
                        $('.list_display_block').hide();
                        $('#' + tabIndex).fadeIn();
                    }
                });
            </script>
                

            </div>
        </div>

    	<?php
    } // end widget function


} // end Class

//call Function
function riptware_popular_post_tab_widget_func() {
	register_widget('riptware_popular_post_tab_widget');
}
add_action('widgets_init' , 'riptware_popular_post_tab_widget_func');

?>