<?php 



require_once 'functions.php';
require_once 'taxonomy.php';



/* Remove default Hooks */

// remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);



/* Add Ordering to Flatsome tools */

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);

remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);



//declare WC support

function aventurine_child_wc_support() {

  add_theme_support( 'woocommerce' );

}

add_action( 'after_setup_theme', 'aventurine_child_wc_support' );



// Remove each style one by one

add_filter( 'woocommerce_enqueue_styles', 'jk_dequeue_styles' );

function jk_dequeue_styles( $enqueue_styles ) {

  unset( $enqueue_styles['woocommerce-general'] );  // Remove the gloss

  unset( $enqueue_styles['woocommerce-layout'] );   // Remove the layout

  // unset( $enqueue_styles['woocommerce-smallscreen'] );  // Remove the smallscreen optimisation

  return $enqueue_styles;

}



// Or just remove them all in one line

add_filter( 'woocommerce_enqueue_styles', '__return_false' );



include 'structure-wc-product.php';

include 'loops.php';



function insert_modal_product() { 

    include 'modal-product.php';

}

// add_action('wp_footer', 'insert_modal_product');



add_theme_support( 'yoast-seo-breadcrumbs' );



// define the woocommerce_show_page_title callback 

function filter_woocommerce_show_page_title( $array, $int ) { ?>

  <header class="page-header">

    <?php

    if ( function_exists('yoast_breadcrumb') ) {

    yoast_breadcrumb('

    <p id="breadcrumbs">','</p>

    ');

    }

    ?>

    <div class="row">

      <div class="col-sm col-xs-12">

        <h1 class="page-title"><?php woocommerce_page_title(); ?></h1>    

      </div>

      <div class="col-sm-3 col-xs-12">

        <?php //woocommerce_catalog_ordering(); ?>

        <div class="yith-woocommerce-ajax-product-filter yith-wcan-sort-by with-checkbox">

          <div class="dropdown">

            <button class="dropdown-toggle" data-toggle="dropdown">Ordenar por:</button>

            <div class="dropdown-menu  dropdown-menu-right">

              <ul class="orderby">

                <li class="orderby-wrapper">

                  <a data-id="menu_order" class="orderby-item active" href="http://localhost/forteventura/loja">

                    Ordenação padrão

                  </a>

                </li>                           

                <li class="orderby-wrapper">

                  <a data-id="popularity" class="orderby-item" href="http://localhost/forteventura/loja?orderby=popularity">

                    Ordenar por popularidade

                  </a>

                </li>                           

                <li class="orderby-wrapper">

                  <a data-id="rating" class="orderby-item" href="http://localhost/forteventura/loja?orderby=rating">

                    Ordenar por média de classificação

                  </a>

                </li>                           

                <li class="orderby-wrapper">

                  <a data-id="date" class="orderby-item" href="http://localhost/forteventura/loja?orderby=date">

                    Ordenar por mais novos

                  </a>

                </li>                           

                <li class="orderby-wrapper">

                  <a data-id="price" class="orderby-item" href="http://localhost/forteventura/loja?orderby=price">

                    Ordenar por preço: menor para maior

                  </a>

                </li>                           

                <li class="orderby-wrapper">

                  <a data-id="price-desc" class="orderby-item" href="http://localhost/forteventura/loja?orderby=price-desc">

                    Ordenar por preço: maior para menor

                  </a>

                </li>

              </ul>              

            </div>

          </div>

        </div>

      </div>

    </div>

  </header>

<?php }; 

         

// add the filter 

add_filter( 'woocommerce_show_page_title', 'filter_woocommerce_show_page_title', 10, 2 ); 


add_filter( 'woocommerce_loop_add_to_cart_link', 'quantity_inputs_for_woocommerce_loop_add_to_cart_link', 10, 2 );
function quantity_inputs_for_woocommerce_loop_add_to_cart_link( $html, $product ) {
  if ( $product && $product->is_type( 'simple' ) && $product->is_purchasable() && $product->is_in_stock() && ! $product->is_sold_individually() ) {
    $html = '<form action="' . esc_url( $product->add_to_cart_url() ) . '" class="cart test" method="post" enctype="multipart/form-data">';
    $html .= '<a href="'.get_permalink().'" class="button is-default">Mais Detalhes</a>';
    $html .= '<button type="submit" class="button is-primary add_to_cart_button ajax_add_to_cart" data-product_id="'.esc_attr( $product->get_id() ).'" data-product_sku="'.esc_attr( $product->get_sku() ).'" data-quantity="'.esc_attr( isset( $quantity ) ? $quantity : 1 ).'" class="'.esc_attr( isset( $class ) ? $class : 'button' ).' product_type_%s">' . esc_html( $product->add_to_cart_text() ) . '</button>';
    // $html .= woocommerce_quantity_input( array(), $product, false );
    $html .= '</form>';
  }
  return $html;
}

?>