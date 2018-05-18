<nav class="navbar navbar-expand-md navbar-light">
    <button class="navbar-toggler mb-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse links" id="navbarSupportedContent">
        <ul class="navbar-nav menu">
            <li class="active"><a href="#">Главная <span class="sr-only">(current)</span></a></li>
            <li><a href="{{route('index')}}">Полезная информация</a></li>
            <li><a href="#">Помощь</a></li>
            <li><a href="{{route('animals.index')}}">Ищут хозяев</a></li>
            <li><a href="#">Отчётность</a></li>
            <li><a href="#">Контакты</a></li>
        </ul>
    </div>
</nav>