<?php

/**

 *

 * Inserting Theme Menus

 *

 */



// NAVIGATION

register_nav_menus( array(

    'header_menu' => __( 'Header', 'agatha_theme' ),

    'mobile_menu' => __( 'Header Mobile', 'agatha_theme' ),

    'footer_menu' => __( 'Footer', 'agatha_theme' ),

    'top_menu_left' => __( 'Top Menu Left', 'agatha_theme' ),
    'top_menu_right' => __( 'Top Menu Right', 'agatha_theme' ),

    'social_menu' => __( 'Redes Sociais', 'agatha_theme' ),

    ) );

add_theme_support('menus');

