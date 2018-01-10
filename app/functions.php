<?php
/**
 * Definição para funções, componentes, módulos e otimização
 *
 * @package Agatha
 */

$isMobile = wp_is_mobile();
// $isMobile = true;


define( 'URL', get_home_url() . '/' );
define( 'THEME', get_bloginfo( 'template_url' ) . '/' );
define( 'ASSETS', THEME . 'assets/' );
define( 'IMAGES', ASSETS . 'images/' );
define( 'SITE_NAME', get_bloginfo( 'title' ) );
define( 'SITE_DESCRIPTION', get_bloginfo( 'description' ) );

load_theme_textdomain( 'agatha', THEME.'languages' );


/**
 * Enqueue scripts and styles.
*/

function modify_jquery() {

  if (!is_admin()) {
    wp_deregister_script('jquery');
    // wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, '1.8.1');
    // wp_enqueue_script('jquery');
  }

}
add_action('init', 'modify_jquery');

function agatha_assets() {

  wp_register_script( 'Plugins do Tema', get_template_directory_uri() .'/assets/js/vendor.min.js', false, '1.0', true );
  wp_enqueue_script( 'Plugins do Tema' );

  wp_register_script( 'Scripts do Tema', get_template_directory_uri() .'/assets/js/scripts.min.js', false, '1.0', true );
  wp_enqueue_script( 'Scripts do Tema' );

  if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }

  // Styles
  wp_register_style( 'Vendor Style', get_template_directory_uri() .'/assets/css/vendor.min.css', false, '1.0', 'all' );
  wp_enqueue_style( 'Vendor Style' );
  wp_register_style( 'Theme Style', get_template_directory_uri() .'/assets/css/main-style.min.css', false, '1.0', 'all' );
  wp_enqueue_style( 'Theme Style' );
  wp_enqueue_style( 'agatha-style', get_stylesheet_uri() );

}

add_action( 'wp_enqueue_scripts', 'agatha_assets' );

// Stop WP from printing emoji service on the front
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );

// Contact Form 7 Configuration needs to be done

//Contact Form 7 Plugin Configuration
define ( 'WPCF7_LOAD_JS',  true ); // Added to disable JS loading
define ( 'WPCF7_LOAD_CSS', false ); // Added to disable CSS loading
define ( 'WPCF7_AUTOP',    false ); // Added to disable adding <p> & <br> in form output



/*----------  Includes  ----------*/

require_once "inc/wp/setup.php";

require_once "inc/theme/setup.php";

require_once "inc/widgets/setup.php";

require_once "inc/functions/setup.php";

require_once "inc/shortcodes/setup.php";

require_once "modules/setup.php";