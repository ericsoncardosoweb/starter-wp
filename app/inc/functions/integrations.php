<?php 

if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
    wpcf7_enqueue_scripts();
} else {
  wp_deregister_script( 'contact-form-7' );
}

if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
    wpcf7_enqueue_styles();
} else{
  wp_deregister_style( 'contact-form-7' );
}

  
// define('WPCF7_LOAD_JS', false);
// define('WPCF7_LOAD_CSS', false);
// add_filter( 'wpcf7_load_js', '__return_false' );
// add_filter( 'wpcf7_load_css', '__return_false' );

?>