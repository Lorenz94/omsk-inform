jQuery(document).ready(function () {
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
    });

    jQuery(window).resize(function () {
        fadePreloader();
    });

    setTimeout(fadePreloader(), 2000);

});

function fadePreloader() {
    if (jQuery(window).width() > 1199) {
        console.log('lol ya tut' + jQuery(window).width());
        setTimeout(function () {
            jQuery('#preloader').fadeOut('slow');
        }, 500);
    }
}