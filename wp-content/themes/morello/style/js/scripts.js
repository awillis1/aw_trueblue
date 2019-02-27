jQuery(document).ready(function() {
    'use strict';
    /*-----------------------------------------------------------------------------------*/
    /*	WORDPRESS STUFF
    /*-----------------------------------------------------------------------------------*/
    jQuery('.post-content iframe').parents('p').addClass('has-iframe');
    jQuery('h4').html(function(){
    	return jQuery(this).html().replace(/([0-9]+[.])/g, '<span class="highlight-color">$1</span>');
    });
    /*-----------------------------------------------------------------------------------*/
    /*	STICKY HEADER
	/*-----------------------------------------------------------------------------------*/
    var options = {
        offset: 300,
        offsetSide: 'top',
        classes: {
            clone:   'banner--clone fixed',
            stick:   'banner--stick',
            unstick: 'banner--unstick'
        },
        onStick: function() {
            jQuery(jQuery.SmartMenus.Bootstrap.init);
        }
    };
    if (jQuery('.navbar')[0]) {
        var banner = new Headhesive('.navbar', options);
    }
    /*-----------------------------------------------------------------------------------*/
    /*	HAMBURGER MENU ICON
	/*-----------------------------------------------------------------------------------*/
    var $navBars = jQuery('.nav-bars');
    $navBars.click(function(){
    	if( $navBars.hasClass('is-active') ){
    		$navBars.removeClass('is-active');	
    	} else {
    		$navBars.addClass('is-active');
    	}
    });
    /*-----------------------------------------------------------------------------------*/
    /*	ISOTOPE PORTFOLIO GRID
	/*-----------------------------------------------------------------------------------*/
    var $portfoliogrid = jQuery('.portfolio-grid .isotope');
    $portfoliogrid.isotope({
        itemSelector: '.item',
        transitionDuration: '0.7s',
        masonry: {
            columnWidth: $portfoliogrid.width() / 12
        },
        layoutMode: 'masonry'
    });
    jQuery(window).resize(function() {
        $portfoliogrid.isotope({
            masonry: {
                columnWidth: $portfoliogrid.width() / 12
            }
        });
    });
    jQuery('.portfolio-grid .isotope-filter').on('click', '.button', function() {
        var filterValue = jQuery(this).attr('data-filter');
        $portfoliogrid.isotope({
            filter: filterValue
        });
        return false;
    });
    jQuery('.portfolio-grid .button-group').each(function(i, buttonGroup) {
        var $buttonGroup = jQuery(buttonGroup);
        $buttonGroup.on('click', '.button', function() {
            $buttonGroup.find('.is-checked').removeClass('is-checked');
            jQuery(this).addClass('is-checked');
        });
    });
    $portfoliogrid.imagesLoaded(function() {
        $portfoliogrid.isotope('layout');
    });
    /*-----------------------------------------------------------------------------------*/
    /*	ISOTOPE GRID VIEW COL3
    /*-----------------------------------------------------------------------------------*/
    var $gridviewcol4 = jQuery('.grid-view.col4 .isotope');
    $gridviewcol4.isotope({
        itemSelector: '.grid-view-post',
        transitionDuration: '0.6s',
        masonry: {
            columnWidth: '.col-sm-6.col-md-3'
        },
        layoutMode: 'masonry'
    });
    jQuery(window).resize(function() {
        $gridviewcol4.isotope({
            masonry: {
                columnWidth: '.col-sm-6.col-md-3'
            }
        });
    });
    $gridviewcol4.imagesLoaded(function() {
        $gridviewcol4.isotope('layout');
    });
    /*-----------------------------------------------------------------------------------*/
    /*	ISOTOPE GRID VIEW COL3
    /*-----------------------------------------------------------------------------------*/
    var $gridviewcol3 = jQuery('.grid-view.col3 .isotope');
    $gridviewcol3.isotope({
        itemSelector: '.grid-view-post',
        transitionDuration: '0.6s',
        masonry: {
            columnWidth: '.col-sm-6.col-md-4'
        },
        layoutMode: 'masonry'
    });
    jQuery(window).resize(function() {
        $gridviewcol3.isotope({
            masonry: {
                columnWidth: '.col-sm-6.col-md-4'
            }
        });
    });
    $gridviewcol3.imagesLoaded(function() {
        $gridviewcol3.isotope('layout');
    });
    /*-----------------------------------------------------------------------------------*/
    /*	ISOTOPE GRID VIEW COL2
    /*-----------------------------------------------------------------------------------*/
    var $gridviewcol2 = jQuery('.grid-view.col2 .isotope');
    $gridviewcol2.isotope({
        itemSelector: '.grid-view-post',
        transitionDuration: '0.6s',
        masonry: {
            columnWidth: '.col-md-6.col-sm-12'
        },
        layoutMode: 'masonry'
    });
    jQuery(window).resize(function() {
        $gridviewcol2.isotope({
            masonry: {
                columnWidth: '.col-md-6.col-sm-12'
            }
        });
    });
    $gridviewcol2.imagesLoaded(function() {
        $gridviewcol2.isotope('layout');
    });
    /*-----------------------------------------------------------------------------------*/
    /*	LIGHTGALLERY
	/*-----------------------------------------------------------------------------------*/
    jQuery('.light-gallery').lightGallery({
        thumbnail: true,
        selector: '.lgitem',
        animateThumb: true,
        showThumbByDefault: false,
        download: false,
        autoplayControls: false,
        thumbWidth: 100,
        thumbContHeight: 80,
        videoMaxWidth: '1000px'
    });
    /*-----------------------------------------------------------------------------------*/
    /*	OWL CAROUSEL
	/*-----------------------------------------------------------------------------------*/
    jQuery('.owl-info').owlCarousel({
        autoplay: true,
        autoplayTimeout: 5000,
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        items: 1
    });
    jQuery('.vc_row[data-vc-full-width] .portfolio-carousel, .vc_row[data-vc-full-width] .blog-carousel').owlCarousel({
        margin: 20,
        stagePadding: 20,
        loop: true,
        nav: false,
        navText: ['', ''],
        dots: true,
        responsive: {
            0: {
	            items: 1
	        },
	        768: {
	            items: 2
	
	        },
            1024: {
                items: 3
            },
			1441: {
                items: 4
            },
            1950: {
                items: 5
            }
        }
    });
    jQuery(':not(.vc_row[data-vc-full-width]) .blog-carousel, :not(.vc_row[data-vc-full-width]) .portfolio-carousel').owlCarousel({
        margin: 30,
        loop: false,
        nav: false,
        navText: ['', ''],
        items: 5,
        dots: true,
        responsive: {
	        0: {
	            items: 1
	        },
	        768: {
	            items: 2
	
	        },
	        992: {
	            items: 3
	        }
	    }
    });
    jQuery('.testimonials1').owlCarousel({
        autoplay: true,
        autoplayTimeout: 8000,
        loop: true,
        margin: 0,
        nav: false,
        dots: false,
        items: 1
    });
    jQuery('.testimonials2').owlCarousel({
        autoplay: true,
        autoplayTimeout: 8000,
        loop: true,
        margin: 30,
        nav: false,
        dots: true,
        responsive: {
	        0: {
	            items: 1
	        },
	        768: {
	            items: 2
	
	        },
	        992: {
	            items: 3
	        }
	    }
    });
    jQuery('.team-carousel').owlCarousel({
        autoplay: false,
        autoplayTimeout: 8000,
        loop: false,
        margin: 30,
        nav: false,
        dots: true,
        responsive: {
	        0: {
	            items: 1
	        },
	        768: {
	            items: 2
	
	        },
	        992: {
	            items: 4
	        }
	    }
    });
    jQuery('.clients-carousel').owlCarousel({
	    autoplay: true,
	    autoplayTimeout: 3000,
	    loop: true,
	    margin: 50,
	    nav: false,
	    dots: false,
	    responsive: {
	        0: {
	            items: 3
	        },
	        768: {
	            items: 5
	        },
	        1200: {
	            items: 6
	        }
	    }
	});
	jQuery('.basic-slider').owlCarousel({
        items: 1,
        nav: true,
        navText: ['', ''],
        dots: true,
        autoHeight: false,
        loop: true,
        margin: 0
    });  
    /*-----------------------------------------------------------------------------------*/
    /*	IMAGE ICON HOVER
	/*-----------------------------------------------------------------------------------*/
    jQuery('.overlay.icon .info').prepend('<span class="icon-more"></span>');
    /*-----------------------------------------------------------------------------------*/
    /*	PROGRESS BAR
	/*-----------------------------------------------------------------------------------*/
    jQuery('.progress-list .progress .bar').progressBar({
        shadow: false,
        percentage: false,
        animation: true,
        height: 4
    });
    /*-----------------------------------------------------------------------------------*/
    /*	DATA REL
	/*-----------------------------------------------------------------------------------*/
    jQuery('a[data-rel]').each(function() {
        jQuery(this).attr('rel', jQuery(this).data('rel'));
    });
    /*-----------------------------------------------------------------------------------*/
    /*	TOOLTIP
    /*-----------------------------------------------------------------------------------*/
    if (jQuery("[rel=tooltip]").length) {
        jQuery("[rel=tooltip]").tooltip();
    }
    /*-----------------------------------------------------------------------------------*/
    /*	COUNTER UP
	/*-----------------------------------------------------------------------------------*/
    jQuery('.counter').counterUp({
        delay: 50,
        time: 1000
    });
    /*-----------------------------------------------------------------------------------*/
    /*	GO TO TOP
    /*-----------------------------------------------------------------------------------*/
    jQuery.scrollUp({
        scrollName: 'scrollUp',
        // Element ID
        scrollDistance: 300,
        // Distance from top/bottom before showing element (px)
        scrollFrom: 'top',
        // 'top' or 'bottom'
        scrollSpeed: 300,
        // Speed back to top (ms)
        easingType: 'linear',
        // Scroll to top easing (see http://easings.net/)
        animation: 'fade',
        // Fade, slide, none
        animationInSpeed: 200,
        // Animation in speed (ms)
        animationOutSpeed: 200,
        // Animation out speed (ms)
        scrollText: '<span class="btn btn-square"><i class="ion-chevron-up"></i></span>',
        // Text for element, can contain HTML
        scrollTitle: false,
        // Set a custom <a> title if required. Defaults to scrollText
        scrollImg: false,
        // Set true to use image
        activeOverlay: false,
        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        zIndex: 1001 // Z-Index for the overlay
    });
    /*-----------------------------------------------------------------------------------*/
    /*	FITVIDS VIDEO
	/*-----------------------------------------------------------------------------------*/
    jQuery('.player, .has-iframe').fitVids();
    /*-----------------------------------------------------------------------------------*/
	/*	WOW ANIMATION
	/*-----------------------------------------------------------------------------------*/
	new WOW().init();
	/*-----------------------------------------------------------------------------------*/
	/*	LOADING
	/*-----------------------------------------------------------------------------------*/
	jQuery(window).load(function() {
	    jQuery(window).trigger('resize');
	});
});