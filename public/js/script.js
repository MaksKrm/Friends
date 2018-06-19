$(document).ready(function () {
    "use strict";
    // FlexSlider
    $('.slider .container').flexslider({
        animation: 'slide',
        selector: '.slides > li',
        controlNav: true,
        directionNav: false,
        slideshowSpeed: 3600,
        animationSpeed: 1200,
        prevText: '',
        nextText: ''
    });

    // FlexSlider
    $('.success-story .container').flexslider({
        animation: 'slide',
        selector: 'ul > li',
        controlNav: true,
        directionNav: false,
        slideshowSpeed: 3600,
        animationSpeed: 1200,
        prevText: '',
        nextText: ''
    });

    $('.volunteers').flexslider({
        slideshow: false,
        animation: 'slide',
        selector: 'ul > li',
        controlNav: false,
        directionNav: true,
        slideshowSpeed: 3600,
        animationSpeed: 1200,
        itemWidth: 250,
        itemMargin: 50,
        minItems: 1,
        maxItems: 3,
        prevText: '',
        nextText: '',
        move: 1
    });

    // FlexSlider
    $('.help.flexslider').flexslider({
        animation: 'slide',
        selector: 'ul > li',
        controlNav: false,
        directionNav: true,
        itemWidth: 220,
        itemMargin: 50,
        minItems: 1,
        maxItems: 3,
        prevText: '',
        nextText: '',
        move: 1
    });

    //Активная ссылка меню после перезагрузки страницы
    $("#navbarSupportedContent a").click(function (e) {
        var link = $(this);
        var item = link.parent("li");
        if (item.hasClass("active")) {
            item.removeClass("active").children("a").removeClass("active");
        } else {
            item.addClass("active").children("a").addClass("active");
        }

        if (item.children("ul").length > 0) {
            var href = link.attr("href");
            link.attr("href", "#");
            setTimeout(function () {
                link.attr("href", href);
            }, 300);
            e.preventDefault();
        }
    })
    .each(function () {
        var link = $(this);
        if (link.get(0).href === location.href) {
            link.addClass("active").parents("li").addClass("active");
            return false;
        }
    });
});