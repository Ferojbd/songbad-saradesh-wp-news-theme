<div class="homeTop">
 <div class="myAdBox">
        <?php echo $options['homepage-top-ads-banner'];?>
    </div>
</div>

<div class="spacebar"></div>
<div class="homeTop">
    
        <?php 
        $lead_select_cat  = $options['lead-category-select'];
        $lead_posts_args = new WP_Query(array(
            'post_type'  => 'post',
            'post_status' => 'publish',
            'cat' => $lead_select_cat,
            'posts_per_page' => '1',
            'order'      => 'DESC',
        ));
        if($lead_posts_args->have_posts()) : while($lead_posts_args->have_posts()) : $lead_posts_args->the_post();?>
        <div class="topLead">
            
            <div id="img" style="position:relative">
                <a href="<?php the_permalink();?>">
                    <img alt="" src="<?php the_post_thumbnail_url('large');?>" width="100%">
                    
                    <h2><?php echo get_the_title();?></h2>
                        
                 </a> 
            </div>
           
        </div>
        <?php endwhile; endif; ?>
    <div class="spacebar"></div>
    <div class="body_news_block">
         <?php 
            $lead_posts_args = new WP_Query(array(
                'post_type'  => 'post',
                'post_status' => 'publish',
                'cat' => $lead_select_cat,
                'posts_per_page' => '6',
                'offset'          => '1', 
                'order'           => 'DESC',
            ));
            $i = 1;
            if($lead_posts_args->have_posts()) : while($lead_posts_args->have_posts()) : $lead_posts_args->the_post();?>
            <div style="<?php if ( $i % 2 === 1 ) { echo 'width:48%; float:left;'; } else { echo 'width:48%; float:right;'; } ?>">
                <a href="<?php the_permalink();?>">
                    <div class="img">
                        <img alt="" src="<?php the_post_thumbnail_url('large');?>">
                    </div>
                    <div class="hl">
                        <h4><?php echo get_the_title();?></h4>
                    </div>     
                </a>
            </div>
            <?php if ( $i % 2 === 0 ) { echo '<div class="clearfix"></div><div class="spacebar"></div>'; } ?>
            <?php $i++; endwhile; endif; ?>
    </div>
</div>
<div class="spacebar"></div>
