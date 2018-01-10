<?php 

// get url post thumbnail

function get_urlthumbnail($type = 'full'){	

  $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), $type ); 

  $url = $thumb['0']; 

  echo $url;   

}

add_action('wp_body', 'get_urlthumbnail');

