<form action="{{route('confirm')}}" method="GET">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Выбрать</th>
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
                    <input type="checkbox" name="id[]" value="{{$animal->id}}">
                </td>
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
                <td><img src="{{asset("storage/$animal->main_foto")}}" alt="Main foto animal" width="70px"
                         height="70px"></td>
                <td>
                    @foreach(explode(',', $animal->other_foto) as $foto)
                        <img src="{{asset("storage/$foto")}}" alt="other foto animal" width="70px" height="70px">
                    @endforeach
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <input type="submit" value="Опубликовать">
</form>