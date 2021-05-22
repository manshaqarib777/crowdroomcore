$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

window.bravo_format_money =  function($money) {

    if (!$money) {
        //return bookingCore.free_text;
    }
    //if (typeof bookingCore.booking_currency_precision && bookingCore.booking_currency_precision) {
    //    $money = Math.round($money).toFixed(bookingCore.booking_currency_precision);
    //}

    $money            = bravo_number_format($money/bookingCore.currency_rate, bookingCore.booking_decimals, bookingCore.decimal_separator, bookingCore.thousand_separator);
    var $symbol       = bookingCore.currency_symbol;
    var $money_string = '';

    switch (bookingCore.currency_position) {
        case "right":
            $money_string = $money + $symbol;
            break;
        case "left_space":
            $money_string = $symbol + " " + $money;
            break;

        case "right_space":
            $money_string = $money + " " + $symbol;
            break;
        case "left":
        default:
            $money_string = $symbol + $money;
            break;
    }

    return $money_string;
}

window.bravo_number_format = function (number, decimals, dec_point, thousands_sep) {


    number         = (number + '')
        .replace(/[^0-9+\-Ee.]/g, '');
    var n          = !isFinite(+number) ? 0 : +number,
        prec       = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep        = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec        = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s          = '',
        toFixedFix = function (n, prec) {
            var k = Math.pow(10, prec);
            return '' + (Math.round(n * k) / k)
                .toFixed(prec);
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s              = (prec ? toFixedFix(n, prec) : '' + Math.round(n))
        .split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '')
        .length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1)
            .join('0');
    }
    return s.join(dec);
}

window.bravo_handle_error_response = function(e){
    switch (e.status) {
        case 401:
            // not logged in
            $('#login').modal('show');
            break;
    }
};

// Form validation
var forms = document.getElementsByClassName('needs-validation');
// Loop over them and prevent submission
var validation = Array.prototype.filter.call(forms, function(form) {
    form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    }, false);
});

var bookingCoreApp ={
    showSuccess:function (configs){
        var args = {};
        if(typeof configs == 'object')
        {
            args = configs;
        }else{
            args.message = configs;
        }
        if(!args.title){
            args.title = i18n.success;
        }
        args.centerVertical = true;
        bootbox.alert(args);
    },
    showError:function (configs) {
        var args = {};
        if(typeof configs == 'object')
        {
            args = configs;
        }else{
            args.message = configs;
        }
        if(!args.title){
            args.title = i18n.warning;
        }
        args.centerVertical = true;
        bootbox.alert(args);
    },
    showAjaxError:function (e) {
        var json = e.responseJSON;
        if(typeof json !='undefined'){
            if(typeof json.errors !='undefined'){
                var html = '';
                _.forEach(json.errors,function (val) {
                    html+=val+'<br>';
                });

                return this.showError(html);
            }
            if(json.message){
                return this.showError(json.message);
            }
        }
        if(e.responseText){
            return this.showError(e.responseText);
        }
    },
    showAjaxMessage:function (json) {
        if(json.message)
        {
            if(json.status){
                this.showSuccess(json);
            }else{
                this.showError(json);
            }
        }
    },
    showConfirm:function (configs) {
        var args = {};
        if(typeof configs == 'object')
        {
            args = configs;
        }
        args.buttons = {
            confirm: {
                label: '<i class="fa fa-check"></i> '+i18n.confirm,
            },
            cancel: {
                label: '<i class="fa fa-times"></i> '+i18n.cancel,
            }
        };
        args.centerVertical = true;
        bootbox.confirm(args);
    }
};





















        //Owl Carousel Sliders
        setTimeout(function(){
            $('.user-slider').owlCarousel({loop:false, margin:20, nav:false, lazyLoad:true, items:1, autoplay: false, dots:false, autoplayTimeout:4000});		
            $('.news-slider').owlCarousel({loop:true, margin:20, nav:false, stagePadding:30, lazyLoad:true, items:5, autoplay: false, dots:false, autoplayTimeout:4000});		
            $('.topic-slider').owlCarousel({loop:true, margin:0, nav:false, stagePadding:40, lazyLoad:true, items:2, autoWidth:true, autoplay: false, dots:false, autoplayTimeout:4000});		
            $('.story-slider').owlCarousel({loop:true, margin:20, nav:false, stagePadding:30, lazyLoad:true, items:4, autoplay: false, dots:false, autoplayTimeout:4000});		
            $('.single-slider').owlCarousel({loop:true, margin:20, nav:false, lazyLoad:true, items:1, autoplay: true, autoplayTimeout:4000});		
            $('.fast-slider').owlCarousel({loop:true, margin:20, nav:false, lazyLoad:true, items:1, autoplay: true, autoplayTimeout:2000});		
            $('.boxed-slider').owlCarousel({loop:true, margin:20, stagePadding:50, nav:false, lazyLoad:true, items:1, autoplay: false, autoplayTimeout:4000});		
            $('.card-slider').owlCarousel({loop:true, margin:20, nav:false, lazyLoad:true, stagePadding:50, items:1, autoplay: true, autoplayTimeout:4000});		
            $('.cover-slider').owlCarousel({loop:false, margin:0, nav:false, lazyLoad:true, items:1, autoplay: true, autoplayTimeout:6000});		
            $('.double-slider').owlCarousel({loop: true, stagePadding:20, margin: 23, nav: false, items: 2,  dots: false});		
            $('.task-slider').owlCarousel({loop:true, margin:20, nav:false, stagePadding:50, lazyLoad:true, items:2, autoplay: false, autoplayTimeout:4000});		
            $('.next-slide, .next-slide-arrow, .next-slide-text, .cover-next').on('click',function(){$(this).parent().find('.owl-carousel').trigger('next.owl.carousel');});		
            $('.prev-slide, .prev-slide-arrow, .prev-slide-text, .cover-prev').on('click',function(){$(this).parent().find('.owl-carousel').trigger('prev.owl.carousel');});		
            $('.next-slide-user').on('click',function(){$(this).closest('.owl-carousel').trigger('next.owl.carousel');});		
            $('.prev-slide-user').on('click',function(){$(this).closest('.owl-carousel').trigger('prev.owl.carousel');});		
        },10);
        setTimeout(function(){
            $('.owl-prev, .owl-next').addClass('bg-highlight');
        })
        
         //Card Hovers
        $('.card-scale').unbind().bind('mouseenter mouseleave touchstart touchend',function(){$(this).find('img').toggleClass('card-scale-image');});  
        $('.card-grayscale').unbind().bind('mouseenter mouseleave touchstart touchend',function(){$(this).find('img').toggleClass('card-grayscale-image');});         
        $('.card-rotate').unbind().bind('mouseenter mouseleave touchstart touchend',function(){$(this).find('img').toggleClass('card-rotate-image');});       
        $('.card-blur').unbind().bind('mouseenter mouseleave touchstart touchend',function(){$(this).find('img').toggleClass('card-blur-image');});      
        $('.card-hide').unbind().bind('mouseenter mouseleave touchstart touchend',function(){$(this).find('.card-center, .card-bottom, .card-top, .card-overlay').toggleClass('card-hide-image');});
        
            //Extending Card Features
        function card_extender(){       
            /*Set Page Content to Min 100vh*/
            if($('.is-on-homescreen').length){
                var pageTitle = $('.page-title').height;
                var windowHeight = screen.height;
                $('.page-content, #page').css('min-height', windowHeight - pageTitle);
            } 
            if(!$('.is-on-homescreen').length){
                var pageTitle = $('.page-title').height;
                 var windowHeight = window.innerHeight
                $('.page-content, #page').css('min-height', windowHeight - pageTitle);
            } 
            
            $('.card-full').css('min-height', windowHeight);

            $('[data-card-height]').each(function(){
                var cardHeight = $(this).data('card-height');
                $(this).css('height', cardHeight);
                if(cardHeight == "cover"){
                    if(header.length && menuFooter.length){
                       $(this).css('height', windowHeight) 
                       $('.map-full, .map-full iframe').css('height', windowHeight) 
                    } else {
                       $(this).css('height', windowHeight)
                       $('.map-full, .map-full iframe').css('height', windowHeight)
                    }
                }
                if(cardHeight == "cover-card"){
                   $(this).css('height', windowHeight  - 200) 
                   $('.map-full, .map-full iframe').css('height', windowHeight - 200) 
                }
                if(cardHeight == "story-card"){
                   $(this).css('height', windowHeight-80) 
                }
            });
        }
        card_extender();

        $(window).resize(function(){
            card_extender();
        });
        
        
    
        //Activate Ads Demo
        
        $('.activate-scroll-ad').on('click', function(){$('#scroll-ad').removeClass('disabled'); $('#fixed-ad').addClass('disabled')})
        $('.activate-fixed-ad').on('click', function(){$('#scroll-ad').addClass('disabled'); $('#fixed-ad').removeClass('disabled')})
        
        //Scroll Ads
        var scrollAd = $('.scroll-ad');
        function show_scroll_ad(){scrollAd.addClass('scroll-ad-visible');}
        function hide_scroll_ad(){scrollAd.removeClass('scroll-ad-visible');}        



















        
