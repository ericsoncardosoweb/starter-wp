<?php 

/**

 *

 * Default settings for Images theme

 *

 */



// Adiciona tamanhos de imagens customizados

add_image_size( 'thumbnail', 100, 100, true );

add_image_size( 'product', 350, 200, false );

add_image_size( 'xs', 150, 1000, false );

add_image_size( 'sm', 800, 2000, false );

add_image_size( 'lg', 1600, 2000, false );

// Thumbnails

add_theme_support( 'post-thumbnails' );

//Qualidade das Imagens padrão do WP

add_filter( 'jpeg_quality', 'wp_jpeg_quality' );

function wp_jpeg_quality() {

    return 80;

}

// Add meta-data in images
add_action( 'add_attachment', 'my_set_image_meta_upon_image_upload' );
function my_set_image_meta_upon_image_upload( $post_ID ) {

	$site_name = get_bloginfo('name');

	// Check if uploaded file is an image, else do nothing

	if ( wp_attachment_is_image( $post_ID ) ) {

		$my_image_title = get_post( $post_ID )->post_title; 

		// Sanitize the title:  remove hyphens, underscores & extra spaces:
		$my_image_title = preg_replace( '%\s*[-_\s]+\s*%', ' ',  $my_image_title );

		// Sanitize the title:  capitalize first letter of every word (other letters lower case):
		$my_image_title = ucwords( strtolower( $my_image_title ) );

		// Create an array with the image meta (Title, Caption, Description) to be updated
		// Note:  comment out the Excerpt/Caption or Content/Description lines if not needed
		$my_image_meta = array(
			'ID'		=> $post_ID,			// Specify the image (ID) to be updated
			'post_title'	=> $my_image_title .' - '. $site_name,		// Set image Title to sanitized title
			// 'post_excerpt'	=> $my_image_title .' - '. $site_name,		// Set image Caption (Excerpt) to sanitized title
			'post_content'	=> $my_image_title .' - '. $site_name,		// Set image Description (Content) to sanitized title
		);

		// Set the image Alt-Text
		update_post_meta( $post_ID, '_wp_attachment_image_alt', $my_image_title .' - ' . $site_name );

		// Set the image meta (e.g. Title, Excerpt, Content)
		wp_update_post( $my_image_meta );

	} 
}