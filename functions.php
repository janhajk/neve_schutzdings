<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'neve_child_load_css' ) ):
	/**
	 * Load CSS file.
	 */
	function neve_child_load_css() {
		wp_enqueue_style( 'neve-child-style', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'neve-style' ), NEVE_VERSION );
	}
endif;
add_action( 'wp_enqueue_scripts', 'neve_child_load_css', 20 );





 // checks for woocommerce templates in woocommerce folder
function sot_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'sot_add_woocommerce_support' );



/*
* Reduce the strength requirement for woocommerce registration password.
* Strength Settings:
* 0 = Nothing = Anything
* 1 = Weak
* 2 = Medium
* 3 = Strong (default)
*/

add_filter( 'woocommerce_min_password_strength', 'wpglorify_woocommerce_password_filter', 10 );
function wpglorify_woocommerce_password_filter() {
      return 1;
}



add_action('wp_head', 'mask_add_google_analytics', 20);
function mask_add_google_analytics() {
      ?>
      <!-- Global site tag (gtag.js) - Google Analytics -->
      <script async src="https://www.googletagmanager.com/gtag/js?id=UA-195608804-1">
      </script>
      <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
      
        gtag('config', 'UA-195608804-1');
      </script>
      <?php
}

?>