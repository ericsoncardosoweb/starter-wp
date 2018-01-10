<?php 
if (is_home() && is_front_page() && is_shop()){
	add_action( 'pre_get_posts', 'iconic_hide_out_of_stock_products' );
}

function iconic_hide_out_of_stock_products( $q ) {

    if ( ! $q->is_main_query() || is_admin() ) {
        return;
    }

    if ( $outofstock_term = get_term_by( 'name', 'outofstock', 'product_visibility' ) ) {

        $tax_query = (array) $q->get('tax_query');

        $tax_query[] = array(
            'taxonomy' => 'product_visibility',
            'field' => 'term_taxonomy_id',
            'terms' => array( $outofstock_term->term_taxonomy_id ),
            'operator' => 'NOT IN'
        );

        $q->set( 'tax_query', $tax_query );

    }

    remove_action( 'pre_get_posts', 'iconic_hide_out_of_stock_products' );

}

// add_theme_support( 'wc-product-gallery-zoom' );
remove_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' );

?>