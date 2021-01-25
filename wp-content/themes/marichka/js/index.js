
//This is to fix header on mobile scroll
let vh = window.innerHeight * 0.01;
document.documentElement.style.setProperty('--vh', `${vh}px`);
window.addEventListener('resize', () => {
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty('--vh', `${vh}px`);
});

jQuery(document).ready(function($) {
    $('.top').on('click', function(e) {
        if ($(this).hasClass('active')) {
            if (window.innerWidth < 1024) {
                $(this).removeClass('active');
            }
        } else {
            e.preventDefault();
            $('body').addClass('lock');
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

    // $('.dont_panic .btn').on('click', function (e) {
    //     $('body').addClass('lock');
    //     $('.modal_box').removeClass('hidden');
    //     $('.modal_box .modal_main').removeClass('hidden');
    // });

    $('.close_modal, .modal_box, .modal_box .modal_check_success').on('click', function(e) {
        $('body').removeClass('lock');
        $('.modal_box, .header .modal_main, .modal_box .modal_main, .modal_box .modal_thanks').addClass('hidden');
    });

    // document.addEventListener( 'wpcf7mailsent', function( event ) {
    //     $('.modal_main').addClass('hidden');
    //     $('.modal_thanks').removeClass('hidden');
    // }, false );

    // $('.feedback_box').slick({
    //     rows: 1,
    //     centerMode: false,
    //     slidesToShow: 1,
    //     swipeToSlide: true,
    //     slidesToScroll: 1,
    //     autoplay: true,
    //     dots: false,
    //     arrows: true,
    //     prevArrow: $('.feedback_prev'),
    //     nextArrow: $('.feedback_next'),
    //     infinite: true,
    //     speed: 500,
    // });


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

    $('.hamburger').on('click', function () {
        $(this).addClass('hidden_smooth');
        $('body').addClass('lock');
        $('.header_menu').addClass('active');
    });
    $('.header_menu').on('click', function () {
        $(this).removeClass('active');
        $('body').removeClass('lock');
        $('.hamburger').removeClass('hidden_smooth');
    });
    // $('.header_menu .menu_list').on('click', function (e) {
    //     e.stopPropagation();
    // });

    // $(window).on('resize orientationchange', function() {
    //     $('.offer_box').slick('unslick').slick(getOfferOptions());
    // });

});
