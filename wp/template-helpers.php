<?php
	/* Template Name: Помощники */
	get_header();
?>

	<!-- start section helps -->
	<section class="helps">
		<div class="container">

			<div class="helps__grid">
				<?php while( the_repeater_field('helpers') ): ?>
					<a href="<?php the_sub_field('link'); ?>" class="helps__item"><img src="<?php echo esc_url(get_sub_field('img')['url']); ?>" alt="<?php echo get_sub_field('img')['alt']; ?>"></a>
				<?php endwhile; ?>
			</div>
			<div class="helps__text"><?php the_field('text'); ?></div>

		</div>
	</section>
	<!-- end section helps -->

<?php get_footer(); ?>