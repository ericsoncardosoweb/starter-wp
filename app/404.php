<?php include ("header.php"); ?>

<section id="main-content" class="entry-content container">

	<section id="erro-404" class="erro-404">
        <h1>Erro 404</h1>
        <h2>Oops! Página não encontrada</h2>
        <p>Parece que o que você procura foi removido ou renomeado. Certifique-se que digitou corretamente o caminho da url ou faça uma pesquisa sobre o que você procura.</p>
		<p><?php get_search_form(); ?></p>
	</section>
</section><!-- .entry-content -->

<?php get_template_part('partials/contato') ?>

<?php include ("footer.php"); ?>
