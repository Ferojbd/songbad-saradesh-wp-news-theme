<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'my_framework';

  //
  // Create options
  CSF::createOptions( $prefix, array(
    'menu_title' => 'Theme Control',
    'menu_slug'  => 'theme-control',
    'menu_position'   =>  2,
    'ajax_save'       => true,
    'show_reset_all'  => false,
    'framework_title' => 'Theme Control',
    'theme'  => 'light',
    'footer_credit' => '<div style="background: #007cba; color: #fff; font-size: 17px; padding: 15px; text-align: center;">Developed By <a href="http://riptware.com" style="color: #fff; text-decoration: none;">Riptware Web Technology</a></div>',
  ) );



    // Custom


  CSF::createSection( $prefix, array(

    'title'  => 'General settings',
    'fields' => array(
      
      //Field Start

        array(
         'id'    => 'upload-favicon',
         'type'  => 'media',
         'title' => 'Favicon',
         'url'   => false,
        ),

        array(
         'id'    => 'upload-logo',
         'type'  => 'media',
         'title' => 'Upload Logo',
         'url'   => false,
    	  ),
    	 /* 
    	  array(
         'id'    => 'language-select',
         'type'  => 'select',
         'title' => 'Select language',
          'placeholder' => 'Select an Lanuage',
          'options'     => array(
            'ver-bn'  => 'Bangla',
            'ver-en'  => 'English',
          ),
          'default'     => 'ver-bn'
    	  ),
        */
        array(
         'id'    => 'fb-link',
         'type'  => 'text',
         'title' => 'Facebook Url',     
        ),

        array(
         'id'    => 'twitter-link',
         'type'  => 'text',
         'title' => 'Twitter Url',     
        ),

         array(
         'id'    => 'yt-link',
         'type'  => 'text',
         'title' => 'Youtube Url',     
        ),
        /*
         array(
         'id'    => 'footer-column',
         'type'  => 'text',
         'title' => 'Footer Column',
         'default'  => '4',     
        ),
        */
        array(
         'id'    => 'copyright-text',
         'type'  => 'wp_editor',
         'title' => 'Footer Text',
         'media_buttons' => false,     
        ),

    )

     

  ));



  // Homepage

  CSF::createSection( $prefix, array(
  'id'    => 'homepage_fields',
  'title' => 'Homepage Section',
  'icon'  => 'fa fa-plus-circle',
  ) );

  //SubOption

  //Headline Section

  CSF::createsection( $prefix, array(
     'parent' => 'homepage_fields',
     'title'  =>'News Headlines',
     'fields' => array(

         array(
         'title'   => 'Headlines title',
         'id'      => 'news-headlines-title',
         'type'    => 'text',
         'default' => 'Headlines',
         ), // End Headlines title

         array(
           'id'    => 'news-headlines',
           'type'  => 'select',
           'multiple' => true,
           'title' =>  'Select category',
           'options' => 'categories',
           'chosen' => true,
           'width'  => '200px',
           'query_args' => array(
               'hide_empty' => false,
           ),
           'desc'  => 'you can select multiple category',
         ), // End Headlines Multiple category

         array (
          'id'    => 'show-max-number-news-headlines',
          'title' => 'Show Max Number of Headlines',
          'type'  => 'text', 
          'default' => '5',
          'desc'   => 'for unlimited put -1',
         ), // End headlines Max Num show

     ) // End field
  )); // End Section

  //Home Lead Section

  CSF::createSection( $prefix, array(
    'parent' => 'homepage_fields',
    'title'  => 'Lead News section',
    'fields' => array(      
       
       array(
        'id'          => 'lead-category-select',
        'type'        => 'select',
        'title'       => 'Select Lead categories',
        'placeholder' => 'Select Lead category',
        'options'     => 'categories',
        'default'     => '1',
        'query_args'  => array(
            'hide_empty' => true,
          )
        ), //End Select Lead category

       array (
        'id'    => 'slider-right-cat-block-select',
        'type'  => 'select',
        'title' => 'Slider Right News Block',
        'placeholder' => 'Select Category',
        'options' => 'categories',
        //'default'     => '1',
       ), // End Slider Right News Block

      ), // End field

  ));    // End Section



  // Home News Block

  CSF::createsection($prefix, array(
   'parent' => 'homepage_fields',
   'title'  => 'Specific Category News Block',
   'fields'  => array(

      array(
      'id'   => 'home-specific-news-cat-block-group',
      'type' => 'repeater',
      'accordion_title_auto' => false,
      'accordion_title_number' => true,
      'title' => 'Add Block',
      'fields' => array(
          
          array(
           'id'    => 'select-specific-news-cat',
           'title' => 'Select Category',
           'type'  => 'select', 
           'options' => 'categories',
           'ajax' => true,
           'default'  => '1',
          ),

          array (
           'id'    => 'chose-specific-news-cat-block-layout',
           'title' => 'Choose Layout',
           'type'  => 'radio',
           'options' => array(
             'style-1' => 'Style 1 <br/> <img style="width: 100px; height: 63px;" src="'.get_template_directory_uri().'/assets/images/cat-style-1.png"/>',
             'style-2' => 'Style 2 <br/> <img style="width: 136px; height: 61px;" src="'.get_template_directory_uri().'/assets/images/cat-style-2.png"/>',
             'style-3' => 'Style-3 <br/> <img style="width: 112px; height: 63px;" src="'.get_template_directory_uri().'/assets/images/cat-style-3.png"/>',
             'style-4' => 'Style-4 <br/> <img style="width: 112px; height: 63px;" src="'.get_template_directory_uri().'/assets/images/cat-style-4.png"/>',
             'style-5' => 'Style-5 <br/> <img style="width: 112px; height: 63px;" src="'.get_template_directory_uri().'/assets/images/cat-style-5.png"/>',
             'ads-block' => 'Ads Block',
           ), //End Options
           'default' => 'style-1',
           'inline'   => true,
          ),

           array(
            'id'          => 'news-cat-ads-banner',
            'type'        => 'textarea',
            'title'       => 'Ads Code ',
            'desc'        => 'Paste here your Ads Code Banner <br/> Banner Size must be 720x90px',
          ),

       ), //End group Field

      ), //End Group
   
   ), // End Field
  
  )); // End Section 


  //Mobile
   // Mobile Home News Block

  CSF::createsection($prefix, array(
   'parent' => 'homepage_fields',
   'title'  => 'Mobile Specific Category News Block',
   'fields'  => array(

      array(
      'id'   => 'mobile-home-specific-news-cat-block-group',
      'type' => 'repeater',
      'accordion_title_auto' => false,
      'accordion_title_number' => true,
      'title' => 'Add Block',
      'fields' => array(
          
          array(
           'id'    => 'select-specific-news-cat',
           'title' => 'Select Category',
           'type'  => 'select', 
           'options' => 'categories',
           'ajax' => true,
           'default'  => '1',
          ),

          array (
           'id'    => 'chose-specific-news-cat-block-layout',
           'title' => 'Choose Layout',
           'type'  => 'radio',
           'options' => array(
             'style-1' => 'Style 1 <br/> <img style="width: 100px; height: 63px;" src="'.get_template_directory_uri().'/assets/images/mob-cat-style-1.png"/>',
             //'style-2' => 'Style 2 <br/> <img style="width: 136px; height: 61px;" src="'.get_template_directory_uri().'/assets/images/cat-style-2.png"/>',
             //'style-3' => 'Style-3 <br/> <img style="width: 112px; height: 63px;" src="'.get_template_directory_uri().'/assets/images/cat-style-3.png"/>',
             'style-4' => 'Style-4 <br/> <img style="width: 112px; height: 63px;" src="'.get_template_directory_uri().'/assets/images/mob-cat-style-4.png"/>',
             'style-5' => 'Style-5 <br/> <img style="width: 112px; height: 63px;" src="'.get_template_directory_uri().'/assets/images/mob-cat-style-5.png"/>',
             'ads-block' => 'Ads Block',
           ), //End Options
           'default' => 'style-1',
           'inline'   => true,
          ),

           array(
            'id'          => 'news-cat-ads-banner',
            'type'        => 'textarea',
            'title'       => 'Ads Code ',
            'desc'        => 'Paste here your Ads Code Banner <br/> Banner Size must be 720x90px',
          ),

       ), //End group Field

      ), //End Group
   
   ), // End Field
  
  )); // End Section 



// Ads Section

  CSF::createSection( $prefix, array(

    'title'  => 'Ads settings',
    'fields' => array(
      
      //Field Start
        
        array(
        'id'          => 'homepage-top-ads-banner',
        'type'        => 'textarea',
        'title'       => 'Homepage Top Banner Ads',
        'desc'        => 'Paste here your Ads Code Banner <br/> Banner Size must be 720x60px',
        ),
        
        array(
        'id'          => 'homepage-center-ads-banner',
        'type'        => 'textarea',
        'title'       => 'Homepage Center Banner Ads',
        'desc'        => 'Paste here your Ads Code Banner <br/> Banner Size must be 720x90px',
        ),

        array(
        'id'          => 'single-top-ads-banner',
        'type'        => 'textarea',
        'title'       => 'Single Top Banner Ads',
        'desc'        => 'Paste here your Ads Code Banner <br/> Banner Size must be 720x90px',
        ),
        
        array(
        'id'          => 'single-middle-ads-banner',
        'type'        => 'textarea',
        'title'       => 'Single Middle Banner Ads',
        'desc'        => 'Paste here your Ads Code Banner <br/> Banner Size must be 720x90px',
        ),
        
         array(
        'id'          => 'single-bottom-ads-banner',
        'type'        => 'textarea',
        'title'       => 'Single Bottom Banner Ads',
        'desc'        => 'Paste here your Ads Code Banner <br/> Banner Size must be 720x90px',
        ),

    ) // End field

     

  )); // End Section


  // About Theme Section

  CSF::createSection( $prefix, array(

    'title'  => 'About Theme',
    'fields' => array(
      
      //Field Start

        array(
        'type'        => 'content',
        'content'     => '<strong>Theme name:</strong> News Rabbit',
        ),
        array(
        'type'        => 'subheading',
        'content'     => 'About Developer',
        ),
        /*
        array(
         'type' => 'content',
         'content' => '<strong>project Manager:</strong> Khalekuzzaman samrat'
        ),
        */
         array(
         'type' => 'content',
         'content' => '<strong>Theme Developer:</strong> Noushad Nipun'
        ),

    ) // End field

     

  )); // End Section


}


?>