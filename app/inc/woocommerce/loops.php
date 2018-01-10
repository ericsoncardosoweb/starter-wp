<?php 
$args = array(  
    'post_type' => 'product',  
    'meta_key' => '_featured',  
    'meta_value' => 'yes',  
    'posts_per_page' => 1  
);  
  
$featured_query = new WP_Query( $args );  
      
if ($featured_query->have_posts()) :   
  
    while ($featured_query->have_posts()) :   
      
        $featured_query->the_post();  
          
        $product = get_product( $featured_query->post->ID );  
          
        // Output product information here  
          
    endwhile;  
      
endif;  
  
wp_reset_query(); // Remember to reset  
?>