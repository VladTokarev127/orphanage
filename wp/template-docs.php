<?php
	/* Template Name: Документы */
	get_header();
?>

	<!-- start section docs -->
	<section class="docs">
		<div class="docs__container">

			<div class="docs__col">
				<h2 class="docs__title title"><?php the_title(); ?></h2>
				<div class="docs__list">
					<?php while( the_repeater_field('docs') ): ?>
						<a href="<?php the_sub_field('link'); ?>" class="docs__item">
							<div class="docs__icon"><img src="<?php the_sub_field('icon'); ?>" alt=""></div>
							<div class="docs__text"><?php the_sub_field('title'); ?></div>
						</a>
					<?php endwhile; ?>
				</div>
			</div>

		</div>
	</section>
	<!-- end section docs -->

<?php get_footer(); ?>