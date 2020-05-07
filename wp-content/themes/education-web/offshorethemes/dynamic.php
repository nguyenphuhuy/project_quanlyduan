<?php
/**
 * Dynamic css
*/
if (! function_exists('education_web_dynamic_css')){

	function education_web_dynamic_css(){

        $primary_color = get_theme_mod( 'education_web_mainprimary_color', '#004b8e' );

        $footer_color = get_theme_mod( 'education_web_mainfooter_bg_color' );

        $subfooter_color = get_theme_mod( 'education_web_subfooter_bg_color' );

		$education_web_dynamic = '';

        // Theme Primary Background Colors.
        $education_web_dynamic .= "
            .header .topbar-inner,
            .box-header-nav .main-menu .page_item.current_page_item>a, .box-header-nav .main-menu .page_item:hover>a, .box-header-nav .main-menu .page_item.focus>a, .box-header-nav .main-menu>.menu-item.current-menu-item>a, .box-header-nav .main-menu>.menu-item:hover>a, .box-header-nav .main-menu>.menu-item.focus>a,
            .box-header-nav .main-menu .children>.page_item:hover>a, .box-header-nav .main-menu .children>.page_item.focus>a, .box-header-nav .main-menu .sub-menu>.menu-item:hover>a, .box-header-nav .main-menu .sub-menu>.menu-item.focus>a,
            .hero-area .owl-controls .owl-nav .owl-next,
            .hero-area .owl-controls .owl-nav .owl-prev,

            .section-title h2::before, .section-title h2::after, .header .nav li:hover a, .header .nav .drop-down li:hover a, .header .nav .drop-down li .sub-menu li:hover a, .header .nav li.active a, .services .single-services:before, .btn:hover, .btn.primary, .btn.radius:hover, .header .nav .mega-menu .mega-widget .btn, .header.style2 .nav li ul li:hover a, .header.style2 .form button, .header.style3 .nav-main, .hero-area .owl-controls .owl-dots .owl-dot.active span, .hero-area .owl-controls .owl-dots .owl-dot span, .hero-area .owl-controls .owl-nav div, .hero-area.creative .slide-btn .btn.primary, .hero-area.animate-text .single-slider .slide-text .btn:hover, .header.style3.onepage.sticky .header-inner, .hero-area.animate-text .single-slider .slide-text .btn.primary, .services .single-sidebar h2::before, .services .single-sidebar ul li.active, .services .single-sidebar.service .caption, .services.single .services-slider .owl-nav div, .services.single .services-slider .owl-nav div:hover, .services.single ul li::before, .why-choose .working-process, .why-choose .why-video .video a, .projects .project-nav ul li.active, .projects .project-nav ul li:hover, .projects .project-head:before, .projects .button .btn:hover, .projects.single .project-content .btn, .projects.single .brochure a, .team .t-icon a, .team .team-details .t-social li a, .team .single-skill .progress .progress-bar, .pricing-table .single-table .title, .testimonials .owl-controls .owl-nav div:hover, .blog-main .single-blog .blog-head::before, .blog-main .owl-controls .owl-nav div:hover, .blog-main.archive .single-blog.slider .owl-controls .owl-nav div, .blog-main.archive .pagination li:hover a, .blog-main.archive .pagination li.active a, .blog-main.archive.single .blog-info ul li::before, .blog-main .post-tab .nav li:hover a, .blog-main .post-tab .nav li.active a, .blog-main .blog-main button, .blog-main.archive.single .blog-bottom .share li:hover a, .blog-main.archive.single .blog-bottom .prev-next li a, .blog-main .form-group .button, .about-us .tabs-main .nav-tabs li a::before, .about-us .tab-section .section-title h2::before, .about-us .tabs-main .about-inner .single-image a, .about-us .tabs-main .about-inner .social ul li a, .about-us .tabs-main .skill-tab .progress .progress-bar, .about-us .tabs-main .single-team .t-social li a:hover, .about-us .tabs-main .single-team .t-bottom, .about-us .tabs-main .photo-gallery .caption, .about-us .tabs-main .contact .form-group .button:hover, .call-to-action.dark .btn:hover, .about-us .tab-section.style5 .nav-tabs li a, .our-skill .progress .progress-bar, .faq .faq-title a::after, .coming-soon .subscription-form .cross, .contact .social li a:hover i, .footer .social a, .counter.primary:before, .call-to-action.background:before, .call-to-action.dark .btn:hover, .btn.radius:hover, .about-us .tabs-main .photo-gallery .single-gallery a, .hero-area .slide-text h1:before, #scrollUp, .header .slicknav_btn, .header.onepage .slicknav_btn, .tromas-option .icon, .header.onepage .slicknav_nav a:hover, .header.onepage .slicknav_nav a:hover, .header .slicknav_nav a:hover, .header .topbar-inner,
            .features.layout2 .features-single,
            .our-skill .skill-text h3:before, .whysection .section-title-tagline h3:before,
            .academics-item:before, .academics-item:after,
            .academics-item .edu-text .btn,
            .course .single-course .course-details a,
            .featured-link a,
            .projects .button,
            .whysection .service-icon,
            .whysection .service-post-wrap:before,
            .team-desc, .team-overlay, .blog-items .read-more:hover, .pagination .page-numbers, .footer .footer-top h2::before,
            .testimonials .owl-dots .owl-dot.active span, .testimonials .owl-dots .owl-dot:hover span,
            .widget_search .search-submit, .widget_product_search input[type='submit'],
            .wpcf7 input[type='submit'], .wpcf7 input[type='button'],
            .goToTop,
            .features .features-single i,
            .single-post .navigation .nav-links > div a,
            button, input[type='button'], input[type='reset'], input[type='submit'],
            .reply .comment-reply-link,
            .services .single-sidebar h2::before, 
            .comments-area h2.comments-title:before,
            .header-middle-inner .header-nav-toggle div{
                
                background-color: $primary_color;
                
            }\n";


        // Theme Primary Font Colors.
        $education_web_dynamic .= "
            .our-skill .skill-info h4,
            .our-skill .progress .progress-bar span,
            .academics-item .icon,
            .academics-item .edu-text .btn:hover,
            .btn.primary:hover,
            .course .single-course .course-details a:hover,
            .featured-icon,
            .single-post .entry-content blockquote p, #breadcrumb li, #breadcrumb li a:hover, .blog-items .blog-exercpt h4 a:hover, .blog-items .blog-exercpt .entry-meta span a:hover, .widget a:hover, .widget a:hover::before, .widget li:hover::before, .blog-main .single-blog:hover .link i.fa, .blog-main .blog-info .meta span a, .team-socila-profile a, .why-choose .single-choose h4 a:hover, .header .topbar .contact li a:hover, .header .topbar .contact li a:hover i, .header .widget-title i, .services .single-services .icon i, .services .single-services:hover .ico-bg, .services .single-services.active .ico-bg, .testimonials .testimonial-content i, .header .nav .mega-menu .single-menu h4, .header .nav .mega-menu .list-menu li:hover a, .header .social li.active a, .header .social li:hover a, .header.style2 .nav li:hover a, .header.style2 .nav li.active a, .header.style2 .nav li:hover a, .header.style2 .nav li.active a, .header.style2 .topbar .form button i, .header.style2 .search li a, .header.style3 .nav li ul li:hover a, .header.style3 .nav li ul li:hover a, .header.style3 .nav li ul.sub-menu li:hover a, .hero-area.creative .slide-text h1 span, .services .single-services:hover h2 a, .services .single-sidebar ul li:hover a, .services.single .img-right .text h4, .why-choose .single-choose i, .why-choose .why-video .video a:hover, .projects .button .btn, .project.single .project-content h2, .counter .counter-single i, .team .t-social li a:hover, .team .t-bottom .t-name, .team .team-details .cross, .team .team-details .t-social li:hover a, .pricing-table .single-table:hover .bg-icon i, .pricing-table .single-table .amount, .testimonials .testimonial-info h6, .testimonials .owl-controls .owl-nav div, .coming-soon .cdown p, .newslatter .form button, .blog-main .single-blog.sticky .blog-info h4 a, .blog-main .blog-info h2:hover a, .blog-main .single-blog.sticky .blog-info h2 a, .blog-main .blog-info .meta span i, .blog-main .owl-controls .owl-nav div, .blog-main.archive .pagination li a, .blog-main.archive.single .blog-info blockquote, .blog-main.archive.single .img-right .text h4, .blog-main .single-sidebar h2, .blog .single-sidebar ul li:hover a, .blog-main .single-sidebar ul li:hover a, .header.style3 .nav li ul .list-menu li:hover a, .blog-main .post-tab .post-info h4:hover a, .blog-main .post-tab .post-info p, .blog-main .category ul li span, .blog-main .blog-comments h2 span, .blog-main .blog-comments h4, .blog-main .single-comments a, .blog-main .form-group i, .about-us .tabs-main .tab-title, .about-us .tabs-main .about-us .single-image a:hover, .about-us .tabs-main .contact .single-address i, .faq .panel.active .faq-title a, .faq .faq-title h4:hover a, .coming-soon .subscription-form button, .error-page .error-inner h1, .contact .single-address i, .contact .social li a i, .footer li:hover a, .footer li i, .footer .single-tweet i, .footer .footer-top .single-tweet p a:hover, .success .mail h2 span,
            .blog-items .read-more,
            .call-to-action h2,
            button:hover, input[type='button']:hover, input[type='reset']:hover, input[type='submit']:hover,
            .wpcf7 input[type='submit']:hover, .wpcf7 input[type='button']:hover,
            .goToTop:hover,
            .single-post .navigation .nav-links > div a:hover,
            .logged-in-as a,
            #cancel-comment-reply-link,
            #cancel-comment-reply-link:before,
            a,
            a:hover, a:focus, a:active{

                color: $primary_color;
                
            }\n";

        $education_web_dynamic .= "@media (max-width: 1100px){
                .site-header .topbar{

                    background-color: $primary_color !important;
                }

            }\n";

        $education_web_dynamic .= "@media (max-width: 992px){
                .box-header-nav .main-menu .children>.page_item:hover>a, .box-header-nav .main-menu .sub-menu>.menu-item:hover>a{

                    color: $primary_color !important;
                }

            }\n";

        // Theme Primary Border Colors.
        $education_web_dynamic .= "
            .header .header-inner,
            .academics-item .icon,
            .academics-item,
            .academics-item .edu-text .btn,
            .btn.primary:hover,
            .course .single-course .course-details a,
            .course .single-course .course-details a:hover,

            blockquote, .blog-items .read-more:hover, .header .nav li .drop-down, .testimonials .testimonial-info img, .clients .single-clients:hover img, .contact .social li a i,
            .blog-items .read-more,
            button:hover, input[type='button']:hover, input[type='reset']:hover, input[type='submit']:hover,

            .wpcf7 input[type='submit'], .wpcf7 input[type='button'],
            .wpcf7 input[type='submit']:hover, .wpcf7 input[type='button']:hover,
            .features .features-single i,
            .single-post .navigation .nav-links > div a,
            button, input[type='button'], input[type='reset'], input[type='submit']{

                border-color: $primary_color;
                
            }\n";


        $education_web_dynamic .= ".header .topbar-inner:before{

            border-color: transparent $primary_color transparent transparent;
            
        }\n";

        $education_web_dynamic .= ".header .topbar-inner:after{

            border-color: $primary_color transparent transparent transparent;
            
        }\n";

        $education_web_dynamic .= ".whysection .service-post.active .service-icon{
                box-shadow: 0px 0px 0px 2px #FFF, 0px 0px 0px 4px $primary_color;
                -webkit-box-shadow: 0px 0px 0px 2px #FFF, 0px 0px 0px 4px $primary_color;
                -ms-box-shadow: 0px 0px 0px 2px #FFF, 0px 0px 0px 4px $primary_color;
            
        }\n";


        $education_web_dynamic .= ".footer.dark .footer-top{
            
            background-color: $footer_color;
            
        }\n";

        $education_web_dynamic .= ".footer.dark .footer-bottom{
            
            background-color: $subfooter_color;
            
        }\n";


        wp_add_inline_style( 'education-web-style', $education_web_dynamic );
	}
}
add_action( 'wp_enqueue_scripts', 'education_web_dynamic_css', 99 );