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

    <script src="{{ asset('js/animals/script.js') }}"></script>
@endsection
