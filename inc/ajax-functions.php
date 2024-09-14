<?php

// Enfileirar scripts e passar parâmetros necessários
function my_enqueue_scripts()
{
    wp_enqueue_script('ajax-load-more', get_template_directory_uri() . '/js/ajax-load-more.js', array('jquery'), null, true);

    // Passa o URL do admin-ajax.php
    wp_localize_script('ajax-load-more', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'queried_object_id' => get_queried_object_id(), // Envia o ID da categoria, tag ou termo
        'is_category' => is_category(), // Detecta se é uma categoria
        'is_tag' => is_tag() // Detecta se é uma tag
    ));
}

add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

// Função para carregar posts gerais
function load_more_general_posts()
{
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;

    $args = array(
        'posts_per_page' => 3,
        'paged'          => $paged
    );

    $query = new WP_Query($args);

    // Verifica se há posts
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <article>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="entry-header">
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <p class="category-names"><?php the_category(', '); ?></p>
                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="post-meta">
                            <span class="author">Por: <?php the_author(); ?></span>
                            <span class="date"> | <?php echo get_the_date(); ?></span>
                        </div>
                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div>
                        <p class="tag-names">Tags: <?php the_tags('', ', ', ''); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn-default">Leia mais</a>
                    </div>
                </div>
            </article>
        <?php endwhile;
        wp_reset_postdata();
    else :
        echo json_encode(array('no_more_posts' => true));
    endif;

    wp_die();
}
add_action('wp_ajax_load_more_general_posts', 'load_more_general_posts');
add_action('wp_ajax_nopriv_load_more_general_posts', 'load_more_general_posts');

// Função para carregar posts por categoria
function load_more_category_posts()
{
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;

    $args = array(
        'posts_per_page' => 3,
        'paged'          => $paged,
        'cat'            => $category_id
    );

    $query = new WP_Query($args);

    // Verifica se há posts
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <article>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="entry-header">
                            <div class="post-thumbnail">
                                <?php the_post_thumbnail('large'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <p class="category-names"><?php the_category(', '); ?></p>
                        <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <div class="post-meta">
                            <span class="author">Por: <?php the_author(); ?></span>
                            <span class="date"> | <?php echo get_the_date(); ?></span>
                        </div>
                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div>
                        <p class="tag-names">Tags: <?php the_tags('', ', ', ''); ?></p>
                        <a href="<?php the_permalink(); ?>" class="btn-default">Leia mais</a>
                    </div>
                </div>
            </article>
        <?php endwhile;
        wp_reset_postdata();
    else :
        echo json_encode(array('no_more_posts' => true));
    endif;

    wp_die();
}
add_action('wp_ajax_load_more_category_posts', 'load_more_category_posts');
add_action('wp_ajax_nopriv_load_more_category_posts', 'load_more_category_posts');

// Função para carregar posts por tag
function load_more_tag_posts()
{
    $paged = isset($_POST['page']) ? intval($_POST['page']) : 1;
    $tag_id = isset($_POST['tag_id']) ? intval($_POST['tag_id']) : 0;

    $args = array(
        'posts_per_page' => 3,
        'paged'          => $paged,
        'tag_id'         => $tag_id
    );

    $query = new WP_Query($args);

    // Verifica se há posts
    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post(); ?>
            <article>
                <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            </article>
    <?php endwhile;
        wp_reset_postdata();
    else :
        echo json_encode(array('no_more_posts' => true));
    endif;

    wp_die();
}
add_action('wp_ajax_load_more_tag_posts', 'load_more_tag_posts');
add_action('wp_ajax_nopriv_load_more_tag_posts', 'load_more_tag_posts');