<?php get_header();?>

<div class="homeTop">
    

    <!-- breadcrumb-->
    <div class="hidden-print" xid="site_map">
        <ol class="breadcrumb">
        <?php 
            $results_count = $wp_query->found_posts; // Get number of results
            if ($results_count == '' || $results_count == 0) { // No Results ?>
            <li class="child">Search For <?php the_search_query(); ?></li>
            <?php } else { ?>
            <li class="child">Search For <?php the_search_query(); ?></li>
            <?php } // end results check ?>
        </ol>
        <div class="clr"></div>

    </div>
    <div id="main_content_list">
	
        <div class="all_news_content_block">
            <div class="">
                <?php 
                if (have_posts()): while (have_posts()): the_post(); ?>
                <div class="menu_news_list">
                    <a href="<?php the_permalink();?>">
                        <div class="img">
                            <img alt="" src="<?php the_post_thumbnail_url('large');?>" max-height="70">
                        </div>
                        <div class="hl">
                            <h4><?php echo get_the_title();?></h4>
                        </div>
                    </a>
                </div> <!-- end col-->
                <?php endwhile; endif;?>	
            </div>
        </div>
    </div>
    
    <div align="center">
        <?php echo bn2enSomeCommonString(bootstrap_pagination());?>
    </div>

</div>

<div class="homeTop">
    <?php dynamic_sidebar('single-widget');?>
</div>

<?php get_footer();?>