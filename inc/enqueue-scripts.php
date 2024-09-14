<?php

function tema_enqueue_scripts()
{
    // CSS do Bootstrap
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css');

    // JS do Bootstrap com dependência do jQuery
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', array('jquery'), null, true);

    // Fontes do Google: Poppins e Montserrat
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Montserrat:wght@400;500;700&display=swap', array(), null);
}

add_action('wp_enqueue_scripts', 'tema_enqueue_scripts');
