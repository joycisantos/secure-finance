<section class="banner">
    <?php
    // Consulta personalizada para o último post
    $latest_post_query = new WP_Query(array(
        'posts_per_page' => 1, // Apenas um post
        'orderby'        => 'date',
        'order'          => 'DESC',
    ));

    if ($latest_post_query->have_posts()) :
        while ($latest_post_query->have_posts()) : $latest_post_query->the_post();
    ?>
            <section class="banner-general" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');">
                <div class="banner-content">
                    <div class="container">
                        <p class="category-names"><?php the_category(', '); ?></p>
                        <h1 class="banner-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
                        <div class="banner-meta">
                            <span class="author">Por: <?php the_author(); ?></span>
                            <span class="date"> | <?php echo get_the_date(); ?></span>
                        </div>
                        <div class="banner-excerpt">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="btn-default">Leia mais</a>
                    </div>
                </div>
            </section>

        <?php endwhile;
        wp_reset_postdata();
    else : ?>
        <p>Nenhum post encontrado.</p>
    <?php endif; ?>
</section>