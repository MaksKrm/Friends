@extends('layouts.main')

@section('content')
    <style>
        .page.top-pattern {
            margin: -30px 0 0 30px;
        }

        .educate {
            padding-bottom: 0;
        }

        .educate h3 {
            color: #009a3e;
        }

        .adopt img {
            width: auto;
            max-height: 280px;
        }

        .animal {
            position: relative;
        }

        .animal-block {
            overflow: hidden;
        }

        .animal-block a {
            display: block;
            width: 85%;
            height: 280px;
            position: absolute;
            top: -1%;
            left: 10%;
            background: url(img/sprite-group-full.png) no-repeat 0 0;
            color: #009a3e;
            font-weight: bold;
            font: 1.5rem "Grand Hotel", cursive;

        }

        @media all and (max-width: 1200px) {
            .animal-block a {
                width: 66%;
                left: 17%;
            }
        }

        @media all and (max-width: 992px) {
            .animal-block a {
                width: 90%;
                left: 7%;
            }
        }

        @media all and (max-width: 768px) {
            .animal-block a {
                width: 60%;
                left: 20%;
            }

            .adopt img {
                max-height: 230px;
            }
        }

        @media all and (max-width: 480px) {
            .animal-block a {
                width: 70%;
                left: 12%;
            }
        }

        @media all and (max-width: 380px) {
            .animal-block a {
                width: 92%;
                left: 3%;
            }
        }

        .crop {
            overflow: hidden;
            width: 270px;
            height: 275px;
        }

        /*    .adopt .animal {
                display: block;
                width: 102%;
                height: 102%;
                position: absolute;
                top: -1%;
                left: -1%;
                background: url(../img/sprite-group-full.png) no-repeat 0 0;
                color: #ffd5cc;
                text-transform: uppercase;
                font-weight: bold;
            }*/

        .adopt {
            background: #fff;
            position: relative;
            z-index: 1;
            padding-top: 45px;
            margin-top: -55px;
        }

        .page:before {
            content: "";
            position: absolute;
            width: 137%;
            height: 102%;
            top: 0;
            left: 7px;
            z-index: -1;
            background: url(../img/halfcircle_pattern2.png) 0 0 repeat-x;
            -webkit-transform: rotate(-90deg);
            -moz-transform: rotate(-90deg);
            -ms-transform: rotate(-90deg);
            -o-transform: rotate(-90deg);
            transform: rotate(-90deg);
        }

        .page:after {
            content: "";
            position: absolute;
            width: 138%;
            height: 102%;
            top: 0;
            right: 3px;
            z-index: -1;
            background: url(../img/halfcircle_pattern2.png) 0 0 repeat-x;
            -webkit-transform: rotate(-30deg);
            -moz-transform: rotate(-30deg);
            -ms-transform: rotate(-30deg);
            -o-transform: rotate(-30deg);
            transform: rotate(90deg);
    </style>
    <div class="educate">
        <div class="container">
            <div class="page top-pattern">
                <div class="adopt">

                    <p class="title">наши питомцы</p>
                    <h3>Ищут свой дом</h3>

                    <!-- menu types  -->
                    <ul class="button-group">
                        <li><a href="#" class="active" data-filter="*">Отобразить всех</a></li>
                        <li><a href="#" data-filter=".standard">Кошечки</a></li>
                        <li><a href="#" data-filter=".vip">Собачки</a></li>
                        <li><a href="#" data-filter=".playground">Мальчики</a></li>
                        <li><a href="#" data-filter=".clients">Девочки</a></li>
                    </ul>
                    <!-- menu types ends -->
                    <div class="row">
                        @foreach ($animals as $animal)
                            <div class="col-md-6 col-xl-4 col-sm-12 col-12 mb-3">
                                <div class="animal">
                                    <div class="{{ $animal->species }} animal-block">
                                        <div class="crop">
                                           {{-- <img src="{{asset("storage/$animal->main_foto")}}" alt="Фото животного">--}}
                                            <img src="{{ $animal->main_foto }}" alt="Фото животного">
                                        </div>
                                        <p class="title"></p>
                                        <a href="{{route('pets.show', $animal->id)}}" data-group="paws_1"><span>{{ $animal->name }}</span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Projects List Ends! -->
                    <div class="row justify-content-center">
                        {{ $animals->links() }}
                    </div>
                </div>
                <!-- adopt Ends! -->
            </div>
        </div>
    </div>
@endsection
