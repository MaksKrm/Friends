@extends('adminlte::page')

@section('content')
    <style>
        img {
            width: 80px;
            height: 60px;
        }
        img, #other_foto {
            width: 60px;
            height: 60px;
        }
        .modal-dialog {
            width: 500px;
            height: auto;
        }
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <button class="btn btn-default" data-toggle="modal" data-target="#modal-update" onclick="create()">
        Добавить животное
    </button>
    <button class="btn btn-default"><a href="{{route('publication.index')}}">[{{count($expectations)}}] Ожидают публикации</a></button>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Кличка</th>
            <th scope="col">Вид</th>
            <th scope="col">Порода</th>
            <th scope="col">Пол</th>
            <th scope="col">Возраст</th>
            <th scope="col">Заметки</th>
            <th scope="col">Контакты</th>
            <th scope="col">Главное фото</th>
            <th scope="col">Другие фото</th>
            <th scope="col">Управление</th>
        </tr>
        </thead>
        <tbody>
        @foreach($animals as $animal)
            <tr>
                <td>
                    @if($animal->name==null) Не указанно @endif
                    {{$animal->name}}</td>
                <td>
                    @if($animal->species==1) Кошки
                    @elseif($animal->species==2) Собаки
                    @endif
                </td>
                <td>
                    @if($animal->breed==null) Не указанно @endif
                    {{$animal->breed}}
                </td>
                <td>
                    @if($animal->sex==0) Не выбран
                    @elseif($animal->sex==1) Мужской
                    @elseif($animal->sex==2) Женский
                    @endif
                </td>
                <td>
                    @if($animal->age==null) Не указанно @endif
                    {{$animal->age}}
                </td>
                <td>
                    @if($animal->notes==null) Не указанно @endif
                    {{$animal->notes}}
                </td>
                <td>{{$animal->contacts}}</td>
                <td><img src="{{asset("storage/$animal->main_foto")}}" alt="Main foto animal">
                <td>
                    @foreach(explode(',', $animal->other_foto) as $foto)
                        <img src="{{asset("storage/$foto")}}" alt="other foto animal" id="other_foto">
                    @endforeach
                </td>
                <td>
                    <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-update"
                            onclick="update({{$animal->id}})">Редактировать
                    </button>
                    <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-update"
                            onclick="show({{$animal->id}})">Удолить
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div id="modal-update" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" type="button" data-dismiss="modal">
                        Закрыть
                    </button>
                </div>
            </div>
        </div>
    </div>

<script type='text/javascript'>
    function create() {
        $.ajax({
            type: 'GET',
            url: '/admin/animals/create',
            success: function (response) {
                $('.modal-body').empty().append(response);
            }
        });
    }

    function update(id) {
        $.ajax({
            type: 'GET',
            url: '/admin/animals/' + id + '/edit',
            success: function (response) {
                $('.modal-body').empty().append(response);
            }
        });
    }

    function show(id) {
        $.ajax({
            type: 'GET',
            url: '/admin/animals/' + id,
            success: function (response) {
                $('.modal-body').empty().append(response);
            }
        });
    }
</script>
@endsection