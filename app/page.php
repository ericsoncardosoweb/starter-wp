<?php get_header(); ?>
<?php 
// page variable
$pageClass = get_field('class');
$pageId = get_field('id');
?>
<div class="content-area <?= empty($pageClass) ? 'page-'. get_the_id() : $pageClass; ?>" id="<?= empty($pageId) ? 'page-'. get_the_id() : $pageId; ?>">	
	<div class="page-header">
	  <div class="bg-cover" style="background-image: url(<?php echo IMAGES ?>bg-page-header.jpg);"></div>
	  <div class="container">

	  	<?php if (!is_cart()): ?>
	    <h1 class="page-header__title"><?php the_title(); ?></h1>
	  	<?php else: ?>
	    <h1 class="page-header__title has-icon"><svg class="icon icon-carrinho"><use xlink:href="#icon-carrinho"></use></svg> Carrinho de Compras</h1>
	  	<?php endif ?>
	  </div>
	</div>
	<section class="section is-small">  
	  <div class="container">			
		<?php
		while ( have_posts() ) : the_post();

			the_content();

		endwhile;
		?>
		</div>

	</section> 
</div>

<?php get_footer(); ?>