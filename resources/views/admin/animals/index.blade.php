@extends('adminlte::page')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cписок животных</h3>
                        <meta name="csrf-token" content="{{ csrf_token() }}"/>
                        <button class="btn btn-default btn__add-animal pull-right" data-toggle="modal"
                                data-target="#modal-update"
                                onclick="create()">Добавить животное
                        </button>
                        <button class="btn btn-default pull-right">
                            <a href="{{ route('publication.index') }}">[{{ count($expectations) }}] Ожидают
                                публикации</a>
                        </button>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                    {{$animals->render()}}
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                        <tr>
                                            <th class="col-xs-1">Кличка</th>
                                            <th class="col-xs-1">Вид</th>
                                            <th class="col-xs-1">Порода</th>
                                            <th class="col-xs-1">Пол</th>
                                            <th class="col-xs-1">Возраст</th>
                                            <th class="col-xs-2">Заметки</th>
                                            <th class="col-xs-1">Контакты</th>
                                            <th class="col-xs-1">Главное фото</th>
                                            <th class="col-xs-1">Другие фото</th>
                                            <th colspan="2" class="col-xs-1">Управление</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($animals as $animal)
                                            <tr>
                                                <td>
                                                    @if ($animal->name==null) Не указано @endif
                                                    {{ $animal->name }}
                                                </td>
                                                <td>
                                                    @if($animal->species==1) Кошки
                                                    @elseif($animal->species==2) Собаки
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($animal->breed == null) Не указано @endif
                                                    {{$animal->breed}}
                                                </td>
                                                <td>
                                                    @if ($animal->sex == 0) Не выбран
                                                    @elseif ($animal->sex == 1) Мужской
                                                    @elseif ($animal->sex == 2) Женский
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($animal->age == null) Не указано @endif
                                                    {{ $animal->age }}
                                                </td>
                                                <td>
                                                    @if ($animal->notes==null) Не указано @endif
                                                    {{ str_limit($animal->notes, $limit = 100, $end = '...') }}
                                                </td>
                                                <td>{{ $animal->contacts }}</td>
                                                <td>
                                                    <img class="card-img-right flex-auto d-none d-md-block"
                                                         src="{{ asset("storage/$animal->main_foto") }}"
                                                         alt="Главное фото животного">
                                                </td>
                                                <td id="other_foto">
                                                    @if(!empty($animal->images))
                                                        @foreach($animal->images as $foto)
                                                            <div class="other__photo" id="image_{{ $foto->id }}">
                                                                <img src="{{ asset("storage/$foto->name") }}"
                                                                     alt="Другие фото животного"
                                                                >
                                                                <button class="other__photo_btn"
                                                                        onclick="destroyImage({{ $foto->id }})"><i
                                                                            class="fa fa-remove"></i></button>
                                                            </div>
                                                        @endforeach
                                                    @endif
                                                </td>
                                                <td>
                                                    <button class="btn btn-default" data-toggle="modal"
                                                            data-target="#modal-update"
                                                            onclick="update({{ $animal->id }})"><i
                                                                class="fa fa fa-pencil"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button class="btn btn-default" data-toggle="modal"
                                                            data-target="#modal-update"
                                                            onclick="show({{$animal->id}})"><i
                                                                class="fa fa-trash-o"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{$animals->render()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="modal-update" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <style>
        img {
            width: 100%;
            height: auto;
        }

        .btn__add-animal {
            margin-left: 15px;
        }

        .other__photo {
            position: relative;
            margin: 10px 0;
        }

        .other__photo_btn {
            position: absolute;
            top: 0;
            background: transparent;
            border: none;
            color: #da251c;
            font-size: 16px;
            right: 0;
        }
    </style>
    <script type='text/javascript'>
        function create() {
            $.ajax({
                type: 'GET',
                url: '/admin/animals/create',
                success: function (response) {
                    $('.modal-content').empty().append(response);
                }
            });
        }

        function update(id) {
            $.ajax({
                type: 'GET',
                url: '/admin/animals/' + id + '/edit',
                success: function (response) {
                    $('.modal-content').empty().append(response);
                }
            });
        }

        function destroyImage(id) {
            $.ajax({
                type: 'DELETE',
                url: '/admin/image/' + id,
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                success: function (responce) {
                    console.log(responce);
                    $('#image_' + id).remove();
                },
            });
        }

        function show(id) {
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type: 'GET',
                url: '/admin/animals/' + id,
                success: function (response) {
                    $('.modal-content').empty().append(response);
                }
            });
        }
    </script>
@endsection