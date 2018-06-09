<nav class="navbar navbar-expand-md navbar-light">
    <button class="navbar-toggler mb-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse links" id="navbarMainMenu">
        <ul class="navbar-nav menu">
            <li><a class="active" href="{{route('index')}}">Главная <span class="sr-only">(current)</span></a></li>
            <li><a href="{{route('information.index')}}">Полезная информация</a></li>
            <li><a href="{{route('help')}}">Помощь</a></li>
            <li><a href="{{route('pets.index')}}">Ищут хозяев</a></li>
            <li><a href="{{route('reports')}}">Отчётность</a></li>
            <li><a href="{{route('contacts')}}">Контакты</a></li>
        </ul>
    </div>
</nav>