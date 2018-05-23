Добавление необходимой помощи
<form method="post" action="{{route('help.store')}}">
    {{ csrf_field() }}

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div>вид помощи<input type="text" name="help" required></div>
    <div>описание
        <textarea name="message" style="width: 300px;height: 100px" ></textarea>
    </div>


    <input type="submit" value="добавить">

</form>