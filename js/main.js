AOS.init({ duration: 800, easing: 'slide' });

(function($) {
	"use strict";

	$(window).stellar({ responsive: true, parallaxBackgrounds: true, parallaxElements: true, horizontalScrolling: false, hideDistantElements: false, scrollProperty: 'scroll' });

	const fullHeight = () => $('.js-fullheight').css('height', $(window).height()).end().resize(() => $('.js-fullheight').css('height', $(window).height()));
	fullHeight();

	const loader = () => setTimeout(() => $('#ftco-loader').length > 0 && $('#ftco-loader').removeClass('show'), 1);
	loader();

	$.Scrollax();

	const burgerMenu = () => $('body').on('click', '.js-fh5co-nav-toggle', function(event) {
		event.preventDefault();
		$(this).toggleClass('active', !$('#ftco-nav').is(':visible'));
	});
	burgerMenu();

	const onePageClick = () => $(document).on('click', '#ftco-nav a[href^="#"]', function(event) {
		event.preventDefault();
		$('html, body').animate({ scrollTop: $($.attr(this, 'href')).offset().top - 70 }, 500);
	});
	onePageClick();

	const carousel = () => {
		const settings = { autoplay: true, loop: true, margin: 30, stagePadding: 0, nav: false, navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'], responsive: { 0: { items: 1 }, 600: { items: 2 }, 1000: { items: 3 } } };
		$('.home-slider').owlCarousel({ ...settings, items: 1, animateOut: 'fadeOut', animateIn: 'fadeIn', autoplayHoverPause: false });
		$('.carousel-properties, .carousel-agent, .carousel-testimony').owlCarousel(settings);
	};
	carousel();

	$('nav .dropdown').hover(function() {
		$(this).toggleClass('show').find('> a').attr('aria-expanded', true).end().find('.dropdown-menu').toggleClass('show');
	});

	$('#dropdown04').on('show.bs.dropdown', () => console.log('show'));

	const scrollWindow = () => $(window).scroll(function() {
		const st = $(this).scrollTop(), navbar = $('.ftco_navbar'), sd = $('.js-scroll-wrap');
		navbar.toggleClass('scrolled', st > 150).toggleClass('awake', st > 350).toggleClass('sleep', st < 350);
		sd.length > 0 && sd.toggleClass('sleep', st > 350);
	});
	scrollWindow();

	const counter = () => $('#section-counter, .hero-wrap, .ftco-counter').waypoint(function(direction) {
		if (direction === 'down' && !$(this.element).hasClass('ftco-animated')) {
			$('.number').each(function() {
				$(this).animateNumber({ number: $(this).data('number'), numberStep: $.animateNumber.numberStepFactories.separator(',') }, 7000);
			});
		}
	}, { offset: '95%' });
	counter();

	const contentWayPoint = () => {
		let i = 0;
		$('.ftco-animate').waypoint(function(direction) {
			if (direction === 'down' && !$(this.element).hasClass('ftco-animated')) {
				$(this.element).addClass('item-animate');
				setTimeout(() => $('body .ftco-animate.item-animate').each((k, el) => setTimeout(() => {
					const effect = $(el).data('animate-effect');
					$(el).addClass(`${effect ? effect : 'fadeInUp'} ftco-animated`).removeClass('item-animate');
				}, k * 50, 'easeInOutExpo')), 100);
			}
		}, { offset: '95%' });
	};
	contentWayPoint();

	$(document).ready(() => $('.question h2').click(function() {
		$('.answer').removeClass('open');
		$(this).siblings('.answer').addClass('open');
	}));

	$('.image-popup').magnificPopup({ type: 'image', closeOnContentClick: true, closeBtnInside: false, fixedContentPos: true, mainClass: 'mfp-no-margins mfp-with-zoom', gallery: { enabled: true, navigateByImgClick: true, preload: [0, 1] }, image: { verticalFit: true }, zoom: { enabled: true, duration: 300 } });

	$('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({ disableOn: 700, type: 'iframe', mainClass: 'mfp-fade', removalDelay: 160, preloader: false, fixedContentPos: false });
})(jQuery);
