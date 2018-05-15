<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Главная</title>
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header class="site-header">
	
</header>
<div class="container">
	<table class="table table-bordered">
			<thead>
				<tr>
					<th>Изображение</th>
					<th>Заголовок</th>
					<th>Описание</th>
					<th>Редактировать</th>
					<th>Удалить</th>
				</tr>
			</thead>
			<tbody>
			@foreach($informations as $information)
				<tr>
					<td style="width: 200px;" >
						@empty(!$information->file)
							<img class="mw-100" src="{{asset('file/'.$information->file)}}">
							@else
						@endempty
					</td>
					<td>{{$information->tittle}}</td>
					<td>{{$information->article}}</td>
					<td>
						<a href="{{route('edit', ['id' => $information->id]) }}" class="btn btn-info">Редактировать</a>
					</td>
					<td>
						<a href="{{route('delete', $information->id)}}" class="btn btn-danger">Удалить</a>
					</td>
				</tr>
			@endforeach
			</tbody>
			{{$informations->links()}}
	</table>
	<a href="{{route('newinformation')}}" class="btn btn-primary">Добавить</a>
</div>
</body>
</html>