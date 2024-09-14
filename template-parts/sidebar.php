<section class="sidebar-post">
    <div class="container">
        <h4>Categorias</h4>

        <?php
        $args = array(
            'orderby'    => 'name',
            'order'      => 'ASC',
            'hide_empty' => true,
        );

        $categories = get_categories($args);

        if (!empty($categories)) :
            foreach ($categories as $category) :
                $category_link = get_category_link($category->term_id);
                $category_name = $category->name;

                $category_icon = get_term_meta($category->term_id, 'category_icon', true);
        ?>

                <a href="<?php echo esc_url($category_link); ?>" class="link-category">
                    <div class="category-icon">
                        <img src="<?= esc_url($category_icon) ?>" alt="">
                    </div>
                    <?php echo esc_html($category_name); ?>
                </a>

        <?php
            endforeach;
        else :
            echo '<p>Nenhuma categoria encontrada.</p>';
        endif;
        ?>

        <div class="tags-list">
            <h4>Tags</h4>
            <div class="tag-items">
                <?php
                $args = array(
                    'hide_empty' => true,
                );

                $tags = get_tags($args);

                if ($tags) {
                    foreach ($tags as $tag) {
                        $tag_link = get_tag_link($tag->term_id);
                        $tag_name = $tag->name;

                ?>
                        <a href="<?= esc_url($tag_link) ?>" class="link-tag"><?= esc_html($tag_name) ?></a>

                <?php
                    }
                } else {
                    echo '<p>Nenhuma tag encontrada.</p>';
                }
                ?>
            </div>

        </div>
    </div>
</section>