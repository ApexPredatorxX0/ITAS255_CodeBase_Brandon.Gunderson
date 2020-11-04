(function ($) {	
		
			var slicks = function() {
			var autospeed = $('#definitive').data('autospeed');
			var autoplay = $('#definitive').data('autoplay');
			var loop = $('#definitive').data('loop');
			
			$('.definitive-slick').slick({
			
				infinite: loop,
				slidesToShow: 1,
				
				arrows: true,
				dots:true,
				autoplay: autoplay,
				slidesToScroll:1,
				centerMode: true,
				centerPadding: '0',
				autoplaySpeed: autospeed,
			
			});
		};
			
			var testimonials = function() {
		
			$( '.widget-testimonial-slide .nl-testimonial-entry').each( function() {
			var $this = $( this );
			var autospeed = $this.data('autospeed');
			var autoplay = $this.data('autoplay');
			var slidesShows = $this.data('showpage');
			var loop = $this.data('loop');
			
			$(this).slick({
			
				infinite: loop,
				slidesToShow:slidesShows,
				arrows: true,
				autoplay: autoplay,
				centerMode: true,
				slidesToScroll:1,
				centerPadding: '0',
				autoplaySpeed: autospeed,
				responsive: [
					{
						breakpoint: 1280,
						settings: {
						arrows: true,
						centerMode: true,
						centerPadding: '40px',
						slidesToShow: slidesShows
					}
				},
				{
					breakpoint: 1024,
					settings: {
					arrows: true,
					centerMode: true,
					centerPadding: '30px',
					slidesToShow: slidesShows
				}
				},
				{
					breakpoint: 768,
					settings: {
					arrows: true,
					centerMode: true,
					centerPadding: '30px',
					slidesToShow: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
					arrows: true,
			
					centerMode: true,
					centerPadding: '30px',
				slidesToShow: 1
			}
			}
			]
	  
				});
			});
		
			
		};	
		
		
			var postSlider = function() {
			$( '.widget-post-slide').each( function() {
			var $this = $( this );
			var autospeed = $this.data('autospeed');
			var autoplay = $this.data('autoplay');
			var slidesShows = $this.data('showpage');
			var loop = $this.data('loop');
			var tabshow;
			if (slidesShows > 1){
				tabshow = 2;
			}else {
				tabshow = 1;
			}
			$(this).slick({
			
				infinite: true,
				slidesToShow: slidesShows,
				arrows: true,
				autoplay: autoplay,
				centerMode: true,
				centerPadding: '0',
				autoplaySpeed: autospeed,
				responsive: [
					{
						breakpoint: 1280,
						settings: {
						arrows: true,
						centerMode: true,
						centerPadding: '0',
						slidesToShow: slidesShows
					}
				},
				{
					breakpoint: 1024,
					settings: {
					arrows: true,
					centerMode: true,
					centerPadding: '0',
					slidesToShow: tabshow
				}
				},
				{
					breakpoint: 768,
					settings: {
					arrows: true,
					centerMode: true,
					centerPadding: '0',
					slidesToShow: 1
				}
			},
			{
				breakpoint: 480,
				settings: {
					arrows: true,
			
					centerMode: true,
					centerPadding: '0',
				slidesToShow: 1
			}
			}
			]
	  
				});
			});
			
		};	
		
		
		
		var counters = function() {	
		
		$( '.counter-val').each( function() {
			var $this = $( this );
		
		var startval = $this.data('startval');
		var endval = $this.data('endval');
		
			jQuery(this).countTo({
			from: startval,
				to: endval,
				speed: 10000,
				refreshInterval: 50,
				formatter: function (value, options) {
				return value.toFixed(options.decimals);
			},
			onUpdate: function (value) {
			console.debug(this);
			},
			onComplete: function (value) {
			console.debug(this);
			}
			});
		});
  
	};
	
	var productCarousel = function() {
			
		$( '.product_list_widget').each( function() {
			var $this = $( this );
			var number = $this.data('number');
			var enable = $this.data('enable');
			
			
			if (enable == 'slider'){
				
				if (number == 1 ){
			
			jQuery(this).slick({
			 autoplay: true,
			 autoplaySpeed: 2000,
			infinite: true,
			 arrows: true,
			 centerMode: true,
			centerPadding: '0',
			slidesToShow:number,
			});
			
			}else {
			
			jQuery(this).slick({
			 autoplay: true,
			 autoplaySpeed: 2000,
			infinite: true,
			 arrows: true,
			 centerMode: true,
			centerPadding: '0',
			slidesToShow:number,
			
				responsive: [
		 {
		  breakpoint: 1280,
		  settings: {
			arrows: true,
			centerMode: true,
			centerPadding: '0',
			slidesToShow: 3
		  }
		},
		{
		  breakpoint: 1024,
		  settings: {
			arrows: true,
			centerMode: true,
			centerPadding: '0',
			slidesToShow: 2
		  }
		},
		{
		  breakpoint: 768,
		  settings: {
			arrows: true,
			centerMode: true,
			centerPadding: '10px',
			slidesToShow: 2
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: true,
			
			centerMode: true,
			centerPadding: '10px',
			slidesToShow: 1
		  }
		}
	  ]
		 });
			};
			};
		});
		};	
		
		
		var skillbars = function() {
		jQuery('.skillbar').each(function(){
			jQuery(this).find('.skillbar-bar').animate({
				width:jQuery(this).attr('data-percent')
			},6000);
		});
		}
		
		var typeAnimate = function() {
			$( '.type-container .writing').each( function() {
			var $this = $( this );
			var mediatitle = $this.data('mediaheading');
			var typespeed = $this.data('typespeed');
			
			jQuery(this).typed({
				strings: [mediatitle],
				typeSpeed:typespeed,
				backDelay:3000,
				loop: true,
		
		});
		});
		}
		
		
	
	
	
			
			$(function() {
		
				slicks();
				counters();
				testimonials();
				postSlider();
				productCarousel();
				skillbars();
				typeAnimate();
			});
			
			$(window).on('elementor/frontend/init', function () {
        if( elementorFrontend.isEditMode() ) {
            editMode = true;
        }
	if (elementorFrontend.isEditMode()) {
    elementorFrontend.hooks.addAction( 'frontend/element_ready/dafe_testimonial_slider.default', testimonials );
	
    elementorFrontend.hooks.addAction( 'frontend/element_ready/dafe_post_carousel.default', postSlider );
	
	elementorFrontend.hooks.addAction( 'frontend/element_ready/dafe_slider.default', slicks );
	elementorFrontend.hooks.addAction( 'frontend/element_ready/dafe_counter.default', counters );
	elementorFrontend.hooks.addAction( 'frontend/element_ready/dafe_product_slider.default', productCarousel);
	elementorFrontend.hooks.addAction( 'frontend/element_ready/dafe_skillbar.default', skillbars);
	elementorFrontend.hooks.addAction( 'frontend/element_ready/dafe_type.default', typeAnimate);
	
	
	}
    });
			
		
		
})(jQuery);