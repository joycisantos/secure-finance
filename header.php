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
    <?php } ?> - <?php bloginfo('name'); ?>
  </title>

  <meta name="description" content="<?php echo bloginfo('description'); ?>">
  <meta name="robots" content="index, follow">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">

  <?php wp_head(); ?>
</head>

<body>
  <div id="preloader">
    <div class="spinner"></div>
  </div>
  <header>
    <div class="container">
      <div class="menu">
        <?php if (get_theme_mod('logo_site')) : ?>
          <a href="<?= site_url() ?>">
            <img src="<?php echo esc_url(get_theme_mod('logo_site')); ?>" alt="<?php bloginfo('name'); ?>" class="logo-menu" width="150" height="63">
          </a>
        <?php
        else :
        ?>
          <a href="<?= site_url() ?>">
            <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png" alt="Logo" class="logo-menu" width="150" height="63">
          </a>
        <?php
        endif; ?>
        <div class="d-none d-xl-none d-xxl-block">
          <?php
          wp_nav_menu(array(
            'theme_location' => 'menu-principal',
            'menu_class' => 'menu-topo',
          ));
          ?>
        </div>

        <div class="search-box d-none d-xl-none d-xxl-block">
          <form id="searchForm" method="get" action="<?php echo esc_url(home_url('/')); ?>">
            <input type="text" name="s" placeholder="Pesquisar..." class="input" id="mySearch">
            <div class="btn-search">
              <span>
                <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path clip-rule="evenodd" d="M15 10.5C15 12.9853 12.9853 15 10.5 15C8.01472 15 6 12.9853 6 10.5C6 8.01472 8.01472 6 10.5 6C12.9853 6 15 8.01472 15 10.5ZM14.1793 15.2399C13.1632 16.0297 11.8865 16.5 10.5 16.5C7.18629 16.5 4.5 13.8137 4.5 10.5C4.5 7.18629 7.18629 4.5 10.5 4.5C13.8137 4.5 16.5 7.18629 16.5 10.5C16.5 11.8865 16.0297 13.1632 15.2399 14.1792L20.0304 18.9697L18.9697 20.0303L14.1793 15.2399Z" fill-rule="evenodd" />
                </svg>
              </span>
            </div>
          </form>
        </div>
        <?php get_template_part('template-parts/menu-mobile'); ?>
      </div>
    </div>
  </header>
  <main id="main" class="site-main">