<?php
	get_header();
?>

	<!-- start section house -->
	<section class="house">
		<div class="container">

			<div class="house__wrapper">
				<div class="house__content">
					<div class="breadcrumbs">
						<ul>
							<li><a href="/">Главная</a>/</li>
							<li><?php the_title(); ?></li>
						</ul>
					</div>
					<?php print_r(); ?>
					<div class="house__text text">
						<?php if(get_field('content')): ?>
							<?php the_field('content'); ?>
						<?php else: ?>
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
								the_content();
							endwhile; else: ?>
							<?php endif; ?>
						<?php endif; ?>
					</div>
				</div>
				<?php $images = get_field('gallery'); if ($images): ?>
					<div class="house__swiper-container">
						<div class="house__swiper swiper">
							<div class="house__swiper-wrapper swiper-wrapper">
								<?php foreach( $images as $image ): ?>
									<div class="house__swiper-slide swiper-slide"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt']; ?>"></div>
								<?php endforeach; ?>
							</div>
						</div>
						<div class="house__thumbs">
							<?php foreach( $images as $key=>$image ): ?>
								<button class="house__thumb <?php echo $key == 0 ? 'is-active' : ''; ?>"><img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo $image['alt']; ?>"></button>
							<?php endforeach; ?>
						</div>
					</div>
				<?php endif; ?>
			</div>

		</div>
	</section>
	<!-- end section house -->

<?php get_footer(); ?>