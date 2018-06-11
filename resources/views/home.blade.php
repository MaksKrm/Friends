@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <div class="jumbotron">
        <h1 class="display-4">Добро пожаловать!</h1>
        <p class="lead">Админ-панель благотворительного фонда "Друг"</p>
        <hr class="my-4">
        <p>Здесь Вы можете регулировать наполнение сайта контентом.</p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ route('admin.news.index') }}" role="button">Приступить</a>
        </p>
    </div>
@stop

@section('content')
@stop