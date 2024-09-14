<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">

  <title>
    <?php if (is_category()) { ?>
      <?php single_cat_title() ?>
    <?php } else if (is_single()) { ?>
      <?php wp_title('', true, ''); ?>
    <?php } else { ?>
      <?php echo bloginfo('name'); ?>
    <?php } ?>

  </title>

  <meta name="description" content="<?php echo bloginfo('description'); ?>">
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">

  <?php wp_head(); ?>

  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/main.css">

  <?php
  // Recupera as cores personalizadas do Customizer
  $primary_color = get_theme_mod('primary_color', '#232536');
  $secondary_color = get_theme_mod('secondary_color', '#FFD050');
  $tertiary_color = get_theme_mod('tertiary_color', '#592EA9');
  $text_color = get_theme_mod('text_color', '#4C4C4C');
  $second_text_color = get_theme_mod('second_text_color', '#6D6E76');
  ?>

  <style>
    :root {
      --primary-color: <?php echo esc_html($primary_color); ?>;
      --secondary-color: <?php echo esc_html($secondary_color); ?>;
      --tertiary-color: <?php echo esc_html($tertiary_color); ?>;
      --text-color: <?php echo esc_html($text_color); ?>;
      --second-text-color: <?php echo esc_html($second_text_color); ?>;
    }
  </style>

</head>

<body>
  <header>
    <div class="container">
      <div class="menu">
        <?php if (get_theme_mod('logo_site')) : ?>
          <a href="<?= site_url() ?>">
            <img src="<?php echo esc_url(get_theme_mod('logo_site')); ?>" alt="<?php bloginfo('name'); ?>" class="logo-menu">
          </a>
        <?php endif; ?>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'menu-principal',
          'menu_class' => 'menu-topo',
        ));
        ?>
      </div>
    </div>
  </header>
  <main id="main" class="site-main">