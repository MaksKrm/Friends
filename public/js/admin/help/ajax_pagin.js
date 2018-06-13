$(document).ready(function () {
    //аякс загрузка пагинации помощи
    $(function files() {
        $('.types').on('click','.pagination a', function (e) {
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