$(function() {

	$('.header__menu').click(function() {
		$(this).toggleClass('is-active');
		$('body').toggleClass('is-fixed');
		$('.header__info').slideToggle(300);
	});

	$('.history__video-link').magnificPopup({
		fixedContentPos: false,
		type: 'iframe',
	});

	const currentSwiper = new Swiper('.current__swiper', {
		freeMode: true,
		spaceBetween: 50,
		slidesPerView: 2
	});

	$('.docs__list').each(function() {
		$(this).magnificPopup({
			delegate: '.docs__item',
			type: 'image',
			gallery: {
				enabled:true
			}
		});
	});

	const houseSwiper = new Swiper('.house__swiper', {
		autoHeight: false,
	});

	houseSwiper.on('slideChange', function(e) {
		let index = e.activeIndex;
		$('.house__thumb')
			.removeClass('is-active')
			.eq(index)
			.addClass('is-active');
	});

	$('.house__thumb').click(function(e) {
		e.preventDefault();
		let index = $(this).index();
		houseSwiper.slideTo(index);
	});

});
