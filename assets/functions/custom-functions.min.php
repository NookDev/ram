<?php 

function register_footer_menu() {
  register_nav_menu('footer-menu',__( 'Footer Menu' ));
}
add_action( 'init', 'register_footer_menu' );
?>
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


?>
<?php

/**
HEADER

- Add id and classes to header
- Override theme header bootstrap classes,
- added id to hamburger menu,
 
 **/

//temp deactivated
if ( ! function_exists( 'constructed_top_header' ) ) {
	function constructed_top_header( $sticky = '' ) {
		/* Custom button */
		$tm_button 		= constructed_get_options( 'tm_button' );
		$tm_button_text = constructed_get_options( 'tm_button_text' );
		$tm_button_link = constructed_get_options( 'tm_button_link' );

		/* Header Sidebar */
		$header_sidebar = constructed_get_options( 'header_sidebar', false );
		$h_class = ( ! $header_sidebar ) ? '-activate' : '';

		/* Remove right padding for sidebar if button not set */
		$padding_class = $tm_button ? '' : 'remove-padding'; ?>
		<header id="pmd-header" class="header <?php echo esc_attr( $sticky ); ?>">
			<div class="container">
				<div class="header--inner">
					<div class="row">
					
						<div class="col-md-6 col-sm-12">
							<div class="header--logo logo">
								<a href="<?php echo esc_url( home_url( '/' ) );?>">
									<?php constructed_get_site_logo( $sticky ); ?>
								</a>
							</div>			
							
						</div><!-- left -->
						
						<div class="col-lg-6 col-sm-12 visible-md-block visible-lg-block nav-block">
							<div class="header--right <?php echo esc_attr( $h_class ); ?>">
							
								<?php if ( $header_sidebar && is_active_sidebar( 'header-sidebar' ) ): ?>
									<div class="header_contacts <?php echo esc_attr( $padding_class ); ?>">
										<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar('header-sidebar') ); ?>
									</div>
								<?php else: ?>
									<nav class="header_nav -on_dark">
										<div class="header_nav--inner">
											<!-- Main menu -->
											<?php constructed_menu( 'top-menu' ); ?>
										</div>
									</nav>
								<?php endif ?>

								<?php if ( $tm_button ):
									$button_arrow = constructed_get_options( 'tm_button_arrow' ) ? '-arrowed' : ''; ?>
									<a href="<?php echo esc_url( $tm_button_link ); ?>" class="button -yellow <?php echo esc_attr( $button_arrow ); ?> -menu_size top-menu-button">
										<span class="button--inner"><?php echo esc_html( $tm_button_text ); ?></span>
									</a>
								<?php endif ?>

							</div>
						</div><!--right-->
						
					</div>
				</div>				
											
				<div class="mobile-nav-pmd">
					<div id="mobile-menu_hamburger" class="header--menu_opener visible-xs-block visible-sm-block">
						<span class="c-hamburger c-hamburger--htx">
							<span><?php esc_html_e( 'toggle menu', 'constructed' ); ?></span>
						</span>
					</div>

					<div class="menu-word">
						<h3>menu</h3>
						<!--<i class="fa fa-chevron-circle-left"></i>-->
					</div>
				</div><!--end mobile-nav-pmd-->
			
			</div>

			<?php if ( $header_sidebar && is_active_sidebar( 'header-sidebar' ) ): ?>
				<nav class="header_nav -wide visible-md-block visible-lg-block">
					<div class="header_nav--inner">
						<!-- Main menu -->
						<?php constructed_menu( 'top-menu' ); ?>
					</div>
				</nav>
			<?php endif; ?>
			
		</header>
	<?php }
}
?>