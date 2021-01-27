<?php 

/*
Template Name: Popular News
*/

get_header();?>

<div class="home_page_left">
    

    <!-- breadcrumb-->
    <div class="hidden-print" id="site_map">
        <ol class="breadcrumb">
        <li><a href="<?php bloginfo ('url');?>"><i class="fa fa-home"></i>&nbsp;প্রচ্ছদ</a></li>
            <li class="child">
                <i class="fa fa-list"></i>&nbsp;
                 সর্বাধিক পঠিত
            </li>
        </ol>
        <div class="clr"></div>

    </div>
    <div id="main_content_list">
	
        <div class="all_news_content_block">
            <div class="row">
                <?php 
                //$day = date('j');
                //query_posts('day='.$day);
                //if (have_posts()) : while (have_posts()) : the_post();
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                $popular_posts_args = new WP_Query (array(
                                        'posts_per_page' => 2,
                                        'meta_key' => 'nipun_post_views_count',
                                        'orderby' => 'meta_value_num',
                                        'order'=> 'DESC'
                                    ));                        
                if($popular_posts_args->have_posts()) : while($popular_posts_args->have_posts()) : $popular_posts_args->the_post()?> 
                <div class="col-md-6 all_new">
                    <a href="<?php the_permalink();?>">
                        <div class="img">
                            <img src="<?php the_post_thumbnail_url('large');?>">
                        </div><!--end img-->
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
                        </div><!--end content_sum_block-->
                    </a>
                </div>
                <?php endwhile; ?>	
            </div>
        </div>
    </div>
    
    <div align="right">
        <?php echo pagination( $paged, $popular_posts_args->max_num_pages); // Pagination Function?>
    </div>
<?php endif; wp_reset_postdata(); ?>

</div>

<div class="home_page_right">
    <?php dynamic_sidebar('single-widget');?>
</div>

<?php get_footer();?>