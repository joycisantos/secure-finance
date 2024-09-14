<div class="container">
    <nav class="breadcrumb">
        <a href="<?php echo home_url(); ?>">Blog</a> »
        <?php
        $category = get_the_category();
        if ($category) {
            $first_category = $category[0];
            echo '<a href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a> » ';
        }
        ?>
        <span><?php the_title(); ?></span>
    </nav>
</div>