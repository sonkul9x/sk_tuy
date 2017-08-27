/**
 * The Javascript for our theme.
 *
 * @package VG Alice
 */
(function($) {
	"use strict"; 
	jQuery(document).ready(function($) {
		// Menu Mega
		$(".site-navigation ul li.mega-menu ul.level-0").wrap('<div class="mega-content"></div>');
		$(".site-navigation ul li.mega-menu .mega-content").wrap('<div class="full-mega"></div>');
		$(".site-navigation ul li.mega-menu ul.level-1").wrap('<div class="tab-mega"></div>');
		$('.site-navigation ul li.mega-menu ul li:nth-child(2)').removeClass('active');
		$('.site-navigation ul li.mega-menu ul li:nth-child(2) a').removeClass('active');
		$('.site-navigation ul li.mega-menu').hover(function() {
			$('.site-navigation ul li.mega-menu ul li:nth-child(2)').addClass('active');
			$('.site-navigation ul li.mega-menu ul li:nth-child(2) a').addClass('active');
		});
		$('.site-navigation ul li.mega-menu ul li.no-href a').click(function() {
			var height_tab = $(this).parent().addClass('active').find('.tab-mega').height();
			$('.site-navigation ul li.mega-menu ul li').removeClass('active');
			$('.site-navigation ul li.mega-menu ul li a').removeClass('active');
			$(this).parent().addClass('active');
			$(this).parents('.full-mega').css({'height': height_tab + 30});
			$(this).addClass('active');
		});
		// Menu Mobile
		$(".mobile-navigation .menu-item-has-children").append('<span class="next"></span>');
		$(".mobile-navigation .menu-item-has-children > ul").append('<div class="back"><span></span></div>');
		$(".mobile-navigation").on("click", ".next", function(e) {
			e.stopPropagation();
			$('.mobile-navigation .menu-item-has-children ul.sub-menu.level-0 li:nth-child(2) .next').parent().addClass("current").children(".sub-menu").addClass("open");
			if($(this).children(".sub-menu").hasClass("open")){
				$(this).parent().removeClass("current").children(".sub-menu").removeClass("open");
			}else{
				$(this).parent().children(".sub-menu").removeClass("close");
				$(this).parent().addClass("current").children(".sub-menu").addClass("open");
			}
			
		});
		
		$(".mobile-navigation .back span").on("click", function(e) {
			e.stopPropagation();
			
			$('.mobile-navigation .next').parent().removeClass("current").children(".sub-menu").removeClass("open");
		});
		
		$(".mobile-navigation .mega-menu ul").on("click", ".next", function(e) {
			e.stopPropagation();
			$(this).parent().toggleClass("current")
							.children(".sub-menu.level-1").toggleClass("open");
		});
		
		// Toogle Menu ---------------------------------------
		var menu_mobile  = $(".mobile-navigation");
		
		$( '.tools_button_icon' ).on( 'click.break', function( event ) {
			menu_mobile.toggleClass( 'active' );

			$('.top-feature').addClass( 'active' );
		} );
		$( '.menu-popup-bg' ).on( 'click.break', function( event ) {
			menu_mobile.toggleClass( 'active' );
			menu_mobile.find(".sub-menu").removeClass("open");
			$('.top-feature').removeClass( 'active' );
		} );
		$( '.close-menu-mobile span, .close-menu-tablet span').on( 'click.break', function( event ) {
			menu_mobile.toggleClass( 'active' );
			menu_mobile.find(".sub-menu").removeClass("open");
			$('.top-feature').removeClass( 'active' );
		} );
		
		$(".widget_wysija_cont .wysija-submit").wrap('<span class="wysija-submit-wrap"></span>');
		
		//Woocommerce
		//if(sticky_menu==true)
			stickymenu();
		
		// Add loading when click to any link
		$('body a').click(function() {
			var link   = $(this).attr('href');
			var loader = $(this).hasClass('no-preloader');
			if(!loader && typeof link !== "undefined" && link.toLowerCase().indexOf("/") >= 0) {
				jQuery('#pageloader').show();
			}
		});
		
		// Remove loading when click on loading 
		$('#pageloader').click(function() {
			$('#pageloader').fadeOut('slow');
		});
		
		// Search toggle.
		$( '.search-toggle' ).on( 'click.break', function( event ) {
			$( '.search-inside' ).toggleClass( 'hidden' );
			$(this).parents(".top-search").addClass( 'active' );
		} );
		$( '.search-popup-bg' ).on( 'click.break', function( event ) {
			$( '.search-inside' ).toggleClass( 'hidden' );
			$(this).parents(".top-search").removeClass( 'active' );
		} );
		
		// Popup toggle.
		$('.care-icon, .product-support' ).on( 'click.break', function( event ) {
			$( '#popup' ).addClass( 'active' );
		} );
		$('.popup-like, .hidden-popp').on( 'click.break', function( event ) {
			$( '#popup' ).removeClass( 'active' );
		} );
		
		// Tablet Popup Filter ---------------------------------------
		var filter_tablet  = $("#sidebar-product .widget_filter_custom");
		
		$( '.btn-filter' ).on( 'click.break', function( event ) {
			filter_tablet.addClass( 'active' );
		} );
		$( '.closet-filter, .popup-filter' ).on( 'click.break', function( event ) {
			filter_tablet.removeClass( 'active' );
		} );
		
		//Add Class Front Page Body
		if($('.main-container').hasClass('header-fixed')) {
			$('body').addClass('header-fixed');
		}else{
			$('body').removeClass('header-fixed');
		}
		
		if($('.main-container').hasClass('page-360')) {
			$('body').addClass('wrapper-360');
		}else{
			$('body').removeClass('wrapper-360');
		}
		
		//CAROUSEL
		$('.carousel-2').owlCarousel({
			loop:true,
			responsiveClass: true,
			responsive:{
				0:{
					items:1,
				},
				360:{
					items:1,
				},
				480:{
					items:1,
				},
				600:{
					items:1,
				},
				768:{
					items:2,
				},
				800:{
					items:2,
				},
				980:{
					items:2,
				},
				1200:{
					items:2,
				},
				1600:{
					items:2,
				}
			}	
		});
		$('.carousel-3').owlCarousel({
			loop:true,	
			responsiveClass: true,
			responsive:{
				0:{
					items:1
				},
				360:{
					items:2
				},
				480:{
					items:2
				},
				600:{
					items:2
				},
				768:{
					items:2
				},
				800:{
					items:2
				},
				980:{
					items:2
				},
				1200:{
					items:3
				},
				1600:{
					items:3
				}
			}
		});
		$('.carousel-4').owlCarousel({
			loop:true,
			responsiveClass: true,
			responsive:{
				0:{
					items:1
				},
				360:{
					items:1
				},
				480:{
					items:2
				},
				600:{
					items:2
				},
				768:{
					items:2
				},
				800:{
					items:2
				},
				980:{
					items:3
				},
				1200:{
					items:3
				},
				1600:{
					items:4
				}
			}
		});
		
		$('.list-event .inner').owlCarousel({
			loop:true,
			nav : true,
			responsiveClass: true,
			responsive:{
				0:{
					items:2,
					nav: false,
				},
				360:{
					items:2,
					nav: false,
				},
				480:{
					items:2,
					nav: false,
				},
				600:{
					items:2,
					nav: false,
				},
				768:{
					items:2,
					nav: false,
				},
				800:{
					items:2,
					nav: false,
				},
				980:{
					items:3,
					nav: false,
				},
				1200:{
					items:3
				},
				1600:{
					items:4
				}
			}
		});
		$('.related').owlCarousel({
			loop:false,
			responsiveClass: true,
			autoplay : true,
			autoplayTimeout : 3000,
			autoplayHoverPause : true,
			smartSpeed : 400,
			responsive:{
				0:{
					items:1,
				},
				360:{
					items:1,
				},
				480:{
					items:1,
				},
				600:{
					items:1,
				},
				768:{
					items:1.5,
				},
				800:{
					items:2,
				},
				980:{
					items:2.5,
				},
				1200:{
					items:3,
				},
				1600:{
					items:3,
				}
			}
		});
		
		$('.latest').owlCarousel({
			loop:true,
			responsiveClass: true,
			responsive:{
				0:{
					items:1,
				},
				360:{
					items:1,
				},
				480:{
					items:1,
				},
				600:{
					items:1.5,
				},
				768:{
					items:2,
				},
				800:{
					items:2,
				},
				980:{
					items:2.5,
				},
				1200:{
					items:3,
				},
				1600:{
					items:3,
				}
			}
		});
		
		$('.all-book').owlCarousel({
			loop:true,
			responsiveClass: true,
			autoplay : true,
			autoplayTimeout : 3000,
			autoplayHoverPause : true,
			smartSpeed : 400,
			responsive:{
				0:{
					items:1,
				},
				360:{
					items:1,
				},
				480:{
					items:1,
				},
				600:{
					items:1,
				},
				768:{
					items:1,
				},
				800:{
					items:1,
				},
				980:{
					items:1,
				},
				1200:{
					items:2,
				},
				1600:{
					items:2,
				}
			}	
		});
		$('.timeline .wpb_wrapper').addClass('owl-carousel owl-theme');
		$('.timeline .wpb_wrapper').owlCarousel({
			loop:true,
			responsiveClass: true,
			autoplay : true,
			autoplayTimeout : 3000,
			autoplayHoverPause : true,
			smartSpeed : 400,
			responsive:{
				0:{
					items:1,
				},
				360:{
					items:1,
				},
				480:{
					items:1.5,
				},
				600:{
					items:1.5,
				},
				768:{
					items:2,
				},
				800:{
					items:2.5,
				},
				980:{
					items:3,
				},
				1200:{
					items:3.5,
				},
				1600:{
					items:4,
				}
			}	
		});
		$('#list-360 #inner').owlCarousel({
			loop:false,
			nav : true,
			dots: false,
			responsiveClass: true,
			responsive:{
				0:{
					items:2,
					nav: false,
				},
				360:{
					items:2,
					nav: false,
				},
				480:{
					items:2,
					nav: false,
				},
				600:{
					items:2,
					nav: false,
				},
				768:{
					items:2,
					nav: false,
				},
				800:{
					items:2,
					nav: false,
				},
				980:{
					items:3,
					nav: false,
				},
				1200:{
					items:3
				},
				1600:{
					items:4
				}
			}
		});
		/* Image Zoom Function */
		$('.zoom_in_marker').on("click", function(){
			var len = $('.woocommerce-product-gallery__image.flex-active-slide a').attr('href');
			alert(len);
			$.fancybox({
				href: 			$('.woocommerce-product-gallery__image.flex-active-slide a').attr('href'),
				openEffect: 	'elastic',
				closeEffect: 	'elastic'
			});
		});
		
		
		// Cache all list items
		var $liCollection = $(".list-items .post-item");
		var $firstListItem = $liCollection.first();
		$liCollection.first().addClass("active");
		setInterval(function() {
			var $activeListItem = $(".list-items .post-item.active")

			$activeListItem.removeClass("active");
			var $nextListItem = $activeListItem.closest('.post-item').next();
			if ($nextListItem.length == 0) {
				$nextListItem = $firstListItem;
			}
			$nextListItem.addClass("active");
			$('.item-featured').find(".post-item[data-id='" + $nextListItem.attr('data-id') + "']").addClass("active");
		}, 6000);
		
		
		itemFeatured();
		
		//niceScroll
		$(".list-product").niceScroll({cursorborder:"",cursorcolor:"#00F", boxzoom:false});
		$(".product-view .product .single-product-image .images .flex-control-thumbs").niceScroll({cursorborder:"",cursorcolor:"#00F", boxzoom:false, scrollbarid :'thumb-niceScroll'});
		$(".latest-videos .inner").niceScroll({cursorborder:"",cursorcolor:"#00F", boxzoom:false});
		
		$('.template-knowledge .latest-videos .post-item:first-child a').addClass("active");
		$(document).on('click', '.click_video', function(e) {
			e.preventDefault();
			$('.template-knowledge .latest-videos .post-item a').removeClass("active");
			$(this).addClass("active");
			var ajaxPId = $(this).data('id');
			$.ajax({
				url: achau_ajaxurl, 
				data: {
					'action': 'achau_get_video_info',
					'post_id':  ajaxPId
				},
				success: function(results){
					$('.box-video .index').html(results);
				},
				error: function(errorThrown) { console.log(errorThrown); }
			});
		});
		
		if($('.main-container').hasClass('template-catalogue')) {
			$('body').addClass('page-catalogue');
		}else{
			$('body').removeClass('page-catalogue');
		}
		//Add Class Company Body
		if($('.main-container').hasClass('template-company')) {
			$('html').addClass('html-company');
			$('body').addClass('page-company');
			$('#wrapper').addClass('company');
		}else{
			$('html').removeClass('html-company');
			$('body').removeClass('page-company');
			$('#wrapper').removeClass('company');
		}
		
		calHeight();
	});
	
	/*To Top*/
	$(".to-top").hide();
	/* fade in #back-top */
	$(function() {
		$(window).scroll(function() {
			if($(this).scrollTop() > 100) {
				$('.to-top').fadeIn();
			} else {
				$('.to-top').fadeOut();
			}
		});
		// scroll body to 0px on click
		$('.to-top').on("click", function() {
			$('body,html').animate({
				scrollTop: 0
			}, 800);
			return false;
		});
	});
	
	//Counter Company
	$('.st-countTo').appear(function() {
		$('.timer').countTo({
			speed: 4000,
			refreshInterval: 60,
			formatter: function(value, options) {
				return value.toFixed(options.decimals);
			}
		});
	});
	
	//CLICK FEATURED
	var li_item_f = $('.list-items .post-item:first-child');
	li_item_f.addClass('active');
	$('.item-featured .post-item:first-child').addClass('active');
	
	$('.list-items .post-item').hover(function() {
		$('.list-items .post-item').removeClass('active');
		$('.item-featured .post-item').removeClass('active');
		$(this).addClass('active');
		var id_item_li = $(this).attr('data-id');
		$('.item-featured').find(".post-item[data-id='" + id_item_li + "']").addClass("active");
	});
	
	//Counter About Us
	$('.statistic').appear(function() {
		$('.timer').countTo({
			speed: 4000,
			refreshInterval: 60,
			formatter: function(value, options) {
				return value.toFixed(options.decimals);
			}
		});
	});
	$(".menu-inside .nano").nanoScroller();
	$(".inner-widget .nano").nanoScroller();
	
	
	// Tabs Products Content
	$(".tab_content").hide();
    $(".tab_content:first").show();
	
	$("ul.tabs li").click(function() {
		
      $(".tab_content").hide();
      var activeTab = $(this).attr("rel"); 
      $("#"+activeTab).fadeIn();		
		
      $("ul.tabs li").removeClass("active");
      $(this).addClass("active");

	  $(".tab_drawer_heading").removeClass("d_active");
	  $(".tab_drawer_heading[rel^='"+activeTab+"']").addClass("d_active");
	  
    });
	/* if in drawer mode */
	$(".tab_drawer_heading").click(function() {
		if($(this).hasClass("d_active")){
			$(this).removeClass("d_active");
			$(this).parent().find('.inner').removeClass('active');
		}else{
			$(this).addClass("d_active");
			$(this).parent().find('.inner').addClass('active');
		}
    });
	
	
	//CHANGE BANNER EVENT
	$('.list-event .event').find("a[data-id='1']").addClass("active");
	$('.list-event .event a').click(function() {
		$(this).removeAttr('href');
		$('.list-event .event a').removeClass('active');
		$(this).addClass('active');
		var img_src = $(this).attr('data-src');
		var img_title = $(this).attr('data-title');
		$('.item-event img').attr('src', img_src);
		$('.item-event img').attr('alt', img_title);
	});
	
	//TAB EXPERT 
	$('.tab_heading ul li:first-child').addClass('active');
	$('.tab-content .tab-pane:first-child').addClass('active');
	
	//Auto
	var availableTags = [
      "Việt Nam",
      "Nga",
      "Myanmar",
      "Cambodia",
      "Korea",
      "Philipines",
      "Nepal",
      "Bahrain",
      "Saudi Arabia",
      "Ai cập",
      "Serbia",
      "Afghnistan",
      "Qatar",
      "Hungary",
      "Thổ Nhĩ Kỳ",
      "Bangladesh",
      "Oman",
      "Iraq",
      "Pakistan",
      "Azerbaijan",
      "Libya",
      "Sri Lanka",
      "Kazakhstan",
      "Kuwait",
      "Mỹ",
      "Nhật Bản",
    ];
    $( "#country" ).autocomplete({
      source: availableTags
    });
	$( "#wcwl_country" ).autocomplete({
      source: availableTags
    });
	
	//Gallery BachNx

	$('.expand').click(function(event) {
		var year = $(this).data('year');
		$('#'+year).slideToggle();
		//$('.expand').not(this).find('i').addClass('fa-minus').removeClass('fa-plus');
        $(this).find('i').toggleClass('fa-minus').toggleClass('fa-plus');
        return false;
	});

	var sync1 = $("#sync1");
    var sync2 = $("#sync2");
    var device = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
    if(device < 480) {
    	var slidesPerPage = 3;
    }else if(device < 768){
    	var slidesPerPage = 4;
    }else {
		var slidesPerPage = 5; //globaly define number of elements per page
    }
    //alert(device);
    var syncedSecondary = true;

    sync1.owlCarousel({
        items : 1,
        slideSpeed : 2000,
        nav: true,
        autoplay: false,
        dots: false,
        loop: true,
        responsiveRefreshRate : 200,
        // navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>','<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
        navText: [
            "<i class='fa fa-angle-left'></i>",
            "<i class='fa fa-angle-right'></i>"
        ]
    }).on('changed.owl.carousel', syncPosition);

    sync2
    .on('initialized.owl.carousel', function () {
      sync2.find(".owl-item").eq(0).addClass("current");
    })
    .owlCarousel({
        items : slidesPerPage,
        dots: false,
        nav: true,
        smartSpeed: 200,
        slideSpeed : 500,
        slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
        responsiveRefreshRate : 100,
        navText: [
            "<div class='br'><i class='fa fa-angle-left'></i></div>",
            "<div class='br'><i class='fa fa-angle-right'></i></div>"
        ]
    }).on('changed.owl.carousel', syncPosition2);

    function syncPosition(el) {
	    //if you set loop to false, you have to restore this next line
	    //var current = el.item.index;

	    //if you disable loop you have to comment this block
	    var count = el.item.count-1;
	    var current = Math.round(el.item.index - (el.item.count/2) - .5);

	    if(current < 0) {
	      current = count;
	    }
	    if(current > count) {
	      current = 0;
	    }

	    //end block

	    sync2
	      .find(".owl-item")
	      .removeClass("current")
	      .eq(current)
	      .addClass("current");

	    var des = sync2
	      .find(".owl-item")
	      .eq(current)
	      .find(".item").data('des');
    	$(".gallery-des").html(des);

	    var onscreen = sync2.find('.owl-item.active').length - 1;
	    var start = sync2.find('.owl-item.active').first().index();
	    var end = sync2.find('.owl-item.active').last().index();

	    if (current > end) {
	      sync2.data('owl.carousel').to(current, 100, true);
	    }
	    if (current < start) {
	      sync2.data('owl.carousel').to(current - onscreen, 100, true);
	    }
    }

    function syncPosition2(el) {
        if(syncedSecondary) {
          var number = el.item.index;
          sync1.data('owl.carousel').to(number, 100, true);
        }
    }

    sync2.on("click", ".owl-item", function(e){
        e.preventDefault();
        var number = $(this).index();
        sync1.data('owl.carousel').to(number, 300, true);
    });

    $("#sync2 .item").click(function(event) {
    	var des = $(this).data('des');
    	$(".gallery-des").html(des);
    });
	
	//Count Wishlist
	jQuery( document ).ready( function($){
		$(document).on( 'added_to_wishlist removed_from_wishlist', function(){
			var counter = $('.your-counter-selector');

			$.ajax({
				url: yith_wcwl_l10n.ajax_url,
				data: {
					action: 'yith_wcwl_update_wishlist_count'
				},
				dataType: 'json',
				success: function( data ){
					counter.html( data.count );
				},
				beforeSend: function(){
					counter.block();
				},
				complete: function(){
					counter.unblock();
				}
			});
		});
		$(document).on( 'added_to_wishlist', function(el, form){
			var el = $(this);
			var product_id = el.data( 'product-id' ),
            table = $(document).find( '.cart.wishlist_table' ),
            pagination = table.data( 'pagination' ),
            per_page = table.data( 'per-page' ),
            wishlist_id = table.data( 'id' ),
            wishlist_token = table.data( 'token' ),
            data = {
                action: yith_wcwl_l10n.actions.reload_wishlist_and_adding_elem_action,
                pagination: pagination,
                per_page: per_page,
                wishlist_id: wishlist_id,
                wishlist_token: wishlist_token,
                add_to_wishlist: product_id,
                product_type: el.data( 'product-type' )
            };
			$.ajax({
				type: 'POST',
				url: yith_wcwl_l10n.ajax_url,
				data: data,
				dataType    : 'html',
				beforeSend: function(){
					if( typeof $.fn.block != 'undefined' ) {
						table.fadeTo('400', '0.6').block({message: null,
							overlayCSS                           : {
								background    : 'transparent url(' + yith_wcwl_l10n.ajax_loader_url + ') no-repeat center',
								backgroundSize: '16px 16px',
								opacity       : 0.6
							}
						});
					}
				},
				success: function(res) {
					$( '#yith-wcwl-form' ).load( yith_wcwl_l10n.ajax_url + ' #yith-wcwl-form', data, function(){

						if( typeof $.fn.unblock != 'undefined' ) {
							table.stop(true).css('opacity', '1').unblock();
						}
						
					});
				}
			});
		});
	});

	//Equal Height
	$.fn.equalHeights = function() {
        var maxHeight = 0,
            $this = $(this);

        $this.each( function() {
            var height = $(this).innerHeight();

            if ( height > maxHeight ) { maxHeight = height; }
        });

        return $this.css('height', maxHeight);
    };

    // auto-initialize plugin
    $('[data-equal]').each(function(){
        var $this = $(this),
            target = $this.data('equal');
        $this.find(target).equalHeights();
    });
})(jQuery);

jQuery(window).load(function($) {
	jQuery('#pageloader').fadeOut('slow');
	
});

function stickymenu(){
	var CurrentScroll = 0;
	var vina_width = jQuery(window).width();
	var vina_header = jQuery('#site-header');
	var header_height = vina_header.height();
	jQuery(window).scroll(function() {
		if(vina_width > 1024){
			var NextScroll = jQuery(this).scrollTop();
			if ((NextScroll < CurrentScroll) && NextScroll < 200) {
				vina_header.removeClass('fixed');
				vina_header.parent().css('margin-top', 0);
			}
			else if ((NextScroll < CurrentScroll) && NextScroll > header_height) {	
				vina_header.addClass('fixed');
				vina_header.parent().css('margin-top', header_height);
			}
			else {
				vina_header.removeClass('fixed');
				vina_header.parent().css('margin-top', 0);
			}
		}
		CurrentScroll = NextScroll; 
	});
	jQuery(window).resize(function(event) {
		if(jQuery(window).width() < 1024){
			vina_header.removeClass('fixed');
		}
	});
}
function calHeight(){
	var heightBody = jQuery("body").height();
	var heightFooter = jQuery("#site-footer").height();
	if(jQuery("body").hasClass('admin-bar')){
		heightFoo = heightFooter + 32;
	}else{
		heightFoo = heightFooter;
	}
	var heightCountTo = heightBody - heightFoo;
	var heightPer = (heightCountTo/heightBody)*100;
	jQuery(".template-company .st-countTo").css('height', heightPer+'%');
}
function itemFeatured(){
	var windowsize = jQuery(window).width();

	jQuery(window).resize(function() {
		var windowsize = jQuery(window).width();
		if(windowsize < 1200){
			jQuery('.item-featured').addClass('owl-carousel owl-theme');
			jQuery('.latest-videos .inner').addClass('owl-carousel owl-theme');
		}
	});
	if(windowsize < 1201){
		jQuery('.item-featured').addClass('owl-carousel owl-theme');
		jQuery('.item-featured').owlCarousel({
			items:1,
			loop:true,
			responsive:{
				0:{
					items:1,
				},
				360:{
					items:1,
				},
				480:{
					items:1,
				},
				600:{
					items:1,
				},
				768:{
					items:1,
				},
				980:{
					items:2,
				},
				1200:{
					items:2,
				},
				1600:{
					items:2,
				},
			},			
		});
		
		
		jQuery('.latest-videos .inner').addClass('owl-carousel owl-theme');
		jQuery('.latest-videos .inner').owlCarousel({
			loop:true,
			responsive:{
				0:{
					items:1
				},
				360:{
					items:1
				},
				480:{
					items:2
				},
				600:{
					items:2
				},
				768:{
					items:2
				},
				800:{
					items:2
				},
				980:{
					items:2
				},
				1200:{
					items:2
				},
				1600:{
					items:2
				},
			},			
		});
	}
	jQuery(window).resize(function() {
	var windowsize = jQuery(window).width();
		if(windowsize < 1650){
			jQuery('.all-certify .wpb_wrapper').addClass('owl-carousel owl-theme');
		}
	});
	if(windowsize < 1650){
		jQuery('.all-certify .wpb_wrapper').addClass('owl-carousel owl-theme');
		jQuery('.all-certify .wpb_wrapper').owlCarousel({
			loop:true,
			responsive:{
				0:{
					items:1
				},
				360:{
					items:1.5
				},
				480:{
					items:2
				},
				600:{
					items:2.5
				},
				768:{
					items:3
				},
				800:{
					items:3.5
				},
				980:{
					items:3.5
				},
				1200:{
					items:4
				},
				1600:{
					items:4
				},
			},			
		});
	}
	
}
/* Get Param value */
function achau_getParameterByName(name, string) {
	name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
	var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
		results = regex.exec(string);
	return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}
