<?php
/**
 * The template includes necessary functions for theme.
 *
 * @package constructed jamie
 * @since 1.0.0
 *
 */
/*INCLUDE whitelabel FUNCTIONS*/ 
//include("assets/functions/whitelabel_functions.php");

/*INCLUDE CUSTOM FUNCTIONS*/ 
include("assets/functions/custom-functions.min.php");

//WORDPRESS DEFAULT FUNCTIONS //WORDPRESS DEFAULT FUNCTIONS //WORDPRESS DEFAULT FUNCTIONS

//HIDE ADMIN BAR
//add_filter('show_admin_bar', '__return_false');

/**
* Disable the emoji's
*/
function disable_emojis() {
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' ); 
remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
remove_filter( 'comment_text_rss', 'wp_staticize_emoji' ); 
remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
add_filter( 'tiny_mce_plugins', 'disable_emojis_tinymce' );
add_filter( 'wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2 );
}
add_action( 'init', 'disable_emojis' );
add_action( 'wp_print_styles', 'ewp_deregister_styles', 999 );

function ewp_deregister_styles() {

  wp_deregister_style( 'et-social-custom' );
  wp_deregister_style( 'fl-builder-google-fonts-90e3a935a526a58321e47b94db858e5b' );
 wp_dequeue_style( 'fl-builder-google-fonts-90e3a935a526a58321e47b94db858e5b' );
}
/**
* Filter function used to remove the tinymce emoji plugin.
* 
* @param array $plugins 
* @return array Difference betwen the two arrays
*/
function disable_emojis_tinymce( $plugins ) {
if ( is_array( $plugins ) ) {
return array_diff( $plugins, array( 'wpemoji' ) );
} else {
return array();
}
}

/**
* Remove emoji CDN hostname from DNS prefetching hints.
*
* @param array $urls URLs to print for resource hints.
* @param string $relation_type The relation type the URLs are printed for.
* @return array Difference betwen the two arrays.
*/
function disable_emojis_remove_dns_prefetch( $urls, $relation_type ) {
if ( 'dns-prefetch' == $relation_type ) {
/** This filter is documented in wp-includes/formatting.php */
$emoji_svg_url = apply_filters( 'emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/' );

$urls = array_diff( $urls, array( $emoji_svg_url ) );
}

return $urls;
}

//DISABLE WP_EMBED
function my_deregister_scripts(){
wp_deregister_script( 'wp-embed' );
}
add_action( 'wp_footer', 'my_deregister_scripts' );

/**
 * Enqueue scripts and styles.
 */


/*function my_theme_enqueue_styles() {

    $parent_style = 'theme-styles'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
*/

//ADD CUSTOM STYLESHEET TO OVERRIDE ALL OTHERS
function my_custom_styles() {
	// Register child main.css
	wp_register_style( 'main', get_stylesheet_directory_uri().'/assets/styles/main.css' );
	
	 // Register my custom minified and concatenated stylesheet
  	wp_register_style( 'styles', get_stylesheet_directory_uri().'/assets/scss/styles.min.css' );
	
  // Load my custom stylesheets in order
	wp_enqueue_style( 'main' );
  	wp_enqueue_style( 'styles' );
}

//PHP_INT_MAX ensures it loads last
add_action( 'wp_enqueue_scripts', 'my_custom_styles', PHP_INT_MAX );

//access is_post_type in and out of the loop for conditional enqueue
function is_post_type($type){
	global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}

//enqueue assets //only if page ...
 function js_enqueue() {
	 
	 //gallery scripts
	if ( is_page( 'mini-dumper-videos' or 'mini-dumper-photos' ) ) {
   	wp_enqueue_script( 
        'scripts1',
        get_stylesheet_directory_uri().'/assets/js/scripts1-min.js',
        array(),
        '1.0',
        true );
	 };
	 
	 //booking page scripts
	 if ( is_page( 'hire-mini-dumper-perth' ) ) {
	  wp_enqueue_script( 
			'scripts2',
			get_stylesheet_directory_uri().'/assets/js/scripts2-min.js',
			array(),
			'1.0',
			true );
	  }
	/*wp_enqueue_script( 
        'scripts3',
        get_stylesheet_directory_uri().'/assets/js/scripts3-min.js',
        array(),
        '1.0',
        true );*/
}
add_action( 'wp_enqueue_scripts', 'js_enqueue' );

//ADD Page Slug TO Body Class
function add_slug_body_class( $classes ) {
global $post;
if ( isset( $post ) ) {
$classes[] = $post->post_type . '-' . $post->post_name;
}
return $classes;
}
add_filter( 'body_class', 'add_slug_body_class' );

//Register custom post type for Gallery
function create_custom_post_type() {

 register_post_type( 'gallery',
    array(
        'labels' => array(
          'name' => __( 'Gallery' ),
          'singular_name' => __( 'Gallery' ),
        ),
        'public' => true,
        'supports'  => array( 'title', 'thumbnail' 
        ),
        'taxonomies'  => array( 'category' ),
    )
  );  
}

    //add action: post types
add_action( 'init', 'create_custom_post_type' );