<?php 
function banner_shortcode( $atts ) {
  // Attributes
  $atts = shortcode_atts(
    array(
      'category' => '',
    ),
    $atts,
    'slider-post'
  ); ob_start(); 
  
  // Os argumentos
  $args = array(
    'post_type' => 'banners', 
    'posts_per_page' => 10, 
    'post_status' => 'publish',
    'orderby' => 'order',
    'tax_query'        => [
      [
        'taxonomy' => 'banner_category',
        'terms'    => $atts['category'],
        'field'    => 'slug'
      ]
    ]
  );

  // A Query
  $banner = new WP_Query( $args );

  if ($banner->have_posts()) : ?>
  <!--================== BEGIN: BANNER ==================-->
  <section class="banner">
    <div class="banner__slide" slides data-dots data-from="1">
    
    <?php // O Loop
    while ( $banner->have_posts() ) : $banner->the_post(); ?> 


      <div id="banner-<?php the_id(); ?>" class="banner__item">
        <div class="banner__wrap">
          <?php 
          // Images
          $banner_image_desktop = get_field('imagem_desktop_menores');
          $banner_image_tablet = get_field('imagem_tablet');
          $banner_image_mobile = get_field('imagem_mobile');

          if ($banner_image_desktop) {
            $banner_bg_desktop = $banner_image_desktop;
          }
          if ($banner_image_tablet) {
            $banner_bg_tablet = $banner_image_tablet.', ';
          }
          if ($banner_image_mobile) {
            $banner_bg_mobile = $banner_image_mobile.', ';
          }

          $banner_image_srcset = $banner_bg_mobile.$banner_bg_tablet.$banner_bg_desktop;



          ?>

          <div class="bg-cover lazy" data-src="<?php the_field('bg-desktop') ?>" data-device="[<?php echo $banner_image_srcset; ?>]"></div>
          
          <?php 
          $banner_link = get_field('link');
          $banner_options_link = get_field('options_link');

            $banner_link_anchor = '';
            $banner_link_target = '';

          if ($banner_options_link) {
            if ($banner_options_link == 'anchor') {
              $banner_link_anchor = ' link-anchor ';
            }

            if ($banner_options_link == 'target') {
              $banner_link_target = 'target="_blank"';
            }
          }

          if ($banner_link): ?>
            <a href="<?php echo $banner_link; ?>" <?php echo $banner_link_target; ?> class="link-absolute <?php echo $banner_link_anchor; ?>"></a>
          <?php endif ?>

          <div class="banner__item__content">
            <div class="banner__item__caption">
              <h2 class="banner__title"><a href="<?php echo $banner_link; ?>" <?php echo $banner_link_target; ?> class="<?php echo $banner_link_anchor; ?>"><?php the_title(); ?></a></h2>
              <?php 
              $banner_description = get_field('description');
              if ($banner_description): ?>
                <?php echo $banner_description; ?>
              <?php endif ?>

              <?php  
              $banner_button = get_field('button');
              if ($banner_button && $banner_link): ?>
                <a href="<?php echo $banner_link; ?>" <?php echo $banner_link_target; ?> class="banner__button ripple <?php echo $banner_link_anchor; ?>"><?php echo $banner_button; ?></a>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div> 

    <?php endwhile; ?>   
    </div>
  

  </section><!-- /.banner -->
  <!--=================== END: BANNER ===================-->
  <?php endif; wp_reset_postdata(); ?>

  <?php $content = ob_get_contents(); ob_end_clean();

  return $content; 

}

add_shortcode( 'banners', 'banner_shortcode' );
// [banners category=""]

?>