// ==== AUTHOR - ANTON BOSHOFF - IO DIGITAL ==== //

// ==== INDEX ==== //
// Replace SVG
// Resize Header Height
// Get Current Year
// Initiate Nivo Slider
// Initiate CaroFredsel
// Mobile Navigation Dropdown
// Navigation Hide/Show

// ==== NAMESPACE ==== //
window.cci = {}

// ==== TRIGGER ON DOCUMENT READY ==== //
$(function(){
	try {
		
		cci.go.replaceSVG();
		// cci.go.homeSticky();
		cci.go.pasteYear();
		cci.go.navDrop();

		// ==== ON RESIZE ==== //
		$(window).resize(function() {

			cci.go.navShowHide();
			cci.go.initCaroFred();
			cci.go.initNivo();

		}).resize();

		// ==== ON LOAD ==== //
		$(window).load(function() {

			// cci.go.initNivo();

        });

	} catch(err) {

		console.log(err);

	}

});

// ==== FUNCTIONS ==== //
cci.go = {

	// Replace SVG
	replaceSVG: function() {
		if (!Modernizr.svg) {
		    $('img[src*="svg"]').attr('src', function() {
		    	return $(this).attr('src').replace('.svg', '.png');
			});
		} else {
			// $('.logo').find('img').addClass('svg');
		}
	},

	// Resize Header Height
	resizeHeader: function() {
		var graphicHeight = $('.headerGraphic img').height();
		
		if ( graphicHeight < 518 ) {
			$('header.home').css('height', graphicHeight);
		} else {
			$('header.home').css('height', '518px');
		}
	},

	// Home Sticky Nav
	homeSticky: function() {

		var top 		= $(document).scrollTop(),
			imageWrap 	= $('.headerGraphic'),
			imageHeight = imageWrap.children('img').height(),
			head 		= $('header.home'),
			logo 		= $('.logo'),
			nav 		= $('nav')

		if ( top > imageHeight ) {

			head.animate({
				// 'padding-top' : 60,
				'height' : 'auto'
			});
			// alert('now');
			// logo.addClass('stick');
			// logo.find('img[src*="svg"]').attr('src', function() {
			// 	return $(this).attr('src').replace('logo.svg', 'logo-color.svg');
			// });
			// logo.find('img[src*="png"]').attr('src', function() {
			// 	return $(this).attr('src').replace('logo.png', 'logo-color.png');
			// });
			// nav.addClass('stick');

			// cci.go.replaceSVG();

		} else {

			head.animate({
				// 'padding-top' : 0,
				'height' : imageHeight
			});
			// logo.removeClass('stick');
			// logo.find('img[src*="svg"]').attr('src', function() {
			// 	return $(this).attr('src').replace('logo-color.svg', 'logo.svg');
			// });
			// logo.find('img[src*="png"]').attr('src', function() {
			// 	return $(this).attr('src').replace('logo-color.png', 'logo.png');
			// });
			// nav.removeClass('stick');

		}
	},

	// Get Current Year
	pasteYear: function() {
		var year = new Date().getFullYear();
		$('body').find('.placeYear').text(year);
	},

	// Initiate Nivo Slider
	initNivo: function() {
		var nextArrow 	= '<i class="fa fa-chevron-right"></i>',
			prevArrow 	= '<i class="fa fa-chevron-left"></i>';

		function calcTop(){
			if ( window.innerWidth > 1200 ) {
				h3Top = '150px';
			} else if ( window.innerWidth > 768 ) {
				h3Top = '8%';
			} else if ( window.innerWidth > 480 ) {
				h3Top = '20%';
			} else {
				h3Top = '3%';
			}
		}

		calcTop();

		$('#slider').nivoSlider({
		    effect: 'fold',
		    animSpeed: 500,
		    pauseTime: 6000,
		    controlNavThumbs: true,
		    pauseOnHover: false,
		    prevText: prevArrow,
		    nextText: nextArrow,
		    beforeChange: function(){
		    	$('.nivo-caption').animate({ 
		    		opacity : 0,
		    		top : '400px'
		    	}, 400);
		    	calcTop();
		    },
		    afterChange: function(){
		    	$('.nivo-caption').animate({ 
		    		opacity : 1,
		    		top : h3Top
		    	}, 400);
		    }
		});
	},

	// Initiate CaroFredsel
	initCaroFred: function() {
		var scrollCount = '',
			wWidth 		= window.innerWidth;

		if ( ( wWidth > 480 ) && ( wWidth < 768 ) ) {
			scrollCount = 2;
		} else if ( ( wWidth > 768 ) ) {
			scrollCount = 3;
		} else {
			scrollCount = 1;
		}

		$('#clients').carouFredSel({
			responsive: false,
			width: '100%',
			circular: true,
			scroll: scrollCount,
			auto: true,
			items: {
				visible: {
					max: 6
				}
			},
			prev: '#prev2',
			next: '#next2',
			swipe: {
				onMouse: true,
				onTouch: true
			}
		});
	},

	// Mobile Navigation Dropdown
	navDrop: function() {

		$('.expander').on('click', 'a', function(e){
			e.preventDefault();
			$('nav ul').slideToggle();
		});
	},

	// Navigation Hide/Show
	navShowHide: function() {
		var navUl = $('nav ul');

		if ( window.innerWidth > 768 ) {
			navUl.show();
		} else {
			navUl.hide();
		}
	}
				

}






