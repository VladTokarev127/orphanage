</main>

		<footer class="footer">
			<div class="container">

				<nav class="footer__nav">
					<?php 
						wp_nav_menu([
							'menu'            => 'menu',
							'container'       => '',
						]);
					?>
				</nav>
				<div class="footer__help">
					<a href="/helps" class="btn">Как помочь</a>
				</div>
				<div class="footer__social">
					<?php while( the_repeater_field('socials', 'options') ): ?>
						<a href="<?php the_sub_field('link'); ?>"><img src="<?php echo esc_url(get_sub_field('img')['url']); ?>" alt="<?php echo get_sub_field('img')['alt']; ?>"></a>
					<?php endwhile; ?>
				</div>
				<div class="footer__docs">
					<?php 
						wp_nav_menu([
							'menu'            => 'docs',
							'container'       => '',
						]);
					?>
				</div>

			</div>
		</footer>

	</div>

	<?php wp_footer(); ?>

</body>
</html>