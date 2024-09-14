<div class="posts-list">
    <?php
    $current_category = get_queried_object();
    
    $category_posts_query = new WP_Query(array(
        'cat'            => $current_category->term_id,
        'posts_per_page' => 3,
        'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
    ));

    if ($category_posts_query->have_posts()) :
        while ($category_posts_query->have_posts()) : $category_posts_query->the_post(); ?>
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
    else : ?>
        <p>Nenhum post encontrado.</p>
    <?php endif; ?>
</div>
<button class="load-more-button btn-default">Carregar mais</button>