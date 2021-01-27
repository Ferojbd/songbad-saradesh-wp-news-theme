<?php get_header();?>
<div class="home_page_left">
    <?php
        include_once get_template_directory(). '/inc/homepage/lead-section.php';
        include_once get_template_directory(). '/inc/homepage/cat-news-section.php';

    ?>
</div>

<div class="home_page_right">
    <?php dynamic_sidebar('home-widget');?>
</div>

<?php get_footer();?>