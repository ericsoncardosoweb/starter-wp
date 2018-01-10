<?php get_header(); ?>
<div class="content-area" id="page-<?php echo get_the_id() ?>">	
	<div class="page-header">
	  <div class="bg-cover" style="background-image: url(<?php echo IMAGES ?>bg-page-header.jpg);"></div>
	  <div class="container">
	    <h1 class="page-header__title"><?php the_title(); ?></h1>
	  </div>
	</div>
	<section class="section is-small">  
	  <div class="container">			
		<?php woocommerce_content(); ?>
		</div>
	</section> 
</div>
<?php get_footer(); ?>