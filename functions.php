<?php

// remove more link jump
// http://codex.wordpress.org/Customizing_the_Read_More#Link_Jumps_to_More_or_Top_of_Page
function remove_more_jump_link($link) { 
$offset = strpos($link, '#more-');
if ($offset) {
$end = strpos($link, '"',$offset);
}
if ($end) {
$link = substr_replace($link, '', $offset, $end-$offset);
}
return $link;
}
add_filter('the_content_more_link', 'remove_more_jump_link');

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
//Exclude uncategorized from showing up
function exclude_post_categories($excl='', $spacer=' '){
   $categories = get_the_category($post->ID);
      if(!empty($categories)){
      	$exclude=$excl;
      	$exclude = explode(",", $exclude);
		$thecount = count(get_the_category()) - count($exclude);
      	foreach ($categories as $cat) {
      		$html = '';
      		if(!in_array($cat->cat_ID, $exclude)) {
				$html .= '<a href="' . get_category_link($cat->cat_ID) . '" ';
				$html .= 'title="' . $cat->cat_name . '">' . $cat->cat_name . '</a>';
				if($thecount>1){
					$html .= $spacer;
				}
			$thecount--;
      		echo $html;
      		}
	      }
      }
}
/*add external links to wysiwyg
function custom_mce_styles( $init ) {
    $init['theme_advanced_buttons2_add_before'] = 'styleselect';
    $init['theme_advanced_styles'] = 'External Style=external';
    return $init;
}

add_filter( 'tiny_mce_before_init', 'custom_mce_styles'  )*/

?>