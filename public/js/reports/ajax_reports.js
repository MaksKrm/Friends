$(document).ready(function () {
    //аякс загрузка таблицы с отчетом
    $(function report() {
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

    //аякс загрузка пагинации отчетов на гуггл диске
    $(function files() {
        $('.pagination a').live('click', function (e) {
            e.preventDefault();

            $('#load a').css('color', '#dfecf6');
            var url = $(this).attr('href');
            getArticles(url);
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
    })
})