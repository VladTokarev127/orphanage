<?php
	get_header();
	$type = get_queried_object()->post_type;
	$link = get_post_type_archive_link($type);
	$termName = get_post_type_object($type)->labels->name;
?>

	<!-- start section house -->
	<section class="house">
		<div class="container">

			<div class="house__wrapper">
				<div class="house__content">
					<div class="breadcrumbs">
						<ul>
							<li><a href="/">Главная</a>/</li>
							<li><a href="<?php echo $type == 'post' ? '/news' : $link; ?>"><?php echo $termName; ?></a>/</li>
							<li><?php the_title(); ?></li>
						</ul>
					</div>
					<div class="house__text text"><?php the_field('content'); ?></div>
				</div>
				<div class="house__swiper-container">
					<div class="house__swiper-slide swiper-slide"><img src="<?php echo esc_url(get_field('preview_img')['url']); ?>" alt="<?php echo get_field('preview_img')['alt']; ?>"></div>
				</div>
			</div>

		</div>
	</section>
	<!-- end section house -->

<?php get_footer(); ?>