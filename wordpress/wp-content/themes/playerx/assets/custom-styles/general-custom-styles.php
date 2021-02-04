<?php

if(!function_exists('playerx_edge_design_styles')) {
    /**
     * Generates general custom styles
     */
    function playerx_edge_design_styles() {
	    $font_family = playerx_edge_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && playerx_edge_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo playerx_edge_dynamic_css( $font_family_selector, array( 'font-family' => playerx_edge_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = playerx_edge_options()->getOptionValue('first_color');
        if(!empty($first_main_color)) {
            $color_selector = array(
                'a:hover',
                'h1 a:hover',
                'h2 a:hover',
                'h3 a:hover',
                'h4 a:hover',
                'h5 a:hover',
                'h6 a:hover',
                'p a:hover',
                'body.edgtf-page-content-skin-light .edgtf-content a:hover',
                'body.edgtf-page-content-skin-light .edgtf-content p a:hover',
                '.edgtf-comment-holder .edgtf-comment-text .comment-edit-link:hover',
                '.edgtf-comment-holder .edgtf-comment-text .comment-reply-link:hover',
                '.edgtf-comment-holder .edgtf-comment-text .replay:hover',
                '.edgtf-comment-holder .edgtf-comment-text #cancel-comment-reply-link',
                '.edgtf-owl-slider .owl-nav .owl-next:hover',
                '.edgtf-owl-slider .owl-nav .owl-prev:hover',
                'footer .widget ul li a:hover',
                'footer .widget #wp-calendar tfoot a:hover',
                'footer .widget.widget_tag_cloud a:hover',
                '.edgtf-fullscreen-sidebar .widget ul li a:hover',
                '.edgtf-fullscreen-sidebar .widget #wp-calendar tfoot a:hover',
                '.edgtf-fullscreen-sidebar .widget.widget_tag_cloud a:hover',
                '.edgtf-side-menu .widget ul li a:hover',
                '.edgtf-side-menu .widget #wp-calendar tfoot a:hover',
                '.edgtf-side-menu .widget.widget_tag_cloud a:hover',
                '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown .wpml-ls-item-toggle:hover',
                '.widget_icl_lang_sel_widget .wpml-ls-legacy-dropdown-click .wpml-ls-item-toggle:hover',
                '.edgtf-blog-holder article.sticky .edgtf-post-title a',
                '.edgtf-blog-holder article .edgtf-post-title a:hover',
                '.edgtf-blog-holder article .edgtf-blog-like a:hover',
                '.edgtf-blog-holder article .edgtf-post-info-comments-holder a:hover',
                '.edgtf-author-description .edgtf-author-description-text-holder .edgtf-author-name a:hover',
                '.edgtf-author-description .edgtf-author-description-text-holder .edgtf-author-social-icons a:hover',
                '.edgtf-blog-single-navigation .edgtf-blog-single-next:hover',
                '.edgtf-blog-single-navigation .edgtf-blog-single-prev:hover',
                '.edgtf-single-links-pages .edgtf-single-links-pages-inner>span',
                '.edgtf-blog-holder.edgtf-blog-single article.format-link .edgtf-post-title a:hover',
                '.edgtf-related-posts-holder .edgtf-related-post .edgtf-post-info>div a:hover',
                '.edgtf-blog-list-holder.edgtf-bl-standard .edgtf-post-info-date a:hover',
                '.edgtf-blog-list-holder .edgtf-bli-info>div a:hover',
                '.edgtf-blog-list-holder.edgtf-bl-boxed .edgtf-post-info-date a:hover',
                '.edgtf-blog-list-holder.edgtf-bl-minimal .edgtf-post-info-date a:hover',
                '.edgtf-blog-list-holder.edgtf-bl-simple .edgtf-bli-content .edgtf-post-title a:hover',
                '.edgtf-blog-list-holder.edgtf-bl-simple .edgtf-bli-content .edgtf-post-info-date a:hover',
                '.edgtf-blog-slider-holder .edgtf-item-info-section>div a:hover',
                '.edgtf-blog-slider-holder .edgtf-post-info-date a:hover',
                '.edgtf-top-bar .widget a:hover',
                '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-main-menu>ul>li.edgtf-active-item>a',
                '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-main-menu>ul>li>a:hover',
                '.edgtf-dark-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-main-menu>ul>li.edgtf-active-item>a',
                '.edgtf-dark-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-main-menu>ul>li>a:hover',
                '.edgtf-drop-down .wide .second .inner>ul>li.current-menu-item>a',
                '.edgtf-mobile-header .edgtf-mobile-menu-opener.edgtf-mobile-menu-opened a',
                '.edgtf-mobile-header .edgtf-mobile-nav ul li a:hover',
                '.edgtf-mobile-header .edgtf-mobile-nav ul li h6:hover',
                '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-ancestor>a',
                '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-ancestor>h6',
                '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-item>a',
                '.edgtf-mobile-header .edgtf-mobile-nav ul ul li.current-menu-item>h6',
                '.edgtf-mobile-header .edgtf-mobile-nav .edgtf-grid>ul>li.edgtf-active-item>a',
                '.edgtf-mobile-header .edgtf-mobile-nav .edgtf-grid>ul>li.edgtf-active-item>h6',
                '.edgtf-search-page-holder article.sticky .edgtf-post-title a',
                '.edgtf-search-cover .edgtf-search-close:hover',
                '.edgtf-side-menu-button-opener.opened',
                '.edgtf-side-menu-button-opener:hover',
                '.edgtf-match-single-nav .edgtf-match-prev a:hover',
                '.edgtf-match-single-nav .edgtf-match-next a:hover',
                '.edgtf-match-single-nav .edgtf-single-nav-content-holder .edgtf-single-nav-label-holder:hover',
                '.edgtf-portfolio-single-holder .edgtf-ps-info-holder .edgtf-ps-info-item a:hover',
                '.edgtf-portfolio-single-holder .edgtf-ps-info-holder .edgtf-ps-info-item.edgtf-ps-social-share a:hover',
                '.edgtf-ps-navigation .edgtf-ps-prev a:hover',
                '.edgtf-ps-navigation .edgtf-ps-next a:hover',
                '.edgtf-pl-filter-holder ul li.edgtf-pl-current span',
                '.edgtf-pl-filter-holder ul li:hover span',
                '.edgtf-portfolio-list-holder.edgtf-pl-gallery-overlay article .edgtf-pli-text .edgtf-pli-category-holder a:hover',
                '.edgtf-portfolio-slider-holder .edgtf-portfolio-list-holder.edgtf-nav-light-skin .owl-nav .owl-next:hover',
                '.edgtf-portfolio-slider-holder .edgtf-portfolio-list-holder.edgtf-nav-light-skin .owl-nav .owl-prev:hover',
                '.edgtf-portfolio-slider-holder .edgtf-portfolio-list-holder.edgtf-nav-dark-skin .owl-nav .owl-next:hover',
                '.edgtf-portfolio-slider-holder .edgtf-portfolio-list-holder.edgtf-nav-dark-skin .owl-nav .owl-prev:hover',
                '.edgtf-testimonials-holder.edgtf-testimonials-standard.edgtf-testimonials-dark .edgtf-owl-slider .owl-nav .owl-next:hover',
                '.edgtf-testimonials-holder.edgtf-testimonials-standard.edgtf-testimonials-dark .edgtf-owl-slider .owl-nav .owl-prev:hover',
                '.edgtf-banner-holder .edgtf-banner-link-text .edgtf-banner-link-hover span',
                '.edgtf-btn.edgtf-btn-outline',
                '.edgtf-pie-chart-holder .edgtf-pc-percentage .edgtf-pc-percent',
                '.edgtf-section-title-holder .edgtf-st-title .edgtf-st-title-hightlight',
                '.edgtf-social-share-holder.edgtf-dropdown .edgtf-social-share-dropdown-opener:hover',
                '.edgtf-tabs.edgtf-tabs-simple .edgtf-tabs-nav li.ui-state-active a',
                '.edgtf-tabs.edgtf-tabs-simple .edgtf-tabs-nav li.ui-state-hover a',
                '.edgtf-tabs.edgtf-tabs-simple.edgtf-tabs-white-skin .edgtf-tabs-nav li.ui-state-active a',
                '.edgtf-tabs.edgtf-tabs-simple.edgtf-tabs-white-skin .edgtf-tabs-nav li.ui-state-hover a',
                '.edgtf-tabs.edgtf-tabs-vertical .edgtf-tabs-nav li.ui-state-active a',
                '.edgtf-tabs.edgtf-tabs-vertical .edgtf-tabs-nav li.ui-state-hover a',
                '.edgtf-tabs.edgtf-tabs-vertical.edgtf-tabs-white-skin .edgtf-tabs-nav li.ui-state-active a',
                '.edgtf-tabs.edgtf-tabs-vertical.edgtf-tabs-white-skin .edgtf-tabs-nav li.ui-state-hover a',
                '.edgtf-team-holder.edgtf-team-dark-skin .edgtf-team-icon a:hover',
                '.edgtf-twitter-list-holder .edgtf-twitter-icon',
                '.edgtf-twitter-list-holder .edgtf-tweet-text a:hover',
                '.edgtf-twitter-list-holder .edgtf-twitter-profile a:hover',
                '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget li .edgtf-twitter-icon',
                '.widget.widget_edgtf_twitter_widget .edgtf-twitter-widget li .edgtf-tweet-text a:hover',
            );

            $woo_color_selector = array();
            if(playerx_edge_is_woocommerce_installed()) {
                $woo_color_selector = array(
                    '.woocommerce-page .edgtf-content .edgtf-quantity-buttons .edgtf-quantity-minus:hover',
                    '.woocommerce-page .edgtf-content .edgtf-quantity-buttons .edgtf-quantity-plus:hover',
                    'div.woocommerce .edgtf-quantity-buttons .edgtf-quantity-minus:hover',
                    'div.woocommerce .edgtf-quantity-buttons .edgtf-quantity-plus:hover',
                    '.edgtf-woo-single-page .edgtf-single-product-summary .product_meta>span a:hover',
                    '.edgtf-dark-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-shopping-cart-holder .edgtf-header-cart:hover',
                    '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-shopping-cart-holder .edgtf-header-cart:hover',
                    '.widget.woocommerce.widget_layered_nav ul li.chosen a',
                    '.widget.woocommerce.widget_products ul li .product-title:hover',
                    '.widget.woocommerce.widget_recently_viewed_products ul li .product-title:hover',
                    '.widget.woocommerce.widget_top_rated_products ul li .product-title:hover',
                    '.edgtf-plc-holder.edgtf-plc-nav-light-skin .owl-nav .owl-next:hover',
                    '.edgtf-plc-holder.edgtf-plc-nav-light-skin .owl-nav .owl-prev:hover',
                    '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-light-skin .added_to_cart',
                    '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-light-skin .button',
                );
            }

            $color_selector = array_merge($color_selector, $woo_color_selector);

	        $color_important_selector = array(
                '.edgtf-light-header .edgtf-page-header>div:not(.fixed):not(.edgtf-sticky-header) .edgtf-menu-area .widget a:hover',
                '.edgtf-light-header .edgtf-page-header>div:not(.fixed):not(.edgtf-sticky-header).edgtf-menu-area .widget a:hover',
                '.edgtf-dark-header .edgtf-page-header>div:not(.fixed):not(.edgtf-sticky-header) .edgtf-menu-area .widget a:hover',
                '.edgtf-dark-header .edgtf-page-header>div:not(.fixed):not(.edgtf-sticky-header).edgtf-menu-area .widget a:hover',
                '.edgtf-light-header.edgtf-header-vertical .edgtf-vertical-menu ul li a:hover',
                '.edgtf-light-header.edgtf-header-vertical .edgtf-vertical-menu ul li ul li.current-menu-ancestor>a',
                '.edgtf-light-header.edgtf-header-vertical .edgtf-vertical-menu ul li ul li.current-menu-item>a',
                '.edgtf-light-header.edgtf-header-vertical .edgtf-vertical-menu ul li ul li.current_page_item>a',
                '.edgtf-light-header.edgtf-header-vertical .edgtf-vertical-menu>ul>li.current-menu-ancestor>a',
                '.edgtf-light-header.edgtf-header-vertical .edgtf-vertical-menu>ul>li.edgtf-active-item>a',
                '.edgtf-dark-header.edgtf-header-vertical .edgtf-vertical-menu ul li a:hover',
                '.edgtf-dark-header.edgtf-header-vertical .edgtf-vertical-menu ul li ul li.current-menu-ancestor>a',
                '.edgtf-dark-header.edgtf-header-vertical .edgtf-vertical-menu ul li ul li.current-menu-item>a',
                '.edgtf-dark-header.edgtf-header-vertical .edgtf-vertical-menu ul li ul li.current_page_item>a',
                '.edgtf-dark-header.edgtf-header-vertical .edgtf-vertical-menu>ul>li.current-menu-ancestor>a',
                '.edgtf-dark-header.edgtf-header-vertical .edgtf-vertical-menu>ul>li.edgtf-active-item>a',
                '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-search-opener:hover',
                '.edgtf-light-header .edgtf-top-bar .edgtf-search-opener:hover',
                '.edgtf-dark-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-search-opener:hover',
                '.edgtf-dark-header .edgtf-top-bar .edgtf-search-opener:hover',
                '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-side-menu-button-opener.opened',
                '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-side-menu-button-opener:hover',
                '.edgtf-light-header .edgtf-top-bar .edgtf-side-menu-button-opener.opened',
                '.edgtf-light-header .edgtf-top-bar .edgtf-side-menu-button-opener:hover',
                '.edgtf-dark-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-side-menu-button-opener.opened',
                '.edgtf-dark-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-side-menu-button-opener:hover',
                '.edgtf-dark-header .edgtf-top-bar .edgtf-side-menu-button-opener.opened',
                '.edgtf-dark-header .edgtf-top-bar .edgtf-side-menu-button-opener:hover',
                '.edgtf-dark-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-icon-widget-holder:hover',
                '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-icon-widget-holder:hover',
                '.edgtf-dark-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-social-icon-widget-holder:hover',
                '.edgtf-light-header .edgtf-page-header>div:not(.edgtf-sticky-header):not(.fixed) .edgtf-social-icon-widget-holder:hover',
                '.edgtf-btn.edgtf-btn-simple:not(.edgtf-btn-glow):not(.edgtf-btn-custom-hover-color):hover',
                '.edgtf-btn.edgtf-btn-solid:not(.edgtf-btn-glow):not(.edgtf-btn-custom-hover-color):hover',
	        );

            $background_color_selector = array(
                '.edgtf-st-loader .pulse',
                '.edgtf-st-loader .double_pulse .double-bounce1',
                '.edgtf-st-loader .double_pulse .double-bounce2',
                '.edgtf-st-loader .cube',
                '.edgtf-st-loader .rotating_cubes .cube1',
                '.edgtf-st-loader .rotating_cubes .cube2',
                '.edgtf-st-loader .stripes>div',
                '.edgtf-st-loader .wave>div',
                '.edgtf-st-loader .two_rotating_circles .dot1',
                '.edgtf-st-loader .two_rotating_circles .dot2',
                '.edgtf-st-loader .five_rotating_circles .spinner-container>div',
                '.edgtf-st-loader .atom .ball-1:before',
                '.edgtf-st-loader .atom .ball-2:before',
                '.edgtf-st-loader .atom .ball-3:before',
                '.edgtf-st-loader .atom .ball-4:before',
                '.edgtf-st-loader .clock .ball:before',
                '.edgtf-st-loader .mitosis .ball',
                '.edgtf-st-loader .lines .line1',
                '.edgtf-st-loader .lines .line2',
                '.edgtf-st-loader .lines .line3',
                '.edgtf-st-loader .lines .line4',
                '.edgtf-st-loader .fussion .ball',
                '.edgtf-st-loader .wave_circles .ball',
                '.edgtf-st-loader .pulse_circles .ball',
                '#submit_comment',
                '.post-password-form input[type=submit]',
                'input.wpcf7-form-control.wpcf7-submit',
                '#edgtf-back-to-top>span',
                'footer .edgtf-footer-bottom-holder .widget.widget_nav_menu .menu-playerx-footer-menu-container li a:after',
                '.edgtf-blog-holder article .edgtf-post-info-author',
                '.edgtf-blog-holder article .edgtf-post-info-category',
                '.edgtf-blog-holder article.format-audio .edgtf-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
                '.edgtf-blog-holder article.format-audio .edgtf-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
                '.edgtf-blog-pagination ul li a:after',
                '.edgtf-bl-standard-pagination ul li a:after',
                '.edgtf-blog-list-holder.edgtf-bl-standard .edgtf-post-info-category',
                '.edgtf-blog-list-holder.edgtf-bl-standard .edgtf-post-title:after',
                '.edgtf-blog-list-holder.edgtf-bl-boxed .edgtf-post-info-category',
                '.edgtf-blog-slider-holder .edgtf-item-info-section .edgtf-post-info-category',
                '.edgtf-blog-slider-holder .edgtf-post-title:after',
                '.edgtf-main-menu>ul>li>a:after',
                '.edgtf-drop-down .second .inner ul li a .item_outer:before',
                '.edgtf-header-vertical .edgtf-vertical-menu ul li a .item_outer .item_text:after',
                '.edgtf-search-fade .edgtf-fullscreen-with-sidebar-search-holder .edgtf-fullscreen-search-table',
                '.edgtf-social-icons-group-widget.edgtf-square-icons .edgtf-social-icon-widget-holder:hover',
                '.edgtf-social-icons-group-widget.edgtf-square-icons.edgtf-light-skin .edgtf-social-icon-widget-holder:hover',
                '.edgtf-pl-standard-pagination ul li a:after',
                '.edgtf-portfolio-slider-holder .edgtf-portfolio-list-holder.edgtf-pag-light-skin .owl-dots .owl-dot.active span',
                '.edgtf-portfolio-slider-holder .edgtf-portfolio-list-holder.edgtf-pag-light-skin .owl-dots .owl-dot:hover span',
                '.edgtf-portfolio-slider-holder .edgtf-portfolio-list-holder.edgtf-pag-dark-skin .owl-dots .owl-dot.active span',
                '.edgtf-portfolio-slider-holder .edgtf-portfolio-list-holder.edgtf-pag-dark-skin .owl-dots .owl-dot:hover span',
                '.edgtf-accordion-holder.edgtf-ac-boxed .edgtf-accordion-title.ui-state-active',
                '.edgtf-accordion-holder.edgtf-ac-boxed .edgtf-accordion-title.ui-state-hover',
                '.edgtf-btn.edgtf-btn-solid',
                '.edgtf-icon-shortcode.edgtf-circle',
                '.edgtf-icon-shortcode.edgtf-dropcaps.edgtf-circle',
                '.edgtf-icon-shortcode.edgtf-square',
                '.edgtf-process-holder .edgtf-process-circle',
                '.edgtf-process-holder .edgtf-process-line',
                '.edgtf-progress-bar .edgtf-pb-content-holder .edgtf-pb-content',
                '.edgtf-stream-box-holder .edgtf-sb-title:after',
                '.edgtf-stream-box-holder .edgtf-sb-main-stream-item .edgtf-sb-text-holder .edgtf-sb-channel',
                '.edgtf-tabs.edgtf-tabs-standard .edgtf-tabs-nav li.ui-state-active',
                '.edgtf-tabs.edgtf-tabs-standard .edgtf-tabs-nav li.ui-state-hover',
                '.edgtf-tabs.edgtf-tabs-boxed .edgtf-tabs-nav li.ui-state-active a',
                '.edgtf-tabs.edgtf-tabs-boxed .edgtf-tabs-nav li.ui-state-hover a',
                '.edgtf-tabs.edgtf-tabs-boxed.edgtf-tabs-white-skin .edgtf-tabs-nav li.ui-state-active a',
                '.edgtf-tabs.edgtf-tabs-boxed.edgtf-tabs-white-skin .edgtf-tabs-nav li.ui-state-hover a',
            );

            $woo_background_color_selector = array();
            if(playerx_edge_is_woocommerce_installed()) {
                $woo_background_color_selector = array(
                    '.woocommerce-page .edgtf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
                    '.woocommerce-page .edgtf-content a.added_to_cart',
                    '.woocommerce-page .edgtf-content a.button',
                    '.woocommerce-page .edgtf-content button[type=submit]:not(.edgtf-woo-search-widget-button):not(.edgtf-search-submit)',
                    '.woocommerce-page .edgtf-content input[type=submit]',
                    'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
                    'div.woocommerce a.added_to_cart',
                    'div.woocommerce a.button',
                    'div.woocommerce button[type=submit]:not(.edgtf-woo-search-widget-button):not(.edgtf-search-submit)',
                    'div.woocommerce input[type=submit]',
                    '.woocommerce-pagination ul li a:after',
                    '.woocommerce-pagination ul li span.current:after',
                    '.edgtf-woo-single-page .woocommerce-tabs ul.tabs>li.active',
                    '.edgtf-woo-single-page .woocommerce-tabs ul.tabs>li:hover',
                    '.edgtf-shopping-cart-dropdown .edgtf-cart-bottom .edgtf-view-cart',
                    '.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle',
                    '.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-range',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-default-skin .added_to_cart',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-default-skin .button',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-default-skin .added_to_cart:hover',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-default-skin .button:hover',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-light-skin .added_to_cart:hover',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-light-skin .button:hover',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-dark-skin .added_to_cart:hover',
                    '.edgtf-plc-holder .edgtf-plc-item .edgtf-plc-add-to-cart.edgtf-dark-skin .button:hover',
                    '.edgtf-plc-holder.edgtf-plc-pag-light-skin .owl-dots .owl-dot span',
                    '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-default-skin .added_to_cart',
                    '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .edgtf-pli-add-to-cart.edgtf-default-skin .button',
                );
            }

            $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

            $background_color_important_selector = array(
                '.edgtf-btn.edgtf-btn-outline:not(.edgtf-btn-custom-hover-bg):hover',
            );

            $border_color_selector = array(
                '.edgtf-st-loader .pulse_circles .ball',
                '#respond input:focus[type=text]',
                '#respond textarea:focus',
                '.edgtf-style-form textarea:focus',
                '.wpcf7-form-control.wpcf7-date:focus',
                '.wpcf7-form-control.wpcf7-number:focus',
                '.wpcf7-form-control.wpcf7-quiz:focus',
                '.wpcf7-form-control.wpcf7-select:focus',
                '.wpcf7-form-control.wpcf7-text:focus',
                '.wpcf7-form-control.wpcf7-textarea:focus',
                'input:focus[type=text]',
                'input:focus[type=email]',
                'input:focus[type=password]',
                '.edgtf-owl-slider+.edgtf-slider-thumbnail>.edgtf-slider-thumbnail-item.active img',
                '.edgtf-accordion-holder.edgtf-ac-simple .edgtf-accordion-content.ui-accordion-content-active',
                '.edgtf-accordion-holder.edgtf-ac-simple.edgtf-white-skin .edgtf-accordion-content.ui-accordion-content-active',
                '.edgtf-btn.edgtf-btn-outline',
                '.woocommerce-page .edgtf-content input:focus[type=text]',
                '.woocommerce-page .edgtf-content input:focus[type=email]',
                '.woocommerce-page .edgtf-content input:focus[type=tel]',
                '.woocommerce-page .edgtf-content input:focus[type=password]',
                '.woocommerce-page .edgtf-content textarea:focus',
                'div.woocommerce input:focus[type=text]',
                'div.woocommerce input:focus[type=email]',
                'div.woocommerce input:focus[type=tel]',
                'div.woocommerce input:focus[type=password]',
                'div.woocommerce textarea:focus',
            );

            $border_color_important_selector = array(
                '.edgtf-btn.edgtf-btn-outline:not(.edgtf-btn-custom-border-hover):hover',
            );

            $border_bottom_color_selector = array (
                'body.edgtf-page-content-skin-light .wpb_widgetised_column .widget .edgtf-sidearea-title',
                'body.edgtf-page-content-skin-light .wpb_widgetised_column .widget .edgtf-widget-title',
                'body.edgtf-page-content-skin-light aside.edgtf-sidebar .widget .edgtf-sidearea-title',
                'body.edgtf-page-content-skin-light aside.edgtf-sidebar .widget .edgtf-widget-title',
                '.edgtf-blog-holder article .edgtf-post-info-category:after',
                '.edgtf-blog-list-holder.edgtf-bl-standard .edgtf-post-info-category:after',
                '.edgtf-blog-list-holder.edgtf-bl-boxed .edgtf-post-info-category:after',
                '.edgtf-blog-slider-holder .edgtf-item-info-section .edgtf-post-info-category:after',
                '.single-match-item.edgtf-page-content-skin-light .edgtf-match-info-item .edgtf-match-item-title',
                '.edgtf-woo-pl-info-below-image ul.products>.product .added_to_cart:after',
                '.edgtf-woo-pl-info-below-image ul.products>.product .button:after',
                '.edgtf-woo-pl-info-below-image ul.products>.product .added_to_cart:before',
                '.edgtf-woo-pl-info-below-image ul.products>.product .button:before',
                '.edgtf-woo-single-page .woocommerce-tabs ul.tabs>li.active:after',
                '.edgtf-woo-single-page .woocommerce-tabs ul.tabs>li:hover:after',
                '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .added_to_cart:after',
                '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .button:after',
                '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .added_to_cart:before',
                '.edgtf-pl-holder .edgtf-pli-inner .edgtf-pli-text-inner .button:before',
            );

            $border_top_color_selector = array(
                '#edgtf-back-to-top>span:after,#edgtf-back-to-top>span:before',
                '.edgtf-blog-holder article .edgtf-post-info-author:before',
                '.edgtf-btn.edgtf-btn-solid.edgtf-btn-trapeze-shape .edgtf-btn-trapeze-left-side',
                '.edgtf-btn.edgtf-btn-solid.edgtf-btn-trapeze-shape .edgtf-btn-trapeze-right-side',
                '.edgtf-stream-box-holder .edgtf-sb-main-stream-item .edgtf-sb-text-holder .edgtf-sb-channel:before',
            );

            $border_left_color_selector = array(
                '.edgtf-comment-holder .edgtf-comments-title>:before',
                '.edgtf-comment-form .comment-reply-title:before',
                'footer .widget .edgtf-widget-title-holder .edgtf-widget-title:before',
                '.edgtf-fullscreen-sidebar .widget .edgtf-widget-title-holder .edgtf-widget-title:before',
                '.edgtf-side-menu .widget .edgtf-widget-title-holder .edgtf-widget-title:before',
                '.wpb_widgetised_column .widget .edgtf-widget-title-holder .edgtf-widget-title:before',
                'aside.edgtf-sidebar .widget .edgtf-widget-title-holder .edgtf-widget-title:before',
                '.widget .edgtf-widget-title-holder .edgtf-widget-title:before',
                '.edgtf-related-posts-holder .edgtf-related-posts-title>:before',
                '.edgtf-section-title-holder.edgtf-st-minimal .edgtf-st-title:before',
            );

            echo playerx_edge_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo playerx_edge_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo playerx_edge_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
            echo playerx_edge_dynamic_css($background_color_important_selector, array('background-color' => $first_main_color.'!important'));
	        echo playerx_edge_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
	        echo playerx_edge_dynamic_css($border_bottom_color_selector, array('border-bottom-color' => $first_main_color));
	        echo playerx_edge_dynamic_css($border_top_color_selector, array('border-top-color' => $first_main_color));
	        echo playerx_edge_dynamic_css($border_left_color_selector, array('border-left-color' => $first_main_color));
            echo playerx_edge_dynamic_css($border_color_important_selector, array('border-color' => $first_main_color.'!important'));
        }
	
	    $page_background_color = playerx_edge_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    'body',
			    '.edgtf-content'
		    );
		    echo playerx_edge_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }

        $gradient_start_color = playerx_edge_options()->getOptionValue('page_background_color_gradient_start');
        $gradient_middle_color = playerx_edge_options()->getOptionValue('page_background_color_gradient_middle');
        $gradient_end_color = playerx_edge_options()->getOptionValue('page_background_color_gradient_end');

        if ($gradient_start_color !== '' && $gradient_middle_color !== '' && $gradient_end_color !== '') {
            echo playerx_edge_dynamic_css(array(
                'body',
                '.edgtf-content'
            ), array(
                'background' => '-webkit-linear-gradient(left,' . $gradient_start_color . ', ' .$gradient_middle_color .' 50% ,' . $gradient_end_color . ')',
                'background' => '-o-linear-gradient(right,' . $gradient_start_color . ', ' .$gradient_middle_color .' 50% ,' . $gradient_end_color . ')',
                'background' => '-moz-linear-gradient(right,' . $gradient_start_color . ', ' .$gradient_middle_color .' 50% ,' . $gradient_end_color . ')',
                'background' => 'linear-gradient(to right,' . $gradient_start_color . ', ' .$gradient_middle_color .' 50% ,' . $gradient_end_color . ')',
            ));
        }
	
	    $page_background_image  = playerx_edge_options()->getOptionValue( 'page_background_image' );
	    $page_background_repeat = playerx_edge_options()->getOptionValue( 'page_background_image_repeat' );
	
	    if ( ! empty( $page_background_image ) ) {
		
		    if ( $page_background_repeat === 'yes' ) {
			    $background_image_style = array(
				    'background-image'    => 'url(' . esc_url( $page_background_image ) . ')',
				    'background-repeat'   => 'repeat',
				    'background-position' => '0 0',
			    );
		    } else {
			    $background_image_style = array(
				    'background-image'    => 'url(' . esc_url( $page_background_image ) . ')',
				    'background-repeat'   => 'no-repeat',
				    'background-position' => 'center 0',
				    'background-size'     => 'cover'
			    );
		    }
		
		    echo playerx_edge_dynamic_css( '.edgtf-content', $background_image_style );
	    }
	
	    $selection_color = playerx_edge_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo playerx_edge_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo playerx_edge_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( playerx_edge_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . playerx_edge_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo playerx_edge_dynamic_css( '.edgtf-preload-background', $preload_background_styles );
    }

    add_action('playerx_edge_action_style_dynamic', 'playerx_edge_design_styles');
}

if ( ! function_exists( 'playerx_edge_content_styles' ) ) {
	function playerx_edge_content_styles() {
		$content_style = array();
		
		$padding = playerx_edge_options()->getOptionValue( 'content_padding' );
		if ( $padding !== '' ) {
			$content_style['padding'] = $padding;
		}
		
		$content_selector = array(
			'.edgtf-content .edgtf-content-inner > .edgtf-full-width > .edgtf-full-width-inner',
		);
		
		echo playerx_edge_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_in_grid = playerx_edge_options()->getOptionValue( 'content_padding_in_grid' );
		if ( $padding_in_grid !== '' ) {
			$content_style_in_grid['padding'] = $padding_in_grid;
		}
		
		$content_selector_in_grid = array(
			'.edgtf-content .edgtf-content-inner > .edgtf-container > .edgtf-container-inner',
		);
		
		echo playerx_edge_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_content_styles' );
}

if ( ! function_exists( 'playerx_edge_h1_styles' ) ) {
	function playerx_edge_h1_styles() {
		$margin_top    = playerx_edge_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = playerx_edge_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = playerx_edge_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = playerx_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = playerx_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo playerx_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_h1_styles' );
}

if ( ! function_exists( 'playerx_edge_h2_styles' ) ) {
	function playerx_edge_h2_styles() {
		$margin_top    = playerx_edge_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = playerx_edge_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = playerx_edge_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = playerx_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = playerx_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo playerx_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_h2_styles' );
}

if ( ! function_exists( 'playerx_edge_h3_styles' ) ) {
	function playerx_edge_h3_styles() {
		$margin_top    = playerx_edge_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = playerx_edge_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = playerx_edge_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = playerx_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = playerx_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo playerx_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_h3_styles' );
}

if ( ! function_exists( 'playerx_edge_h4_styles' ) ) {
	function playerx_edge_h4_styles() {
		$margin_top    = playerx_edge_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = playerx_edge_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = playerx_edge_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = playerx_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = playerx_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo playerx_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_h4_styles' );
}

if ( ! function_exists( 'playerx_edge_h5_styles' ) ) {
	function playerx_edge_h5_styles() {
		$margin_top    = playerx_edge_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = playerx_edge_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = playerx_edge_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = playerx_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = playerx_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo playerx_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_h5_styles' );
}

if ( ! function_exists( 'playerx_edge_h6_styles' ) ) {
	function playerx_edge_h6_styles() {
		$margin_top    = playerx_edge_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = playerx_edge_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = playerx_edge_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = playerx_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = playerx_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo playerx_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_h6_styles' );
}

if ( ! function_exists( 'playerx_edge_text_styles' ) ) {
	function playerx_edge_text_styles() {
		$margin_top    = playerx_edge_options()->getOptionValue( 'text_margin_top' );
		$margin_bottom = playerx_edge_options()->getOptionValue( 'text_margin_bottom' );
		
		$item_styles = playerx_edge_get_typography_styles( 'text' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = playerx_edge_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = playerx_edge_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo playerx_edge_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_text_styles' );
}

if ( ! function_exists( 'playerx_edge_link_styles' ) ) {
	function playerx_edge_link_styles() {
		$link_styles      = array();
		$link_color       = playerx_edge_options()->getOptionValue( 'link_color' );
		$link_font_style  = playerx_edge_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = playerx_edge_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = playerx_edge_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo playerx_edge_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_link_styles' );
}

if ( ! function_exists( 'playerx_edge_link_hover_styles' ) ) {
	function playerx_edge_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = playerx_edge_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = playerx_edge_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo playerx_edge_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo playerx_edge_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'playerx_edge_action_style_dynamic', 'playerx_edge_link_hover_styles' );
}

if ( ! function_exists( 'playerx_edge_smooth_page_transition_styles' ) ) {
	function playerx_edge_smooth_page_transition_styles( $style ) {
		$id            = playerx_edge_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = playerx_edge_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.edgtf-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= playerx_edge_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = playerx_edge_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.edgtf-st-loader .edgtf-rotate-circles > div',
			'.edgtf-st-loader .pulse',
			'.edgtf-st-loader .double_pulse .double-bounce1',
			'.edgtf-st-loader .double_pulse .double-bounce2',
			'.edgtf-st-loader .cube',
			'.edgtf-st-loader .rotating_cubes .cube1',
			'.edgtf-st-loader .rotating_cubes .cube2',
			'.edgtf-st-loader .stripes > div',
			'.edgtf-st-loader .wave > div',
			'.edgtf-st-loader .two_rotating_circles .dot1',
			'.edgtf-st-loader .two_rotating_circles .dot2',
			'.edgtf-st-loader .five_rotating_circles .container1 > div',
			'.edgtf-st-loader .five_rotating_circles .container2 > div',
			'.edgtf-st-loader .five_rotating_circles .container3 > div',
			'.edgtf-st-loader .atom .ball-1:before',
			'.edgtf-st-loader .atom .ball-2:before',
			'.edgtf-st-loader .atom .ball-3:before',
			'.edgtf-st-loader .atom .ball-4:before',
			'.edgtf-st-loader .clock .ball:before',
			'.edgtf-st-loader .mitosis .ball',
			'.edgtf-st-loader .lines .line1',
			'.edgtf-st-loader .lines .line2',
			'.edgtf-st-loader .lines .line3',
			'.edgtf-st-loader .lines .line4',
			'.edgtf-st-loader .fussion .ball',
			'.edgtf-st-loader .fussion .ball-1',
			'.edgtf-st-loader .fussion .ball-2',
			'.edgtf-st-loader .fussion .ball-3',
			'.edgtf-st-loader .fussion .ball-4',
			'.edgtf-st-loader .wave_circles .ball',
			'.edgtf-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= playerx_edge_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'playerx_edge_filter_add_page_custom_style', 'playerx_edge_smooth_page_transition_styles' );
}