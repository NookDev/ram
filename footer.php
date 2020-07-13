<?php
/**
 * Footer template.
 *
 * @package constructed
 * @since 1.0.0
 * @version 1.0.0
 */

// Foote options jamie
$bg_image = constructed_get_options( 'footer_bg_image', CONSTRUCTED_URI . '/assets/images/footer.jpg' );
$bg_image_attr = $bg_image ? 'style="background-image: url(' . esc_url( $bg_image ) . ')"' : '';
$bg_color = constructed_get_options( 'footer_background_color', '#1b1f20' );
$copy_text = constructed_get_options( 'footer_copy', 'Constructed Theme &copy;2017. All Rights Reserved.' );
$footer_logo = constructed_get_options( 'footer_logo', CONSTRUCTED_URI . '/assets/images/logo-header.png' );
$footer_sidebar = constructed_get_options( 'footer_sidebar' );

$footer_class = ( $footer_sidebar && is_active_sidebar( 'footer-sidebar' ) ) ? '' : 'hide-margin';

/* Mobile menu */
$languages = constructed_get_languges();
$mm_social = constructed_get_options( 'mm_social' );
$mm_button = constructed_get_options( 'mm_button' );
$mm_button_text = constructed_get_options( 'mm_button_text' );
$mm_button_link = constructed_get_options( 'mm_button_link' );
$mm_additional = constructed_get_options( 'mm_additional' );
$mm_background_color = constructed_get_options( 'mm_background_color', '#1b1f20' );
$mobile_background = $mm_background_color ? 'style="background-color: ' . $mm_background_color . ';"' : '';



?>



<!-- Custom Footer menu -->
<div class="footer-container">
	<div class="footer-menu container">
		<?php
		wp_nav_menu( array( 'theme_location' => 'footer-menu' ) );?>
	</div>
</div>

<?php
/* Secondary footer */
$secondary_footer = constructed_get_options( 'secondary_footer' );
$sf_items = constructed_get_options( 'sf_items' ); ?>

			<?php if ( $secondary_footer && ! empty( $sf_items ) ): ?>
				<!-- Secondary footer -->
				<div class="layout--container contacts-footer">
					<div class="footer_contacts">
						<div class="section--inner container">
				
								<!-- Footer contact items -->
								<?php foreach ($sf_items as $item) { ?>
									<div class="row">
										<div class="footer_contacts--item">
											<div class="footer_contacts--item_inner">
												<?php if ( ! empty( $item['icon'] ) ): ?>
													<i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
												<?php endif ?>

												<?php if ( ! empty( $item['title'] ) ): ?>
													<b><?php echo esc_html( $item['title'] ); ?></b>
												<?php endif ?>

												<?php if ( ! empty( $item['content'] ) ): ?>
													<?php echo esc_html( $item['content'] ); ?>
												<?php endif ?>

											</div>
										</div>
									</div>
								<?php } ?>
								<!-- End footer contact items -->
						
						</div>
					</div>
				</div>
				<!-- End secondary footer -->
			<?php endif ?>

			<?php // View support widget.
			constructed_support_widget(); ?>

			<!-- Main footer layout -->
			<div class="layout--footer">
				<footer class="footer" <?php print $bg_image_attr; ?>>
					<div style="background-color:<?php echo esc_attr( $bg_color ); ?>" class="footer--bg"></div>
					<div class="footer--inner">
						<div class="container">
							<?php if ( $footer_sidebar && is_active_sidebar( 'footer-sidebar' ) ): ?>
								<div class="footer_main">
									<div class="row">
										<?php if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar('footer-sidebar') ); ?>
									</div>
								</div>
							<?php endif ?>

							<?php if ( $footer_logo || $copy_text ): ?>
								<!-- Footer logo and copyright text -->
								<div class="footer_copyrights <?php echo esc_attr( $footer_class ); ?>">
									<div class="footer_copyrights--container">
										<div class="row">
											<div class="col-sm-6 col-xs-12">
												<?php if ( $footer_logo ): ?>
													<!-- Footer site logo -->
													<div class="footer_copyrights--item">
														<div class="footer_copyrights--logo">
															<a href="<?php echo esc_url( home_url( '/' ) );?>"><img src="<?php echo esc_url( $footer_logo ); ?>" alt="" style="width: 190px" /></a>
														</div>
													</div>
													<!-- End footer site logo -->
												<?php endif ?>
											</div>
											<?php if ( $copy_text ): ?>
												<!-- Some coright text area -->
												<div class="col-sm-6 col-xs-12">
													<div class="footer_copyrights--item">
														<p class="footer_copyrights--item_copyrights"><?php echo esc_html( $copy_text ); ?></p>
													</div>
												</div>
												<!-- End coright text area -->
											<?php endif ?>
										</div>
									</div>
								</div>
								<!-- End footer logo and copyright text -->
							<?php endif ?>
						</div>
					</div>
				</footer>
			</div>
			<!-- End main footer layout -->
		</div>
	</div>

	<!-- Mobile navigation -->
	<div id="mobile_sidebar" class="mobile_sidebar" <?php print $mobile_background; ?>>
		<!-- Close navigation button -->
		<div class="mobile_sidebar--closer -white">
			<button class="c-hamburger c-hamburger--htx is-active"><span><?php esc_html_e( 'toggle menu', 'constructed' ); ?></span></button>
		</div>
		<!-- End close navigation button -->

		<div class="mobile_menu">
			<!-- Mobile menu -->
			<?php constructed_menu( 'mobile-menu' ); ?>
			<!-- End mobile menu -->
		</div>

		<?php if ( $languages ): ?>
			<!-- WPML language switcher -->
			<div class="select_language -mobile_sidebar">
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
			<!-- End WPML language switcher -->
		<?php endif ?>

		<?php if ( $mm_additional && count( $mm_additional ) > 0 ): ?>
			<!-- Additional menu buttons -->
			<ul class="topbar_contacts -mobile_sidebar">
				<?php foreach ($mm_additional as $item) { 
					$item_text = ! empty( $item['link'] ) ? '<a href="' . $item['link'] . '">' . $item['title'] . '</a>' : $item['title']; ?>
					<li class="topbar_contacts--item"><span class="contact_phone"><i class="<?php echo esc_attr( $item['icon'] ); ?>"></i><?php echo wp_kses_post( $item_text ); ?></span></li>
				<?php } ?>
			</ul>
			<!-- End additional menu buttons -->
		<?php endif ?>

		<?php if ( $mm_social && count( $mm_social ) > 0 ): ?>
			<!-- Social icons -->
			<div class="follow_us -mobile_sidebar">
				<ul>
					<?php foreach ( $mm_social as $social ) { ?>
						<li><a href="<?php echo esc_url( $social['link'] ); ?>"><i class="fa <?php echo esc_attr( $social['icon'] ); ?>"></i></a></li>
					<?php } ?>
				</ul>
			</div>
			<!-- End social icons -->
		<?php endif ?>

		<?php if ( $mm_button ): ?>
			<!-- Custom button -->
			<div class="mobile_sidebar--buttons">
				<a href="<?php echo esc_url( $mm_button_link ); ?>" class="button -yellow"><?php echo esc_html( $mm_button_text ); ?></a>
			</div>
			<!-- End custom button -->
		<?php endif ?>

	</div>

	<!--Start of Tawk.to Script-->
	<!--<script type="text/javascript">
	var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
	(function(){
	var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
	s1.async=true;
	s1.src='https://embed.tawk.to/595c875550fd5105d0c83fe3/default';
	s1.charset='UTF-8';
	s1.setAttribute('crossorigin','*');
	s0.parentNode.insertBefore(s1,s0);
	})();
	</script>
<!--End of Tawk.to Script-->
	<!-- End mobile navigation -->
	<?php wp_footer(); ?>
</body>
</html>