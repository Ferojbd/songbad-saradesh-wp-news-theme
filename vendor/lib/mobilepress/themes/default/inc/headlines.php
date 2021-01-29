 <?php if($options['news-headlines']) : ?>
 <div class="headlines hidden-print" style="border:1px solid #3a495e;">
                <!-- Begin: headlines -->
    <div class="headline_left" style="width:100%; overflow:hidden;">
        <!-- Begin: headline_left -->
        <h4 style="background:#3a495e;" class="headlines_just"><?php echo $options ['news-headlines-title'];?></h4>
        <div class="marquee">
            <marquee direction="left" height="30" speed="normal" scrollamount="4" behavior="scroll" onmouseover="this.stop();" onmouseout="this.start();">
                <?php 
                    $news_headlines_cat_select = $options ['news-headlines'];
                    $news_headlines_max_show = $options ['show-max-number-news-headlines'];
                    $news_headlines_args = new WP_Query(array(
                            'post_types' => 'posts',
                            'post_status' => 'publish',
                            'cat'        => $news_headlines_cat_select,
                            'posts_per_page' => $news_headlines_max_show,
                    ));

                    while($news_headlines_args->have_posts()) : $news_headlines_args->the_post();?>
                     <a href="<?php the_permalink();?>"><?php the_title();?></a><span>||</span>
                    <?php endwhile;?>
            </marquee>
        </div><!-- End: news_ticker -->
    </div><!-- End: headline_left -->
</div><!-- End: headlines -->
<?php endif;?>