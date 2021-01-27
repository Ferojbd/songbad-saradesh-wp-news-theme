<?php get_header();?>

<?php while(have_posts()) : the_post();?>
<div class="col-md-12">
    <!-- headline_section-->
    <div class="headline_section">
        <h1 style="color:"><?php echo get_the_title();?>&nbsp;</h1>
    </div><!--end headline_section-->
    <div class="spacebar"></div>
    <div id="myText">
        <?php the_content();?>
    </div>
</div>
<?php endwhile;?>



<?php get_footer();?>