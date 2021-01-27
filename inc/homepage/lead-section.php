<div>
 <div class="myAdBox">
        <?php echo $options['homepage-top-ads-banner'];?>
    </div>
</div>


<div class="m-b-15"></div>
<div class="row">
    <div class="col-md-8 col-sm-8">
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
            <a href="<?php the_permalink();?>">
                <div id="img">
                    <img alt="" src="<?php the_post_thumbnail_url('large');?>" width="100%">
                    <div class="content">
                        <div id="hl2" style="margin:0;">
                            <h1><?php echo get_the_title();?></h1>
                        </div>
                    </div>
                </div>
            </a> 
        </div>
        <?php endwhile; endif; ?>
    </div>
    <div class="col-md-4 col-sm-4">
        <div class="lead_two_img">
         <?php 
            $lead_posts_args = new WP_Query(array(
                'post_type'  => 'post',
                'post_status' => 'publish',
                'cat' => $lead_select_cat,
                'posts_per_page' => '2',
                'offset'          => '1', 
                'order'           => 'DESC',
            ));
            $i = 1;
            if($lead_posts_args->have_posts()) : while($lead_posts_args->have_posts()) : $lead_posts_args->the_post();?>
                <a href="<?php the_permalink();?>">
                    <div class="img">
                        <img alt="" src="<?php the_post_thumbnail_url('large');?>">
                        <div class="hl">
                            <h4><?php echo get_the_title();?></h4>
                        </div>
                    </div>
                </a>
            <?php if ( $i % 1 === 0 ) { echo '<div class="spacebar"></div>'; } ?>
            <?php $i++; endwhile; endif; ?>
        </div>
    </div>
</div>
<div class="spacebar"></div>
<div class="row">
    <?php 
    $lead_posts_args = new WP_Query(array(
        'post_type'  => 'post',
        'post_status' => 'publish',
        'cat' => $lead_select_cat,
        'posts_per_page' => '6',
        'offset'          => '3', 
        'order'           => 'DESC',
    ));
    $i = 1;
    if($lead_posts_args->have_posts()) : while($lead_posts_args->have_posts()) : $lead_posts_args->the_post();?>
    <div class="col-md-4 col-sm-4">
        <div class="body_block">
            <a href="<?php the_permalink();?>">
                <div class="body_img">
                    <img alt="" src="<?php the_post_thumbnail_url('large');?>">
                </div>
                <div class="hl">
                    <h4><?php echo get_the_title();?></h4>
                </div>
            </a>
        </div>
    </div>
    <?php if ( $i % 3 === 0 ) { echo '<div class="clearfix"></div><div class="m-b-15"></div>'; } ?>
    <?php $i++; endwhile; endif; ?>
</div>