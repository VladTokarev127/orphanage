<?php
	get_header();
?>

	<!-- start section page-projects -->
	<section class="page-projects">
		<div class="container">

			<div class="page-projects__grid">
				<?php
				$args = array(
					'post_type' => 'post',
					'post_status' => 'publish',
					'order' => 'ASC',
					'posts_per_page' => '-1',
				);
				$news = new WP_Query( $args );
				?>
				<?php if($news->have_posts()):
				while($news->have_posts()): $news->the_post(); ?>
					<a href="<?php the_permalink(); ?>" class="page-projects__item">
						<div class="page-projects__img"><img src="<?php echo esc_url(get_field('preview_img')['url']); ?>" alt="<?php echo get_field('preview_img')['alt']; ?>"></div>
						<div class="page-projects__content">
							<h3 class="page-projects__name"><?php the_field('preview_title'); ?></h3>
							<div class="page-projects__news"><?php echo get_the_date('d.m.Y'); ?></div>
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