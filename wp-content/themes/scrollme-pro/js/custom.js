/**
 * For user experience
 */

jQuery(document).ready(function ($) {
    //Navigation toggle
    $('#toggle').click(function () {
        $(this).toggleClass('on');
        $('#colophon').toggleClass('fp-show');
    });

    //Service tab
    $('.service-content:first').show();
    $('.service-tab:first').addClass('sm-active');

    $('.service-tab').click(function(){
        var serviceId = $(this).attr('href');
        $('.service-content').hide();
        $(serviceId).show();
        $('.service-tab').removeClass('sm-active');
        $(this).addClass('sm-active');
        return false;
    });

    //Portfolio Lightbox
    $('a.port-lbox-link').nivoLightbox();

    // Gallery Lightbox
    $('a.gal-lbox-link').nivoLightbox();

    $('a.sgal-lbox-link').nivoLightbox()

    if( $(window).width() < 691 ) {
        $('#toggle').addClass('on');
    }

     $('#menu li a').click(function () {
         var win_width = $(window).width();
         if( win_width < 691 ) {
             $('#menu').hide();
             $('#toggle').toggleClass('on');
         }

     });

    $('a.port-lbox-link').nivoLightbox();

    $(window).load(function () {
        $(window).resize(function () {
            var windowHeight = $(window).height();
            //$('.slider-section.bx-viewport, .slider-section .bx-slides').height(windowHeight);
        }).resize();
    });


    // Bxslider Home
    $('.scrollme-slider').bxSlider({
        auto: true,
        pager: true,
        mode: sBxslider.transition,
        controls: false,
        pause: sBxslider.pause,
        speed: sBxslider.speed


    });

    // Number Counter
    $('.ak-counter').each(function () {
        var elm = $(this);
        var color = elm.attr("data-fgColor");
        var perc = elm.attr("value");
        $('.ak-counter').knob({
            angleArc: 180,
            readOnly: true,
            angleOffset: -90
        });

        $({value: 0}).animate({value: perc}, {
            duration: 1000,
            easing: 'swing',
            progress: function () {
                elm.val(Math.ceil(this.value)).trigger('change')
            }
        });


        //circular progress bar color
        $(this).append(function () {
            elm.parent().parent().find('.circular-bar-content').css('color', color);
            elm.parent().parent().find('.circular-bar-content label').text(perc + '%');
        });
    });

    // Animate counter widget when viewed
    startKnob =  function() {
        $('.ak-counter').each(function () {
            $(this).each(function () {
                $(this).animate({
                    value: $(this).data('number')
                }, {
                    duration: 2500,
                    easing: 'swing',
                    progress: function () {
                        $(this).val(Math.round(this.value)).trigger('change');
                    }
                });
            });
        });

    }
    $('.widget_scrollme-number-counter').one('inview', startKnob);

    // Portfolio Masonary
    var $container = $('#sm-portfolio').imagesLoaded( function() {

    if( $('#portfolio-wrap').length > 0 ){
            
          GetMasonary();    
            
            $container.isotope({
                itemSelector: '.item',
                gutter:0,
                transitionDuration: "0.5s"
            });     
            
            $(window).on( 'resize', function () {
               GetMasonary();
            });
        }
    });

    if($('html').hasClass('mobile') && $('body').hasClass('page-template-tpl-home')){
        $('#site-navigation a').click(function(){
            $('.site-footer').removeClass('scroll-show');
        });

        $("#site-navigation li").click(function(evn){
            if($(this).data('menuanchor')){
                evn.preventDefault();
                $('html,body').scrollTo('#'+$(this).data('menuanchor'),{
                    axis: 'y',
                    duration: 1000,
                    offset: -86
                });
            }
        });
    } 

    // Pre Loader
    $(window).load(function () {

     // Gallery Masonry

        $('.scme-gal-wrap').masonry({

          itemSelector: '.sgal-img-wrap',

           columnWidth: '.sgal-img-wrap'


        });


        // Animate loader off screen
        $(".scrollme-preloader").fadeOut("slow");
    });

    // Scroll Sections
    if($('body').hasClass('page-template-tpl-home')){
        $('#fullpage').fullpage({
    
            //Custom selectors
            sectionSelector: '.scrollme-main-section',
            slideSelector: '.sec-slide',
    
            // Scrolling
            controlArrows: false,
            loopHorizontal: false,
            autoScrolling: false,
            responsiveWidth: 790,
    
            // Navigation
            menu: '#site-navigation',
    
            //Accessibility
            recordHistory: false,
            verticalCentered: false,
    
            // Events
            afterSlideLoad: function(anchorLink, index, slideAnchor, slideIndex){
                var lgth = $('.fp-slides').find('section').length;
                var lastslide = parseInt(lgth) - 1;
                if( slideIndex == 0 ) {
                    $('.header-wrapper').addClass('hide-header').removeClass('show-header');
                    $('#colophon').removeClass('fp-show');
                    $('#moveLeft').hide()
                }else {
                    $('.header-wrapper').addClass('show-header').removeClass('hide-header');
                    $('#colophon').addClass('fp-show');
                    $('#moveLeft').show()
                }

                if( slideIndex == lastslide ) {
                    $('#moveRight').hide();
                } else {
                    $('#moveRight').show();
                }
    
                $('#site-navigation li').removeClass('current-menu-item');
                if( document.location.hash ) {
                    $('a[href="' + document.location + '"]').parent().addClass('current-menu-item');
                    $('a[href="' + document.location.hash + '"]').parent().addClass('current-menu-item');
                }else {
                    $('a[href="' + document.location + '#home"]').parent().addClass('current-menu-item');
                }
            },
    
            afterLoad: function(anchorLink, index){
                if( index == 1 ){
                    $('.header-wrapper').addClass('hide-header').removeClass('show-header');
                    $('#colophon').removeClass('fp-show');
                }else {
                    $('.header-wrapper').addClass('show-header').removeClass('hide-header');
                    $('#colophon').addClass('fp-show');
                }
            }
        });

        $(document).on('click', '#moveRight', function(){
          $.fn.fullpage.moveSlideRight();
        });

        $(document).on('click', '#moveLeft', function(){
          $.fn.fullpage.moveSlideLeft();
        });
    }

    $('.toggle-nav').click(function(){
        $('.site-footer').addClass('scroll-show').addClass('fp-show');
    });

    $('#toggle').click(function(){
        $('.site-footer').removeClass('scroll-show');
        $(this).addClass('on');
    });

    $(".s-panel-inner").mCustomScrollbar({
        theme: "dark-thin",
        axis:"y" // horizontal scrollbar
    });

    /** Gallery Slider **/
    //$(".hm-gallery-container").owlCarousel();
    $('.hm-gallery-container').owlCarousel({
        items: 4,
        loop:true,
        autoplay:true,
        autoplayTimeout:3000,
        autoplayHoverPause:true,
        responsive:{
            500:{
                items:1,
            },
            768:{
                items:3,
            },
            1000:{
                items:5,
            }
        }
    });

    /** Widgets **/
    // Toggle
    $('.ap_toggle_title').click(function(){
        $(this).next('.ap_toggle_content').slideToggle();
        $(this).toggleClass('active')
    });

    /** Progress Bar **/
        $('.progressBar').each(function() { 
            var bar = $(this);
            var max = $(this).attr('id');
            var label = $(this).attr('data-label');
            max = max.substring(3);
            
            bar.waypoint({
                handler: function(){
                    var progressBarWidth = max * bar.width() / 100;

                    bar.find('div').animate({ width: progressBarWidth }, 1000).html(max+"%&nbsp;");
                },
                offset: '95%'
            });
        });

    /*Short Codes Js*/
      $('.slider_wrap').bxSlider({
        pager:false,
        auto:true,
        adaptiveHeight: true,
        captions:true,
        prevText:'<i class="fa fa-angle-left"></i>',
        nextText:'<i class="fa fa-angle-right"></i>'
      });

      $('.ap_accordian:first').children('.ap_accordian_content').show();
      $('.ap_accordian:first').children('.ap_accordian_title').addClass('active');
      $('.ap_accordian_title').click(function(){
        if($(this).hasClass('active')){
        }
        else{
          $(this).parent('.ap_accordian').siblings().find('.ap_accordian_content').slideUp();
          $(this).next('.ap_accordian_content').slideToggle();
          $(this).parent('.ap_accordian').siblings().find('.ap_accordian_title').removeClass('active')
          $(this).toggleClass('active')
        }
      });

      $('.ap_tab_wrap').prepend('<div class="ap_tab_group clearfix"></div>');

      $('.ap_tab_wrap').each(function(){
        $(this).children('.ap_tab').find('.tab-title').prependTo($(this).find('.ap_tab_group'));
        $(this).children('.ap_tab').wrapAll( "<div class='ap_tab_content' />");
      });

      $('body').each(function(){
        $(this).find('.ap_tab:first-child').show();
        $(this).find('.tab-title:first-child').addClass('active')
      });
     

      $('.ap_tab_group .tab-title').click(function(){
        $(this).siblings().removeClass('active');
        $(this).addClass('active');
        $(this).parent('.ap_tab_group ').next('.ap_tab_content').find('.ap_tab').hide();
        var ap_id = $(this).attr('id');
        $(this).parent('.ap_tab_group ').next('.ap_tab_content').find('.'+ap_id).show();
      });

      var open = false;
      $('.search-icon').on('click',function(){
        open = !open;
        if(open){
          $('.ak-search').show();
          $(this).find('i.fa4').removeClass('fa-search').addClass('fa-caret-right');
        }else{
          $('.ak-search').hide();
          $(this).find('i.fa4').addClass('fa-search').removeClass('fa-caret-right');
        }
      });

      
      $('.gallery-item').each(function(){
        $(this).find('a').addClass('fancybox-gallery').attr('data-lightbox-gallery','gallery');
      });
      $('.fancybox-gallery').nivoLightbox();

      $('.ap-progress-bar').each(function() { 
          var that = $(this);
          var progressWidth = that.find('.ap-progress-bar-percentage').data('width') + '%';
          that.find('.ap-progress-bar-percentage').animate({width: progressWidth}, 2000);
      });

    function GetMasonary(){
    var winWidth = window.innerWidth;
        columnNumb = 1;         
        var attr_col = $('#sm-portfolio').attr('data-col');
            
         if (winWidth >= 1466) {
            
            $('#portfolio-wrap').css( {width : $('#portfolio-wrap').parent().width() - 20 + 'px'});
            var portfolioWidth = $('#portfolio-wrap').width();
            
            if (typeof attr_col !== typeof undefined && attr_col !== false) {
                columnNumb = $('#sm-portfolio').attr('data-col');
            } else columnNumb = 3;
            
            postHeight = window.innerHeight
            postWidth = Math.floor(portfolioWidth / columnNumb)         
            $container.find('.item').each(function () { 
                $('.item').css( { 
                    width : postWidth * 1 - 20 + 'px',
                    height : postWidth * 1 - 20 + 'px',
                    margin : 10 + 'px' 
                });
                $('.item.wide').css( { 
                    width : postWidth * 2 - 20 + 'px',
                    height : postWidth * 2 - 20 + 'px'
                });
            });
            
            
        } else if (winWidth > 1024) {
            
            $('#portfolio-wrap').css( {width : $('#portfolio-wrap').parent().width() - 40 + 'px'});
            var portfolioWidth = $('#portfolio-wrap').width();
                        
            if (typeof attr_col !== typeof undefined && attr_col !== false) {
                columnNumb = $('#sm-portfolio').attr('data-col');
            } else columnNumb = 3;
            
            postHeight = window.innerHeight
            postWidth = Math.floor(portfolioWidth / columnNumb)         
            $container.find('.item').each(function () { 
                $('.item').css( { 
                    width : postWidth - 20 + 'px',
                    height : postWidth  - 20 + 'px',
                    margin : 10 + 'px' 
                });
                $('.item.wide').css( { 
                    width : postWidth * 2 - 20 + 'px',
                    height : postWidth * 2 - 20 + 'px'
                });
            });
                    
        } else if (winWidth > 767) {
            
            $('#portfolio-wrap').css( {width : $('#portfolio-wrap').parent().width() - 40 + 'px'});
            var portfolioWidth = $('#portfolio-wrap').width();
            
            columnNumb = 2;
            postWidth = Math.floor(portfolioWidth / columnNumb)         
            $container.find('.item').each(function () { 
                $('.item').css( { 
                    width : postWidth - 20 + 'px',
                    height : postWidth  - 20 + 'px',
                    margin : 10 + 'px' 
                });
                $('.item.wide').css( { 
                    width : postWidth * 2 - 20 + 'px',
                    height : postWidth * 2 - 20 + 'px'
                });             
            });
            
            
        }   else if (winWidth > 479) {
            
            $('#portfolio-wrap').css( {width : $('#portfolio-wrap').parent().width() - 40 + 'px'});
            var portfolioWidth = $('#portfolio-wrap').width();
            
            columnNumb = 1;
            postWidth = Math.floor(portfolioWidth / columnNumb)         
            $container.find('.item').each(function () { 
                $('.item').css( { 
                    width : postWidth - 20 + 'px',
                    height : postWidth  - 20 + 'px',
                    margin : 10 + 'px' 
                });
                $('.item.wide').css( { 
                    width : postWidth  - 20 + 'px',
                    height : postWidth  - 20 + 'px'
                });
            }); 
        }
        
        else if (winWidth <= 479) {
            
            $('#portfolio-wrap').css( {width : $('#portfolio-wrap').parent().width() - 10 + 'px'});
            var portfolioWidth = $('#portfolio-wrap').width();
            
            columnNumb = 1;
            postWidth = Math.floor(portfolioWidth / columnNumb)         
            $container.find('.item').each(function () { 
                $('.item').css( { 
                    width : postWidth - 10 + 'px',
                    height : postWidth  - 10 + 'px',
                    margin : 5 + 'px' 
                });
                $('.item.wide').css( { 
                    width : postWidth  - 10 + 'px',
                    height : postWidth  - 10 + 'px'
                });
            }); 
        }       
        return columnNumb;
    }

});