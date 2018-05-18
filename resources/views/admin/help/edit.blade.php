Редактирование помощи

<form method="post" action="{{ route('admin.help.update', $help->id) }}">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{ $help->id }}">
    <input type="text" name="name" placeholder="name" value="{{ $help->help }}">
    <input type="text" name="surname" placeholder="surname" value="{{ $help->message }}">

    <input type="submit" value="Send">


{{--
    <div>вид помощи<input type="text" name="help" required></div>
    <div>описание
        <textarea name="message" style="width: 300px;height: 100px" ></textarea>
    </div>


    <input type="submit" value="изменить">--}}

</form>