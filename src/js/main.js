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

	$('[data-show-more-trigger]').click(function(e){
		e.preventDefault();
		let parent = $(this).parents('[data-show-more-item]');
		let target = parent.find('[data-show-more-target]');
		target.slideToggle(300);
	});

	$('[data-content]').hide();
	$('[data-content]:nth-child(1)').show();
	$(document).on('click','[data-tab]:not(.is-active)',function(e) {
		e.preventDefault();
		let index = $(this).index();
		let parent = $(this).parents('[data-tabs]');
		let contents = parent.next('[data-contents]');
		let currentContent = contents.find('[data-content]:eq('+ index +')');
		parent.find('[data-tab]').removeClass('is-active');
		contents.find('[data-content]').removeClass('is-active').fadeOut(300);
		setTimeout(() => {
			currentContent.fadeIn(300).addClass('is-active');
		}, 300)
		$(this).addClass('is-active');
	})

});
