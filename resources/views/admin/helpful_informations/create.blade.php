@extends('layouts.admin.app')
 
@section('content')
    <h1>Добавить информацию</h1>
    <hr>
    <form action="/helpful_informations" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="tittle">Заголовок</label>
			<input type="text" class="form-control" id="helpful_informationTitle"  name="tittle">
		</div>
		<div class="form-group">
			<label for="article">Текст</label>
			<textarea name="article" class="form-control" rows="10"></textarea>
		</div>
		<div class="form-group">
			<label for="image">Выбрать изображение</label>
			<input type="file" name="file" id="image">
		</div>
		@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
		@endif
		<button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection