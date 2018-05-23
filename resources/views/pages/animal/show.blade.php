@extends('layouts.main')

@section('content')
    <style>
        .wrapper {
            background: #009a3e url(../img/paw_pattern.png);
            color: #1d2124;
            margin-top: -18px;
            padding-top: 90px;
        }

        .animal__page-title {
            text-align: center;
            font: 2.5rem "Grand Hotel", cursive;
            color: #ffd5cc;
            margin-bottom: 50px;
        }

        .animal__profile {
            background-color: #fff;
            margin-top: -55px;
            padding: 55px 0;
        }

        .animal__profile img {
            width: 100%;
        }

        .animal__features {
            line-height: 2;
        }

        .animal__features span {
            font: 1.5rem "Grand Hotel", cursive;
            padding-right: 15px;
        }

        .animal__button_block {
            display: flex;
            justify-content: space-around;
        }

        .animal__button_block .btn-home {
            background: #ffd5cc;
            color: #268658;
            border-bottom: 4px solid #268658;
        }

        .animal__button_block .btn-home:hover {
            background: #268658;
            border-bottom: 4px solid #da251c;
            color: #fff;
        }


    </style>
    <div class="wrapper">
        <h2 class="animal__page-title">Страничка питомца</h2>
        <div class="page top-pattern">
            <div class="animal__profile">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="animal__photo_main">
                                <img class="flex-auto d-md-block"
                                     alt="Фото животного"
                                     src="{{ $animal->main_foto }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3> {{ $animal->name }}</h3>
                            <ul class="animal__features">
                                <li><span>Порода:</span>{{ $animal->breed }}</li>
                                <li><span>Пол:</span>{{ $animal->sex }}</li>
                                <li><span>Возраст:</span>{{ $animal->age }}</li>
                                <li><span>Контакт:</span>{{ $animal->contacts }}</li>
                                <li><span>Дополнительная информация:</span>{{ $animal->notes }}</li>
                            </ul>
                            <div class="button-holder animal__button_block">
                                <a href="#" class="button">Курировать</a>
                                <a href="#" class="button btn-home">Приютить</a>
                            </div>
                            <h4>Дополнительные фотографии</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
