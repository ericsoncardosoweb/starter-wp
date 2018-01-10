<?php 
// Register Custom Post Type
function banners_post() {

	$labels = array(
		'name'                  => _x( 'Banners e Sliders', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Slide', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Banners e Sliders', 'text_domain' ),
		'name_admin_bar'        => __( 'Banners e Sliders', 'text_domain' ),
		'archives'              => __( 'Banners e Sliders', 'text_domain' ),
		'parent_item_colon'     => __( 'Parente Slide:', 'text_domain' ),
		'all_items'             => __( 'Todos os destaques', 'text_domain' ),
		'add_new_item'          => __( 'Add Novo Slide', 'text_domain' ),
		'add_new'               => __( 'Add Novo', 'text_domain' ),
		'new_item'              => __( 'Novo Slide', 'text_domain' ),
		'edit_item'             => __( 'Editar Slide', 'text_domain' ),
		'update_item'           => __( 'Atualizar Slide', 'text_domain' ),
		'view_item'             => __( 'Ver Slide', 'text_domain' ),
		'search_items'          => __( 'Pesquisar Slide', 'text_domain' ),
		'not_found'             => __( 'Nada Encontrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nada na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem de destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Seleciona a imagem', 'text_domain' ),
		'remove_featured_image' => __( 'Remover a imagem', 'text_domain' ),
		'use_featured_image'    => __( 'Selecione uma imagem para destaque', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir imagem de destaque', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Slide', 'text_domain' ),
		'items_list'            => __( 'Slides list', 'text_domain' ),
		'items_list_navigation' => __( 'Slides list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter Slides list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Slide', 'text_domain' ),
		'description'           => __( 'Slide', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-images-alt2',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'banners', $args );

}
add_action( 'init', 'banners_post', 0 );

// Categoria do Banner
function banner_category() {

	$labels = array(
		'name'                       => _x( 'Banners', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Banner', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Banners', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'banner_category', array( 'banners' ), $args );

}
add_action( 'init', 'banner_category', 0 );


// Shortcode do Banner

function sortcode_get_meta( $value ) {
  global $post;

  $field = get_post_meta( $post->ID, $value, true );
  if ( ! empty( $field ) ) {
    return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
  } else {
    return false;
  }
}

function sortcode_add_meta_box( $post_type, $post ) {
  add_meta_box(
    'sortcode_',
    __( 'Sortcode', 'sortcode' ),
    'sortcode_html',
    'banners',
    'side',
    'default'
  );
}
add_action( 'add_meta_boxes', 'sortcode_add_meta_box', 10, 2 );

function sortcode_html( $post) {
  wp_nonce_field( '_sortcode_nonce', 'sortcode_nonce' ); ?>

  <p><b>Copie e cole o shortcode nas páginas onde deseja que seja exibido</b></p>

  <p>
    [banners id="<?php the_id(); ?>"]
  </p>
  <?php
}

function sortcode_save( $post_id ) {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
  if ( ! isset( $_POST['sortcode_nonce'] ) || ! wp_verify_nonce( $_POST['sortcode_nonce'], '_sortcode_nonce' ) ) return;
  if ( ! current_user_can( 'edit_post', $post_id ) ) return;

  if ( isset( $_POST['sortcode_shortcode'] ) )
    update_post_meta( $post_id, 'sortcode_shortcode', esc_attr( $_POST['sortcode_shortcode'] ) );
}
add_action( 'save_post', 'sortcode_save' );


?>