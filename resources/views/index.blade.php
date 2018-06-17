@extends('layouts.main')

@section('content')

    <!-- Slider -->
    <div class="slider">
        <div class="container">
            <ul class="slides">
                <li>
                    <div class="item">
                        <span>{{ $animalsCount }}животных</span><br/>находятся в приюте
                        <img src="/img/slider_1.png" alt="Количество животных в приюте Друг"/>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <span>11 животных</span><br/>нашли свой дом
                        <img src="/img/slider_0.png" alt="Животные благотворительного фонда Друг"/>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- Slider Ends! -->

    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-12 volunteer fadeInLeft wow">
                    <h1>Благотворительный фонд "Друг" Краматорск</h1>
                    <p>
                        <strong>Благотворительный фонд "Друг"</strong>  - организация единомышленников-волонтеров,
                        которые работают над решением проблемы бездомных животных. Мы отдаем своему делу огромное
                        количество времени, энергии и любви.<em>"Друг"</em> продвигает идеи гуманного отношения,
                        прикладывая огромные усилия, активно работая с 2011 года.
                    </p>
                    <p>
                        Мы спасли, вылечили, стерилизовали и отдали в семьи несколько тысяч кошек и собак.
                        Мы неоднократно привлекали внимание общественности, власти - к проблеме брошеных на произвол
                        судьбы питомцам, путем резонансных публикаций в СМИ, на широких круглых столах и депутатских
                        комиссиях. Вместе добились принятия «Программы регуляции численности бездомных животных
                        гуманными методами на 2018-2020гг» в Краматорске. В 2017 мы запустили «Уроки добра» во
                        всех школах города. Провели много акций общегородского масштаба для популяризации отзывчивого
                        отношения к нашим маленьким друзьям.
                    </p>
                    <p>
                        <em>Фонд "Друг"</em> осуществляет свою деятельность за счет собственных средств и пожертвований
                        горожан, приветствуеься любая помощь и поддержка.
                        Присоединяйтесь к нам, добро делать легко! Особенно, когда видишь ответное счастье сияющих глаз
                        наших маленьких питомцев!
                    </p>
                </div>
            </div>
            <!-- Volunteer -->
        </div>
        <div class="donate">
            <img src="/img/paws-0.png" class="volunteer-image wow flip" alt="">
        </div>
        <div class="educate news__main">
            <div class="container">
                <p class="title">Последние новости</p>
                <h3>Наша миссия - дарить любовь и теплоту тем, кто этого так жаждет</h3>
                <div class="row mb-2">
                    @foreach ($news as $article)
                        <div class="col-md-6">
                            <div class="card fadeInRight wow flex-md-row mb-4 box-shadow h-md-250">
                                {{--       <img class="card-img-right flex-auto d-none d-lg-block"
                                            alt="Фото новости"
                                            src="{{ asset("storage/$article->file")  }}"
                                            data-holder-rendered="true">--}}
                                <img class="card-img-right flex-auto d-none d-lg-block"
                                     alt="Фото новости"
                                     src="{{ $article->file }}"
                                     data-holder-rendered="true">
                                <div class="card-body d-flex flex-column align-items-start">
                                    <strong class="d-inline-block mb-2 text-primary">{{ date( "d.m.Y", strtotime($article->created_at) ) }}</strong>
                                    <h3>
                                        <a class="text-dark news__title"
                                           href="{{route('news.show',$article->id)}}">{{ $article->title }}</a>
                                    </h3>
                                    <p class="news__text card-text mb-2 truncate">{{ str_limit($article->text, $limit = 100, $end = '...') }}</p>
                                    <a href="{{route('news.show',$article->id)}}">Читать далее</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row justify-content-end">
                    <a class="news__link_all" href="{{ route('news.index')}}">Все новости</a>
                </div>
            </div>
        </div>
        <div class="page top-pattern">
            <div class="container">
                <div class="adopt">
                    <p class="title">Реквизиты для оказания финансовой помощи
                        <span>карта Приватбанка Черкасова Кирина Анатольевна</span></p>
                    <h3>5168 7573 0988 6267</h3>
                </div>
            </div>
        </div>
    </div>

@endsection
