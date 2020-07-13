<?php

//* Login Screen: Change login logo (311px x 133px)
add_action( 'login_head', 'b3m_custom_login_logo' );
function b3m_custom_login_logo() {
	echo '<style type="text/css">
    h1 a { background-image:url('.get_stylesheet_directory_uri().'/assets/images/login_logo.png) !important; background-size: 320px 149px !important; /*background-color: aqua*/ !important;height: 149px !important; width: 320px !important; margin-bottom: 0 !important; padding-bottom: 0 !important; }
    .login form { margin-top: 10px !important; background-color:transparent!important}
    </style>';
}

//* Login Screen: Use your own URL for login logo link
add_filter( 'login_headerurl', 'b3m_url_login' );
function b3m_url_login(){
	
	return get_bloginfo( 'wpurl' ); //This line keeps the link on current website instead of WordPress.org
}

//* Login Screen: Change login logo hover text
add_filter( 'login_headertitle', 'b3m_login_logo_url_title' );
function b3m_login_logo_url_title() {
  
  return 'Developed by Nook Digital Marketing';
  
}

//* Login Screen: Set 'remember me' to be checked
add_action( 'init', 'b3m_login_checked_remember_me' );
function b3m_login_checked_remember_me() {
  
  add_filter( 'login_footer', 'b3m_rememberme_checked' )
  ;
}
function b3m_rememberme_checked() {
  
  echo "<script>document.getElementById('rememberme').checked = true;</script>";
  
}

//* Login Screen: Don't inform user which piece of credential was incorrect
add_filter ( 'login_errors', 'b3m_failed_login' );
function b3m_failed_login () {
  
  return 'The login information you have entered is incorrect. Please try again.';
  
}

//* Modify the admin footer text
add_filter( 'admin_footer_text', 'b3m_modify_footer_admin' );
function b3m_modify_footer_admin () {
  
  echo '<span id="footer-thankyou">Theme Development by <a href="www.nookdigitalmarketing.com.au" target="_blank">Jamie Polson-Brown @ Nook Digital Marketing</a></span>';
}

//* Add theme info box into WordPress Dashboard
add_action('wp_dashboard_setup', 'b3m_add_dashboard_widgets' );
function b3m_add_dashboard_widgets() {
  
  wp_add_dashboard_widget('wp_dashboard_widget', 'Theme Details', 'b3m_theme_info');
  
}
 
function b3m_theme_info() {
  
  echo "<ul>
  <li><strong>Developed By:</strong> Nook Digital Marketing</li>
  <li><strong>Website:</strong> <a href='http://www.nookdigitalmarketing.com.au'http://www.nookdigitalmarketing.com.au</a></li>
  <li><strong>Contact:</strong> <a href='mailto:jamie@nookdigital.marketing'>jamie@
  nookdigital.marketing</a></li>
  </ul>";
  
}