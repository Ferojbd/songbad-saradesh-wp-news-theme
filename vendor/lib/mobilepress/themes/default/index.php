<?php get_header();?>
        <?php
            include_once get_template_directory(). '/inc/homepage/lead-section.php';
        ?>
        <div class="homeTop">
            <?php echo $options['homepage-center-ads-banner'];?>
        </div>
        <div style="padding: 10px 10px">
            <?php dynamic_sidebar('mob_home_middle_widget');?>
        </div>
        <?php 
            include_once get_template_directory(). '/inc/homepage/cat-news-section.php';
        ?>

    <div style="padding: 10px 10px">
        <?php dynamic_sidebar('mob_home_bottom_widget');?>
    </div>
    



<?php get_footer();?>