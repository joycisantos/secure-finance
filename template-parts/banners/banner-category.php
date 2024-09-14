<section class="banner-general-int">
    <div class="container">
        <h1 class="title-single"><?php single_cat_title(); ?></h1>

        <?php if (category_description()) : ?>
            <div class="description-category">
                <p><?php echo category_description(); ?></p>
            </div>
        <?php endif; ?>
    </div>
</section>