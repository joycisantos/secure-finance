<?php get_header(); ?>

<section class="search-results-page">
    <section class="banner-general-int">
        <div class="container">
            <div class="subtitle-tag">Resultados de busca para: </div>
            <h1 class="title-single">"<?php echo get_search_query(); ?>"</h1>
        </div>
    </section>

    <div class="container">
        <?php get_template_part('template-parts/posts-lists/posts-list-search'); ?>
    </div>
</section>

<?php get_footer(); ?>