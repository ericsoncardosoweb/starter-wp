<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Agatha_-_Blog
 */

get_header(); ?>

	<section class="content-area search">

		<?php
		if ( have_posts() ) : ?>

      <div class="page-header">
        <div class="bg-cover" style="background-image: url(<?php echo IMAGES ?>bg-page-header.jpg);"></div>
        <div class="container">
          <h1 class="page-header__title"><?php printf( esc_html__( 'Resultados para: %s', 'agatha' ), '<span class="text-secondary">' . get_search_query() . '</span>' ); ?></h1>
        </div>
      </div>

      <section class="section is-small">
        <div class="container">

          <?php 
          while (have_posts()) : the_post(); ?>
            <div class="search-post">
              <?php if (has_post_thumbnail()): ?>
              <div class="thumbnail">
                <a href="<?php the_permalink() ?>"><?php the_post_thumbnail( 'thumbnail' ) ?></a>
              </div>
              <?php endif ?>
              <div class="content">
                <h3 class="title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                <p><a href="<?php the_permalink() ?>"><?php echo the_excerpt(); ?></a></p>
              </div>
            </div>

          <?php endwhile; ?>

          <?php agatha_pagination(); ?>

        </div>
      </section>

		<?php	else :

			get_template_part( 'content', 'none' );

		endif; ?>

	</section>
<?php get_footer(); ?>