<?php

// Theme support for custom menus
if ( function_exists( 'wp_nav_menu' ) ){
	if (function_exists('add_theme_support')) {
		add_theme_support('nav-menus');
		add_action( 'init', 'register_my_menus' );
		function register_my_menus() {
			register_nav_menus(
				array(
					'blog-nav' => __( 'Blog navigation' )
				)
			);
		}
	}
}

// This theme uses post thumbnails
add_theme_support( 'post-thumbnails' );

// Add default posts and comments RSS feed links to head
add_theme_support( 'automatic-feed-links' );

// Add theme support for widgets on sidebar
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));

/*Seattle Times photo gallery popup shortcode*/
function myUrl($atts, $content = null) {
    extract(shortcode_atts(array(
        "gallery" => 'http://'
    ), $atts));
    return '<a href="'.$gallery.'" class="popup_mediacenter" target="popup_mediacenter"><img src="http://seattletimes.nwsource.com/art/ui/Photograph_link.gif" width="15" height="11" class="icon">'.$content.'</a>';
}
add_shortcode("photo", "myUrl");

/*Open Graph thumbnail detection*/
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches [1] [0];

  if(empty($first_img)){ //Defines a default image
    $first_img = "http://seattletimes.nwsource.com/art/ui/fb_icon_sm.jpg";
  }
  return $first_img;
}

?>