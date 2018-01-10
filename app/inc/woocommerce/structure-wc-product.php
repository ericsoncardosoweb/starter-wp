<?php 



/* Fix WooCommerce Loop Title */

if (  ! function_exists( 'woocommerce_template_loop_product_title' ) ) {

    function woocommerce_template_loop_product_title() {

        echo '<h3 class="name product-title"><a href="'.get_the_permalink().'">' . get_the_title() . '</a></h3>';

    }

}



// Insert lazi load in images

// function woocommerce_template_loop_product_thumbnail() {

//   $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' );

//     echo '<img data-original="' . $image_src[0] . '" width="400" height="900" class="attachment-shop_catalog wp-post-image lazy"><noscript><img src="' . $image_src[0] . '" width="400" height="900" class="attachment-shop_catalog wp-post-image lazy"></noscript>';

// }





/* Remove and add Product image */

remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );

remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );









// Update cart samll

add_filter('add_to_cart_fragments', 'lpd_add_to_cart_fragments');

 

function lpd_add_to_cart_fragments( $fragments ) {

    global $woocommerce;

    ob_start();?>

        

    <?php get_template_part('template-parts/woocommerce/cart'); ?>

        

    <?php $fragments['.lpd-shopping-cart'] = ob_get_clean();

    return $fragments;

}



// Custom names buttons add to cart

add_filter( 'woocommerce_product_add_to_cart_text' , 'custom_woocommerce_product_add_to_cart_text' );

/**

 * custom_woocommerce_template_loop_add_to_cart

*/

function custom_woocommerce_product_add_to_cart_text() {

  global $product;

  

  $product_type = $product->product_type;

  

  switch ( $product_type ) {

    case 'external':

      return __( 'Ver na loja', 'agatha' );

    break;

    case 'grouped':

      return __( 'Ver produtos', 'agatha' );

    break;

    case 'simple':

      return __( 'Comprar Agora', 'agatha' );

    break;

    case 'variable':

      return __( 'Ver Opções', 'agatha' );

    break;

    default:

      return __( 'Mais Detalhes', 'agatha' );

  }

  

}



// Custom product thumbnail

add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');

function custom_woocommerce_placeholder_img_src( $src ) {

    $upload_dir = wp_upload_dir();

    $uploads = IMAGES;

    $src = $uploads . '/product-thumbnail.jpg';

    return $src;

}

// Display Custom Taxonomys in product page
add_action( 'woocommerce_product_meta_start', 'display_tax_product', 10, 1 );
function display_tax_product(){ ?>
  <span>
    Seguimentos: <?php echo get_the_term_list( $post->ID, 'product_follow', '', ', ' ); ?>
  </span>
<?php }


//show attributes after summary in product single view
// add_action('woocommerce_single_product_summary', function() {
//   //template for this is in storefront-child/woocommerce/single-product/product-attributes.php
//   global $product;
//   echo $product->list_attributes();
// }, 25);


// Custom get Price
add_filter('woocommerce_get_price_html','price_custom_class', 10, 2 ); 
function price_custom_class( $price, $product ){ 
  global $product;

  if (isset($product->sale_price) && $product->sale_price != 0) {
    $price = '<del class="strike">De: '.woocommerce_price( $product->regular_price ).'</del> 
      <ins class="highlight">Por: '.woocommerce_price( $product->sale_price ).'</ins>';
  } else {
    $price = '<ins class="highlight">'.woocommerce_price( $product->regular_price ).'</ins>';
  }

  return $price;
}

?>