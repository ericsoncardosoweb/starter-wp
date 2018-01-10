<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Agatha
 */

get_header(); ?>

<?php if ( is_home()) : ?>
	<?php get_template_part('modules/blog/pages/index') ?>
<?php else: ?>
	<div class="content-area" id="page-<?php echo get_the_id() ?>">
		<div class="page-header">
		  <div class="bg-cover" style="background-image: url(<?php echo IMAGES ?>bg-page-header.jpg);"></div>
		  <div class="container">
		    <h1 class="page-header__title"><?php the_title(); ?></h1>
		  </div>
		</div>
		<section class="section is-small">
		  <div class="container">
			<?php
			if ( have_posts() ) :

				while ( have_posts() ) : the_post();

					the_content();

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'components/blog/content', 'none' );

			endif; ?>
			</div>

		</section>
	</div>
<?php endif; ?>

<?php
get_footer();
