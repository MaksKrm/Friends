<html>
<head>
    <title>Сайт задач</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
</head>
<style>
    html, body {
        background-color: #f0f0f0;
        color: #000000;
        font-family: 'Raleway', sans-serif;
        font-weight: 100;
        height: 100vh;
        margin: 0;
    }
    table{
        margin-left: 20px;
        margin-bottom: 10px;
        margin-top: 10px;
    }
    td {
        border: 1px solid black;
        padding: 5px;
    }
</style>
<div>
    <span style="margin-left: 20px;">добавить новость</span>
    <a class="btn btn-success" href="{{route('help.create')}}" role="button">добавить</a></div>
<table>
    @foreach($all as $constant)
        <tr>
            <td>{{$constant->id}}</td>
            <td>{{$constant->help}}</td>
            <td>{{$constant->message}}</td>
            <td>
                <a class="btn btn-success" href="{{ route('help.edit', $constant->id) }}">Редактировать</a></td>

            <td><form action="{{ route('help.destroy', $constant->id) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-success" type="submit" >Удалить</button>
                </form>
            </td>
        </tr>

    @endforeach


</table>
