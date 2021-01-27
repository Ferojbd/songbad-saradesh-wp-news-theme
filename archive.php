<?php get_header();?>

<div class="home_page_left">
    

    <!-- breadcrumb-->
    <div class="hidden-print" id="site_map">
        <ol class="breadcrumb">
        <li><a href="<?php bloginfo ('url');?>"><i class="fa fa-home"></i>&nbsp;প্রচ্ছদ</a></li>
            <li class="child">
                <i class="fa fa-list"></i>&nbsp;
                <?php if ( is_category() ) : ?>
                    <?php single_cat_title(); ?> 
                <?php elseif ( is_day() ) : ?>
                    Archive for <?php the_time( 'F jS, Y' ); ?>
                <?php elseif ( is_month() ) : ?>
                    Archive for <?php the_time( 'F, Y' ); ?>
                <?php elseif ( is_year() ) : ?>
                    Archive for <?php the_time('Y'); ?>
                <?php endif; ?>
            </li>
        </ol>
        <div class="clr"></div>

    </div>
    <div id="main_content_list">
	
        <div class="all_news_content_block">
            <div class="row">
                <?php 
                if (have_posts()): while (have_posts()): the_post(); ?>
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
                <?php endwhile; endif;?>	
            </div>
        </div>
    </div>
    
    <div align="right">
        <?php echo bn2enSomeCommonString(bootstrap_pagination());?>
    </div>

</div>

<div class="home_page_right">
    <?php dynamic_sidebar('single-widget');?>
</div>

<?php get_footer();?>