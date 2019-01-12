jQuery(document).ready(function () {
    
    init();


    if(jQuery('.direction-img-container').length){
        jQuery.each(jQuery('.direction-img-container'), function () {
            var height = jQuery(this).parent().parent().find('.direction-list').height();
            jQuery(this).height(height+50);
        });
    }


    jQuery('.header-category').hover(function () {
        jQuery('.b-menu-category').mouseenter(function () {
            jQuery('.b-menu-category').removeClass('active');
            jQuery(this).addClass('active');
            jQuery('.modal-menu').removeClass('active');
            jQuery('.modal-menu[relate-menu-id="' + jQuery(this).attr('relate-menu-id') + '"]').addClass('active');
        });
    }, function () {
        jQuery('.modal-menu').removeClass('active');
        jQuery('.b-menu-category').removeClass('active');

        jQuery('.modal-menu').mouseenter(function () {
            jQuery(this).addClass('active');
            jQuery('.b-menu-category[relate-menu-id="' + jQuery(this).attr('relate-menu-id') + '"]').addClass('active');
        }).mouseleave(function () {
            jQuery(this).removeClass('active');
            jQuery('.b-menu-category').removeClass('active');
        });
    });

    // var productSwiper = new Swiper('.product_slider', {
    //     speed: 400,spaceBetween: 100
    //
    // });


    jQuery('.product_slider').slick({
        dots: true,
        infinite: true,
    });



    jQuery('.b-news-slider').slick({
        infinite: true,
        speed: 800,
        slidesToShow: 4,
        variableWidth: true,
        autoplay: true,
        autoplaySpeed: 4000,
    });

    jQuery('.b-product_slider').slick({
        infinite: true,
        speed: 600,
        slidesToShow: 4,
        variableWidth: true,
        autoplay: true,
        autoplaySpeed: 3000,
    });


    jQuery(window).on('load', function () {
        fadePreloader();
        init();
    });

    jQuery(window).resize(function () {
        init();
    });

    setTimeout(fadePreloader(), 2000);

});

function fadePreloader() {
    // if (jQuery(window).width() > 1199) {
    //     jQuery('html').css('overflow', 'auto');
    //     setTimeout(function () {
    //         jQuery('#preloader').fadeOut('slow');
    //     }, 500);
    // }else{
    //     jQuery('#preloader').height(jQuery(window).height()+200);
    //     jQuery('#preloader').width(jQuery(window).width()+200);
    //     jQuery('html').css('overflow', 'hidden');
    // }
}


function init() {
    initSliderArrows();

}

function initSliderArrows() {
    var arrowWidth = jQuery('.slick-prev').width();
    var containerOffset = jQuery('.container').offset().left;

    if(jQuery('.container').offset().left > jQuery('.slick-prev').width()) {
        jQuery('.slick-prev').css('left', -1 * (((containerOffset - arrowWidth)/2)+arrowWidth));
        jQuery('.slick-next').css('right', -1 * (((containerOffset - arrowWidth)/2)+arrowWidth));
    }else{
        jQuery('.slick-prev').css('left', '10px');
        jQuery('.slick-next').css('right', '10px');
    }



}