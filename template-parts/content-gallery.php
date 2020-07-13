<?php
/**
 * Custom Featured image template for gallery in Visual Composer.
 *
 * This 'Image Gallery' template is set up to be easily added to a visual composer
 * template with a custom shortcode and includes SEO friendly lazy loading for optimisation.
 * 
 *
 * * Gallery Dependencies:
 *
 * * responsivelyLazy.min.css
 * * responsivelyLazy.min.js
 * * gallery-styles.scss
 * * gallery-functions.php
 *
 * @link lazyload https://ivopetkov.com/b/lazy-load-responsive-images/
 *
 * @package WordPress
 */
 ?>
 
 
<div id="post-<?php the_ID(); ?>" class="image-gallery <?php post_class(); ?> "> 
	
		<div class="feat-image-container">
			<!--/.featured-image-->     
			<!-- LAZY LOAD: add 'responsively-lazy' class to img container, change padding to match image aspect ratio imageHeight/imageWidth*100 --> 
			<div class="feat-image responsively-lazy" style="padding-bottom:100%;">
				<?php the_post_thumbnail(); //array( 'class'  => '  ' )); ?>         
			</div> 
		</div>

		<div class="read-more">
			<header class="entry-header">
				<?php
					the_title('<h2 class="entry-title">', '</h2>');
				?>	
			</header>
			<!-- .entry-header -->
		</div>
</div>
