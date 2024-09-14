<section id="bannerCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

    <!-- Indicadores -->
    <div class="carousel-indicators">
        <div class="container">
            <?php
            // Consulta para os três últimos posts
            $latest_posts_query = new WP_Query(array(
                'posts_per_page' => 3, // Três posts
                'orderby'        => 'date',
                'order'          => 'DESC',
            ));

            // Conta os posts para criar os indicadores
            $post_count = 0;
            if ($latest_posts_query->have_posts()) :
                while ($latest_posts_query->have_posts()) : $latest_posts_query->the_post();
            ?>
                    <button type="button" data-bs-target="#bannerCarousel" data-bs-slide-to="<?php echo $post_count; ?>" class="<?php echo $post_count === 0 ? 'active' : ''; ?>" aria-current="<?php echo $post_count === 0 ? 'true' : 'false'; ?>" aria-label="Slide <?php echo $post_count + 1; ?>"></button>
            <?php
                    $post_count++;
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
    </div>

    <!-- Itens do carousel -->
    <div class="carousel-inner">
        <?php
        // Resetando a query para renderizar os posts no carousel
        $latest_posts_query = new WP_Query(array(
            'posts_per_page' => 3, // Três posts
            'orderby'        => 'date',
            'order'          => 'DESC',
        ));

        if ($latest_posts_query->have_posts()) :
            $first_post = true; // Variável para marcar o primeiro post
            while ($latest_posts_query->have_posts()) : $latest_posts_query->the_post();
        ?>
                <div class="carousel-item <?php echo $first_post ? 'active' : ''; ?>" style="background-image: url('<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full')); ?>');">
                    <section class="banner-general">
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
                            <a href="#posts">
                                <div class="icon-scroll">
                                    <div class="first-arrow"></div>
                                    <div class="second-arrow"></div>
                                </div>
                            </a>
                        </div>
                    </section>
                </div>
            <?php
                $first_post = false; // Desativar 'active' após o primeiro post
            endwhile;
            wp_reset_postdata();
        else :
            ?>
            <p>Nenhum post encontrado.</p>
        <?php endif; ?>
    </div>
</section>