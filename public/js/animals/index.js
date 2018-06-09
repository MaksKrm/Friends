function create() {
    $.ajax({
        type: 'GET',
        url: '/pets/create',
        success: function (response) {
            $('.modal-content').empty().append(response);
        }
    });
}

//Блок животных. Загрузка всех животных
$(document).ready(function () {
    $.ajax({
        type: 'GET',
        url: '/pets/' + 'all' + '/edit',
        success: function (response) {
            $('.filtered').empty().html(response);
            $('.pagination a').live('click', function (e) {
                e.preventDefault();
                var url = $(this).attr('href');
                getArticles(url);
                window.history.pushState("", "", url);
            });
        },
        error: function () {
            alert('error');
        }
    });

    function getArticles(url) {
        $.ajax({
            url: url
        }).done(function (data) {
            $('.filtered').empty().html(data);
        }).fail(function () {
            alert('Articles could not be loaded.');
        });
    }
});

//Блок животных. Сортировка
$(document).ready(function () {

    $(".animal-group li a").click(function (e) {
        e.preventDefault();
        var category = $(this).attr('data-filter');
        $(".animal-group li a").not(this).removeClass('active');
        $(this).addClass('active');
        $.ajax({
            type: 'GET',
            url: '/pets/' + category + '/edit',
            success: function (response) {
                $('.filtered').empty().html(response);
                $('.pagination a').live('click', function (e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    getArticles(url);
                    window.history.pushState("", "", url);
                });
            },
            error: function () {
                alert('error');
            }
        });

        function getArticles(url) {
            $.ajax({
                url: url
            }).done(function (data) {
                $('.filtered').empty().html(data);
            }).fail(function () {
                alert('Articles could not be loaded.');
            });
        }
    });
});