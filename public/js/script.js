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

    //Блок помощи. Отправка сообщения

    $('#contactform').submit(function (e) {
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: '/sendmail',
            data: $('#contactform').serialize(),
            success: function (data) {
                $('#sendmessage').show();
            },
            error: function (response) {
                errorFields(response);
            }
        });
    });

    function errorFields(errors) {
        if (!errors.responseText) {
            return false
        }
        errors = JSON.parse(errors.responseText).errors;
        var key = Object.keys(errors);
        key.forEach(function (id) {
            $('#div_' + id).addClass("has-error");
            $('#div_' + id + ' strong').text(errors[id][0]);
        });
    }

    /**
     * Сброс ошибок.
     */
    function resetError() {
        $('.form-group').removeClass("has-error");
        $('.form-group strong').text('');
    }


});