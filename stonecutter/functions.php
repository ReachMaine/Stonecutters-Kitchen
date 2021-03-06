<?php

//add_action( 'after_setup_theme', 'be_themes_child_theme_setup' );
//function be_themes_child_theme_setup() {
    load_child_theme_textdomain( 'be-themes', get_stylesheet_directory() . '/languages' );
//}

// function be_restore_default_gallery() {
// remove_shortcode('gallery');
// add_shortcode('gallery','gallery_shortcode');
// remove_shortcode('video');
// add_shortcode('video','wp_video_shortcode');
// }
// add_action( 'init', 'be_restore_default_gallery');
  require_once(get_stylesheet_directory().'/custom/oshine.php');
  require_once(get_stylesheet_directory().'/custom/branding.php');

  function reach_widgets_init() {
   // widget area on home page above contnet
   register_sidebar(
     array(
             'name' => __( 'Logo Header Text ', 'oshin' ),
             'id'   => 'sck-logo-text',
             'description'   => __( 'Text in the header with logo', 'be-oshin' ),
             'before_widget' => '<div id="logo-header-text"><div class="%2$s widget logo-text">',
             'after_widget'  => '</div></div>',
             'before_title'  => '<h2><a class="logo1" href="'.home_url().'">',
             'after_title'   => '</a></h2>',
     )
   );
   /* Call to action at bottom of page */
   register_sidebar(
         array(
          'name' => __( 'Bottom Call to Action ', 'be-themes' ),
          'id'   => 'reach-bottom-cta',
          'description'   => __( 'Widget area (above footer)', 'be-themes' ),
          'before_widget' => '<div class="%2$s widget">',
          'after_widget'  => '</div>',
          'before_title'  => '<h6>',
          'after_title'   => '</h6>',
       )
   );

}
add_action( 'widgets_init', 'reach_widgets_init' );
?>
