<?php get_header();?>

<div class="homeTop">
    

    <!-- breadcrumb-->
    <div class="hidden-print" xid="site_map">
        <ol class="breadcrumb">
            <li class="child">
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
            <div class="">
                <?php 
                if (have_posts()): while (have_posts()): the_post(); ?>
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