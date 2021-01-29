
<div class="">
    <?php 
        $mobspecific_cat_group =  $options['mobile-home-specific-news-cat-block-group'];
        if(is_array($mobspecific_cat_group)){
        foreach($mobspecific_cat_group as $specific_cat_group_value) :
    ?>

    <?php if($specific_cat_group_value['chose-specific-news-cat-block-layout'] == 'style-1')  { ?>
       <?php include get_template_directory(). '/inc/news-cat-style/style-1.php';?>
    <?php  } ?>

    <?php if($specific_cat_group_value['chose-specific-news-cat-block-layout'] == 'style-2')  { ?>
        <?php include get_template_directory(). '/inc/news-cat-style/style-2.php';?>
    <?php  } ?>

    <?php if($specific_cat_group_value['chose-specific-news-cat-block-layout'] == 'style-3')  { ?>
        <?php include get_template_directory(). '/inc/news-cat-style/style-3.php';?>
    <?php  } ?>

    <?php if($specific_cat_group_value['chose-specific-news-cat-block-layout'] == 'style-4')  { ?>
        <?php include get_template_directory(). '/inc/news-cat-style/style-4.php';?>
    <?php  } ?>

    <?php if($specific_cat_group_value['chose-specific-news-cat-block-layout'] == 'style-5')  { ?>
        <?php include get_template_directory(). '/inc/news-cat-style/style-5.php';?>
    <?php  } ?>

    <?php if($specific_cat_group_value['chose-specific-news-cat-block-layout'] == 'ads-block')  { ?>
        <?php include get_template_directory(). '/inc/news-cat-style/ads-block.php';?>
    <?php  } ?>

        
<?php endforeach;  } ?>
</div>