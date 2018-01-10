<?php 
function contact_numbers_shortcode() {

  ob_start();
  global $telefone; 
  global $celular; 
  global $whatsapp; 
  ?>
  <nav class="contact-number">
    <?php if (!empty($telefone)): ?>
    <a href="tel:<?php echo $telefone; ?>" class="company-telefone"><span itemprop="tel"><?php echo $telefone; ?></span></a>
    <?php endif ?>
    <?php if (!empty($celular)): ?>
    <a href="tel:<?php echo $celular; ?>" class="company-celular"><span itemprop="tel"><?php echo $celular; ?></span></a>
    <?php endif ?>
    <?php if (!empty($whatsapp)): ?>
    <a href="tel:<?php echo $whatsapp; ?>" class="company-whatsapp"><span itemprop="tel"><?php echo $whatsapp; ?></span></a>
    <?php endif ?>
  </nav>

  <?php $content = ob_get_contents(); ob_end_clean();
  return $content; 
 
}
add_shortcode( 'contact-numbers', 'contact_numbers_shortcode' );
// [contact-numbers]
