@extends('adminlte::page')

@section('content')
    <button class="btn btn-default">
        <a href="{{route('animals.index')}}">[{{$activ}}] Активные объявления</a>
    </button>
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
        @foreach($animals as  $animal)
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
                <td><img src="{{asset("storage/$animal->main_foto")}}" alt="Main foto animal"></td>
                <td>
                    @foreach(explode(',', $animal->other_foto) as $foto)
                        <img src="{{asset("storage/$foto")}}" alt="other foto animal" id="other_foto">
                    @endforeach
                </td>
                <td>
                    <button class="btn btn-info btn-lg" onclick="edit({{$animal->id}})">Опубликовать
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

        function edit(id) {
            $.ajax({
                type: 'GET',
                url: '/admin/publication/' + id + '/edit',
                success: function(response) {
                    location.reload();
                }
            });
        }

        function show(id) {
            $.ajax({
                type: 'GET',
                url: '/admin/publication/' + id,
                success: function (response) {
                    $('.modal-body').empty().append(response);
                }
            });
        }
    </script>
@endsection