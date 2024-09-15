</main>
<?php wp_footer(); ?>
<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<?php if (get_theme_mod('logo_footer')) : ?>
					<a href="<?= site_url() ?>">
						<img src="<?php echo esc_url(get_theme_mod('logo_footer')); ?>" alt="<?php bloginfo('name'); ?>" class="logo-footer">
					</a>
				<?php endif; ?>
			</div>
			<div class="col-lg-4">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'menu-principal',
					'menu_class' => 'menu-principal-footer',
				));
				?>
			</div>
			<div class="col-lg-4">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_class' => 'footer-menu',
					)
				);
				?>
				<?php get_template_part('template-parts/contact-info'); ?>
			</div>
		</div>
	</div>
	<div class="copy">
		<div class="container">
			©<?= date('Y')?>. Todos os direitos reservados.
		</div>
	</div>
</footer>
</body>

</html>