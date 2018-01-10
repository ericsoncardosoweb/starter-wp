<?php

if ( ! function_exists( 'agatha_setup' ) ) :

/**

 * Sets up theme defaults and registers support for various WordPress features.

 *

 * Note that this function is hooked into the aftercomponentsetup_theme hook, which

 * runs before the init hook. The init hook is too late for some features, such

 * as indicating support for post thumbnails.

 */

function agatha_setup() {

	/*

	 * Make theme available for translation.

	 * Translations can be filed in the /languages/ directory.

	 * If you're building a theme based on components, use a find and replace

	 * to change 'agatha' to the name of your theme in all the template files.

	 */

	load_theme_textdomain( 'agatha', get_template_directory() . 'lang' );



	// Add default posts and comments RSS feed links to head.

	add_theme_support( 'automatic-feed-links' );



	/**

	 * Add support for core custom logo.

	 */

	add_theme_support( 'custom-logo', array(

		'height'      => 200,

		'width'       => 200,

		'flex-width'  => true,

		'flex-height' => true,

	) );



	/*

	 * Switch default core markup for search form, comment form, and comments

	 * to output valid HTML5.

	 */

	add_theme_support( 'html5', array(

		'search-form',

		'comment-form',

		'comment-list',

		'gallery',

		'caption',

	) );



	/*

	 * Enable support for Post Formats.

	 * See https://developer.wordpress.org/themes/functionality/post-formats/

	 */

	add_theme_support( 'post-formats', array(

		// 'aside',

		// 'image',

		// 'video',

		// 'quote',

		// 'link',

	) );



	// Title Tag

	add_theme_support( 'title-tag' );



	/**

	 * Sample implementation of the Custom Header feature

	 * http://codex.wordpress.org/Custom_Headers

	 *

	 * You can add an optional custom header image to header.php like so ...

	 *

		<?php if ( get_header_image() ) : ?>

		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">

			<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">

		</a>

		<?php endif; // End header image check. ?>

	 *

	 * @package Agatha_-_Blog

	 */



	/**

	 * Set up the WordPress core custom header feature.

	 *

	 * @uses agatha_header_style()

	 */

	function agatha_custom_header_setup() {

		add_theme_support( 'custom-header', apply_filters( 'agatha_custom_header_args', array(

			'default-image'          => '',

			'default-text-color'     => '000000',

			'width'                  => 2000,

			'height'                 => 250,

			'flex-height'            => true,

			'wp-head-callback'       => 'agatha_header_style',

		) ) );

	}

	add_action( 'after_setup_theme', 'agatha_custom_header_setup' );



	if ( ! function_exists( 'agatha_header_style' ) ) :

	/**

	 * Styles the header image and text displayed on the blog

	 *

	 * @see agatha_custom_header_setup().

	 */

	function agatha_header_style() {

		$header_text_color = get_header_textcolor();



		// If no custom options for text are set, let's bail

		// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value.

		if ( HEADER_TEXTCOLOR == $header_text_color ) {

			return;

		}



		// If we get this far, we have custom styles. Let's do this.

		?>

		<style type="text/css">

		<?php

			// Has the text been hidden?

			if ( 'blank' == $header_text_color ) :

		?>

			.site-title,

			.site-description {

				position: absolute;

				clip: rect(1px, 1px, 1px, 1px);

			}

		<?php

			// If the user has set a custom color for the text use that.

			else :

		?>

			.site-title a,

			.site-description {

				color: #<?php echo esc_attr( $header_text_color ); ?>;

			}

		<?php endif; ?>

		</style>

		<?php

	}

	endif; // agatha_header_style



	/**

	 * Return early if Custom Logos are not available.

	 *

	 * @todo Remove after WP 4.7

	 */

	function agatha_the_custom_logo() {

		if ( ! function_exists( 'the_custom_logo' ) ) {

			return;

		} else {

			the_custom_logo();

		}

	}



	/**

	 * Set the content width in pixels, based on the theme's design and stylesheet.

	 *

	 * Priority 0 to make it available to lower priority callbacks.

	 *

	 * @global int $content_width

	 */

	function agatha_content_width() {

		$GLOBALS['content_width'] = apply_filters( 'agatha_content_width', 1170 );

	}

	add_action( 'after_setup_theme', 'agatha_content_width', 0 );



	// Set up the WordPress core custom background feature.

	add_theme_support( 'custom-background', apply_filters( 'agatha_custom_background_args', array(

		'default-color' => 'ffffff',

		'default-image' => '',

	) ) );

}

endif;

add_action( 'after_setup_theme', 'agatha_setup' );



// require get_template_directory() . '/aplication/theme/create-pages.php';

require 'images.php';

require 'menus.php';

require 'template-tags.php';

require 'theme-options.php';

require 'custom-pallete-colors-editor.php';

