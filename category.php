<?php get_header(); ?>

<?php get_template_part('template-parts/banners/banner-category'); ?>

<section class="recent-posts">
    <div class="container">
        <?php get_template_part('template-parts/posts-lists/posts-list-category'); ?>
    </div>
</section>

<?php get_template_part('template-parts/categories-post'); ?>
<?php get_template_part('template-parts/newsletter'); ?>
<?php get_footer(); ?>