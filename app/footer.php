<?php
/**
 * Rodapé do Site
 *
 * @package Agatha
 */

?>
	</main><!-- / #main-content -->

	<footer id="footer" class="footer" role="contentinfo">
		<div class="footer-widgets-area">
			<div class="container-fluid">
				<?php get_template_part( 'partials/footer/widgets' ); ?>
			</div>
		</div>

		<div class="site-info">
			<div class="container-fluid">
				<?php if ( is_active_sidebar( 'site_info' ) ): ?>
				  <?php dynamic_sidebar( 'site_info' ); ?>
				<?php endif; ?>
			</div>
		</div>

	</footer>
</div><!-- / #wrapper -->

	<!-- Icons -->
	<?php echo file_get_contents(ASSETS . "svg/symbols.svg"); ?>

	<!-- Scripts WP -->
	<?php wp_footer(); ?>

	<link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
	<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js" async></script>
	<script async>
	  WebFont.load({
	    google: {"families":["Roboto+Condensed:400,700","Roboto:300,400,500,600,700","Orbitron:400,700"]},
	    active: function() {
	      sessionStorage.fonts = true;
	    }
	  });
	</script>

</body>
</html>