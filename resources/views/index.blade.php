@extends('layouts.main')

@section('content')

    <!-- Slider -->
    <div class="slider">
        <div class="container">
            <ul class="slides">
                <li>
                    <div class="item">
                        <span>46 животных</span><br/>находятся в приюте
                        <img src="/img/slider_1.png" alt=""/>
                    </div>
                </li>
                <li>
                    <div class="item">
                        <span>11 животных</span><br/>нашли свой дом
                        <img src="/img/slider_0.png" alt=""/>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <!-- Slider Ends! -->

    <div class="page">
        <div class="container">
            <div class="row">
                <div class="col-12 volunteer">
                    <p class="title">наша дружная команда</p>
                    <h3>Благотворительный фонд "Друг"</h3>
                    <p>Благотворительный фонд "ДРУГ"- это не приют. Это единомышленники - волонтёры, которые в силу
                        возможностей помогают животным.</p>
                    <p>В этой группе мы предлагаем объединиться всем Краматорчанам, которые не равнодушны к проблеме
                        бездомных и брошенных животных, а также животных, подвергшихся жестокому обращению.</p>
                    <p>Мы создали в Краматорске Общество Защиты Животных и и планируем изменить отношение к животным на
                        общегородском уровне через привлечение городских властей, а не только неравнодушных горожан. Задача
                        не из легких, но мы верим, что, действуя сообща, добьемся успеха!</p>
                </div>
            </div>
            <!-- Volunteer -->
        </div>
        <div class="donate">
            <img src="/img/paws-0.png" class="volunteer-image" alt="">
        </div>
        <div class="educate">
            <div class="container">
                <p class="title">Последние новости</p>
                <h3>Наша миссия - дарить любовь и теплоту тем, кто этого так жаждет</h3>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">15 мая 2018</strong>
                                <h3>
                                    <a class="text-dark news__title" href="#">Потерялась кошечка</a>
                                </h3>
                                <p class="card-text mb-auto">У моей подружки потерялась кошечка. Она несла её на руках,
                                    а та чего-то испугалась и вырвалась. На улице никогда не была...</p>
                                <a href="#">Читать далее</a>
                            </div>
                            <img class="card-img-right flex-auto d-none d-lg-block"
                                 alt="Thumbnail [200x250]"
                                 src="/img/news_post-1.jpg"
                                 data-holder-rendered="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">15 мая 2018</strong>
                                <h3>
                                    <a class="text-dark news__title" href="#">Нужна помощь! Сбили собак</a>
                                </h3>
                                <p class="card-text mb-auto">Вчера вечером раздался звонок-на Ясной Поляне сбили 2х
                                    собак,одну насмерть,а вторая еще живая...</p>
                                <a href="#">Читать далее</a>
                            </div>
                            <img class="card-img-right flex-auto d-none d-lg-block"
                                 alt="Thumbnail [200x250]"
                                 src="/img/news_post-2.jpg"
                                 data-holder-rendered="true">
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">15 мая 2018</strong>
                                <h3>
                                    <a class="text-dark news__title" href="#">Потерялась кошечка</a>
                                </h3>
                                <p class="card-text mb-auto">У моей подружки потерялась кошечка. Она несла её на руках,
                                    а та чего-то испугалась и вырвалась. На улице никогда не была...</p>
                                <a href="#">Читать далее</a>
                            </div>
                            <img class="card-img-right flex-auto d-none d-lg-block"
                                 alt="Thumbnail [200x250]"
                                 src="/img/news_post-1.jpg"
                                 data-holder-rendered="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">15 мая 2018</strong>
                                <h3>
                                    <a class="text-dark news__title" href="#">Потерялась кошечка</a>
                                </h3>
                                <p class="card-text mb-auto">У моей подружки потерялась кошечка. Она несла её на руках,
                                    а та чего-то испугалась и вырвалась. На улице никогда не была...</p>
                                <a href="#">Читать далее</a>
                            </div>
                            <img class="card-img-right flex-auto d-none d-lg-block"
                                 alt="Thumbnail [200x250]"
                                 src="/img/news_post-1.jpg"
                                 data-holder-rendered="true">
                        </div>
                    </div>
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
