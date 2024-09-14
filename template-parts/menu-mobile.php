<div class="mobile-header d-flex d-xl-flex d-xxl-none">
    <div class="container d-flex align-items-end justify-content-end">
        <div class="menu-btn">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </div>
</div>

<div class="header__nav">
    <div class="container">
        <nav class="nav">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'menu-principal',
                'menu_class' => 'menu-list-mobile',
            ));
            ?>

            <form id="searchFormMobile" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <input type="text" name="s" placeholder="Pesquisar..." class="input">
                <button type="submit" class="btn-default">Buscar</button>
            </form>
        </nav>
    </div>
</div>