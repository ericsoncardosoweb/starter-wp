<?php 
// Excerpt 

//custom excerpt
function excerpt_readmore($more) {
    return '... <a href="'. get_permalink($post->ID) . '" class="read-more">Continue Lendo</a>';
}
add_filter('excerpt_more', 'excerpt_readmore');

//custom excerpt length
function agatha_excerpt_length( $length ) {
    return 25;
}
add_filter( 'excerpt_length', 'agatha_excerpt_length');

//custom excerpt length tile
function the_title_exerpt( $length = 120 ) {
  echo mb_strimwidth( get_the_title(), 0, $length, '...' );
}
add_filter( 'the_title_exerpt', 'the_title_exerpt');

function get_excerpt(){
  $excerpt = get_the_content();
  $excerpt = preg_replace(" ([.*?])",'',$excerpt);
  $excerpt = strip_shortcodes($excerpt);
  $excerpt = strip_tags($excerpt);
  $excerpt = substr($excerpt, 0, 50);
  $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
  $excerpt = trim(preg_replace( '/s+/', ' ', $excerpt));
  $excerpt = $excerpt.'... <a href="'.$permalink.'" class="read-more">Continue Lendo</a>';
  return $excerpt;
}

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  } 
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  } 
  $content = preg_replace('/[.+]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

?>