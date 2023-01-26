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

});
