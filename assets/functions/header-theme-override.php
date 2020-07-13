<?php

/**
HEADER

- Add id and classes to header
- Override theme header bootstrap classes,
- added id to hamburger menu,
 
 **/


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
						
						<div class="col-md-6 col-sm-12 visible-md-block visible-lg-block nav-block">
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
								<?php endif; ?>

								<?php if ( $tm_button ):
									$button_arrow = constructed_get_options( 'tm_button_arrow' ) ? '-arrowed' : ''; ?>
									<a href="<?php echo esc_url( $tm_button_link ); ?>" class="button -yellow <?php echo esc_attr( $button_arrow ); ?> -menu_size top-menu-button">
										<span class="button--inner"><?php echo esc_html( $tm_button_text ); ?></span>
									</a>
								<?php endif; ?>

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