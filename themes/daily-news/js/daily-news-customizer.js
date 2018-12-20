(function( $ ) {
    "use strict";
    
    	// Theme color
    wp.customize( 'theme_color', function( value ) {
        value.bind( function( to ) {
            var color = to;
            if (to == 'null') {
            	color = '#FF4444';
            };
            var styles = String('');
            styles += '<style type="text/css" id="jqstyle">';
			styles += 'a, a:hover, a:focus {color: '+color+';}';
			styles += '.btn-default:hover,input[type="submit"]:hover,.btn-default:focus,input[type="submit"]:focus,.btn-default:active,input[type="submit"]:active {background:'+color+';}';
			styles += '.btn-primary {background:'+color+';}';
			styles += 'input[type="text"]:focus,input[type="email"]:focus,input[type="search"]:focus,input[type="url"]:focus,input[type="password"]:focus,textarea:focus,.form-control:focus {border: 1px solid '+color+';}';
			styles += '::-moz-selection{background: '+color+';}';
			styles += '::selection{background: '+color+';}';
			styles += '.mejs-controls .mejs-time-rail .mejs-time-current{background: '+color+' !important;}';
			styles += '.navbar .container #search-wrap input[type=text]:focus{border: 1px solid '+color+';}';
			styles += '.navbar-default .navbar-nav li.current-menu-item > a,.navbar-default .navbar-nav li.current-menu-parent > a,.navbar-default .navbar-nav li.current-menu-ancestor > a{background-color: '+color+';}';
			styles += '.navbar-default .navbar-toggle:focus{background: '+color+';}';
			styles += '.secondary-bar-wrap{background: '+color+';}';
			styles += '.secondary-bar .social-links li a:hover i{background: '+color+';}';
			styles += '.latest-slider-wrap .slider-title{background: '+color+';}';
			styles += '.latest-slider-wrap .slider-nav a i{background: '+color+';}';
			styles += '.latest-slider-wrap .item-wrap .item .category ul li a{background: '+color+';}';
			styles += '.latest-slider-wrap .item-wrap .item .heading:hover{color: '+color+';}';
			styles += '.post-wrap .category-list ul li a{background: '+color+';}';
			styles += '.category-wrap .category-name span{background: '+color+';}';
			styles += '.category-wrap .category-name span:before{border-top: 35px solid '+color+';}';
			styles += '.default-layout .post-wrap .title a:hover{color: '+color+';}';
			styles += '.default-layout .post-wrap .post-meta span a:hover{color: '+color+';}';
			styles += '.default-layout .post-wrap .permalink:hover{color: '+color+';}';
			styles += '.pagination-wrap .pagination .newer-posts span,.pagination-wrap .pagination .older-posts span{background: '+color+';}';
			styles += '.tag-wrap a:hover,.tag-wrap a:focus {color: '+color+';}';
			styles += '.share-wrap .share-wrap-inner {background: '+color+';}';
			styles += '.about-author .avatar {background: '+color+';}';
			styles += '.about-author .details .author a:hover {color: '+color+';}';
			styles += '.meta-info span i {background: '+color+';}';
			styles += '.meta-info span a:hover {color: '+color+';}';
			styles += '.prev-next-wrap .previous-post,.prev-next-wrap .next-post {background-color: '+color+';}';
			styles += '.comment-container > ol li header .comment-details .commenter-name a:hover {color: '+color+';}';
			styles += '.comment-container > ol li .comment-edit-link:hover {color: '+color+';}';
			styles += '.comment-container .comment-respond .required {color: '+color+';}';
			styles += '.format-quote .image-container blockquote {background: '+color+';}';
			styles += '.author-cover .avatar {background: '+color+';}';
			styles += '.flex-direction-nav a {background: '+color+';}';
			styles += '.widget .title span {background: '+color+';}';
			styles += '.widget .title span:before {border-top: 35px solid '+color+';}';
			styles += '.widget a:hover,.widget a:focus {color: '+color+';}';
			styles += '.widget ul li a:hover .post-count {background: '+color+'; border: 1px solid '+color+';}';
			styles += '.widget.widget_tag_cloud a {background: '+color+';}';
			styles += '.widget.widget_recent_entries ul li a:hover,.widget.widget_recent_entries ul li a:focus {color: '+color+';}';
			styles += '.widget.widget_calendar table tbody a:hover, .widget.widget_calendar table tbody a:focus {background: '+color+';}';
			styles += '.widget.widget_calendar table tfoot td a:hover,.widget.widget_calendar table tfoot td a:focus {color: '+color+';}';
			styles += '.widget.widget_recent_comments ul li a:hover,.widget.widget_recent_comments ul li a:focus {color: '+color+';}';
			styles += '.recent-post .recent-single-post a:hover .post-info h4 {color: '+color+';}';
			styles += '.recent-post .recent-single-post a:hover .post-info .date {color: '+color+';}';
			styles += '.main-footer input[type="text"]:focus,.main-footer input[type="email"]:focus,.main-footer input[type="search"]:focus,.main-footer input[type="url"]:focus,.main-footer input[type="password"]:focus,.main-footer textarea:focus,.main-footer .form-control:focus {border: 1px solid '+color+';}';
			styles += '.main-footer .widget a:hover,.main-footer .widget a:focus {color: '+color+';}';
			styles += '.main-footer .widget ul li a:hover .post-count {border: 1px solid '+color+';}';
			styles += '.main-footer .widget.widget_tag_cloud a:hover {background: '+color+';}';
			styles += '.main-footer .widget.widget_recent_entries ul li a:hover,.main-footer .widget.widget_recent_entries ul li a:focus {color: '+color+';}';
			styles += '.main-footer .widget.widget_calendar table tfoot td a:hover,.main-footer .widget.widget_calendar table tfoot td a:focus {color: '+color+';}';
			styles += '.main-footer .recent-post .recent-single-post a:hover .post-info h4 {color: '+color+';}';
			styles += '#back-to-top i {background: '+color+';}';			
			styles += '@media screen and (min-width: 767px) {.full-width .social-links{background: '+color+';}}';
			styles += '@media screen and (max-width: 767px) {.navbar-default .navbar-nav li .submenu-button:hover, .navbar-default .navbar-nav li .submenu-button:focus{background: '+color+';}}';
			styles += '</style>';
            $('#jqstyle').remove();
            $( styles ).appendTo( "head" );
        } );
    });

	// header text color
    wp.customize( 'header_textcolor', function( value ) {
        value.bind( function( to ) {
            var color = to || '#202020';
            var styles = String('');
                styles += '<style type="text/css" id="jqstyle_header_color">';
                styles += '.header-content-wrap .logo.text-logo, .header-content-wrap .logo.text-logo:hover, .header-content-wrap .logo.text-logo:focus, .header-content-wrap .subtitle{color: '+color+';}';
                styles += '</style>';
                $('#jqstyle_header_color').remove();
                $( styles ).appendTo( "head" );
        });
    });
    // wp.customize('dn[latest_bar]', function(value){
	    //     value.bind( function( to ) {
	    //     	alert(to);
	    //         if (to == false) {
		   //          $('.secondary-bar').hide();
		   //      } else {
		   //      	$('.secondary-bar').show();
		   //      }
	    //     });
	    // });

})( jQuery );