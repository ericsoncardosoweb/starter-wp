<?php 
/**
 *
 * Theme Pattern Shortcodes
 *
 */

function fn_url_template(){
    return THEME;
}
add_shortcode('url-template','fn_url_template');

function fn_url_site(){
    return URL;
}
add_shortcode('url-site','fn_url_site');


