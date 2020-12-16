// First we get the viewport height and we multiple it by 1% to get a value for a vh unit
let vh = window.innerHeight * 0.01;
// Then we set the value in the --vh custom property to the root of the document
document.documentElement.style.setProperty('--vh', `${vh}px`);
// We listen to the resize event
window.addEventListener('resize', () => {
    // We execute the same script as before
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
});

jQuery(document).ready(function($) {
    const body = $('dody');

    function header_change(){
        if ($(window).scrollTop() < 20){
            $('header').removeClass("small");
        }
        else{
            $('header').addClass("small");
        }
    }
    header_change();

    function fillServiceForm() {
        if ($('.services.single h1')) {
            let title = $('.services.single h1').text();
            $('section.contacts textarea').val(title);
        }
    }
    fillServiceForm();

    $(window).scroll(function() {
        header_change();
    });

    $('.top').on('click', function(e) {
        if ($(this).hasClass('active')) {
            if (window.innerWidth < 1024) {
                $(this).removeClass('active');
            }
        } else {
            e.preventDefault();
            $('body').addClass('modal_lock');
            $('.top').removeClass('active');
            $(this).addClass('active');
            $('#close_menu').addClass('active');
            if (window.innerWidth > 1024) {
                //set height of child menu
                let top = $('header').height();
                $(this).find('>.sub-menu').css('top', top + 'px');
                $(this).find('>.sub-menu').css('height', 'calc(100vh - ' + top + 'px)');
            } else {
                // console.log('small screen');
            }
        }
    });

    $('.top .sub-menu a, .modal_main, .modal_thanks, .sub-menu .menu-item-has-children').on('click', function (e) {
        e.stopPropagation();
    });
    $('.sub-menu .menu-item-has-children').on('click', function (e) {
        $(this).toggleClass('active');
    });

    $('#close_menu').on('click', function () {
        $(this).removeClass('active');
        $('.top').removeClass('active');
        $('.header_menu').removeClass('active');
        $('.hamburger').removeClass('hidden_smooth');
        $('body').removeClass('modal_lock');
    });

    $('.dont_panic .btn').on('click', function (e) {
        $('body').addClass('modal_lock');
        $('.modal_box').removeClass('hidden');
        $('.modal_box .modal_main').removeClass('hidden');
    });

    $('.close_modal, .modal_box, .modal_box .modal_check_success').on('click', function(e) {
        $('body').removeClass('modal_lock');
        $('.modal_box, .header .modal_main, .modal_box .modal_main, .modal_box .modal_thanks').addClass('hidden');
    });

    document.addEventListener( 'wpcf7mailsent', function( event ) {
        $('.modal_main').addClass('hidden');
        $('.modal_thanks').removeClass('hidden');
    }, false );

    function getOfferOptions() {
        // Set preferred slidesToShow
        // default min with 176px
        let clientsSlidesToShow = Math.floor(window.innerWidth / 176);
        if ((clientsSlidesToShow % 2) === 0) {
            clientsSlidesToShow = clientsSlidesToShow - 1;
        }
        let clientsChildElements = $('.offer_box').children().length;
        // Check if we can fulfill the preferred slidesToShow
        if( clientsSlidesToShow > (clientsChildElements-1) ) {
            // Otherwise, make slidesToShow the number of slides - 1
            // Has to be -1 otherwise there is nothing to scroll for - all the slides would already be visible
            clientsSlidesToShow = (clientsChildElements-1);
            if (clientsSlidesToShow < 1) clientsSlidesToShow = 1;
        }
        return {
            rows: 1,
            centerMode: false,
            slidesToShow: clientsSlidesToShow,
            slidesToScroll: 1,
            swipeToSlide: true,
            autoplay: true,
            dots: true,
            appendDots: $('.offer_dots'),
            arrows: true,
            prevArrow: $('.offer_prev'),
            nextArrow: $('.offer_next'),
            infinite: true,
            speed: 500,
        };
    }

    $('.offer_box').slick(getOfferOptions());

    $('.feedback_box').slick({
        rows: 1,
        centerMode: false,
        slidesToShow: 1,
        swipeToSlide: true,
        slidesToScroll: 1,
        autoplay: true,
        dots: false,
        arrows: true,
        prevArrow: $('.feedback_prev'),
        nextArrow: $('.feedback_next'),
        infinite: true,
        speed: 500,
    });

    if (window.innerWidth < 1024) {
        $('.certificates_box').slick({
            rows: 1,
            centerMode: false,
            slidesToShow: 3,
            swipeToSlide: true,
            slidesToScroll: 1,
            autoplay: true,
            dots: true,
            appendDots: $('.cert_dots'),
            arrows: true,
            prevArrow: $('.cert_prev'),
            nextArrow: $('.cert_next'),
            infinite: true,
            speed: 500,
        });

        $('.news .news_box').slick({
            rows: 1,
            centerMode: false,
            slidesToShow: 1,
            swipeToSlide: true,
            slidesToScroll: 1,
            autoplay: true,
            dots: false,
            appendDots: false,
            arrows: true,
            prevArrow: $('.news_prev'),
            nextArrow: $('.news_next'),
            infinite: true,
            speed: 500,
        });

        $('.team_box').slick({
            rows: 1,
            centerMode: false,
            slidesToShow: 1,
            swipeToSlide: true,
            slidesToScroll: 1,
            autoplay: true,
            dots: true,
            appendDots: $('.team_dots'),
            arrows: true,
            prevArrow: $('.team_prev'),
            nextArrow: $('.team_next'),
            infinite: true,
            speed: 500,
        });

        $('.cases_box').slick({
            rows: 1,
            centerMode: false,
            slidesToShow: 1,
            swipeToSlide: true,
            slidesToScroll: 1,
            autoplay: false,
            dots: false,
            appendDots: false,
            arrows: true,
            prevArrow: $('.cases_prev'),
            nextArrow: $('.cases_next'),
            infinite: true,
            speed: 500,
        });
    }

    $('.security_box .item').on('click', function (e) {
        if (window.innerWidth > 1024) {
            e.preventDefault();
            let item = $(this).attr('data-item');
            $('.item, .info').removeClass('active');
            $('[data-item="' + item + '"]').addClass('active');
        }
    });

    $('#accept_cookie').on('click', function (e) {
        $('.cookie').slideUp('smooth');
        $.ajax({
            url: '/wp-admin/admin-ajax.php',
            type: 'POST',
            data: 'action=cookieAccept',
            success: function() {
                $('.cookie').slideUp('smooth');
            }
        });
    });

    $('.case_group_box .case').on('click', function (e) {
        $('.case_group_box .case').removeClass('active');
        $(this).addClass('active');
        $('html, body').animate({
            scrollTop: $(this).offset().top - 100
        }, 1000);
    });

    $('.partner_type_group_box .partner_type').on('click', function (e) {
        $('.partner_type_group_box .partner_type').removeClass('active');
        $(this).addClass('active');
        $('html, body').animate({
            scrollTop: $(this).offset().top - 100
        }, 1000);
    });

    $('.offer_accordion1_group_box .offer_accordion1').on('click', function (e) {
        $('.offer_accordion1_group_box .offer_accordion1').removeClass('active');
        $(this).addClass('active');
        $('html, body').animate({
            scrollTop: $(this).offset().top - 100
        }, 1000);
    });

    $('.offer_accordion2_group_box .offer_accordion2').on('click', function (e) {
        $('.offer_accordion2_group_box .offer_accordion2').removeClass('active');
        $(this).addClass('active');
        $('html, body').animate({
            scrollTop: $(this).offset().top - 100
        }, 1000);
    });

    $('.offer_accordion3_group_box .offer_accordion3').on('click', function (e) {
        $('.offer_accordion3_group_box .offer_accordion3').removeClass('active');
        $(this).addClass('active');
        $('html, body').animate({
            scrollTop: $(this).offset().top - 100
        }, 1000);
    });

    $('.differences_box .difference').on('click', function (e) {
        if (window.innerWidth < 1024) {
            $('.differences_box .difference').removeClass('active');
            $(this).addClass('active');
            $('html, body').animate({
                scrollTop: $(this).offset().top - 100
            }, 1000);
        }
    });

    $('.hamburger').on('click', function () {
        $(this).addClass('hidden_smooth');
        $('body').addClass('modal_lock');
        $('.header_menu').addClass('active');
        $('#close_menu').addClass('active');
    });
    $('.header_menu').on('click', function () {
        $(this).removeClass('active');
        $('body').removeClass('modal_lock');
        $('.hamburger').removeClass('hidden_smooth');
    });
    $('.header_menu .menu_list').on('click', function (e) {
        e.stopPropagation();
    });

    $('.header_menu .menu_list .top>.sub-menu li').mouseover(function (e) {
        const sub = $(this).find('.sub-menu');
        if (sub.length && window.innerWidth > 1024) {
            let menuTop = $(this).parent('.sub-menu').offset().top;
            let thisTop = $(this).offset().top;
            let top = menuTop - thisTop + 20; //+ menu padding
            $(this).find('>.sub-menu').css('top', top + 'px');
            $(this).find('>.sub-menu').css('height', 'calc(100vh - ' + menuTop + 'px - 40px)');
        }
    });

    $(window).on('resize orientationchange', function() {
        $('.offer_box').slick('unslick').slick(getOfferOptions());
    });

});
