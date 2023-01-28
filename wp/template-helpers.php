<?php
	/* Template Name: Помощники */
	get_header();
?>

	<!-- start section page-projects -->
	<section class="page-projects">
		<div class="container">

			<div class="page-projects__grid page-projects__grid_helps">
				<?php while( the_repeater_field('helpers') ): ?>
					<a href="<?php the_sub_field('link'); ?>" class="page-projects__item">
						<div class="page-projects__img"><img src="<?php echo esc_url(get_sub_field('img')['url']); ?>" alt="<?php echo get_sub_field('img')['alt']; ?>"></div>
						<div class="page-projects__content">
							<h3 class="page-projects__name"><?php the_sub_field('title'); ?></h3>
							<div class="page-projects__desc"><?php the_sub_field('desc'); ?></div>
						</div>
					</a>
				<?php endwhile; ?>
			</div>

		</div>
	</section>
	<!-- end section page-projects -->

<?php get_footer(); ?>