// ==== AUTHOR - ANTON BOSHOFF - IO DIGITAL ==== //

// ==== INDEX ==== //
// Replace SVG
// Resize Header Height
// Get Current Year
// Initiate Nivo Slider
// Initiate CaroFredsel
// Mobile Navigation Dropdown

// ==== NAMESPACE ==== //
window.cci = {}

// ==== TRIGGER ON DOCUMENT READY ==== //
$(function(){
	try {
		
		cci.go.replaceSVG();
		cci.go.pasteYear();
		cci.go.navDrop();

		// ==== ON RESIZE ==== //
		$(window).resize(function() {

			if ( window.innerWidth > 480 ) {
				cci.go.resizeHeader();
			}
			cci.go.initCaroFred();

		}).resize();

		// ==== ON LOAD ==== //
		$(window).load(function() {

			cci.go.initNivo();

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
			$('.logo').find('img').addClass('svg');
		}
	},

	// Resize Header Height
	resizeHeader: function() {
		var graphicHeight = $('.headerGraphic img').height();
		
		if ( graphicHeight < 518 ) {
			$('header').css('height', graphicHeight);
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
		    		top : '300px'
		    	}, 400);
		    },
		    afterChange: function(){
		    	$('.nivo-caption').animate({ 
		    		opacity : 1,
		    		top : '150px'
		    	}, 400);
		    },
		    slideshowEnd: function(){},     // Triggers after all slides have been shown
		    lastSlide: function(){},        // Triggers when last slide is shown
		    afterLoad: function(){}         // Triggers when slider has loaded
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
			$(this).parent().siblings('ul').slideToggle();
		});
	}
				

}






