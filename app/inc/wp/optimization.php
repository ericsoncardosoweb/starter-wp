<?php

/**

 *

 * Default settings for CMS optimization

 *

 */



// SECURITY
// Obscure login screen error messages
function login_obscure(){ return '<strong>Que chato</strong>: Ocorreu alguma falha. Por favor, tente novamente!';}
add_filter( 'login_errors', 'login_obscure' );

// Force Load Scripts in Footer
remove_action('wp_head', 'wp_print_scripts');
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'wp_enqueue_scripts', 1);
add_action('wp_footer', 'wp_print_scripts', 5);
add_action('wp_footer', 'wp_enqueue_scripts', 5);
add_action('wp_footer', 'wp_print_head_scripts', 5);

// Remove link automático nas imagens no editor WP
update_option('image_default_link_type','none');
update_option('image_default_link_type','post');



// Remove estilos da galeria

add_filter( 'use_default_gallery_style', '__return_false' );

// Força o wordpress a ler shortcodes em textos de widgets

add_filter('widget_text', 'do_shortcode');

// add_filter('the_content', 'strip_shortcodes');
// add_filter('the_content', 'do_shortcode');



add_filter('wp_nav_menu_items', 'do_shortcode');

add_filter('the_excerpt', 'do_shortcode');



// Disable auto-formatting in shortcode content

// remove_filter('the_content', 'wpautop');

// add_filter('the_content', 'wpautop', 12);



// Rodar PHP nos Widgets de Texto

add_filter('widget_text','execute_php',100);

function execute_php($html){

    if(strpos($html,"<"."?php")!==false){

        ob_start();

        eval("?".">".$html);

        $html=ob_get_contents();

        ob_end_clean();

    }

    return $html;

}

// widgets de html rodam script

add_filter('widget_text', 'shortcode_unautop');

add_filter('the_content_rss', 'do_shortcode');



function my_dynamic_menu_items( $menu_items ) {



    // A list of placeholders to replace.

    // You can add more placeholders to the list as needed.

    $placeholders = array(

        '#profile_link#' => array(

            'shortcode' => 'my_shortcode',

            'atts' => array(), // Shortcode attributes.

            'content' => '', // Content for the shortcode.

        ),

    );



    foreach ( $menu_items as $menu_item ) {



        if ( isset( $placeholders[ $menu_item->url ] ) ) {



            global $shortcode_tags;



            $placeholder = $placeholders[ $menu_item->url ];



            if ( isset( $shortcode_tags[ $placeholder['shortcode'] ] ) ) {



                $menu_item->url = call_user_func(

                    $shortcode_tags[ $placeholder['shortcode'] ]

                    , $placeholder['atts']

                    , $placeholder['content']

                    , $placeholder['shortcode']

                );

            }

        }

    }



    return $menu_items;

}

add_filter( 'wp_nav_menu_objects', 'my_dynamic_menu_items' );



function wpb_imagelink_setup() {

    $image_set = get_option( 'image_default_link_type' );



    if ($image_set !== 'none') {

        update_option('image_default_link_type', 'none');

    }

}

add_action('admin_init', 'wpb_imagelink_setup', 10);



add_filter('xmlrpc_enabled', '__return_false');

/*----------  Widget Title HTML tags  ----------*/
function enable_load_tags_widget( $var ) {
    $var = (str_replace( '[', '<', $var ));
    $var = (str_replace( ']', '>', $var ));
    return $var ;
}
add_filter( 'widget_title', 'enable_load_tags_widget' );