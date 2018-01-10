<div class="container-fluid banner banner--double">
	<div class="banner__row">
		<?php
			$args = array(
	    'post_type' => 'banners',
	    'posts_per_page' => 10,
	    'post_status' => 'publish',
	    'orderby' => 'order',
	    'tax_query' => [
					      [
					        'taxonomy' => 'banner_category',
					        'terms'    => 'empresa',
					        'field'    => 'slug'
					      ]
					    ]
					  );

	  // A Query
	  $banner_empresa = new WP_Query( $args );

	  if ($banner_empresa->have_posts()) : ?>
		<div class="banner__item banner__item--small">
			<div class="slide slide--square" slide data-dots data-autoplay data-fade>
			<?php while ( $banner_empresa->have_posts() ) : $banner_empresa->the_post(); ?>
				<div class="item">
				  <?php
				  // Images
				  $banner_empresa_image_desktop = get_field('imagem_desktop_menores');
				  $banner_empresa_image_tablet = get_field('imagem_tablet');
				  $banner_empresa_image_mobile = get_field('imagem_mobile');

				  if ($banner_empresa_image_desktop) {
				    $banner_empresa_bg_desktop = $banner_empresa_image_desktop;
				  }
				  if ($banner_empresa_image_tablet) {
				    $banner_empresa_bg_tablet = $banner_empresa_image_tablet.', ';
				  }
				  if ($banner_empresa_image_mobile) {
				    $banner_empresa_bg_mobile = $banner_empresa_image_mobile.', ';
				  }

				  $banner_empresa_image_srcset = $banner_empresa_bg_mobile.$banner_empresa_bg_tablet.$banner_empresa_bg_desktop;
				  ?>
					<img class="lazy" data-src="<?php the_field('bg-desktop') ?>" data-device="[<?php echo $banner_empresa_image_srcset; ?>]">
					<?php
					$banner_empresa_link = get_field('link');
					$banner_empresa_options_link = get_field('options_link');

					  $banner_empresa_link_anchor = '';
					  $banner_empresa_link_target = '';

					if ($banner_empresa_options_link) {
					  if ($banner_empresa_options_link == 'anchor') {
					    $banner_empresa_link_anchor = ' link-anchor ';
					  }

					  if ($banner_empresa_options_link == 'target') {
					    $banner_empresa_link_target = 'target="_blank"';
					  }
					}

					if ($banner_empresa_link): ?>
					  <a href="<?php echo $banner_empresa_link; ?>" <?php echo $banner_empresa_link_target; ?> class="link-absolute <?php echo $banner_empresa_link_anchor; ?>"></a>
					<?php endif ?>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
		<?php endif; ?>
		<?php
			$args = array(
	    'post_type' => 'banners',
	    'posts_per_page' => 10,
	    'post_status' => 'publish',
	    'orderby' => 'order',
	    'tax_query' => [
					      [
					        'taxonomy' => 'banner_category',
					        'terms'    => 'destaques',
					        'field'    => 'slug'
					      ]
					    ]
					  );

	  // A Query
	  $banner_destaque = new WP_Query( $args );

	  if ($banner_destaque->have_posts()) : ?>
		<div class="banner__item banner__item--large">
			<div class="slide" slide data-dots data-autoplay>
			<?php while ( $banner_destaque->have_posts() ) : $banner_destaque->the_post(); ?>
				<div class="item">
				  <?php
				  // Images
				  $banner_destaque_image_desktop = get_field('imagem_desktop_menores');
				  $banner_destaque_image_tablet = get_field('imagem_tablet');
				  $banner_destaque_image_mobile = get_field('imagem_mobile');

				  if ($banner_destaque_image_desktop) {
				    $banner_destaque_bg_desktop = $banner_destaque_image_desktop;
				  }
				  if ($banner_destaque_image_tablet) {
				    $banner_destaque_bg_tablet = $banner_destaque_image_tablet.', ';
				  }
				  if ($banner_destaque_image_mobile) {
				    $banner_destaque_bg_mobile = $banner_destaque_image_mobile.', ';
				  }

				  $banner_destaque_image_srcset = $banner_destaque_bg_mobile.$banner_destaque_bg_tablet.$banner_destaque_bg_desktop;
				  ?>
					<img class="lazy" data-src="<?php the_field('bg-desktop') ?>" data-device="[<?php echo $banner_destaque_image_srcset; ?>]">
					<?php
					$banner_destaque_link = get_field('link');
					$banner_destaque_options_link = get_field('options_link');

					  $banner_destaque_link_anchor = '';
					  $banner_destaque_link_target = '';

					if ($banner_destaque_options_link) {
					  if ($banner_destaque_options_link == 'anchor') {
					    $banner_destaque_link_anchor = ' link-anchor ';
					  }

					  if ($banner_destaque_options_link == 'target') {
					    $banner_destaque_link_target = 'target="_blank"';
					  }
					}

					if ($banner_destaque_link): ?>
					  <a href="<?php echo $banner_destaque_link; ?>" <?php echo $banner_destaque_link_target; ?> class="link-absolute <?php echo $banner_destaque_link_anchor; ?>"></a>
					<?php endif ?>
				</div>
			<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
		<?php endif; ?>
	</div>
</div>
