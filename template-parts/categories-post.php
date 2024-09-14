<section class="categories-post">
    <div class="container">
        <h2 class="title-h2">Navegue por Categoria</h2>

        <div class="row">
            <?php
            $args = array(
                'orderby'    => 'name',
                'order'      => 'ASC',
                'hide_empty' => true,
            );

            // Obtém as categorias com posts
            $categories = get_categories($args);

            if (!empty($categories)) :
                foreach ($categories as $category) :
                    // Pega o link, nome e descrição da categoria
                    $category_link = get_category_link($category->term_id);
                    $category_name = $category->name;
                    $category_description = $category->description;

                    // Obtém o ID da categoria correta no loop
                    $category_icon = get_term_meta($category->term_id, 'category_icon', true); // Obtém a URL do ícone
            ?>

                    <div class="col-lg-3">
                        <div class="category-item">
                            <a href="<?php echo esc_url($category_link); ?>">
                                <div class="category-icon">
                                    <img src="<?= esc_url($category_icon) ?>" alt="">
                                </div>
                                <h3 class="category-title"><?php echo esc_html($category_name); ?></h3>
                                <div class="category-description">
                                    <p><?php echo esc_html($category_description); ?></p>
                                </div>
                            </a>
                        </div>
                    </div>

            <?php
                endforeach;
            else :
                echo '<p>Nenhuma categoria encontrada.</p>';
            endif;
            ?>

        </div>
    </div>

</section>