<?php 

/**

 *

 * Theme Options

 *

 */



class OpesDoTema {

  private $agatha_theme_options;



  public function __construct() {

    add_action( 'admin_menu', array( $this, 'agatha_theme_add_plugin_page' ) );

    add_action( 'admin_init', array( $this, 'agatha_theme_page_init' ) );

  }



  public function agatha_theme_add_plugin_page() {

    add_menu_page(

      'Opções do Tema', // page_title

      'Opções do Tema', // menu_title

      'manage_options', // capability

      'opes-do-tema', // menu_slug

      array( $this, 'agatha_theme_create_admin_page' ), // function

      'dashicons-admin-generic', // icon_url

      102 // position

    );

  }



  public function agatha_theme_create_admin_page() {

    $this->agatha_theme_options = get_option( 'agatha_theme_option_name' ); ?>



    <div class="wrap">

      <h1>Opções do Tema</h1>

      <p>Configurações básicas do site</p>

      <?php settings_errors(); ?>



      <form method="post" action="options.php">

        <?php

          settings_fields( 'agatha_theme_option_group' );

          do_settings_sections( 'opes-do-tema-admin' );

          submit_button();

        ?>

      </form>

    </div>

  <?php }



  public function agatha_theme_page_init() {

    register_setting(

      'agatha_theme_option_group', // option_group

      'agatha_theme_option_name', // option_name

      array( $this, 'agatha_theme_sanitize' ) // sanitize_callback

    );



    add_settings_section(

      'agatha_theme_setting_section', // id

      'Informações de Contato', // title

      array( $this, 'agatha_theme_section_info' ), // callback

      'opes-do-tema-admin' // page

    );



    add_settings_field(

      'telefone', // id

      'Telefone', // title

      array( $this, 'telefone_callback' ), // callback

      'opes-do-tema-admin', // page

      'agatha_theme_setting_section' // section

    );



    add_settings_field(

      'celular', // id

      'Celular', // title

      array( $this, 'celular_callback' ), // callback

      'opes-do-tema-admin', // page

      'agatha_theme_setting_section' // section

    );



    add_settings_field(

      'whatsapp', // id

      'Whatsapp', // title

      array( $this, 'whatsapp_callback' ), // callback

      'opes-do-tema-admin', // page

      'agatha_theme_setting_section' // section

    );



    add_settings_field(

      'email', // id

      'E-mail', // title

      array( $this, 'email_callback' ), // callback

      'opes-do-tema-admin', // page

      'agatha_theme_setting_section' // section

    );



    add_settings_field(

      'facebook', // id

      'Facebook', // title

      array( $this, 'facebook_callback' ), // callback

      'opes-do-tema-admin', // page

      'agatha_theme_setting_section' // section

    );



    add_settings_field(

      'youtube', // id

      'Youtube', // title

      array( $this, 'youtube_callback' ), // callback

      'opes-do-tema-admin', // page

      'agatha_theme_setting_section' // section

    );



    add_settings_field(

      'linkeding', // id

      'Linkeding', // title

      array( $this, 'linkeding_callback' ), // callback

      'opes-do-tema-admin', // page

      'agatha_theme_setting_section' // section

    );



    add_settings_field(

      'google_plus', // id

      'Google Plus', // title

      array( $this, 'google_plus_callback' ), // callback

      'opes-do-tema-admin', // page

      'agatha_theme_setting_section' // section

    );



    add_settings_field(

      'twitter', // id

      'Twitter', // title

      array( $this, 'twitter_callback' ), // callback

      'opes-do-tema-admin', // page

      'agatha_theme_setting_section' // section

    );



    add_settings_field(

      'pinterest', // id

      'Pinterest', // title

      array( $this, 'pinterest_callback' ), // callback

      'opes-do-tema-admin', // page

      'agatha_theme_setting_section' // section

    );



    add_settings_field(

      'snapchat', // id

      'Snapchat', // title

      array( $this, 'snapchat_callback' ), // callback

      'opes-do-tema-admin', // page

      'agatha_theme_setting_section' // section

    );



    add_settings_field(

      'instagram', // id

      'Instagram', // title

      array( $this, 'instagram_callback' ), // callback

      'opes-do-tema-admin', // page

      'agatha_theme_setting_section' // section

    );

  }



  public function agatha_theme_sanitize($input) {

    $sanitary_values = array();

    if ( isset( $input['telefone'] ) ) {

      $sanitary_values['telefone'] = sanitize_text_field( $input['telefone'] );

    }



    if ( isset( $input['celular'] ) ) {

      $sanitary_values['celular'] = sanitize_text_field( $input['celular'] );

    }



    if ( isset( $input['whatsapp'] ) ) {

      $sanitary_values['whatsapp'] = sanitize_text_field( $input['whatsapp'] );

    }



    if ( isset( $input['email'] ) ) {

      $sanitary_values['email'] = sanitize_text_field( $input['email'] );

    }



    if ( isset( $input['facebook'] ) ) {

      $sanitary_values['facebook'] = sanitize_text_field( $input['facebook'] );

    }



    if ( isset( $input['youtube'] ) ) {

      $sanitary_values['youtube'] = sanitize_text_field( $input['youtube'] );

    }



    if ( isset( $input['linkeding'] ) ) {

      $sanitary_values['linkeding'] = sanitize_text_field( $input['linkeding'] );

    }



    if ( isset( $input['google_plus'] ) ) {

      $sanitary_values['google_plus'] = sanitize_text_field( $input['google_plus'] );

    }



    if ( isset( $input['twitter'] ) ) {

      $sanitary_values['twitter'] = sanitize_text_field( $input['twitter'] );

    }



    if ( isset( $input['pinterest'] ) ) {

      $sanitary_values['pinterest'] = sanitize_text_field( $input['pinterest'] );

    }



    if ( isset( $input['snapchat'] ) ) {

      $sanitary_values['snapchat'] = sanitize_text_field( $input['snapchat'] );

    }



    if ( isset( $input['instagram'] ) ) {

      $sanitary_values['instagram'] = sanitize_text_field( $input['instagram'] );

    }



    return $sanitary_values;

  }



  public function agatha_theme_section_info() {

    

  }



  public function telefone_callback() {

    printf(

      '<input class="regular-text" type="text" name="agatha_theme_option_name[telefone]" id="telefone" value="%s">',

      isset( $this->agatha_theme_options['telefone'] ) ? esc_attr( $this->agatha_theme_options['telefone']) : ''

    );

  }



  public function celular_callback() {

    printf(

      '<input class="regular-text" type="text" name="agatha_theme_option_name[celular]" id="celular" value="%s">',

      isset( $this->agatha_theme_options['celular'] ) ? esc_attr( $this->agatha_theme_options['celular']) : ''

    );

  }



  public function whatsapp_callback() {

    printf(

      '<input class="regular-text" type="text" name="agatha_theme_option_name[whatsapp]" id="whatsapp" value="%s">',

      isset( $this->agatha_theme_options['whatsapp'] ) ? esc_attr( $this->agatha_theme_options['whatsapp']) : ''

    );

  }



  public function email_callback() {

    printf(

      '<input class="regular-text" type="text" name="agatha_theme_option_name[email]" id="email" value="%s">',

      isset( $this->agatha_theme_options['email'] ) ? esc_attr( $this->agatha_theme_options['email']) : ''

    );

  }



  public function facebook_callback() {

    printf(

      '<input class="regular-text" type="text" name="agatha_theme_option_name[facebook]" id="facebook" value="%s">',

      isset( $this->agatha_theme_options['facebook'] ) ? esc_attr( $this->agatha_theme_options['facebook']) : ''

    );

  }



  public function youtube_callback() {

    printf(

      '<input class="regular-text" type="text" name="agatha_theme_option_name[youtube]" id="youtube" value="%s">',

      isset( $this->agatha_theme_options['youtube'] ) ? esc_attr( $this->agatha_theme_options['youtube']) : ''

    );

  }



  public function linkeding_callback() {

    printf(

      '<input class="regular-text" type="text" name="agatha_theme_option_name[linkeding]" id="linkeding" value="%s">',

      isset( $this->agatha_theme_options['linkeding'] ) ? esc_attr( $this->agatha_theme_options['linkeding']) : ''

    );

  }



  public function google_plus_callback() {

    printf(

      '<input class="regular-text" type="text" name="agatha_theme_option_name[google_plus]" id="google_plus" value="%s">',

      isset( $this->agatha_theme_options['google_plus'] ) ? esc_attr( $this->agatha_theme_options['google_plus']) : ''

    );

  }



  public function twitter_callback() {

    printf(

      '<input class="regular-text" type="text" name="agatha_theme_option_name[twitter]" id="twitter" value="%s">',

      isset( $this->agatha_theme_options['twitter'] ) ? esc_attr( $this->agatha_theme_options['twitter']) : ''

    );

  }



  public function pinterest_callback() {

    printf(

      '<input class="regular-text" type="text" name="agatha_theme_option_name[pinterest]" id="pinterest" value="%s">',

      isset( $this->agatha_theme_options['pinterest'] ) ? esc_attr( $this->agatha_theme_options['pinterest']) : ''

    );

  }



  public function snapchat_callback() {

    printf(

      '<input class="regular-text" type="text" name="agatha_theme_option_name[snapchat]" id="snapchat" value="%s">',

      isset( $this->agatha_theme_options['snapchat'] ) ? esc_attr( $this->agatha_theme_options['snapchat']) : ''

    );

  }



  public function instagram_callback() {

    printf(

      '<input class="regular-text" type="text" name="agatha_theme_option_name[instagram]" id="instagram" value="%s">',

      isset( $this->agatha_theme_options['instagram'] ) ? esc_attr( $this->agatha_theme_options['instagram']) : ''

    );

  }



}

if ( is_admin() )

  $agatha_theme = new OpesDoTema();



// Variables

$agatha_theme_options = get_option( 'agatha_theme_option_name' ); // Array of All Options

$telefone = $agatha_theme_options['telefone']; // Telefone

$celular = $agatha_theme_options['celular']; // Celular

$whatsapp = $agatha_theme_options['whatsapp']; // Whatsapp

$email = $agatha_theme_options['email']; // email

$facebook = $agatha_theme_options['facebook']; // Facebook

$youtube = $agatha_theme_options['youtube']; // Youtube

$linkeding = $agatha_theme_options['linkeding']; // Linkeding

$google_plus = $agatha_theme_options['google_plus']; // Google Plus

$twitter = $agatha_theme_options['twitter']; // Twitter

$pinterest = $agatha_theme_options['pinterest']; // Pinterest

$snapchat = $agatha_theme_options['snapchat']; // Snapchat

$instagram = $agatha_theme_options['instagram']; // Instagram

