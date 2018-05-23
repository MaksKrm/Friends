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
    </style>
    <div class="wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-body">
                            <div class="row flex-md-row justify-content-start ml-1">
                                <div class="col-md-8">
                                    <div class="d-flex justify-content-md-start mb-3">
                                        <span>Статья от {{ date( "d.m.Y", strtotime($article->created_at) ) }}</span>
                                    </div>
                                    <h2 class="card-title"> {{ $article->tittle }}</h2>
                                    <p class="card-text mt-3">{{ $article->article }}</p>
                                </div>
                                <div class="col-md-4">
                                    <img class="card-img-right flex-auto d-none d-md-block"
                                         data-src="holder.js/200x250?theme=thumb"
                                         alt="Thumbnail [200x250]"
                                         src="{{ $article->file}}">
                                </div>
                            </div>
                            <hr>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
