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

    // Script customizado com dependência do jQuery
    wp_enqueue_script(
        'search',
        get_template_directory_uri() . '/js/search.js',
        array('jquery'), // Garantir que o jQuery é carregado
        null,
        true
    );

    // Script customizado com dependência do jQuery
    wp_enqueue_script(
        'menu-mobile',
        get_template_directory_uri() . '/js/menu-mobile.js',
        array('jquery'), // Garantir que o jQuery é carregado
        null,
        true
    );
}

add_action('wp_enqueue_scripts', 'tema_enqueue_scripts');
