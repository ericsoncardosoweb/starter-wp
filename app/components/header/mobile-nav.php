<div class="mobile-nav" style="display: none;">

  <div class="mobile-nav-mask">

    <button class="close"><svg class="icon icon-020-close-button"><use xlink:href="#icon-020-close-button"></use></svg></button>

  </div>



  <div class="mobile-nav-body">

    <div class="mobile-nav-content">

      <?php get_template_part('searchform'); ?>

      

      <nav class="nav-menu">

        <?php

        if ( has_nav_menu( 'mobile_menu' ) ) {

          wp_nav_menu( array( 'theme_location' => 'mobile_menu' ) );

        } ?> 

      </nav>



      <a href="#" class="button is-block is-primary is-outlined">Entrar/Cadastrar</a>

      <a href="<?= URL; ?>contato" class="button is-block is-primary">Fale Conosco</a>



      <div class="contact-area">

        <?php echo do_shortcode('[contact-numbers]'); ?>

      </div>



      <div class="social-links">

        <nav>

          <?php echo do_shortcode('[social-links]'); ?>

        </nav>

      </div>

      <?php get_template_part('template-parts/logo'); ?>



    </div>

  </div>

</div>