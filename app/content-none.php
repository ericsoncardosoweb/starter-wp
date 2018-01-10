<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Agatha_-_Blog
 */

?>

<div class="no-results not-found">
	<div class="page-header">
	  <div class="bg-cover" style="background-image: url(<?php echo IMAGES ?>bg-page-header.jpg);"></div>
	  <div class="container">
	  	<h1 class="page-header__title">Ooops!</h1>
	  </div>
	</div>
	<section class="section is-small">
		<div class="container is-medium">
			<?php
			if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

				<p><?php printf( wp_kses( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'agatha' ), array( 'a' => array( 'href' => array() ) ) ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>

			<?php elseif ( is_search() ) : ?>

				<h2 class="section-title">Nada Encontrado</h2>

				<div class="container is-small text-center">
					<p><b><?php printf( __( 'Você pesquisou por: %s', 'agatha' ), '<span class="text-secondary">' . get_search_query() . '</span>' ); ?></b></p>
					<p>Desculpe, mas nada corresponde aos seus termos de pesquisa. Por favor, tente novamente com algumas palavras-chave diferentes.</p>
				</div>
				<?php
					get_search_form();

			else : ?>

				<h2 class="section-title">Sem resultados</h2>

				<div class="container is-small text-center">
					<p><b><?php printf( __( 'Você pesquisou por: %s', 'agatha' ), '<span class="text-secondary">' . get_search_query() . '</span>' ); ?></b></p>
					<p>Parece que não podemos encontrar o que você está procurando. Talvez a pesquisa possa ajudar.</p>
				</div>
				<?php
					get_search_form();

			endif; ?>
		</div>		
	</section>
</div><!-- .no-results -->