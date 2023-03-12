<?php
	get_header();
?>

	<!-- start section sbor -->
	<section class="sbor">
		<div class="container">

			<div class="sbor__grid">
				<?php
				$args = array(
					'post_type' => 'leyka_campaign',
					'post_status' => 'publish',
					'order' => 'ASC',
					'posts_per_page' => '-1',
				);
				$sbor = new WP_Query( $args );
				?>
				<?php if($sbor->have_posts()):
				while($sbor->have_posts()): $sbor->the_post(); ?>
					<?php
						$id = get_the_ID();
						$total = number_format(intval(get_post_meta($id, 'campaign_target', true)), 0, '.', ' ');
						$current = number_format(intval(get_post_meta($id, 'total_funded', true)), 0, '.', ' ');
						$procentLine = intval(get_post_meta($id, 'total_funded', true)) === 0 ? 0 : (intval(get_post_meta($id, 'total_funded', true)) / intval(get_post_meta($id, 'campaign_target', true))) * 100;
					?>
					<article class="sbor__item">
						<div class="sbor__img"><img src="http://xn-----blciccedx9dxapjhb0h.xn--p1ai/wp-content/uploads/2023/02/2023-02-20_18-57-45-300x298.png" alt=""></div>
						<h3 class="sbor__title"><?php the_title(); ?></h3>
						<div class="sbor__rows">
							<div class="sbor__row"><p><b>Нужно собрать: </b><?php echo $total; ?> рублей</p></div>
							<div class="sbor__row"><p><b>Уже собрано: </b><?php echo $current; ?> рублей</p></div>
						</div>
						<div class="sbor__line"><span style="width: <?php echo $procentLine; ?>%;"></span></div>
						<div class="sbor__btns">
							<a href="<?php the_permalink(); ?>" class="btn sbor__btn">Помочь</a>
							<a href="#" class="btn sbor__btn">Прочитать подробнее</a>
						</div>
					</article>
				<?php endwhile; ?>
				<?php else: ?>
					Записей нет!
				<?php endif; wp_reset_query(); ?>
			</div>
		
		</div>
	</section>
	<!-- end section sbor -->

<?php get_footer(); ?>