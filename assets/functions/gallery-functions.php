<?php 
//test
//return '<h2>This is my custom PHP output!</h2>';
/**
 * Function for looping the custom post type galleries images, for secure use in Visual Composer layouts. Included in functions.php.
 * 
 *
*/
//enqueue assets only if page ...
 /*function conditional_enqueue() {
   
	 //GALLERY ASSETS
	if (is_page('excavator-image-gallery')) {
		  //enqueue customizr for feature detection 3kb
  
	wp_enqueue_script( 
        'responsivelyLazy',
        get_stylesheet_directory_uri() . '/assets/scripts/responsivelyLazy.min.js',
        array(),
        '2.0',
        true );
    } //END OF GALLERY ASSETS
}
add_action( 'wp_enqueue_scripts', 'conditional_enqueue' );*/

function gallery_posts( $atts ) {
    extract( shortcode_atts( array(
		'cat_id'=>23,//change cat id to match cat of cpt
		'type' => 'gallery',//name of cpt
        'perpage' => 9
    ), $atts ) );

	$q2 = null;
	
    $args = array(
		'cat'=> $cat_id,
        'post_type' => $type,
        'posts_per_page' => $perpage,
    );
	
    $q2 = new WP_Query( $args );
	
	$output = '';
	
    if ( $q2->have_posts() ) {
		
	$output .= '<div class="gallery">';
		
     while ( $q2->have_posts() ) : $q2->the_post();
		
		 ob_start();
		
		
		get_template_part( '/template-parts/content', 'gallery' );


          $output .= ob_get_clean();
		  //$output .= 'test output ';
     endwhile;
		
	$output .= '</div>';
		
	wp_reset_postdata();
	
	
	return $output;
	}
    wp_reset_query();

}
add_shortcode('gallery_shortcode2', 'gallery_posts');

//function for changing featured image attributes to req of lazy load.
//CONDITIONAL TO APPLY TO GALLERY PAGE ONLY
function alter_feat_img_attributes($attr) {
	if (is_page('excavator-image-gallery')) {
	$attr['data-srcset'] = $attr['srcset'];
	$attr['src'] = $attr['src'];
	$attr['srcset'] = "data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==";
	}
  return $attr;
//}
}
add_filter( 'wp_get_attachment_image_attributes', 'alter_feat_img_attributes');