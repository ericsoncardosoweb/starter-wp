<?php

// WIDGET

function agatha_widgets_init(){
 register_sidebar(array(
 'name' => __('Shop Sidebar', 'agatha'),
 'id' => 'sidebar',
 'before_widget' => '<div id="%1$s" class="widget %2$s">',
 'after_widget' => '</div>',
 'before_title' => '<h3 class="widget-title">',
 'after_title' => '</h3>'
 ));

 register_sidebar(array(

 'name' => __('Advance Search', 'agatha'),

 'id' => 'advanced_search',

 'before_widget' => '<div id="%1$s" class="widget %2$s">',

 'after_widget' => '</div>',

 'before_title' => '<h3 class="widget-title">',

 'after_title' => '</h3>'

 ));

 register_sidebar(array(

 'name' => __('Destaques Home', 'agatha'),

 'id' => 'features_home',

 'before_widget' => '<div id="%1$s" class="widget %2$s">',

 'after_widget' => '</div>',

 'before_title' => '<h3 class="widget-title">',

 'after_title' => '</h3>'

 ));

 // Widgets footer

 register_sidebar(array(

 'name' => __('Footer 1', 'agatha'),

 'id' => 'footer_1',

 'before_widget' => '<div id="%1$s" class="widget %2$s">',

 'after_widget' => '</div>',

 'before_title' => '<h3 class="widget-title">',

 'after_title' => '</h3>'

 ));

 register_sidebar(array(

 'name' => __('Footer 2', 'agatha'),

 'id' => 'footer_2',

 'before_widget' => '<div id="%1$s" class="widget %2$s">',

 'after_widget' => '</div>',

 'before_title' => '<h3 class="widget-title">',

 'after_title' => '</h3>'

 ));

 register_sidebar(array(

 'name' => __('Footer 3', 'agatha'),

 'id' => 'footer_3',

 'before_widget' => '<div id="%1$s" class="widget %2$s">',

 'after_widget' => '</div>',

 'before_title' => '<h3 class="widget-title">',

 'after_title' => '</h3>'

 ));

 register_sidebar(array(

 'name' => __('Footer 4', 'agatha'),

 'id' => 'footer_4',

 'before_widget' => '<div id="%1$s" class="widget %2$s">',

 'after_widget' => '</div>',

 'before_title' => '<h3 class="widget-title">',

 'after_title' => '</h3>'

 ));

 register_sidebar(array(

 'name' => __('Footer 5', 'agatha'),

 'id' => 'footer_5',

 'before_widget' => '<div id="%1$s" class="widget %2$s">',

 'after_widget' => '</div>',

 'before_title' => '<h3 class="widget-title">',

 'after_title' => '</h3>'

 ));

 register_sidebar(array(

 'name' => __('Site Info', 'agatha'),

 'id' => 'site_info',

 'before_widget' => '<div id="%1$s" class="widget %2$s">',

 'after_widget' => '</div>',

 'before_title' => '<h3 class="widget-title">',

 'after_title' => '</h3>'

 ));

 register_sidebar(array(

 'name' => __('Google Analytics', 'agatha'),

 'id' => 'google_analytics',

 'before_widget' => '<div id="%1$s" class="google-analytics %2$s">',

 'after_widget' => '</div>',

 'before_title' => '',

 'after_title' => ''

 ));

// End Sidebars Widgets

}

add_action('widgets_init', 'agatha_widgets_init');

// Add below code in your theme's functions.php file

// Allow HTML tags in Widget title

 function html_widget_title( $var) {

 $var = (str_replace( '[', '<', $var ));

 $var = (str_replace( ']', '>', $var ));

 return $var ;

 }

 add_filter( 'widget_title', 'html_widget_title' );

// Usage : Use Forum type BB code styling just replace < & > with [ and ]

// If you wanna give class to tag , Apply without Quote.

// See Example Below.

// Title with[span class=class_without_quote ]span Tag[/span]

?>