<?php
/**
 * Header template.
 *
 * @package constructed
 * @since 1.0.0
 *
 */
// Get available languages for switcher.
$languages = constructed_get_languges();

// Check if lagnguages exist and set needed css class test.
$follow_us_class = $languages ? 'col-md-9' : 'col-md-12';  

// Get header social.
$tm_social = constructed_get_options( 'tm_social' );

// Get custom contact items.
$tm_contacts = constructed_get_options( 'tm_contacts' );

// Site favicon.
$site_favicon = constructed_get_options( 'site_favicon' );

/* Stiky header class */
$sticky_header_class = constructed_get_options( 'sticky_header' ) ? 'header_sticky' : ''; ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-134270012-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-134270012-1');
	</script>
	
	<link rel="icon" href="favicon.ico">

	<meta charset="<?php bloginfo('charset'); ?>">
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<?php if ( ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) && $site_favicon ) { ?>
    <link href="<?php echo esc_attr( $site_favicon );?>" rel="shortcut icon" />
    
    <!--DYNAMIC CANONICAL TAG-->
    <link rel="canonical" href="https://perthminiexcavatorhire.com.au<?php echo $_SERVER['REQUEST_URI'];?>">
    <?php } ?>
    
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?> >
	<?php constructed_preloader(); ?>
	<div id="main">
		<div class="layout">
			<div class="layout--header">

				<?php if ( ( $tm_contacts && count( $tm_contacts ) || $tm_social && count( $tm_social ) ) > 0 || $languages ): ?>
					<!-- Additinal topbar for social icons, language swithcer and custom contac items -->
				<div class="topbar">
						<div class="container">
							<div class="row">
								<?php if ( is_array( $languages ) && count( $languages ) > 0 ): ?>
									<!-- Language switcher -->
									<div class="col-md-3">
										<div class="topbar--left">
											<div class="select_language">
												<button type="button" class="select_language--opener">
													<i class="select_language--opener_icon icons8-globe-earth"></i><?php esc_html_e( 'Language', 'constructed' ); ?>
												</button>
												<ul class="select_language--list">
													<?php foreach( $languages as $l ) { 
														$active_language = ! $l['active'] ? 'not-active' : 'active'; ?>
														<li class="<?php echo esc_attr( $active_language ); ?>"><a href="<?php echo esc_url( $l['url'] ); ?>"><?php echo esc_html( $l['translated_name'] ); ?></a></li>
													<?php } ?>
												</ul>
											</div>
										</div>
									</div>
								<?php endif ?>
								<div class="<?php echo esc_attr( $follow_us_class ); ?>">

									<!-- Topbar_contacts-->
									<div class="topbar--right">

										<?php if ( $tm_social && count( $tm_social ) > 0 ): ?>
											<!-- Our Social -->
											<div class="follow_us">
												
												<ul>
													<?php foreach ( $tm_social as $social ) { ?>
														<li><a href="<?php echo esc_url( $social['link'] ); ?>"><i class="<?php echo esc_attr( $social['icon'] ); ?>"></i></a></li>
													<?php } ?>
												</ul>
											</div>
											<!-- End Social -->
										<?php endif ?>

										<?php if ( $tm_contacts && count( $tm_contacts ) > 0 ): ?>
											<!-- Contacts -->
											<ul class="topbar_contacts">
												<?php foreach ( $tm_contacts as $item ) {
													$target = ! empty( $item['target_blank'] ) && $item['target_blank'] ? 'target="_blank"' : '';
													$item_text = ! empty( $item['link'] ) ? '<a ' . $target . ' href="' . $item['link'] . '">' . $item['title'] . '</a>' : $item['title']; ?>
													<li class="topbar_contacts--item">
														<span class="contact_phone">
															<i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
															<?php echo $item_text; ?>
														</span>
													</li>
												<?php } ?>
											</ul>
											<!-- End contacts -->
										<?php endif ?>

									</div>
									<!-- End topbar_contacts-->
								</div>
							</div>
						</div>
					</div>
					<!-- End topbbar -->
				<?php endif; 
				
				// Our site header
				constructed_top_header(); 
				
				if( ! empty( $sticky_header_class ) && $sticky_header_class ) {
					
					// Add CUSTOM sticky header
					constructed_top_header( $sticky_header_class ); 
				} ?>
			</div>