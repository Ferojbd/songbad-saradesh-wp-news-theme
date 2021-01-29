<?php get_header();?>

<div class="">

  <!--Ads Section-->
  <div style="margin:0px 0px 10px 0px;">
      <?php echo $options['single-top-ads-banner'];?>
  </div>

  <?php while(have_posts()) : the_post();?>
  <!-- breadcrumb-->
  <div class="" id="site_map">
    <ol class="breadcrumb">
      <li><a href="<?php bloginfo ('url');?>"><i class="fa fa-home"></i>&nbsp;প্রচ্ছদ</a></li>
      <li class="child">
        <?php                       
        $thiscategory = get_the_category(); 
        $thiscategoryid = $thiscategory[0]->term_id;
        ?> 
        <a href="<?php echo get_category_link($thiscategoryid);?>"><i class="fa fa-list"></i>&nbsp;<?php echo $thiscategory[0]->cat_name;?></a>
      </li>
    </ol>
    <div class="clr"></div>

  </div>


  <div id="dtl_page_content" style="margin-top:">
    <div class="headline" style=" padding:0px;">
      <div id="hl2"><?php echo get_the_title();?></div>
    </div>
    <div class="spacebar"></div>

        
      <div style="margin:5px 0px 0px 0px; border-bottom:1px solid #eee;;padding-bottom:7px;">
        <div class="rpt_and_share_block">
          <div class="rpt_info_section">
            <div class="rpt_name">
              <p>
                <span style="display:block; margin-bottom:5px"><i style="color:#777" class="fa fa-user-circle-o"></i>&nbsp; <?php the_author();?></span>
              </p>
            </div>
            <div style="_display: table-cell; vertical-align: middle;padding: 5px 0px 0px 0px; height: auto; _padding-left: 10px; float:left;"><i class="fa fa-calendar" aria-hidden="true"></i>
              <?php
                //$posttime = get_the_time( 'g:i a,  j F y , D' );  
                $posttime = get_the_time( 'j F Y , g:i' );                                
                $postdate = get_the_date( 'l, S , M , Y' );
                echo bn2enSomeCommonString($posttime);                                        
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="spacebar"></div>


      <div class="social_share">
        <!--- Share Iocn -->
        <div class="sharethis-inline-share-buttons st-center  st-inline-share-buttons st-animated"  id="st-1">
          <div class="st-btn st-first  st-remove-label" data-network="facebook" style="display: inline-block;">
            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink();?>">
              <img alt="facebook sharing button" src="https://platform-cdn.sharethis.com/img/facebook.svg">
            </a>
          </div>
          <div class="st-btn  st-remove-label" data-network="twitter" style="display: inline-block;">
            <a href="https://twitter.com/intent/tweet?text=<?php the_title();?>&amp;url=<?php the_permalink();?>;" title="twitter">
              <img alt="twitter sharing button" src="https://platform-cdn.sharethis.com/img/twitter.svg">
            </a>
          </div>
        </div>

      </div>

      <div class="dtl_img_section post_template-" style="margin:10px 0">
          <div id="myText">
            <?php the_content();?>
          </div>
          <?php if($options['single-bottom-ads-banner'] > 0){ ?>
            <div class="clearfix spacebar"></div>
            <div>
              <?php echo $options['single-bottom-ads-banner'];?>
            </div>
          <?php } ?>
      </div>
    
    <!-- related News -->

    <div style="background:#f6f6f6; overflow:hidden">
      <div style="background:#ccc; color:#cd0000; font-size:18px; padding:5px 10px;">আরও পড়ুন</div>
        <div style="padding:10px 15px; overflow:hidden">
        <div class="menu_more_news">
          <div class="row">
            <?php 
            $related_post_args = new WP_Query(array(
              'post_type' => 'post',
              'post_status' => 'publish',
              'cat'  => $thiscategoryid,
              'posts_per_page' => '6',
            ));
            $i = 1;
            while($related_post_args->have_posts()) : $related_post_args->the_post();?>
            <div class="col-xs-6 col-md-4">
              <div class="more_cat_news">
                <div class="img">
                  <a href="<?php the_permalink();?>">
                    <img src="<?php the_post_thumbnail_url('large');?>" width="100%">
                  </a>
                </div>
                <div class="headline"><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a></div>
              </div>
            </div>
            <?php if ( $i % 2 === 0 ) { echo '<div class="clearfix"></div>'; } ?>
            <?php $i++; endwhile;?>
            
          </div>
        </div> 
      </div>
    </div>




    <?php /*
    <div id="details_more_news" class="special-content">
      <ul class="list-inline">
        <li><strong>আরও :</strong></li>
        <li><a href="<?php echo get_category_link($thiscategoryid);?>"><?php echo $thiscategory[0]->cat_name;?></a></li>
      </ul>
      <div class="more_cat_news">
      
        <div class="menu-news-content">
            <?php 
            $related_post_args = new WP_Query(array(
              'post_type' => 'post',
              'post_status' => 'publish',
              'cat'  => $thiscategoryid,
              'posts_per_page' => '8',
            ));
            $i = 1;
            while($related_post_args->have_posts()) : $related_post_args->the_post();?>
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
            <?php if ( $i % 4 === 0 ) { echo '<div class="m-b-15"></div>'; } ?>
            <?php $i++; endwhile;?>
        </div><!-- menu-news-content -->
      </div><!-- more_cat_news -->
    </div><!-- end related News -->
  */ ?>
  </div>
  <?php endwhile;?>
</div>


<div class="homeTop">
    <?php dynamic_sidebar('single-widget');?>
</div>




<script type="text/javascript">
    var xoom_co = 0, common = 14;
    $('.xoom-in,.xoom-out').css('cursor','pointer');
    $('.xoom-in').on('click', function(){
        if(xoom_co<=10){
            xoom_co = xoom_co + 1; common = common + 1;
            $('#myText p').css({
                'font-size':parseInt(common) + 'px',
                'line-height' : parseInt(common + 6) + 'px'
            });
        }
    });
    $('.xoom-out').on('click', function(){
        if(xoom_co>-5){
            xoom_co = xoom_co - 1; common = common - 1;
            $('#myText p').css({
                'font-size':parseInt(common) + 'px',
                'line-height' : parseInt(common + 6) + 'px'
            });
        }
    });
</script>

<?php get_footer();?>