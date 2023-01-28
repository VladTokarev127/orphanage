<?php
	get_header();
?>

	<!-- start section fees -->
	<section class="fees">
		<div class="container">

			<div class="fees__grid">
				<?php
				$args = array(
					'post_type' => 'fees',
					'post_status' => 'publish',
					'order' => 'ASC',
					'posts_per_page' => '-1',
				);
				$fees = new WP_Query( $args );
				?>
				<?php if($fees->have_posts()):
				while($fees->have_posts()): $fees->the_post(); ?>
					<a href="<?php the_field('link'); ?>" class="current__swiper-slide" data-show-more-item>
						<div class="current__bg" style="background-color: <?php the_field('bg_color'); ?>;"><img src="<?php the_field('bg_img'); ?>" alt="<?php the_field('title'); ?>"></div>
						<div class="current__content">
							<h2 class="current__slide-title"><?php the_field('title'); ?></h2>
							<div class="current__swiper-slide-top">
								<div class="current__slide-progress progress-bar__wrapper">
									<div class="progress-bar">
										<span style="width: <?php the_field('progeress_bar_percent'); ?>%; background-color: <?php the_field('progeress_bar_color'); ?>;"></span>
									</div>
									<p><?php echo number_format(get_field('progeress_bar_from'), 0, '.', ' '); ?> Р</p>
									<p><?php echo number_format(get_field('progeress_bar_to'), 0, '.', ' '); ?> Р</p>
								</div>
								<button class="current__swiper-slide-btn btn btn_white" data-show-more-trigger>Подробнее</button>
							</div>
							<div class="current__slide-qr"><img src="<?php the_field('qr'); ?>" alt=""></div>
						</div>
						<div class="current__swiper-slide-more" data-show-more-target>
							<h2 class="current__slide-title"><?php the_field('title'); ?></h2>
							<div class="current__slide-text"><?php the_field('desc'); ?></div>
							<?php $images = get_field('gallery'); if ($images): ?>
								<div class="current__slide-imgs">
									<?php foreach( $images as $image ): ?>
										<div class="current__slide-img"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt']; ?>"></div>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<button class="current__slide-close btn" data-show-more-trigger>Подробнее</button>
						</div>
					</a>
				<?php endwhile; ?>
				<?php else: ?>
					Записей нет!
				<?php endif; wp_reset_query(); ?>
			</div>

		</div>
	</section>
	<!-- end section fees -->

<?php get_footer(); ?>