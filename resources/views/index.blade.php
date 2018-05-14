@extends('layouts.app')

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
            <!-- Volunteer -->
            <div class="volunteer">
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
        <div class="donate">
            <img src="/img/paws-0.png" class="volunteer-image" alt="">
        </div>
        <!-- <div class="educate">
            <div class="container">
                <p class="title">Последние новости</p>
                <h3>Our mission, providing a home away from</h3>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">World</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="#">Featured post</a>
                                </h3>
                                <p class="card-text text-dark mb-auto">This is a wider card with supporting text below
                                    as a natural lead-in to additional content.</p>
                                <a href="#" class="text-dark">Continue reading</a>
                            </div>
                            <img class="card-img-right flex-auto d-none d-lg-block"
                                 data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]"
                                 style="width: 200px; height: 250px;"
                                 src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1635dddb337%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1635dddb337%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.203125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                 data-holder-rendered="true">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 box-shadow h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-success">Design</strong>
                                <h3 class="mb-0">
                                    <a class="text-dark" href="#">Post title</a>
                                </h3>
                                <p class="card-text mb-auto">This is a wider card with supporting text below as a
                                    natural lead-in to additional content.</p>
                                <a href="#">Continue reading</a>
                            </div>
                            <img class="card-img-right flex-auto d-none d-lg-block"
                                 data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]"
                                 src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1635dddb33c%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1635dddb33c%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.203125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                 data-holder-rendered="true" style="width: 200px; height: 250px;">
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-md-6">
                            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                <div class="card-body d-flex flex-column align-items-start">
                                    <strong class="d-inline-block mb-2 text-primary">World</strong>
                                    <h3 class="mb-0">
                                        <a class="text-dark" href="#">Featured post</a>
                                    </h3>
                                    <p class="card-text text-dark mb-auto">This is a wider card with supporting text
                                        below as a natural lead-in to additional content.</p>
                                    <a href="#" class="text-dark">Continue reading</a>
                                </div>
                                <img class="card-img-right flex-auto d-none d-lg-block"
                                     data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]"
                                     style="width: 200px; height: 250px;"
                                     src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1635dddb337%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1635dddb337%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.203125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                     data-holder-rendered="true">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                <div class="card-body d-flex flex-column align-items-start">
                                    <strong class="d-inline-block mb-2 text-success">Design</strong>
                                    <h3 class="mb-0">
                                        <a class="text-dark" href="#">Post title</a>
                                    </h3>
                                    <p class="card-text mb-auto">This is a wider card with supporting text below as a
                                        natural lead-in to additional content.</p>
                                    <a href="#">Continue reading</a>
                                </div>
                                <img class="card-img-right flex-auto d-none d-lg-block"
                                     data-src="holder.js/200x250?theme=thumb" alt="Thumbnail [200x250]"
                                     src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22200%22%20height%3D%22250%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20200%20250%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_1635dddb33c%20text%20%7B%20fill%3A%23eceeef%3Bfont-weight%3Abold%3Bfont-family%3AArial%2C%20Helvetica%2C%20Open%20Sans%2C%20sans-serif%2C%20monospace%3Bfont-size%3A13pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_1635dddb33c%22%3E%3Crect%20width%3D%22200%22%20height%3D%22250%22%20fill%3D%22%2355595c%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2256.203125%22%20y%3D%22131%22%3EThumbnail%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E"
                                     data-holder-rendered="true" style="width: 200px; height: 250px;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 news__item">
                            <header><h3>Featured Pooch</h3></header>
                            <div class="news__item_block">
                                <img src="/img/news_post-1.jpg" alt="featured" class="img-rounded thumb">
                                <div class="news__item_text">
                                    <h3>"I'd make a great pet... I promise!"</h3>
                                    <p>What efffise can you say about this cute little creature!. We just rescued from the
                                        animal shelter and we're hoping to fing her a great home! Stop by the shop and come
                                        pet met...</p>
                                    <div class="foot">Posted 17 Jul 2013 <i class="icon-dot"></i> By Chris Patterson <span
                                                class="label label-default">Featured</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
@endsection
