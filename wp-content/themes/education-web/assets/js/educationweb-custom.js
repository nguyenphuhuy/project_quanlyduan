jQuery(document).ready(function($){

	/**
     * Add RTL Class in Body
    */
    var brtl;

    if ($("body").hasClass('rtl')) {

        brtl = true;

    }else{

        brtl = false;
    }

	/**
	 * Widget Sticky sidebar
	*/
	$('.content-area').theiaStickySidebar({
	    additionalMarginTop: 30
	});

	$('.widget-area').theiaStickySidebar({
	    additionalMarginTop: 30
	});
	

	/**
	 * Main Slider One
	*/ 
	$(".slider-one").owlCarousel({
		loop:true,
		autoplay:true,
		smartSpeed: 700,
		autoplayTimeout:4500,
		autoplayHoverPause:true,
		center:false,
		nav:true,
		navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
		dots:true,
		items:1,
		rtl: brtl,
		responsive:{
			300: {
				nav:false,
			},
			480: {
				nav:false,
			},
			768: {
				nav:false,
			},
			1170: {
				nav:true,
			},
		}
	});

	/**
     * Post Gallery Image Slider ( post format Gallery)
    */
    $(".postgallery-carousel").owlCarousel({
       items: 1,
       loop: true,
       dots: false,
       autoplay: true,
       mouseDrag: true,
       rtl: brtl,
    });

	/**
	 * Testimonial JS
	*/ 
	$(".testimonial-carousel").owlCarousel({
		items: 1,
		loop:true,
		autoplay:true,
		smartSpeed: 700,
		center:false,
		margin:15,
		nav:false,
		navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
		dots:true,
		rtl: brtl,
	});

	/**
	 * Clients Carousel
	*/ 
	$(".clients-slider").owlCarousel({
		loop:true,
		autoplay:true,
		smartSpeed: 500,
		autoplayTimeout:3000,
		margin:30,
		nav:false,
		navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
		dots:false,
		rtl: brtl,
		responsive:{
			300: {
				items: 2,
			},
			480: {
				items: 2,
			},
			768: {
				items: 2,
			},
			1170: {
				items: 5,
			},
		}
	});

	/**
	 * Gallery Light Box
	*/

	$("a[rel^='edugallery']").prettyPhoto({
        theme: 'light_rounded',
        slideshow: 5000,
        autoplay_slideshow: false,
        keyboard_shortcuts: true,
        deeplinking : false,
        default_width: 500,
        default_height: 344,
    });

    /**
	 * Counter JS
	*/
	$('.number').counterUp({
		time: 1000
	});


	/**
	 * Why Choose Services Area
	*/
	$('.service-excerpt h5').click(function(){
		$(this).next('.service-text').slideToggle();
		$(this).parents('.service-post').toggleClass('active');
	});

	$('.service-icon').click(function(){
		$(this).next('.service-excerpt').find('.service-text').slideToggle();
		$(this).parent('.service-post').toggleClass('active');
	});

	/**
	 * Scroll To Top
	*/
	$("#footer").on('click', '.goToTop', function(e){
		e.preventDefault();
		$('html,body').animate({
			scrollTop: 0,
		},'slow');
	});

	// Show/Hide Button on Window Scroll event.
	$(window).on('scroll', function(){
		var fromTop = $(this).scrollTop();
		var display = 'none';
		if(fromTop > 650){
			display = 'block';
		}
		$('#scrollTop').css({'display': display});
	});

	/**
	 * Vav Toggle Menu
	*/
	jQuery( ".menu-toggle" ).click(function() {
        jQuery( "#site-navigation" ).toggle( );
    });

    /**
     * Add Icon Sub Menu
    */
    $('.box-header-nav .menu-item-has-children').append('<button class="sub-toggle"><i class="fa fa-plus"></i></button>');
    $('.box-header-nav .page_item_has_children').append('<button class="sub-toggle"> <i class="fa fa-plus"></i> </button>');

    $('.box-header-nav .sub-toggle').click(function () {
        $(this).parent('.menu-item-has-children').children('ul.sub-menu').first().toggle();
        $(this).children('.fa-plus').first().toggleClass('fa-minus');

        $(this).parent('.page_item_has_children').children('ul.children').first().toggle();
        $(this).children('.fa-plus').first().toggleClass('fa-minus');
    });

});
