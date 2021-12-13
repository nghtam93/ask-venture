$(document).ready(function(){

     new WOW().init();

    /*----Get Header Stick ---*/
    var header_sticky=$("header.-fix")
    $(window).scroll(function(){
        $(this).scrollTop()>5?header_sticky.addClass("is-active"):header_sticky.removeClass("is-active")
    })

    $( window ).on( "load", function() {
        (header_sticky.offset().top >5) ? header_sticky.addClass("is-active"):header_sticky.removeClass("is-active")
    });


    /*----Languages---*/
    $('.languages .languages-item').click(function() {
        $(this).next().toggleClass('dropdown-languages');
        isClicked = true;
    });
    $('.languages ul li').click(function() {
        var $liIndex = $(this).index() + 1;
        $('.languages ul li').removeClass('active');
        $('.languages ul li:nth-child('+$liIndex+')').addClass('active');
        var $getLang = $(this).html();
        $('.languages .languages-item').html($getLang);

        $('.languages>ul').removeClass('dropdown-languages')
    });


    /*----Get Header Height ---*/
    function get_header_height() {
        var header_sticky=$("header.-fix").outerHeight()
        $('body').css("--header-height",header_sticky+'px')
    }

    setTimeout(function(){
        get_header_height()
    }, 500);

    $( window ).resize(function() {
      get_header_height()
    });

    // Click id a
    var jump=function(e)
    {
        $(document).off("scroll");
        if (e){
           e.preventDefault();
           var target = $(this).attr("href");
        }else{
           var target = location.hash;
        }

        $('html, body').stop().animate({
            'scrollTop': $(target).offset().top
        });

        location.hash = target;
    }
    $('a[href^="#"]').bind("click", jump);

    $(document).on('click', 'a[href^="#"], a[href*=".html#"]', function (e) {

        $(this).closest('nav').find('li').removeClass('active')
        $(this).closest('li').addClass('active')

        //Close menu mb
        $('.menu-mb__btn').removeClass('active')
        $('.nav__mobile').removeClass('active')
        $('body').removeClass('modal-open')
    });

    //-------------------------------------------------
    // Menu
    //-------------------------------------------------
    $('.nav__mobile--close').click(function(e){
        $('.nav__mobile').removeClass('active')
        $('body').removeClass('modal-open')
    });
    $('.menu-mb__btn').click(function(e){
        e.preventDefault()
        if($('body').hasClass('modal-open')){
            $('.menu-mb__btn').removeClass('active')
            $('.nav__mobile').removeClass('active')
            $('body').removeClass('modal-open')
        }else{
            $('.menu-mb__btn').addClass('active')
            $('body').addClass('modal-open')
            $('.nav__mobile').addClass('active')
        }
    });

    //back to top
    var back_to_top=$(".back-to-top"),offset=220,duration=500;
    $(document).on("click",".back-to-top",function(o){
        return o.preventDefault(),$("html, body").animate({scrollTop:0},duration),!1
    });


    //check home
    if($('body').hasClass( "home" )){



    }
    if($('body').hasClass( "single" )){
        $('.related__slider').slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            arrows: true,
            dots: false,
            responsive: [
                {
                  breakpoint: 767,
                  settings: {
                    slidesToShow: 2,
                  }
                },
                {
                  breakpoint: 575,
                  settings: {
                    centerMode: true,
                    variableWidth: true,
                    slidesToShow: 1,
                  }
                }
            ]
        });

        Fancybox.bind("a[href$='.jpg'], a[href$='.png'], a[href$='.jpeg'], a[href$='.gif']", {
          groupAttr: false,
        });

    }

});


