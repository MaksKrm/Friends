@extends('layouts.main')

@section('content')
    <div class="success-story testimonials">
        <div class="container">
            <p class="title">афоризмы о животных</p>
            <div class="flex-viewport" style="overflow: hidden; position: relative;">
                <ul class="" style="width: 800%; transition-duration: 1.2s; transform: translate3d(-1920px, 0px, 0px);">
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
            <div class="volunteer goods__block_inform">
                <p class="title">товары нашего фонда</p>
                <h3>Ярмарка добра</h3>
                <p>Приобретая товар вы вносите свой весомый вклад в развитие фонда</p>
                <div class="volunteers mb-3">
                    <div class="flex-viewport goods__box_inform">
                        <ul class="goods__list_inform">
                            @foreach ($goods as $good)
                                <li style="float: left; display: block; width: 260px;">
                                    <div>
                                        {{--  <img src="{{ asset("storage/$good->photo")  }}" alt="Фото товара" draggable="false">--}}
                                        <img src="{{ $good->photo }}" alt="" draggable="false">
                                    </div>
                                    <strong class="goods__title_inform">{{ $good->title }}</strong>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="button-holder d-flex justify-content-center">
                    <a href="{{ route('shop.index')}}" class="goods__btn_inform">Попасть на ярмарку</a>
                </div>
            </div>
            <div class="mission mt-3">
                <p class="title">интересно знать</p>
                <h2>полезная информация о наших любимцах</h2>
                <p>В данном блоке Вы найдёте полезные советы, информацию об уходе, жизни и нравах братьев наших
                    меньших.</p>
                <div class="row mt-5 mb-2">
                    @foreach ($information as $article)
                        <div class="col-md-10">
                            <div class="card fadeInUp wow flex-md-row mb-4 box-shadow h-md-250">
                                {{--  <img class="card-img-right flex-auto d-none d-lg-block"
                                       alt="Фото информации"
                                       src="{{ asset("storage/$article->file")  }}"
                                       data-holder-rendered="true">--}}
                                <img class="card-img-right flex-auto d-none d-lg-block"
                                     alt="Фото информации"
                                     src="{{ $article->file  }}"
                                     data-holder-rendered="true">
                                <div class="card-body d-flex flex-column align-items-start">
                                    <h3>
                                        <a class="text-dark news__title"
                                           href="{{route('information.show',$article->id)}}">{{ $article->tittle }}</a>
                                    </h3>
                                    <p class="news__text card-text mb-3">{{ str_limit($article->article, $limit = 300, $end = '...') }}</p>
                                    <a href="{{route('information.show', $article->id)}}">Читать далее</a>
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
    <script>

    </script>
@endsection
