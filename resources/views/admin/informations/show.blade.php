@extends('adminlte::page')
 
@section('content')
    <h1>Просмотр информации</h1>
 
    <div class="jumbotron text-left">
        <p>
			<h3>Заголовок:</h3> {{ $information->tittle }}<br>
            <h3>Текст:</h3> {{ $information->article }}<br>
            <h3>Изображение:</h3>
			<img class="card-img-right flex-auto d-none d-md-block"
                data-src="holder.js/200x250?theme=thumb"
                alt=""
                style="width: auto; max-height: 250px;"
                src="{{ asset("storage/$information->file")  }}" data-holder-rendered="true">
        </p>
    </div>
@endsection