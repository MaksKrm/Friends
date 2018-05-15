<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Главная</title>
    <link rel="stylesheet" href="{{ asset('css/styles.min.css') }}">
</head>
<body>
<header class="site-header">
    <div class="container">
    </div>
</header>
<div class="container">
    <div class="row">
        @foreach($informations as $information)
            <div>
				<h2>{{$information->tittle}}</h2>
				<div style="max-width: 200px;">
					<p><img class="card-img-top" src="{{asset('file/'.$information->file)}}"></p>
				</div>
				<div>
					<p>{{$information->article}}.</p>
					
				</div>
            </div>
        @endforeach
    </div>
    {{$informations->links()}}
</div>
</body>
</html>