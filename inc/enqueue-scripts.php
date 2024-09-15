<?php

function tema_enqueue_scripts()
{
    // Enfileira o jQuery já registrado no WordPress
    wp_enqueue_script('jquery');

    // CSS do Bootstrap
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');

    // JS do Bootstrap com dependência do jQuery
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    // Fontes do Google: Poppins e Montserrat
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Montserrat:wght@400;500;700&display=swap', array(), null);

    // Script de pesquisa customizado com dependência do jQuery, carregado em todas as páginas
    wp_enqueue_script(
        'search',
        get_template_directory_uri() . '/js/search.js',
        array('jquery'), // Garantir que o jQuery é carregado
        null,
        true
    );

    // Script do menu mobile, carregado apenas em páginas relevantes (exemplo: se o menu está no header)
    if (has_nav_menu('mobile')) {
        wp_enqueue_script(
            'menu-mobile',
            get_template_directory_uri() . '/js/menu-mobile.js',
            array('jquery'), 
            null,
            true
        );
    }

    // Script para esconder o preloader após o carregamento, inline
    wp_add_inline_script('jquery', '
        jQuery(window).on("load", function() {
            jQuery("#preloader").fadeOut("slow");
        });
    ');

    // // Enfileira o CSS global
    // wp_enqueue_style('global', get_template_directory_uri() . '/css/global.css', array(), null);

    // // Enfileira o CSS para o cabeçalho
    // wp_enqueue_style('header', get_template_directory_uri() . '/css/header.css', array(), null);

    // // Enfileira o CSS para o rodapé
    // wp_enqueue_style('footer', get_template_directory_uri() . '/css/footer.css', array(), null);

    // // Enfileira o CSS para a página inicial
    // if (is_front_page()) {
    //     wp_enqueue_style('home', get_template_directory_uri() . '/css/home.css', array(), null);
    //     wp_enqueue_style('list-posts-home', get_template_directory_uri() . '/css/lists-post.css', array(), null);
    //     wp_enqueue_style('list-category-home', get_template_directory_uri() . '/css/categories-post.css', array(), null);
    //     wp_enqueue_style('newsletter-home', get_template_directory_uri() . '/css/newsletter.css', array(), null);
    // }

    // // Enfileira o CSS para páginas de posts
    // if (is_single() || is_archive()) {
    //     wp_enqueue_style('blog', get_template_directory_uri() . '/css/single-post.css', array(), null);
    // }

    // if (is_category() || is_tag()) {
    //     wp_enqueue_style('category-tag-post', get_template_directory_uri() . '/css/lists-post.css');
    //     wp_enqueue_style('category-tag-banner', get_template_directory_uri() . '/css/banner-general.css');
    //     wp_enqueue_style('category-tag-categories', get_template_directory_uri() . '/css/categories-post.css');
    //     wp_enqueue_style('category-tag-newsletter', get_template_directory_uri() . '/css/newsletter.css');
    // }
    
    // if (is_search()) {
    //     wp_enqueue_style('search-banner', get_template_directory_uri() . '/css/banner-general.css');
    // }

      // Enfileirar o CSS concatenado e minificado para produção
      wp_enqueue_style('main-minified-css', get_template_directory_uri() . '/dist/css/main.min.css', array(), null);

      // JS minificado
    wp_enqueue_script('main-minified-js', get_template_directory_uri() . '/dist/js/main.min.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'tema_enqueue_scripts');
