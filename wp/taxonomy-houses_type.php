<?php
	get_header();

	$cat_slug = get_queried_object()->slug;
?>

	<!-- start section page-projects -->
	<section class="page-projects">
		<div class="container">

			<div class="page-projects__grid">
				<?php
				$args = array(
					'post_type' => 'houses',
					'post_status' => 'publish',
					'order' => 'ASC',
					'posts_per_page' => '-1',
					'tax_query' => array(
						array(
							'taxonomy' => 'houses_type',
							'field' => 'slug',
							'terms' => $cat_slug
						)
					)
				);
				$houses = new WP_Query( $args );
				?>
				<?php if($houses->have_posts()):
				while($houses->have_posts()): $houses->the_post(); ?>
					<a href="<?php the_permalink(); ?>" class="page-projects__item">
						<div class="page-projects__img"><img src="<?php echo esc_url(get_field('preview_img')['url']); ?>" alt="<?php echo get_field('preview_img')['alt']; ?>"></div>
						<div class="page-projects__content">
							<h3 class="page-projects__name"><?php the_field('preview_title'); ?></h3>
							<div class="page-projects__desc"><?php the_field('preview_desc'); ?></div>
						</div>
					</a>
				<?php endwhile; ?>
				<?php else: ?>
					Записей нет!
				<?php endif; wp_reset_query(); ?>
			</div>

		</div>
	</section>
	<!-- end section page-projects -->

<?php get_footer(); ?>