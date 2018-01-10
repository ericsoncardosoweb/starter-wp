<?php 
function social_links_shortcode() {

  ob_start();
  global $facebook; 
  global $twitter; 
  global $instagram; 
  ?>
  <nav class="social-links">
    <?php if (!empty($facebook)): ?>
    <a href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
    <?php endif ?>
    <?php if (!empty($twitter)): ?>
    <a href="<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
    <?php endif ?>
    <?php if (!empty($instagram)): ?>
    <a href="<?php echo $instagram; ?>" target="_blank"><i class="fa fa-instagram"></i></a>
    <?php endif ?>
  </nav>

  <?php $content = ob_get_contents(); ob_end_clean();
  return $content; 
 
}
add_shortcode( 'social-links', 'social_links_shortcode' );
// [social-links]
