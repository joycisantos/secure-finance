<?php get_header(); ?>

<?php get_template_part('template-parts/breadcrumb'); ?>

<section class="single-post animate-on-scroll">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <p class="category-names"><?php the_category(', '); ?></p>

                        <h1 class="title-single"><?php the_title(); ?></h1>

                        <div class="thumb-single">
                            <?php the_post_thumbnail('xl'); ?>
                        </div>

                        <div class="post-meta">
                            <span class="author">Por: <?php echo esc_html(get_the_author()); ?></span>
                            <span class="date"> | <?php echo get_the_date(); ?></span>
                        </div>

                        <div class="post-tags">
                            <?php if (the_tags()) : ?>
                                <p>Tags: <?php the_tags('', ', ', ''); ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="content-post"><?php the_content(); ?></div>
                    <?php endwhile;
                else : ?>
                    <p>Nenhum post encontrado.</p>
                <?php endif; ?>
            </div>

            <div class="col-lg-3">
                <?php get_template_part('template-parts/sidebar'); ?>
            </div>
        </div>
    </div>
</section>


<?php get_footer(); ?>