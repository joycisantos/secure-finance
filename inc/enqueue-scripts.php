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

    // Script para esconder o preloader após o carregamento, inline
    wp_add_inline_script('jquery', '
        jQuery(window).on("load", function() {
            jQuery("#preloader").fadeOut("slow");
        });
    ');

    //CSS minificado geral
    wp_enqueue_style('main-minified-css', get_template_directory_uri() . '/dist/css/main.min.css', array(), null);

    //CSS minificado home
    if (is_front_page()) {
        wp_enqueue_style('home', get_template_directory_uri() . '/dist/css/pages/home.min.css', array(), null);
    }

    //CSS minificado single-post
    if (is_single() || is_archive()) {
        wp_enqueue_style('blog', get_template_directory_uri() . '/dist/css/pages/single-post.min.css', array(), null);
    }

    //CSS minificado categoria e tag
    if (is_category() || is_tag()) {
        wp_enqueue_style('category-tag-post', get_template_directory_uri() . '/dist/css/pages/category-tag.min.css');
    }

    //CSS minificado busca
    if (is_search()) {
        wp_enqueue_style('search-banner', get_template_directory_uri() . '/dist/css/pages/search.min.css');
    }
    
    //CSS minificado páginas internas
    if (is_404() || !is_front_page() && !is_category() && !is_tag()) {
        wp_enqueue_style('search-banner', get_template_directory_uri() . '/dist/css/pages/pages.min.css');
    }

    // JS minificado
    wp_enqueue_script('main-minified-js', get_template_directory_uri() . '/dist/js/main.min.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'tema_enqueue_scripts');

//Animações de entrada
function add_animate_css() {
    wp_enqueue_style('animate-css', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '4.1.1');
}
add_action('wp_enqueue_scripts', 'add_animate_css');

