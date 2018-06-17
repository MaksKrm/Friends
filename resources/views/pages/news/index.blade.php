@extends('layouts.main')

@section('content')
    <style>
        .educate {
            margin-top: -18px;
            padding-top: 90px;
        }

        .success-story h2, .success-story h3, .educate h2, .educate h3 {
            color: #fff;
        }

        .news__text {
            padding-bottom: 15px;
        }

        .card img {
            padding: 2%;
            max-height: 250px;
            width: auto;
        }
    </style>
    <div class="educate">
        <div class="container">
            <p class="title">Новости</p>
            <h3>События из жизни нашего фонда</h3>
            <div class="row mb-2">
                @foreach ($news as $article)
                    <div class="col-md-10">
                        <div class="card flipInX wow flex-md-row mb-4 box-shadow h-md-250">
                        {{--    <img class="card-img-right flex-auto d-none d-lg-block"
                                 alt="Фото новости"
                                 src="{{ asset("storage/$article->file")  }}"
                                 data-holder-rendered="true">--}}
                            <a href="{{route('news.show',$article->id)}}" >
                                <img class="card-img-right flex-auto d-none d-lg-block"
                                     alt="Фото новости"
                                     src="{{ $article->file }}"
                                     data-holder-rendered="true">
                            </a>
                            <div class="card-body d-flex flex-column align-items-start">
                                <strong class="d-inline-block mb-2 text-primary">{{ date( "d.m.Y", strtotime($article->created_at) ) }}</strong>
                                <h3>
                                    <a class="text-dark news__title" href="{{route('news.show',$article->id)}}">{{ $article->title }}</a>
                                </h3>
                                <p class="news__text card-text mb-auto">{{ str_limit($article->text, $limit = 200, $end = '...') }}</p>
                                <a href="{{route('news.show',$article->id)}}">Читать далее</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="page top-pattern">
        <div class="container j">
            <div class="row justify-content-center">
                {{ $news->links() }}
            </div>
        </div>
    </div>
@endsection
