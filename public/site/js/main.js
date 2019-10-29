
(function ($) {
    "use strict";
    function number_format( number, decimals, dec_point, thousands_sep ) {
    
    // * example 1: number_format(1234.5678, 2, '.', '');
    // * returns 1: 1234.57
                              
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "," : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                              
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
    }
    /*[ Load page ]
    ===========================================================*/
    $(".animsition").animsition({
        inClass: 'fade-in',
        outClass: 'fade-out',
        inDuration: 1500,
        outDuration: 800,
        linkElement: '.animsition-link',
        loading: true,
        loadingParentElement: 'html',
        loadingClass: 'animsition-loading-1',
        loadingInner: '<div data-loader="ball-scale"></div>',
        timeout: false,
        timeoutCountdown: 5000,
        onLoadEvent: true,
        browser: [ 'animation-duration', '-webkit-animation-duration'],
        overlay : false,
        overlayClass : 'animsition-overlay-slide',
        overlayParentElement : 'html',
        transition: function(url){ window.location.href = url; }
    });
    
    /*[ Back to top ]
    ===========================================================*/
    var windowH = $(window).height()/2;

    $(window).on('scroll',function(){
        if ($(this).scrollTop() > windowH) {
            $("#myBtn").css('display','flex');
        } else {
            $("#myBtn").css('display','none');
        }
    });

    $('#myBtn').on("click", function(){
        $('html, body').animate({scrollTop: 0}, 300);
    });


    /*[ Show header dropdown ]
    ===========================================================*/
    $('.js-show-header-dropdown').on('click', function(){
        $(this).parent().find('.header-dropdown')
    });

    var menu = $('.js-show-header-dropdown');
    var sub_menu_is_showed = -1;

    for(var i=0; i<menu.length; i++){
        $(menu[i]).on('click', function(){ 
            
                if(jQuery.inArray( this, menu ) == sub_menu_is_showed){
                    $(this).parent().find('.header-dropdown').toggleClass('show-header-dropdown');
                    sub_menu_is_showed = -1;
                }
                else {
                    for (var i = 0; i < menu.length; i++) {
                        $(menu[i]).parent().find('.header-dropdown').removeClass("show-header-dropdown");
                    }

                    $(this).parent().find('.header-dropdown').toggleClass('show-header-dropdown');
                    sub_menu_is_showed = jQuery.inArray( this, menu );
                }
        });
    }

    $(".js-show-header-dropdown, .header-dropdown").click(function(event){
        event.stopPropagation();
    });

    $(window).on("click", function(){
        for (var i = 0; i < menu.length; i++) {
            $(menu[i]).parent().find('.header-dropdown').removeClass("show-header-dropdown");
        }
        sub_menu_is_showed = -1;
    });

    /*[ Fixed Header ]
    ===========================================================*/
    var posWrapHeader = $('.topbar').height();
    var header = $('.container-menu-header');
    var lastScrollTop = 0;
    $(window).on('scroll',function(){
        var currentScrollTop = $(this).scrollTop();
        if(currentScrollTop >= posWrapHeader) {
            $('.header1').addClass('fixed-header');
            $(header).css('top',-posWrapHeader); 
        }  
        else {
            var x = - currentScrollTop; 
            $(header).css('top',x); 
            $('.header1').removeClass('fixed-header');
        } 
        if(currentScrollTop < lastScrollTop && ($(window).width() < 992) ) {
            $('.header-icons-mobile').css('bottom', '0');
        }  
        else {
            var h_b = $('.header-icons-mobile').outerHeight();
            $('.header-icons-mobile').css('bottom', -h_b);
        } 
        if (currentScrollTop < lastScrollTop) {
            $('.wrap_header_mobile').css('top', '0');
        }else{
            var h_t = $('.wrap_header_mobile').outerHeight();
            $('.wrap_header_mobile').css('top', -h_t);
            $('.btn-show-menu-mobile').removeClass('is-active');
            $('.wrap-side-menu').slideUp();
        }if (currentScrollTop == 0) {
            $('.wrap_header_mobile').removeClass('down');
        }
        lastScrollTop = currentScrollTop;
    });
    /*[ Show menu mobile ]
    ===========================================================*/
    $('.btn-show-menu-mobile').on('click', function(){
        $(this).toggleClass('is-active');
        $('.wrap-side-menu').slideToggle();
    });

    var arrowMainMenu = $('.arrow-main-menu');

    for(var i=0; i<arrowMainMenu.length; i++){
        $(arrowMainMenu[i]).on('click', function(){
            $(this).parent().find('.sub-menu').slideToggle();
            $(this).toggleClass('turn-arrow');
        })
    }

    $(window).resize(function(){
        if($(window).width() >= 992){
            if($('.wrap-side-menu').css('display') == 'block'){
                $('.wrap-side-menu').css('display','none');
                $('.btn-show-menu-mobile').toggleClass('is-active');
            }
            if($('.sub-menu').css('display') == 'block'){
                $('.sub-menu').css('display','none');
                $('.arrow-main-menu').removeClass('turn-arrow');
            }
        }
    });

    /*[ remove top noti ]
    ===========================================================*/
    $('.btn-romove-top-noti').on('click', function(){
        $(this).parent().remove();
    })

    /* shipping */
    $('.get_citi').change(function(event) {
        var val = parseInt($(this).val()),
            pri = parseInt($('.data_price').attr('data-price')),
            total = val+pri;
            if (val > 0) {
                $('.notif').slideUp('slow');
                $('.ttmount').val(total);
                $('.cti').val($(this).children('option:selected').text());
                $('.sub-order').removeAttr('disabled');
            }else{
                $('.ttmount').val('');
                 $('.cti').val('');
                $('.notif').slideDown('slow');
            }
            $('.data_price').html(number_format(total,0)+'.vnđ');
    });

    /* range slide price*/

    $('.get-pric').click(function(event) {
        var min = $('#value-lower').text().replace(/,/g ,'');
        var max = $('#value-upper').text().replace(/,/g ,'');
        var url = $(this).attr('url');
        $(this).parents('.filter-price').find('.min').val(min);
        $(this).parents('.filter-price').find('.max').val(max);
        $(this).attr('type', 'submit');
    });

    
/* AUTO COMPLETE */
    var url = $('#text-search').attr('url');
    $( "#text-search" ).autocomplete({
      max:10,
      minLength: 2,
      source: url,
      focus: function( event, ui ) {
        $( "#text-search" ).val( ui.item.label );
        return false;
      },
    })

    /*[ +/- num product ]
    ===========================================================*/
    $('.btn-num-product-down').on('click', function(e){
        e.preventDefault();
        var numProduct = Number($(this).next().val());
        if(numProduct > 1) $(this).next().val(numProduct - 1).attr('value', numProduct - 1);
    });

    $('.btn-num-product-up').on('click', function(e){
        e.preventDefault();
        var numProduct = Number($(this).prev().val());
        $(this).prev().val(numProduct + 1).attr('value', numProduct + 1);;
    });

    $('.num-prod').keyup(function(event) {
        $(this).attr('value', $(this).val());
        if ($(this).val() == '') {
            $(this).attr('value', '1');
            $(this).val(1);
        }
    });


    /*[ Show content Product detail ]
    ===========================================================*/
    $('.active-dropdown-content .js-toggle-dropdown-content').toggleClass('show-dropdown-content');
    $('.active-dropdown-content .dropdown-content').slideToggle('fast');

    $('.js-toggle-dropdown-content').on('click', function(){
        $(this).toggleClass('show-dropdown-content');
        $(this).parent().find('.dropdown-content').slideToggle('fast');
    });


    /*[ Play video 01]
    ===========================================================*/
    var srcOld = $('.video-mo-01').children('iframe').attr('src');

    $('[data-target="#modal-video-01"]').on('click',function(){
        $('.video-mo-01').children('iframe')[0].src += "&autoplay=1";

        setTimeout(function(){
            $('.video-mo-01').css('opacity','1');
        },300);      
    });

    $('[data-dismiss="modal"]').on('click',function(){
        $('.video-mo-01').children('iframe')[0].src = srcOld;
        $('.video-mo-01').css('opacity','0');
    });

})(jQuery);