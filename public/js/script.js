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
    $("#navbarMainMenu a").click(function (e) {
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

    //Блок помощи. Отправка сообщения

    $('#contactform').submit(function (e) {
        e.preventDefault();
        $("#subbut").attr('disabled', true).text('ожидайте результата').css({
            'background': '#787674',
            'border-bottom': '#268658'
        });
        $.ajax({
            type: 'POST',
            url: '/sendmail',
            data: $('#contactform').serialize(),
            success: function (data) {
                $('#sendmessage').show();
                $('#subbut').text('отправлено');
                resetError();
            },
            error: function (response) {
                $("#subbut").removeAttr('disabled').text('отправить повторно').css({'background': '#268658'});
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

    $(function () {
        $('#subbut').live('click', function (e) {
            e.preventDefault();
            var url = $(this).attr('href');
            getReport(url);
        });

        function getReport(url) {
            $.ajax({
                url: url,
                data: $('#date_report').serialize(),
            }).done(function (data) {
                $('#types').html(data);
            }).fail(function () {
                alert('ошибка загрузки отчета');
            });
        }
    });
    $(function () {
        $('.pagination a').live('click', function (e) {
            e.preventDefault();
            $('#load a').css('color', '#dfecf6');
            var url = $(this).attr('href');
            getArticles(url);
            window.history.pushState("", "", url);
        });

        function getArticles(url) {
            $.ajax({
                url: url
            }).done(function (data) {
                $('.types').html(data);
            }).fail(function () {
                alert('ошибка загрузки');
            });
        }
    });

});