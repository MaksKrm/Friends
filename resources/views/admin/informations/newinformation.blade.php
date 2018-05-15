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
	<div class="col-md-7">
		<h2>Добавление информации</h2><br>
        <form method="post" action="{{route('newinformation')}}" enctype="multipart/form-data">
            {!! csrf_field() !!}
			<div class="form-group">
				<div class="col-md-3">
					Заголовок:
				</div>
				<div class="col-md-9">
					<input type="text" name="tittle" class="form-control" required>
				</div>
			</div>
						
			<div class="form-group">
				<div class="col-md-3">
					Описание:
				</div>
				<div class="col-md-9">
					<textarea name="article" class="form-control" rows="10" required></textarea>
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-3">
					Выбрать изображнение:
				</div>
				<div class="col-md-9">
					<input type="file" name="file" id="image">
				</div>
			</div>
			
			<div class="form-group">
				<div class="col-md-9 col-md-offset-3">
					<br><button type="submit" class="btn btn-primary">Добавить</button>
				</div>
			</div>
		</form>
    </div>
</div>
</body>
</html>