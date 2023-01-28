<?php
	/* Template Name: Документы */
	get_header();
?>

	<!-- start section docs -->
	<section class="docs">
		<div class="container">

			<div class="docs__grid">
				<?php while( the_repeater_field('docs') ): ?>
					<div class="docs__col">
						<h2 class="docs__title title"><?php the_sub_field('title'); ?></h2>
						<div class="docs__list">
							<?php
								$images = get_sub_field('gallery');
							?>
							<?php foreach( $images as $image ): ?>
								<a href="<?php echo esc_url($image['url']); ?>" class="docs__item"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt']; ?>"></a>
								<?php endforeach; ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>

		</div>
	</section>
	<!-- end section docs -->

<?php get_footer(); ?>