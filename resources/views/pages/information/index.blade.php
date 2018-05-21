@extends('layouts.main')

@section('content')
    <style>
        .success-story {
            margin-top: -15px;
        }

        .mission .card {
            border-radius: 0;
        }

        .mission .card img {
            padding: 2%;
            max-height: 250px;
            height: auto;
            max-width: 250px;
        }
    </style>
    <div class="success-story testimonials">
        <div class="container">
            <p class="title">афоризмы о животных</p>
            <div class="flex-viewport" style="overflow: hidden; position: relative;">
                <ul style="width: 800%; transition-duration: 1.2s; transform: translate3d(-1920px, 0px, 0px);">
                    <li class="clone" style="width: 960px; float: left; display: block;">
                        <h3>"Кто кормит голодное животное, тот питает свою собственную душу. "</h3>
                        <span>- Чарли Чаплин</span>
                    </li>
                    <li class="clone" aria-hidden="true" style="width: 960px; float: left; display: block;">
                        <h3>"СОБАКА — единственное существо на этой планете, которое любит вас больше, чем себя."</h3>
                        <span>- Джош Биллингс</span>
                    </li>
                    <li class="" style="width: 960px; float: left; display: block;">
                        <h3>"Бог создал кошку, чтобы у человека был тигр, которого можно погладить."</h3>
                        <span>- Виктор Гюго</span>
                    </li>
                    <li class="flex-active-slide" style="width: 960px; float: left; display: block;">
                        <h3>"У собак лишь один недостаток – они верят людям."</h3>
                        <span>- Элиан Дж. Финберт</span>
                    </li>
                    <li class="clone" aria-hidden="true" style="width: 960px; float: left; display: block;">
                        <h3>"Собака так преданна, что даже не веришь в то, что человек заслуживает такой любви."</h3>
                        <span>- Илья Ильф</span>
                    </li>
                    <li class="clone" style="width: 960px; float: left; display: block;">
                        <h3>"Собаки тоже смеются, только они смеются хвостом."</h3>
                        <span>- Макс Истман</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="page">
        <div class="container">
            <div class="mission">
                <p class="title">интересно знать</p>
                <h2>полезная информация о наших любимцах</h2>
                <p>В данном блоке Вы найдёте полезные советы, информацию об уходе, жизни и нравах братьев наших меньших.</p>
                <div class="row mt-5 mb-2">
                    @foreach ($information as $article)
                        <div class="col-md-10">
                            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                               {{-- <img class="card-img-right flex-auto d-none d-lg-block"
                                     alt="Фото новости"
                                     src="{{ asset("storage/$article->file")  }}"
                                     data-holder-rendered="true">--}}
                                <img class="card-img-right flex-auto d-none d-lg-block"
                                     alt="Фото новости"
                                     src="{{ $article->file }}"
                                     data-holder-rendered="true">
                                <div class="card-body d-flex flex-column align-items-start">
                                    <h3>
                                        <a class="text-dark news__title"
                                           href="/helpful_informations/{{ $article->id}}">{{ $article->tittle }}</a>
                                    </h3>
                                    <p class="news__text card-text mb-2">{{ $article->article }}</p>
                                    <a href="/helpful_informations/{{$article->id}}">Читать далее</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row justify-content-center">
                {{ $information->links() }}
            </div>
        </div>
    </div>
@endsection
