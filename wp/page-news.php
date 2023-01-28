<?php
	get_header();
?>

	<!-- start section news -->
	<section class="news">
		<div class="container">

			<div class="news__grid">
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
					<a href="<?php the_permalink(); ?>" class="news__item">
						<h3 class="news__title"><?php the_field('preview_title'); ?></h3>
						<div class="news__desc"><?php the_field('preview_desc'); ?></div>
					</a>
				<?php endwhile; ?>
				<?php else: ?>
					Записей нет!
				<?php endif; wp_reset_query(); ?>
			</div>

		</div>
	</section>
	<!-- end section news -->

<?php get_footer(); ?>