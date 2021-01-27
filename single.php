<?php get_header();?>

<div class="home_page_left ">

  <!--Ads Section-->
  <div style="margin:0px 0px 10px 0px;">
      <?php echo $options['single-top-ads-banner'];?>
  </div>

  <?php while(have_posts()) : the_post();?>
  <!-- breadcrumb-->
  <div class="hidden-print" id="site_map">
    <ol class="breadcrumb">
      <li><a href="<?php bloginfo ('url');?>"><i class="fa fa-home"></i>&nbsp;প্রচ্ছদ</a></li>
      <li class="child">
        <?php                       
        $thiscategory = get_the_category(); 
        $thiscategoryid = $thiscategory[0]->term_id;
        ?> 
        <a href="<?php echo get_category_link($thiscategoryid);?>"><i class="fa fa-list"></i>&nbsp;<?php echo $thiscategory[0]->cat_name;?></a>
      </li>
      <li class="child active"><i class="fa fa-info"></i>&nbsp;<?php echo get_the_title();?>&nbsp;</li>
    </ol>
    <div class="clr"></div>

  </div>


  <div id="details_content" style="margin-top:">
  
    <div class="row">
      <div class="col-md-12">
        
        <div class="headline_content_block post_template-0">
          <div class="clear"></div>
          <!-- headline_section-->
          <div class="headline_section">
            <h1 style="color:"><?php echo get_the_title();?>&nbsp;</h1>
          </div><!--end headline_section-->
          <div class="m-b-15 hidden-print"></div>

          <div class="rpt_and_share_block">
            <div class="rpt_info_section">
              <div class="rpt_name">
                <p>
                  <!-- <span style="display:block; margin-bottom:5px"><i style="color:#777" class="fa fa-user-circle-o"></i>&nbsp; </span> -->
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

            <div class="share_section hidden-print">
              <div class="socialShare">
                <!--- Share Iocn -->
                <div class="sharethis-inline-share-buttons st-center  st-inline-share-buttons st-animated" style="float:left" id="st-1">
                  <div class="st-total st-hidden">
                    <span class="st-label"></span>
                    <span class="st-shares">Shares</span>
                  </div>
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

                <a style="cursor:pointer" onclick="window.print();" _href="<?php the_permalink();?>/print" title="Print news" class="print-btn"><i class="fa fa-print fa-md"></i></a>
                <a class="xoom-out" style="cursor: pointer;"><i class="fa fa-minus fa-md"></i></a>
                <a class="xoom-in" style="cursor: pointer;"><i class="fa fa-plus fa-md"></i></a>

              </div>
            </div>

            <div class="clearfix"></div>
          </div>
          <div class="clearfix"></div>

          <div class="dtl_section">
              <div id="myText">
                <?php the_content();?>
              </div>
              <div class="clearfix spacebar"></div>
              <div class="clearfix spacebar"></div>
              <div>
                <?php echo $options['single-bottom-ads-banner'];?>
              </div>
          </div>

          <div class="clearfix"></div>

        </div>

      </div>
    </div>

    <div style="clear: both"></div>
    <div class="spacebar"></div>
    
    <!-- related News -->
    <div id="details_more_news" class="bottom_border hidden-print">
      <div class="more_cat_news">
        <div class="caption">
          <h4><a href="<?php echo get_category_link($thiscategoryid);?>"><?php echo $thiscategory[0]->cat_name;?></a> | <a href="">আরও খবর</a></h4>
        </div><!--end caption-->
      
        <div class="more_news_list">
          <div class="row">
            <?php 
            $related_post_args = new WP_Query(array(
              'post_type' => 'post',
              'post_status' => 'publish',
              'cat'  => $thiscategoryid,
              'posts_per_page' => '8',
            ));
            $i = 1;
            while($related_post_args->have_posts()) : $related_post_args->the_post();?>
            <div class="col-xs-6 col-md-3 more">
              <a href="<?php the_permalink();?>">
                  <div class="img"><img src="<?php the_post_thumbnail_url('full');?>" title="" alt="">
                  </div><!--end img-->
                </a>
                <div class="hl">
                  <h5><a href="<?php the_permalink();?>"><?php echo get_the_title();?></a></h5>
                </div><!--end hl-->
            </div> <!-- end col-->
            <?php if ( $i % 4 === 0 ) { echo '<div class="m-b-15"></div>'; } ?>
            <?php $i++; endwhile;?>
          </div><!-- end row -->
        </div><!-- end more_news_list -->
      </div><!-- more_cat_news -->
    </div><!-- end related News -->

  </div>
  <?php endwhile;?>
</div>


<div class="home_page_right">
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