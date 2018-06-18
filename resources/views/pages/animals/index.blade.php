@extends('layouts.main')

@section('content')
    <div class="animals">
        <div id="modal-animal" class="modal fade animals__modal_create">
            <div class="modal-dialog">
                <div class="modal-content">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="page top-pattern">
                <div class="adopt">
                    <p class="title">наши питомцы</p>
                    <h3>Ищут свой дом</h3>
                    <ul class="button-group animal-group">
                        <li><a href="#" class="active" data-filter="all">Отобразить всех</a></li>
                        <li><a href="#" data-filter="tomcats">Котики</a></li>
                        <li><a href="#" data-filter="dogs">Пёсики</a></li>
                        <li><a href="#" data-filter="cats">Кошечки</a></li>
                        <li><a href="#" data-filter="female-dogs">Собачки</a></li>
                    </ul>
                    <div class="filtered">
                        @include('pages.animals.load')
                    </div>
                    <button class="goods__btn_inform slideInUp wow" data-toggle="modal"
                            data-target="#modal-animal"
                            onclick="create()">Добавить животное
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/animals/index.js') }}"></script>
                                                                                                                                                                           <style>
    @media all and (max-width: 480px) {
        div.animals {
            padding: 190px 0 0;
        }

        div.animals .container {
            padding: 0;
        }

        .animals .page.top-pattern {
            margin: -30px 0 6px 0;
            min-height: 1500px;
        }
    }

    @media all and (min-width: 330px) and (max-width: 360px){
        .animal-block a {
            width: 100%;
            left: 0;
        }

        div.animals {
            padding: 190px 30px 0 30px;
        }
    }

    @media all and (min-width: 361px) and (max-width: 380px){
        .animal-block a {
            width: 92%;
            left: 5%;
        }

        div.animals {
            padding: 190px 30px 0 30px;
        }
    }

    @media all and (min-width: 381px) and (max-width: 410px){
        .animal-block a {
            width: 100%;
            left: 0;
        }
        div.animals {
            padding: 190px 55px 0 55px;
        }
    }

    @media all and (min-width: 411px) and (max-width: 440px){
        div.animals {
            padding: 190px 65px 0 65px;
        }
        .animal-block a {
            width: 96%;
            left: 2%;
        }
    }
    @media all and (min-width: 441px) and (max-width: 470px){
        div.animals {
            padding: 190px 80px 0;
        }
        .animal-block a {
            width: 96%;
            left: 2%;
        }
    }
    @media all and (min-width: 471px) and (max-width: 480px){
        div.animals {
            padding: 190px 85px 0;
        }
        .animal-block a {
            width: 96%;
            left: 2%;
        }
    }

    @media all and (min-width: 481px) and (max-width: 516px){
        div.animals {
            padding: 190px 0 0;
        }

        div.animals .container {
            padding: 0;
        }

        .animals .page.top-pattern {
            margin: -30px 0 6px 0;
            min-height: 1500px;
        }
    }

    @media all and (min-width: 517px) and (max-width: 550px){
        .animal-block a {
            width: 78%;
            left: 11%;
        }
    }

    @media all and (min-width: 551px) and (max-width: 590px){
        .animal-block a {
            width: 70%;
            left: 15%;
        }
    }

    @media all and (min-width: 591px) and (max-width: 630px){
        .animal-block a {
            width: 65%;
            left: 18%;
        }
    }

    @media all and (min-width: 768px) and (max-width: 930px){
        .animal-block a {
            width: 96%;
            left: 2%;
        }
    }

    @media all and (min-width: 992px) and (max-width: 1050px){
        .animal-block a {
            width: 70%;
            left: 16%;
        }
    }

    @media all and (min-width: 1200px) and (max-width: 1250px){
        .animal-block a {
            width: 84%;
            left: 8%;
        }
    }
</style>
@endsection
