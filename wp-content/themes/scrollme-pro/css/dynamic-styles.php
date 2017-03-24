<?php
	/** Scrollme Dynamic Styles **/
	function scrollme_dynamic_styles() {
		/** Home Section Styles **/
			$section1_bg_color = get_theme_mod('scrollme_section1_bg_color', '#F6F6F6');
			$section1_bg_image = get_theme_mod('scrollme_section1_bg_image', '');

			$section2_bg_color = get_theme_mod('scrollme_section2_bg_color', '#F6F6F6');
			$section2_bg_image = get_theme_mod('scrollme_section2_bg_image', '');

			$section3_bg_color = get_theme_mod('scrollme_section3_bg_color', '#F6F6F6');
			$section3_bg_image = get_theme_mod('scrollme_section3_bg_image', '');

			$section4_bg_color = get_theme_mod('scrollme_section4_bg_color', '#F6F6F6');
			$section4_bg_image = get_theme_mod('scrollme_section4_bg_image', '');

			$section5_bg_color = get_theme_mod('scrollme_section5_bg_color', '#F6F6F6');
			$section5_bg_image = get_theme_mod('scrollme_section5_bg_image', '');

			$section6_bg_color = get_theme_mod('scrollme_section6_bg_color', '#F6F6F6');
			$section6_bg_image = get_theme_mod('scrollme_section6_bg_image', '');

			$section7_bg_color = get_theme_mod('scrollme_section7_bg_color', '#F6F6F6');
			$section7_bg_image = get_theme_mod('scrollme_section7_bg_image', '');

			$section8_bg_color = get_theme_mod('scrollme_section8_bg_color', '#F6F6F6');
			$section8_bg_image = get_theme_mod('scrollme_section8_bg_image', '');

			$section9_bg_color = get_theme_mod('scrollme_section9_bg_color', '#F6F6F6');
			$section9_bg_image = get_theme_mod('scrollme_section9_bg_image', '');

			$section10_bg_color = get_theme_mod('scrollme_section10_bg_color', '#F6F6F6');
			$section10_bg_image = get_theme_mod('scrollme_section10_bg_image', '');

			$tpl_color = get_theme_mod('template_color', '#DF2C45');
			$rgb_color = hex2rgb($tpl_color);

			

		/** Typographies **/
			$body = esc_attr(get_theme_mod('body_font_family', 'Open Sans'));
			$body_fweight = esc_attr(get_theme_mod('body_font_weight', '400'));
			$body_fstyle = esc_attr(get_theme_mod('body_font_style', 'normal'));
			$body_fsize = esc_attr(get_theme_mod('body_font_size', '16'));
			$body_fcolor = esc_attr(get_theme_mod('body_font_color', '#404040'));

			$h1 = esc_attr(get_theme_mod('h1_font_family', 'Open Sans'));
			$h1_fweight = esc_attr(get_theme_mod('h1_font_weight', '700'));
			$h1_fstyle = esc_attr(get_theme_mod('h1_font_style', 'normal'));
			$h1_fsize = esc_attr(get_theme_mod('h1_font_size', '32'));
			$h1_fcolor = esc_attr(get_theme_mod('h1_font_color', '#404040'));

			$h2 = esc_attr(get_theme_mod('h2_font_family', 'Open Sans'));
			$h2_fweight = esc_attr(get_theme_mod('h2_font_weight', '700'));
			$h2_fstyle = esc_attr(get_theme_mod('h2_font_style', 'normal'));
			$h2_fsize = esc_attr(get_theme_mod('h2_font_size', '30'));
			$h2_fcolor = esc_attr(get_theme_mod('h2_font_color', '#404040'));

			$h3 = esc_attr(get_theme_mod('h3_font_family', 'Open Sans'));
			$h3_fweight = esc_attr(get_theme_mod('h3_font_weight', '700'));
			$h3_fstyle = esc_attr(get_theme_mod('h3_font_style', 'normal'));
			$h3_fsize = esc_attr(get_theme_mod('h3_font_size', '28'));
			$h3_fcolor = esc_attr(get_theme_mod('h3_font_color', '#404040'));

			$h4 = esc_attr(get_theme_mod('h4_font_family', 'Open Sans'));
			$h4_fweight = esc_attr(get_theme_mod('h4_font_weight', '700'));
			$h4_fstyle = esc_attr(get_theme_mod('h4_font_style', 'normal'));
			$h4_fsize = esc_attr(get_theme_mod('h4_font_size', '26'));
			$h4_fcolor = esc_attr(get_theme_mod('h4_font_color', '#404040'));

			$h5 = esc_attr(get_theme_mod('h5_font_family', 'Open Sans'));
			$h5_fweight = esc_attr(get_theme_mod('h5_font_weight', '700'));
			$h5_fstyle = esc_attr(get_theme_mod('h5_font_style', 'normal'));
			$h5_fsize = esc_attr(get_theme_mod('h5_font_size', '24'));
			$h5_fcolor = esc_attr(get_theme_mod('h5_font_color', '#404040'));

			$h6 = esc_attr(get_theme_mod('h6_font_family', 'Open Sans'));
			$h6_fweight = esc_attr(get_theme_mod('h6_font_weight', '700'));
			$h6_fstyle = esc_attr(get_theme_mod('h6_font_style', 'normal'));
			$h6_fsize = esc_attr(get_theme_mod('h6_font_size', '22'));
			$h6_fcolor = esc_attr(get_theme_mod('h6_font_color', '#404040'));
			?>
			<style>
				body{
					font-family: '<?php echo $body; ?>';
					font-weight: <?php echo $body_fweight; ?>;
					font-style: '<?php echo $body_fstyle; ?>';
					font-size: <?php echo $body_fsize.'px'; ?>;
					color: <?php echo $body_fcolor; ?>;
				}

				h1{
					font-family: <?php echo $h1; ?>;
					font-weight: <?php echo $h1_fweight; ?>;
					font-style: <?php echo $h1_fstyle; ?>;
					font-size: <?php echo $h1_fsize.'px'; ?>;
					color: <?php echo $h1_fcolor; ?>;
				}

				h2{
					font-family: <?php echo $h2; ?>;
					font-weight: <?php echo $h2_fweight; ?>;
					font-style: <?php echo $h2_fstyle; ?>;
					font-size: <?php echo $h2_fsize.'px'; ?>;
					color: <?php echo $h2_fcolor; ?>;
				}

				h3{
					font-family: <?php echo $h3; ?>;
					font-weight: <?php echo $h3_fweight; ?>;
					font-style: <?php echo $h3_fstyle; ?>;
					font-size: <?php echo $h3_fsize.'px'; ?>;
					color: <?php echo $h3_fcolor; ?>;
				}

				h4{
					font-family: <?php echo $h4; ?>;
					font-weight: <?php echo $h4_fweight; ?>;
					font-style: <?php echo $h4_fstyle; ?>;
					font-size: <?php echo $h4_fsize.'px'; ?>;
					color: <?php echo $h4_fcolor; ?>;
				}

				h5{
					font-family: <?php echo $h5; ?>;
					font-weight: <?php echo $h5_fweight; ?>;
					font-style: <?php echo $h5_fstyle; ?>;
					font-size: <?php echo $h5_fsize.'px'; ?>;
					color: <?php echo $h5_fcolor; ?>;
				}

				h6{
					font-family: <?php echo $h6; ?>;
					font-weight: <?php echo $h6_fweight; ?>;
					font-style: <?php echo $h6_fstyle; ?>;
					font-size: <?php echo $h6_fsize.'px'; ?>;
					color: <?php echo $h6_fcolor; ?>;
				}

				a{
					color: <?php echo $tpl_color; ?>;
				}

				h1.site-title{
					font-family: <?php echo $h1; ?>;
					font-weight: <?php echo $h1_fweight; ?>;
					font-style: <?php echo $h1_fstyle; ?>;
					color: <?php echo $h1_fcolor; ?>;
				}

				/** Override General Styles **/
				button, input, select, textarea, .app-pricing-table, .cta-banner .main-title, .hm-team-block .team-info p span, .team-info p span, .gal-title, .hm-testimonial-block .test-wrap .test-details .test-infos, .test-wrap .test-details .test-infos{
					font-family: '<?php echo $body; ?>';
					font-weight: <?php echo $body_fweight; ?>;
					font-style: '<?php echo $body_fstyle; ?>';
					font-size: <?php echo $body_fsize.'px'; ?>;
					color: <?php echo $body_fcolor; ?>;
				}

				.hm-testimonial-block .test-wrap .test-content, .test-wrap .test-content{
					font-family: '<?php echo $body; ?>';
					font-weight: <?php echo $body_fweight; ?>;
					font-style: '<?php echo $body_fstyle; ?>';
					font-size: <?php echo $body_fsize.'px'; ?>;
				}

				.app-pricing-table{color: #6a6a6a;}
				.app-pricing-table .app-pricing-head h2, .cta-banner.dark .main-title{color: #fff;}
				.team-info p span{color: '#a9a9a9';}

				.hm-testimonial-block .test-wrap .test-details .test-infos, .test-wrap .test-details .test-infos{
					color: #fff;
				}

				.fp-slide h1.entry-title, h1.entry-title, h1.entry-title a{
					font-family: <?php echo $h1; ?>;
					font-weight: <?php echo $h1_fweight; ?>;
					font-style: <?php echo $h1_fstyle; ?>;
					font-size: <?php echo $h1_fsize.'px'; ?>;
					color: <?php echo $h1_fcolor; ?>;
				}

				.entry-meta a:hover{
					color: <?php echo $tpl_color; ?>;	
				}

				.hm-section-1{
					background: <?php echo esc_attr($section1_bg_color); ?> url("<?php echo esc_url($section1_bg_image); ?>") no-repeat right top;
				}

				.hm-section-2{
					background: <?php echo esc_attr($section2_bg_color); ?> url("<?php echo esc_url($section2_bg_image); ?>") no-repeat right top;
				}

				.hm-section-3{
					background: <?php echo esc_attr($section3_bg_color); ?> url("<?php echo esc_url($section3_bg_image); ?>") no-repeat right top;
				}

				.hm-section-4{
					background: <?php echo esc_attr($section4_bg_color); ?> url("<?php echo esc_url($section4_bg_image); ?>") no-repeat right top;
				}

				.hm-section-5{
					background: <?php echo esc_attr($section5_bg_color); ?> url("<?php echo esc_url($section5_bg_image); ?>") no-repeat right top;
				}

				.hm-section-6{
					background: <?php echo esc_attr($section6_bg_color); ?> url("<?php echo esc_url($section6_bg_image); ?>") no-repeat right top;
				}
				
				.hm-section-7{
					background: <?php echo esc_attr($section7_bg_color); ?> url("<?php echo esc_url($section7_bg_image); ?>") no-repeat right top;
				}

				.hm-section-8{
					background: <?php echo esc_attr($section8_bg_color); ?> url("<?php echo esc_url($section8_bg_image); ?>") no-repeat right top;
				}

				.hm-section-9{
					background: <?php echo esc_attr($section9_bg_color); ?> url("<?php echo esc_url($section9_bg_image); ?>") no-repeat right top;
				}

				.hm-section-10{
					background: <?php echo esc_attr($section10_bg_color); ?> url("<?php echo esc_url($section10_bg_image); ?>") no-repeat right top;
				}

				/** Header Section **/
				h1.site-title a{
					color: <?php echo $tpl_color; ?>;
				}

				/** Slider **/
				.slider-section .bx-pager-item a.active::after{
					background: <?php echo $tpl_color; ?>;
				}

				.slider-section .bx-pager-item a{
					border-color: <?php echo $tpl_color; ?>;
				}

				/** Menu Section **/
				.main-navigation li:hover > a, .main-navigation li.current-menu-item > a{
					background: <?php echo $tpl_color; ?>;
				}

				.page-template-tpl-home #toggle{
					background: rgba(<?php echo $rgb_color[0].', '.$rgb_color[1].', '.$rgb_color[2].', 0.8'; ?>) !important;
					box-shadow: 0 0 0 2px rgba(<?php echo $rgb_color[0].', '.$rgb_color[1].', '.$rgb_color[2].', 0.5'; ?>) !important;
				}

				.site-footer.fp-show #toggle{
					background: none !important;
					border: none !important;
					box-shadow: none !important;
				}

				/** Front Page **/
				.entry-header, .page-header{
					border-left-color: <?php echo $tpl_color; ?>;
				}

				.entry-link a{
					background: <?php echo $tpl_color; ?>;
				}

				h1.entry-title a:hover, h1.entry-title span{
					color: <?php echo $tpl_color; ?>;
				}

				.port-link-wrap a{
					background: <?php echo $tpl_color; ?>;
				}

				button, input[type="button"], input[type="reset"], input[type="submit"]{
					background: <?php echo $tpl_color; ?>;
				}

				button, input[type="button"], input[type="reset"], input[type="submit"]{
					border-color: <?php echo $tpl_color; ?>;
				}

				.sl-blog-post-excerpt .sl-blog-readmore{
					background: <?php echo $tpl_color; ?>;
				}

				.hm-team-block .team-info .team-social-links, .team-info .team-social-links{
					background: <?php echo $tpl_color; ?>;
				}

				.hm-testimonial-block .test-wrap .test-details, .test-wrap .test-details{
					background: <?php echo $tpl_color; ?>;
				}

				.link1{
					background: <?php echo $tpl_color; ?>;
					border-color: <?php echo $tpl_color; ?>;
				}

        		.sl-blog-post-excerpt h5 a:hover{color: <?php echo $tpl_color; ?>;}

				/** Shortcodes **/
				.ap-dropcaps.ap-square{
					background: <?php echo $tpl_color; ?>;
				}

				.horizontal .ap_tab_group .tab-title.active::before, .horizontal .ap_tab_group .tab-title:hover::before{
					border-color: <?php echo $tpl_color; ?> transparent transparent;
				}

				.vertical .ap_tab_group .tab-title.active, .vertical .ap_tab_group .tab-title.hover{
					border-left-color: <?php echo $tpl_color; ?>;
				}

				.horizontal .ap_tab_group .tab-title.active, .horizontal .ap_tab_group .tab-title.hover{
					border-bottom-color: <?php echo $tpl_color; ?>;
				}

				.horizontal .ap_tab_group .tab-title.active:after, .horizontal .ap_tab_group .tab-title:hover:after{
					border-bottom-color: <?php echo $tpl_color; ?>;
				}

				.horizontal .ap_tab_group .tab-title.active, .horizontal .ap_tab_group .tab-title.hover{
					color: <?php echo $tpl_color; ?>;
				}

				.vertical .ap_tab_group .tab-title.active::before, .vertical .ap_tab_group .tab-title:hover::before{
					border-color: transparent transparent transparent <?php echo $tpl_color; ?>;
				}

				.vertical .ap_tab_group .tab-title.active:after, .vertical .ap_tab_group .tab-title:hover:after{
					border-right-color: <?php echo $tpl_color; ?>;
				}

				.vertical .ap_tab_group .tab-title.active:before, .vertical .ap_tab_group .tab-title:hover:before{
					border-color: transparent transparent transparent <?php echo $tpl_color; ?>;
				}

				.vertical .tab-title{
					border-left-color: <?php echo $tpl_color; ?>;
				}

				.vertical .ap_tab_group .tab-title.active, .vertical .ap_tab_group .tab-title.hover{
					color: <?php echo $tpl_color; ?>;
				}

				.ap_call_to_action .ap_call_to_action_button{
					background: <?php echo $tpl_color; ?> none repeat scroll 0 0;
    				border: 1px solid <?php echo $tpl_color; ?>;
				}

				.ap_tagline_box.ap-all-border-box{
					border-color: <?php echo $tpl_color; ?>;
				}

				.ap_tagline_box.ap-top-border-box{
					border-top-color: <?php echo $tpl_color; ?>;
				}

				.ap_tagline_box.ap-left-border-box{
					border-left-color: <?php echo $tpl_color; ?>;
				}

				.ap_tagline_box.ap-bg-box{
					background: <?php echo $tpl_color; ?>;
				}

				.navigation.post-navigation .nav-label, .navigation.post-navigation .nav-title{
					background: <?php echo $tpl_color; ?>;
				}

				.toggle-nav span{
					background: <?php echo $tpl_color; ?>  none repeat scroll 0 0;
    				box-shadow: 0 10px 0 0 <?php echo $tpl_color; ?>, 0 -10px 0 0 <?php echo $tpl_color; ?>;
				}

				.service-tab.sm-active h3{
					color: <?php echo $tpl_color; ?>;
				}

				.service-content-wrap{
					border-top-color: <?php echo $tpl_color; ?>;
				}

				.page-template-tpl-home #toggle{
				    background: rgba(223, 44, 69, 0.8);
					box-shadow: 0px 0px 0 2px rgba(223, 44, 69, 0.5);
				}

				.cta-banner .banner-btn a.btn{
					border-color: <?php echo $tpl_color; ?>;
				}

				.banner-btn a.btn{
					background: <?php echo $tpl_color; ?>;
				}

				/** Team Single Page **/
				.progressBar div{
					background-color: <?php echo $tpl_color; ?>;
				}

				.team-wrap .team-descr h3 .tm-aboutme::after{
					border-bottom-color: <?php echo $tpl_color; ?>;
				}

				.hm-team-block .team-info a:hover, .team-info a:hover, .gal-title p a:hover{
					color: <?php echo $tpl_color; ?>;
				}

				.feat-tble.ap-pricing-table, .ap-pricing-table:hover{
					background: <?php echo $tpl_color; ?>;
				}

				.feat-tble .ap-pricing-features-inner li, .ap-pricing-table:hover .ap-pricing-features-inner li{
					border-bottom-color: <?php echo colourBrightness($tpl_color, 0.8); ?>
				}

				.ap-pricing-table.feat-tble .ap-pricing-readmore, .ap-pricing-table:hover .ap-pricing-readmore{
					background: <?php echo $tpl_color; ?>;
				}

				.ap-pricing-table.feat-tble .ap-pricing-readmore::after, .ap-pricing-table:hover .ap-pricing-readmore::after{
					border-color: <?php echo $tpl_color; ?> <?php echo $tpl_color; ?> <?php echo $tpl_color; ?> transparent;
				}

				.ap-pricing-table.feat-tble .ap-pricing-readmore::before{
					border-color: <?php echo colourBrightness($tpl_color, -0.6); ?> transparent transparent;
				}

				.ap-pricing-table:hover .ap-pricing-readmore::before{
					border-color: <?php echo colourBrightness($tpl_color, -0.6); ?> transparent transparent;
				}

				.pagination .nav-links span, .pagination .nav-links a{
					background: <?php echo $tpl_color; ?>;
				}

				.gal-title span a:hover{
					color: <?php echo $tpl_color; ?>;
				}

				/** Portfolio Single Page **/
				.port-pg-wrap .port-pg-contents .port-descr h3 .descrme::after, .port-pg-wrap .port-pg-contents .port-details h3 .detme::after{
					border-bottom-color: <?php echo $tpl_color; ?>;
				}

				/** Widgets **/
				.ap_call_to_action.center{border-top-color: <?php echo $tpl_color; ?>;}
				.ap_call_to_action.left{border-left-color: <?php echo $tpl_color; ?>;}
				.ap_call_to_action.right{border-right-color: <?php echo $tpl_color; ?>;}
				.widget-area a:hover{color: <?php echo $tpl_color; ?>;}

				/** Woocommerce **/
				.woocommerce ul.products li.product .woo-item-detail-wrap .button, .woocommerce div.product form.cart .button, .woocommerce ul.products li.product .woo-item-detail-wrap .button:hover, .woocommerce #review_form #respond .form-submit input, .woocommerce #review_form #respond .form-submit input:hover, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button{
					background: <?php echo $tpl_color; ?>;
				}

				.woocommerce nav.woocommerce-pagination ul li a{
					background: <?php echo $tpl_color; ?>;
				}

				.woocommerce span.onsale{
					background: <?php echo colourBrightness($tpl_color, 0.8); ?>
				}

				.woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce a.add_to_wishlist{
					color: <?php echo $tpl_color; ?>;
				}

				.woocommerce div.product .woocommerce-tabs ul.tabs li.active a{
					border-bottom-color: <?php echo $tpl_color; ?>;
				}

				.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt[disabled]:disabled:hover, .woocommerce button.button.alt[disabled]:disabled, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce a.button.alt, .woocommerce input.button.alt:hover{
					background: <?php echo $tpl_color; ?>;
				}

				.woocommerce .woocommerce-breadcrumb, .woocommerce ul.products li.product .woo-item-detail-wrap .price .amount, .woocommerce ul.products li.product .woo-item-detail-wrap .price del{
					color: <?php echo $tpl_color; ?>;
				}

				.woocommerce .page-title, .woocommerce .woocommerce-tabs h2, .woocommerce .woocommerce-tabs h3, .woocommerce .related.products h2{
					border-left-color: <?php echo $tpl_color; ?>;
				}
			</style>
			<?php

	}

	add_action('wp_head', 'scrollme_dynamic_styles');