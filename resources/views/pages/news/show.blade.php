@extends('layouts.main')

@section('content')
    <style>
        .wrapper {
            background: #009a3e url(../img/paw_pattern.png);
            color: #1d2124;
            margin-top: -18px;
            padding: 90px 0;
        }

        .card {
            border-radius: unset;
        }

        .news-show_img img {
            width: 100%;
        }
    </style>
    <div class="wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-body">
                        <div class="row flex-md-row justify-content-start ml-1">
                            <div class="col-lg-9 col-md-7 col order-12">
                                <div class="d-flex justify-content-md-start mb-3">
                                    <span>Новость от {{ date( "d.m.Y", strtotime($article->created_at) ) }}</span>
                                </div>
                                <h2 class="card-title"> {{ $article->title }}</h2>
                                <p class="card-text">{{ $article->text }}</p>
                            </div>
                            <div class="col-lg-3 col-md-5 col order-1 news-show_img">
                                <img class="card-img-left flex-auto d-md-block"
                                     alt="Фото новости"
                                     src="{{ asset("storage/$article->file")  }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
