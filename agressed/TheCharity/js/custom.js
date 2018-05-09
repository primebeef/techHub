/* Custom jQuery Code Hierarchy  */
/* 
CUSTOM JS DOCUMENT 
	1.Page Loader 
	2.Navigation Menu 
	3.Owl Slider
	4.Data Animation
	5.Progress Bar
	6.Background Image
	7.Parallax BG
	8.Portfolio Grid
	9.Pretty Photo
	10.Form
		- Contact
		- Career
		- Subscribe
	11.Tool Tip
*/
(function ($) {
    'use strict';
	
	/* Page Loader */
	var pageLoader = $("#pageloader");
    if (pageLoader.length > 0)
    {
		var loadInner = $(".loader-item");
        loadInner.delay(700).fadeOut();
        pageLoader.delay(800).fadeOut("slow");
    }
	
	/* Navigation Menu */
	var navBar = $("#sticker");
	if (navBar.length > 0) 
	{
		navBar.sticky({
			topSpacing: 0
		});
		
		 var transHead = $('.transparent-header .navbar');
		 var navClose = $(".close");
		 /* header Contact (Phone) */
		 var headContact = $(".header-contact");
		 headContact.on(function() {
		 
			var headercon = $(".header-contact-content");
            headercon.show("fast", function() {});
            transHead.fadeIn().addClass('top-search-open');
            navClose.on(function() {
                headercon.hide("fast", function() {});
                transHead.fadeIn().removeClass('top-search-open');
            })
        });
        /* header Search (Search Form) */
		var headSearch = $(".header-search");
        headSearch.on(function() {
			var headerser = $(".header-search-content");
            headerser.show("fast", function() {});
            transHead.fadeIn().addClass('top-search-open');
            navClose.on(function() {
                headerser.hide("fast", function() {});
                transHead.fadeIn().removeClass('top-search-open');
            })
        });
        /* header Share (Search Form) */
		var headShare = $(".header-share");
        headShare.on(function() {
			var headerShare = $(".header-share-content");
            headerShare.show("fast", function() {});
            transHead.fadeIn().addClass('top-search-open');
            navClose.on(function() {
                headerShare.hide("fast", function() {});
                transHead.fadeIn().removeClass('top-search-open');
            })
        });
		/* Scroll */
		 var scroll = $('.scroll');
		 scroll.on('click', function(event) {
            var $anchor = $(this);
            var headerH = $('#navigation').outerHeight();
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 60 + "px"
            }, 1200, 'easeInOutExpo');
            event.preventDefault();
        });
        /* Active When Scroll */
		var pBody = jQuery('body')
		pBody.scrollspy({ 
			target: '#topnav',
			offset: 95
		})
        /* Responsive Auto Close */
		var onepagelink = $('.one-page .nav li a');
		var navcollapse = $('.navbar-collapse')
        onepagelink.on(function() {
            navcollapse.removeClass('in');
        });
        /* Smooth Scroll Links */
		var pageScroll = $('.page-scroll a');
        pageScroll.on('click', function(event) {
			var $anchor = $(this);
			$('html, body')
				.stop()
				.animate({
					scrollTop: $($anchor.attr('href'))
						.offset()
						.top
				}, 1500, 'easeInOutExpo');
			event.preventDefault();
		});
    
	}
	
	/* Owl Slider */
	var owlSlider = $(".owl-carousel");
	if (owlSlider.length > 0)
	{
		owlSlider.each(function(index) {
			var oThis = $(this);
			var effect_mode = $(this).data('effect');
			var autoplay = $(this).data('autoplay');
			var navigation = $(this).data('navigation');
			var pagination = $(this).data('pagination');
			var singleitem = $(this).data('singleitem');
			var items = $(this).data('items');
			var itemsdesktop = $(this).data('desktop');
			var itemsdesktopsmall = $(this).data('desktopsmall');
			var itemstablet = $(this).data('tablet');
			var itemsmobile = $(this).data('mobile');
			if (itemsdesktop > 0) {
				itemsdesktop = [1199, itemsdesktop];
			}
			if (itemsdesktopsmall > 0) {
				itemsdesktopsmall = [979, itemsdesktopsmall];
			}
			if (itemstablet > 0) {
				itemstablet = [640, itemstablet];
			}
			if (itemsmobile > 0) {
				itemsmobile = [479, itemsmobile];
			}
			oThis.owlCarousel({
				transitionStyle: effect_mode,
				autoPlay: autoplay,
				navigation: navigation,
				pagination: pagination,
				singleItem: singleitem,
				items: items,
				itemsDesktop: itemsdesktop,
				itemsDesktopSmall: itemsdesktopsmall,
				itemsTablet: itemstablet,
				itemsMobile: itemsmobile,
				navigationText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"]
			});
		});
	}
	
	/* Data Animation */
	var dataAnima = true;
	if (dataAnima)
	{
		var dAnimation = $('[data-animation]')
		dAnimation.each(function() {
            var element = $(this);
            element.addClass('animated');
            element.appear(function() {
                var delay = (element.data('delay') ? element.data('delay') : 1);
                if (delay > 1) element.css('animation-delay', delay + 'ms');
                element.addClass(element.data('animation'));
                setTimeout(function() {
                    element.addClass('visible');
                }, delay);
            });
        });
	}
	
	/* Progress Bar */	
	var progressBar = $(".progress-bar");
	if (progressBar.length > 0)
	{
		progressBar.each(function() {
			var pThis = $(this);
			pThis.appear(function() {
				var datavl = pThis.attr('data-percentage');
				pThis.animate({
					"width": datavl + "%"
				}, '1200');
			});
		});
	}
	
	/* Background IMAGE */	
	var pageSection = $(".image-bg, .parallax-bg");
	if (pageSection.length > 0)
	{
		pageSection.each(function(indx) {
			var parThis = $(this);
			if (parThis.attr("data-background")) {
				parThis.css("background-image", "url(" + parThis.data("background") + ")");
			}
		});
	}
	
	/* Parallax BG */
	 var parallaxBG = $(".image-bg");
	 if (parallaxBG.length > 0 && !navigator.userAgent.match(/iPad|iPhone|Android/i)) {
		$.stellar({
			horizontalScrolling: false,
			verticalOffset: 0,
			horizontalOffset: 0,
			responsive: true,
			scrollProperty: 'scroll',
			parallaxElements: false,
		});
	}
	
	/* Portfolio Grid */
	var mixCon = $("#mix-container");
	if (mixCon.length > 0)
	{
		mixCon.mixItUp();
	}
		
	/* Pretty Photo */
	var prettyPhoto = $("a[rel^='prettyPhoto'], a[data-rel^='prettyPhoto']");
	if (prettyPhoto.length > 0) {
		prettyPhoto.prettyPhoto({
			hook: 'data-rel',
			theme: "dark_square",
			social_tools: false,
			deeplinking: false
		});
	}
	
	/* Form */
	/* Contact */	
	var myForm = $("#contactform");	
	if (myForm .length > 0) {
		myForm.bootstrapValidator({
				container: 'tooltip',
				feedbackIcons: {
					valid: 'fa fa-check',
					warning: 'fa fa-user',
					invalid: 'fa fa-times',
					validating: 'fa fa-refresh'
				},
				fields: {
					contact_name: {
						validators: {
							notEmpty: {
								message: ''
							}
						}
					},
					contact_email: {
						validators: {
							notEmpty: {
								message: ''
							},
							emailAddress: {
								message: ''
							}
						}
					},
					contact_phone: {
						validators: {
							notEmpty: {
								message: ''
							}
						}
					},
					contact_message: {
						validators: {
							notEmpty: {
								message: ''
							}
						}
					},
				}
			})
			.on('success.form.bv', function(e) {
				e.preventDefault();
				var $form = $(e.target),
					validator = $form.data('bootstrapValidator'),
					submitButton = validator.getSubmitButton();
				var form_data = $('#contactform').serialize();
				$.ajax({
					type: "POST",
					dataType: 'json',
					url: "php/contact-form.php",
					data: form_data,
					success: function(msg) {
						$('.form-message').html(msg.data);
						$('.form-message').show();
						submitButton.removeAttr("disabled");
						resetForm($('#contactform'));
					},
					error: function(msg) {}
				});
				return false;
			});
	}
   var subForm = $("#subscribe_form ");	
	/* Subscribe */	
	if (subForm.length > 0) {
            subForm.bootstrapValidator({
                    container: 'tooltip',
                    feedbackIcons: {
                        valid: 'fa fa-check',
                        warning: 'fa fa-user',
                        invalid: 'fa fa-times',
                        validating: 'fa fa-refresh'
                    },
                    fields: {
                        subscribe_email: {
                            validators: {
                                notEmpty: {
                                    message: 'Email is required. Please enter email.'
                                },
                                emailAddress: {
                                    message: 'Please enter a correct email address.'
                                }
                            }
                        },
                    }
                })
                .on('success.form.bv', function(e) {
                    e.preventDefault();
                    var $form = $(e.target),
                        validator = $form.data('bootstrapValidator'),
                        submitButton = validator.getSubmitButton();
                    var form_data = $('#subscribe_form').serialize();
                    $.ajax({
                        type: "POST",
                        dataType: 'json',
                        url: "php/subscription.php",
                        data: form_data,
                        success: function(msg) {
                            $('.form-message1').html(msg.data);
                            $('.form-message1').show();
                            submitButton.removeAttr("disabled");
                            resetForm($('#subscribe_form'));
                        },
                        error: function(msg) {}
                    });
                    return false;
                });
        }
    function resetForm($form) {
		$form.find(
				'input:text, input:password, input, input:file, select, textarea'
			)
			.val('');
		$form.find('input:radio, input:checkbox')
			.removeAttr('checked')
			.removeAttr('selected');
		$form.find('button[type=submit]')
			.attr("disabled", "disabled");
	}
	 
	 /* Feeds  */
	 var myFeeds = $(".my-feeds");
	 if (myFeeds.length > 0) {
		/* ================ FLICKR FEED ================ */
		var flickrFeed = $('.flickr-feed');
		flickrFeed.socialstream({
			socialnetwork: 'flickr',
			limit: 12,
			username: 'google'
		})
     }
	
	/* Tool Tip */
	var toolTip = $('[data-toggle="tooltip"]');
    if (toolTip.length > 0) {
        toolTip.tooltip()
    }
		
})(jQuery);
