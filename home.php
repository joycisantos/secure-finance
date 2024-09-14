<?php get_header(); ?>

<?php get_template_part('template-parts/banners/main-banner'); ?>

<section class="recent-posts" id="posts">
    <div class="container">
        <h2 class="title-h2">Últimos Posts</h2>

        <?php get_template_part('template-parts/posts-lists/posts-list'); ?>
    </div>
</section>

<?php get_template_part('template-parts/categories-post'); ?>
<?php get_template_part('template-parts/newsletter'); ?>
<?php get_footer(); ?>