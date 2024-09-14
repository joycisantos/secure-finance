<?php get_header(); ?>

<section class="banner-general-int">
    <div class="container">
        <h1 class="title-single"><?= the_title() ?></h1>
    </div>
</section>

<div class="container py-5">
    <div class="content-general">
        <p><?= the_content() ?></p>
    </div>
</div>

<?php get_footer(); ?>