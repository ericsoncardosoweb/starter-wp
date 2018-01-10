<?php
  // Desativando notificações de atualizações do CORE
  add_action('init', create_function('$a', "remove_action('init', 'wp_version_check');"), 2);
  add_filter('pre_option_update_core', create_function('$a', "return null;"));
  // Desativando notificações de atualizações dos PLUGINS
  add_action('admin_menu', create_function('$a', "remove_action( 'load-plugins.php', 'wp_update_plugins' );"));
  add_action('admin_init', create_function('$a', "remove_action( 'admin_init', 'wp_update_plugins' );"), 2);
  add_action('init', create_function('$a', "remove_action( 'init', 'wp_update_plugins' );"), 2);
  add_filter('pre_option_update_plugins', create_function('$a', "return null;"));
  // Removendo menu de atualização da Admin Bar
  function removeMenuAdminBar() {
      global $wp_admin_bar;
      $wp_admin_bar->remove_menu('updates');
  }
  add_action('wp_before_admin_bar_render', 'removeMenuAdminBar');


  function wps_admin_bar() {
  global $wp_admin_bar;
  $wp_admin_bar->remove_menu('updates');
  }
  add_action('wp_before_admin_bar_render', 'wps_admin_bar');
?>