/*====================================================
  TABLE OF CONTENT
  1. function declearetion
  2. Initialization
  3. function for facebook status
====================================================*/

/*===========================
 1. function declearetion
===========================*/
 (function($) {
var themeApp = {
	magnificPopupInit: function() {
		$('.magnific-popup-image').magnificPopup({
			delegate: 'a',
			type: 'image',
			gallery:{
				enabled:false
			},
			image:{
				titleSrc: 'data-caption'
			}
		});
		$('.magnific-popup-gallery').magnificPopup({
			delegate: 'a',
			type: 'image',
			gallery:{
				enabled:true
			},
			image:{
				titleSrc: 'data-caption'
			}
		});
	},
	latestSlider: function(data) {
		var latest = $("#title-slider");
		latest.owlCarousel({
			singleItem : true,
			autoPlay : 4000,
			pagination : false,
			paginationSpeed : 400,
			transitionStyle : $slidestyle,
		});
		$(".latest-prev").click(function(e){
			e.preventDefault();
			latest.trigger('owl.prev');
		});
		$(".latest-next").click(function(e){
			e.preventDefault();
			latest.trigger('owl.next');
		});
	},
	responsiveIframe: function() {
		$('.full-post').fitVids();
	},
	highlighter: function() {
		$('pre, pre code').each(function(i, block) {
		    hljs.highlightBlock(block);
		});
	},
	mailchimp:function() {
		function IsEmail(email) {
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return regex.test(email);
		}
		if (typeof mailchimp_form_url !== 'undefined') {
			var form = jQuery('#mc-embedded-subscribe-form');
			form.attr("action", mailchimp_form_url);
			var message = jQuery('#message');
			var submit_button = jQuery('mc-embedded-subscribe');
			form.submit(function(e){
				e.preventDefault();
				jQuery('#mc-embedded-subscribe').attr('disabled','disabled');
				if(jQuery('#mce-EMAIL').val() != '' && IsEmail(jQuery('#mce-EMAIL').val())) {
					message.html('please wait...').fadeIn(1000);
					var url=form.attr('action');
					if(url=='' || url=='YOUR_MAILCHIMP_WEB_FORM_URL_HERE') {
						alert('Please config your mailchimp form url for this widget');
						return false;
					}
					else{
						url=url.replace('?u=', '/post-json?u=').concat('&c=?');
						console.log(url);
						var data = {};
						var dataArray = form.serializeArray();
						jQuery.each(dataArray, function (index, item) {
						data[item.name] = item.value;
						});
						jQuery.ajax({
							url: url,
							type: "POST",
							data: data,
							success: function(response, text){
								if (response.result === 'success') {
									message.html(response.result+ ": " + response.msg).delay(10000).fadeOut(500);
									jQuery('#mc-embedded-subscribe').removeAttr('disabled');
									jQuery('#mce-EMAIL').val('');
								}
								else{
									message.html(response.result+ ": " + response.msg).delay(10000).fadeOut(500);
									jQuery('#mc-embedded-subscribe').removeAttr('disabled');
									jQuery('#mce-EMAIL').focus().select();
								}
							},
							dataType: 'jsonp',
							error: function (response, text) {
								console.log('mailchimp ajax submit error: ' + text);
								jQuery('#mc-embedded-subscribe').removeAttr('disabled');
								jQuery('#mce-EMAIL').focus().select();
							}
						});
						return false;
					}
				}
				else {
					message.html('Please provide valid email').fadeIn(1000);
					jQuery('#mc-embedded-subscribe').removeAttr('disabled');
					jQuery('#mce-EMAIL').focus().select();
				}            
			});
		}
	},
	searchPopup: function() {
		var toggle_btn = $('#search-open');
		toggle_btn.on('click', function(e) {
			e.preventDefault();
			$('#search-wrap').toggleClass('visible');
			toggle_btn.toggleClass('opened');
			if ($('#search-wrap').hasClass('visible')) {
				$('#search-wrap').find('.search-input').focus();
				toggle_btn.find('i').removeClass('fa-search');
				toggle_btn.find('i').addClass('fa-close');
			} else {
				toggle_btn.find('i').removeClass('fa-close');
				toggle_btn.find('i').addClass('fa-search');
			};
		});
	},
	mobileMenu:function() {
		$('.navbar-nav').find('.menu-item-has-children').prepend('<span class="submenu-button"></span>');
		$('.menu-item-has-children').find('.submenu-button').on('click', function(){
			$(this).toggleClass('opened');
			$(this).siblings('ul').slideToggle();
		})
	},
	backToTop: function() {
		$(window).scroll(function(){
			if ($(this).scrollTop() > 100) {
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});
		$('#back-to-top').on('click', function(e){
			e.preventDefault();
			$('html, body').animate({scrollTop : 0},1000);
			return false;
		});
	},
	
	init:function(){
		themeApp.magnificPopupInit();
		themeApp.latestSlider();
		themeApp.responsiveIframe();
		themeApp.highlighter();
		themeApp.mailchimp();
		themeApp.searchPopup();
		themeApp.mobileMenu();
		themeApp.backToTop();
	}
}

/*===========================
2. Initialization
===========================*/
$(document).ready(function(){
	themeApp.init();
});
$(window).load(function() {
		$('.flexslider').flexslider({
			controlNav: false,
			prevText: '<i class="fa fa-angle-left"></i>',
			nextText: '<i class="fa fa-angle-right"></i>',
			slideshowSpeed: '3000',
			pauseOnHover: true
		});
	});
}(jQuery));

/*====================================================
3. function for facebook status
====================================================*/
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.2";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));