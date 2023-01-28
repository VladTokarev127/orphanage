<?php get_header(); ?>

	<!-- start section hero -->
	<section class="hero">
		<div class="container">

			<div class="hero__top">
				<h1 class="hero__title"><?php the_field('hero_title'); ?></h1>
				<div class="hero__tags">
					<?php while( the_repeater_field('tags') ): ?>
						<a href="<?php the_sub_field('link'); ?>" class="hero__tag" style="background-color: <?php the_sub_field('color'); ?>;"><?php the_sub_field('text'); ?></a>
					<?php endwhile; ?>
				</div>
			</div>

			<div class="hero__grid">
				<a href="<?php the_field('link', get_field('main_fee')); ?>" class="hero__main">
					<div class="hero__bg" style="background-color: <?php the_field('bg_color', get_field('main_fee')); ?>;"><img src="<?php the_field('bg_img', get_field('main_fee')); ?>" alt="<?php the_field('title', get_field('main_fee')); ?>"></div>
					<div class="hero__content">
						<h2 class="hero__main-title"><?php the_field('title', get_field('main_fee')); ?></h2>
						<div class="hero__main-progress progress-bar__wrapper">
							<div class="progress-bar"><span style="width: <?php the_field('progeress_bar_percent', get_field('main_fee')); ?>%; background-color: <?php the_field('progeress_bar_color', get_field('main_fee')); ?>;"></span></div>
						</div>
						<div class="hero__main-qr"><img src="<?php the_field('qr', get_field('main_fee')); ?>" alt=""></div>
					</div>
				</a>
				<?php while( the_repeater_field('list') ): ?>
					<a href="<?php the_sub_field('link'); ?>" class="hero__item" style="background-color: <?php the_sub_field('bg'); ?>;">
						<h3 class="hero__item-title">
							<?php the_sub_field('text'); ?> 
							<?php if(get_sub_field('hero_arrow')): ?>
								<img src="/wp-content/themes/house/img/hero-arrow.svg" alt="">
							<?php endif; ?>
						</h3>
					</a>
				<?php endwhile; ?>
			</div>

		</div>
	</section>
	<!-- end section hero -->

	<!-- start section history -->
	<section class="history">
		<div class="container">

			<div class="history__wrapper">

				<div class="history__top">
					<div class="history__content text">
						<h2><?php the_field('history_title'); ?></h2>
						<?php the_field('history_desc'); ?>
						<?php if(get_field('history_link')): ?>
							<p><a href="<?php the_field('history_link'); ?>" class="btn">Подробнее</a></p>
						<?php endif; ?>
					</div>
					<div class="history__video">
						<div class="history__video-bg"><img src="<?php echo esc_url(get_field('video_bg')['url']); ?>" alt=""></div>
						<a href="<?php the_field('video_url'); ?>" class="history__video-link"><img src="/wp-content/themes/house/img/play.svg" alt=""></a>
					</div>
				</div>

				<div class="team">
					<h2 class="title team__title"><?php the_field('team_title'); ?></h2>
					<div class="team__grid">
						<?php while( the_repeater_field('team_list_new') ): ?>
							<div class="team__item">
								<div class="team__img"><img src="<?php echo esc_url(get_sub_field('img')['url']); ?>" alt="#"></div>
								<div class="team__name"><?php the_sub_field('name'); ?></div>
							</div>
						<?php endwhile; ?>
						<div class="team__help" style="background-color: <?php the_field('help_color'); ?>;">
							<div class="team__help-title"><?php the_field('help_title'); ?></div>
							<div class="team__help-qr"><img src="<?php the_field('help_qr'); ?>" alt=""></div>
						</div>
					</div>
				</div>

				<div class="projects">
					<h2 class="title projects__title"><?php the_field('projects_title'); ?></h2>
					<div class="projects__grid">
						<?php while( the_repeater_field('projects_list') ): ?>
							<a href="<?php the_sub_field('link'); ?>" class="projects__item">
								<div class="projects__item-img"><img src="<?php the_sub_field('bg'); ?>" alt=""></div>
							</a>
						<?php endwhile; ?>
					</div>
				</div>

			</div>
			

		</div>
	</section>
	<!-- end section history -->

	<!-- start section current -->
	<section class="current">
		<div class="container">

			<h2 class="title current__title"><?php the_field('current_title'); ?></h2>
			<div class="current__swiper swiper">
				<div class="current__swiper-wrapper swiper-wrapper">
					<?php foreach( get_field('current_list') as $post ): setup_postdata($post); ?>
					<a href="<?php the_field('link'); ?>" class="current__swiper-slide swiper-slide">
						<div class="current__bg" style="background-color: <?php the_field('bg_color'); ?>;"><img src="<?php the_field('bg_img'); ?>" alt="<?php the_field('title'); ?>"></div>
						<div class="current__content">
							<h2 class="current__slide-title"><?php the_field('title'); ?></h2>
							<div class="current__slide-progress progress-bar__wrapper">
								<div class="progress-bar">
									<span style="width: <?php the_field('progeress_bar_percent'); ?>%; background-color: <?php the_field('progeress_bar_color'); ?>;"></span>
								</div>
								<p><?php echo number_format(get_field('progeress_bar_from'), 0, '.', ' '); ?> Р</p>
								<p><?php echo number_format(get_field('progeress_bar_to'), 0, '.', ' '); ?> Р</p>
							</div>
							<div class="current__slide-qr"><img src="<?php the_field('qr'); ?>" alt=""></div>
						</div>
					</a>
					<?php endforeach; wp_reset_postdata(); ?>
				</div>
			</div>

		</div>
	</section>
	<!-- end section current -->

	<!-- start section contacts -->
	<section class="contacts">
		<div class="container">

			<h2 class="title contacts__title"><?php the_field('contacts_title'); ?></h2>
			<div class="contacts__map-wrapper">
				<div class="contacts__info">
					<div class="contacts__label">Адрес</div>
					<div class="contacts__text"><?php the_field('address'); ?></div>
					<div class="contacts__row">
						<div class="contacts__col">
							<?php
								$tel = get_field('tel');
								$result = preg_replace('/(?:\G|^)[+\d]*\K[^:+\d]/m', '', $tel);
							?>
							<div class="contacts__label">Телефон</div>
							<div class="contacts__text"><a href="tel:<?php echo $result; ?>"><?php echo $tel; ?></a></div>
						</div>
						<div class="contacts__col">
							<div class="contacts__label">E-mail</div>
							<div class="contacts__text"><a href="mailto:<?php the_field('mail'); ?>"><?php the_field('mail'); ?></a></div>
						</div>
					</div>
					<div class="contacts__label">Соц.сети</div>
					<div class="contacts__soc">
						<?php while( the_repeater_field('socials', 'options') ): ?>
							<a href="<?php the_sub_field('link'); ?>"><img src="<?php echo esc_url(get_sub_field('img')['url']); ?>" alt="<?php echo get_sub_field('img')['alt']; ?>"></a>
						<?php endwhile; ?>
					</div>
				</div>
				<div class="contacts__map" id="map"><?php the_field('map'); ?></div>
			</div>

		</div>
	</section>
	<!-- end section contacts -->

<?php get_footer(); ?>