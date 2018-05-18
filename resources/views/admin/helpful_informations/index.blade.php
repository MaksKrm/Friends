@extends('layouts.app')
 
@section('content')
    @if (Session::has('message'))
		<div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Заголовок</th>
				<th scope="col">Текст</th>
				<th scope="col">Изображение</th>
				<th scope="col">Дата создания</th>
				<th scope="col">Действия</th>
			</tr>
		</thead>
		<tbody>
			@foreach($helpful_informations as $helpful_information)
			<tr>
				<th scope="row">{{$helpful_information->id}}</th>
				<td><a href="/helpful_informations/{{$helpful_information->id}}">{{$helpful_information->tittle}}</a></td>
				<td>{{$helpful_information->article}}</td>
				<td><img class="card-img-right flex-auto d-none d-md-block"
                    data-src="holder.js/200x250?theme=thumb"
                    alt=""
                    style="width: auto; max-height: 100px; max-width: 100px;"
                    src="{{ asset("storage/$helpful_information->file")  }}" data-holder-rendered="true"></td>
				<td>{{$helpful_information->created_at->toFormattedDateString()}}</td>
				<td>
				<div class="btn-group" role="group" aria-label="Basic example">
					<a href="{{ URL::to('helpful_informations/' . $helpful_information->id . '/edit') }}">
						<button type="button" class="btn btn-warning">Редактировать</button>
					</a>&nbsp;
					<form action="{{url('helpful_informations', [$helpful_information->id])}}" method="POST">
						<input type="hidden" name="_method" value="DELETE">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="submit" class="btn btn-danger" value="Удалить"/>
					</form>
				</div>
				</td>
			</tr>
            @endforeach
			</tbody>
    </table>
	<a href="{{route('helpful_informations.create')}}" class="btn btn-success">
		<button type="button" class="btn btn-success">Добавить</button>
	</a>
@endsection