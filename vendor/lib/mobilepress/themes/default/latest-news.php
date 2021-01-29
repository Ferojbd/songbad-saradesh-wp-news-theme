<?php 
/*
Template Name: latest News
*/

get_header();?>

<div class="homeTop">
    

    <!-- breadcrumb-->
    <div class="hidden-print" xid="site_map">
        <ol class="breadcrumb">
            <li class="child">
                <i class="fa fa-list"></i>&nbsp;
                সর্বশেষ
            </li>
        </ol>
        <div class="clr"></div>

    </div>
    <div id="main_content_list">
	
        <div class="all_news_content_block">
            <div class="">
                <?php 
                //$day = date('j');
                //query_posts('day='.$day);
                //if (have_posts()) : while (have_posts()) : the_post();
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $latest_posts_args = new WP_Query(array(
                    'posts_per_page' => 2,
                    'order'=> 'DESC',
                    'post_type' => 'post',
                    'post_status' => 'publish',
                    'paged' => $paged,
                ));
                if($latest_posts_args->have_posts()) : while($latest_posts_args->have_posts()) : $latest_posts_args->the_post()?>  
                <div class="menu_news_list">
                    <a href="<?php the_permalink();?>">
                        <div class="img">
                            <img alt="" src="<?php the_post_thumbnail_url('large');?>" max-height="70">
                        </div>
                        <div class="content_sum_block">
                            <div class="hl">
                                <h4><?php echo get_the_title();?></h4>
                            </div>
                            <div class="post_date">
                                <p>
                                    <?php
                                    //$posttime = get_the_time( 'g:i a,  j F y , D' );  
                                    $posttime = get_the_time( 'j F Y' );                                
                                    $postdate = get_the_date( 'l, S , M , Y' );
                                    echo bn2enSomeCommonString($posttime);                                        
                                    ?>
                                </p>
                            </div>
                        </div>
                    </a>
                </div> <!-- end col-->
                <?php endwhile; ?>	
            </div>
        </div>
    </div>
    
    <div align="center">
        <?php echo pagination( $paged, $latest_posts_args->max_num_pages); // Pagination Function?>
    </div>
<?php endif; wp_reset_postdata(); ?>

</div>

<div class="homeTop">
    <?php dynamic_sidebar('single-widget');?>
</div>

<?php get_footer();?>