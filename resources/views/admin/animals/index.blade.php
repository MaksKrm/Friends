@extends('adminlte::page')

@section('content')
    <style>
        img {
            width: 100%;
            height: auto;
        }

        .btn__add-animal {
            margin-left: 15px;
        }
    </style>
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
                                            <td><img class="card-img-right flex-auto d-none d-md-block"
                                                     src="{{ asset("storage/$animal->main_foto") }}"
                                                     alt="Главное фото животного">
                                            </td>
                                            <td>
                                                @if(!empty($animal->other_foto))
                                                    @foreach(explode(',', $animal->other_foto) as $foto)
                                                        <img src="{{ asset("storage/$foto") }}"
                                                             alt="Другие фото животного"
                                                             id="other_foto">
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
                                                        onclick="show({{$animal->id}})"><i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$animals->render()}}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <div id="modal-update" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>

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

        function show(id) {
            $.ajax({
                type: 'GET',
                url: '/admin/animals/' + id,
                success: function (response) {
                    $('.modal-content').empty().append(response);
                }
            });
        }
    </script>
@endsection