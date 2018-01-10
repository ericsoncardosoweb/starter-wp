<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Agatha
 */

?>
<!DOCTYPE html>
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--><html class="no-js" lang="pt-br"><!--<![endif]-->
<html lang="pt-BR" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=10">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- _______________________________ Favicon _______________________________ -->
    <link rel="shortcut icon" href="<?php echo IMAGES; ?>favicon.png" />

    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php if (!is_front_page()): ?>
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php endif ?>

    <?php
    wp_head();
    global $isMobile;
    ?>

    <style>
    <?php
    $essentialStyle = ASSETS."css/template.min.css";
    echo file_get_contents($essentialStyle); ?>
    </style>
  </head>
  <body <?php body_class(); ?>>

    <div id="wrapper">

      <?php get_template_part('template-parts/header/mobile-nav'); ?>
      <?php get_template_part('partials/header/header'); ?>

      <main id="main-content">