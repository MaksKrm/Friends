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
            margin-bottom: 80px;
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
        <div id="modal-update" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                </div>
            </div>
        </div>
        <h2 class="animal__page-title">Страничка питомца</h2>
        <div class="page top-pattern">
            <div class="animal__profile">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="animal__photo_main">
                                 <img class="flex-auto d-md-block"
                                      src="{{asset("storage/$animal->main_foto")}}"
                                      alt="Фото животного">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h3> {{ $animal->name }}</h3>
                            <ul class="animal__features">
                                <li><span>Порода:</span>{{ $animal->breed }}</li>
                                <li><span>Пол:</span>
                                    @if ($animal->sex == 0) Не выбран
                                    @elseif ($animal->sex == 1) Мужской
                                    @elseif ($animal->sex == 2) Женский
                                    @endif
                                </li>
                                <li><span>Возраст:</span>{{ $animal->age }}</li>
                                <li><span>Контакт:</span>{{ $animal->contacts }}</li>
                                <li><span>Дополнительная информация:</span>{{ $animal->notes }}</li>
                            </ul>
                            <div class="button-holder animal__button_block">
                                <button class="button btn__add-animal pull-right" data-toggle="modal"
                                        data-target="#modal-update" onclick="showform()">Курировать
                                </button>
                                <button class="goods__btn_inform btn__add-animal pull-right" data-toggle="modal"
                                        data-target="#modal-update" onclick="showContact({{$animal->id}})">Приютить
                                </button>
                            </div>
                            <h4>Дополнительные фотографии</h4>
                            <div class="row parent-container">
                                @if(!empty($animal->images))
                                    @foreach($animal->images as $foto)
                                        <div class="col-md-3 mb-2">
                                            <a class="without-caption image-link"
                                               href="{{ asset("storage/$foto->name") }}">
                                                <img src="{{ asset("storage/$foto->name") }}"
                                                     alt="Другие фото животного"
                                                     id="other_foto">
                                            </a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{ asset('js/animals/show.js') }}"></script>
@endsection
