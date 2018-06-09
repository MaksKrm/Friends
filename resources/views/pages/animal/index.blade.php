@extends('layouts.main')

@section('content')
    <div id="modal-update" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <div class="animals">
        <div class="container">
            <div class="page top-pattern">
                <div class="adopt">
                    <p class="title">наши питомцы</p>
                    <h3>Ищут свой дом</h3>
                    <ul class="button-group animal-group">
                        <li><a href="#" class="active" data-filter="all">Отобразить всех</a></li>
                        <li><a href="#" data-filter="cats">Котики</a></li>
                        <li><a href="#" data-filter="dogs">Пёсики</a></li>
                        <li><a href="#" data-filter="boys">Мальчики</a></li>
                        <li><a href="#" data-filter="girls">Девочки</a></li>
                        <li>
                            <button class="btn btn-default btn__add-animal pull-right" data-toggle="modal"
                                    data-target="#modal-update"
                                    onclick="create()">Добавить животное
                            </button>
                        </li>
                    </ul>
                    <div class="filtered">
                        @include('pages.animal.load')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function create() {
            $.ajax({
                type: 'GET',
                url: '/pets/create',
                success: function (response) {
                    $('.modal-content').empty().append(response);
                }
            });
        }
        $(window).on('hashchange', function () {
            if (window.location.hash) {
                var page = window.location.hash.replace('#', '');
                if (page == Number.NaN || page <= 0) {
                    return false;
                } else {
                    getData(page);
                }
            }
        });
        $(document).ready(function () {
            $(".pagination a").click(function (e) {
                e.preventDefault();
                $('li').removeClass('active');
                $(this).parent('li').addClass('active');
                var myurl = $(this).attr('href');
                var page = $(this).attr('href').split('page=')[1];
            });
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
                    },
                    error: function () {
                        alert('error');
                    }
                });
            });
        });
        function getData(page) {
            $.ajax({
                url: '?page=' + page,
                type: "GET",
                datatype: "html"
            })
                .done(function (data) {
                    $("#category_wrap").empty().html(data);
                    location.hash = page;
                })
                .fail(function (jqXHR, ajaxOptions, thrownError) {
                    alert('No response from server');
                });
        }
    </script>
@endsection
