@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Новости</div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            @foreach ($news as $article)
                                <div class="col-md-12">
                                    <div class="card flex-md-row mb-4 box-shadow h-md-250">
                                        <div class="card-body d-flex flex-column align-items-start">
                                            <strong class="d-inline-block mb-2 text-primary">{{ $article->updated_at }}</strong>
                                            <h3 class="mb-0">
                                                <a class="text-dark"
                                                   href="{{ route('admin.news.show', $article->id) }}">{{ $article->title }}</a>
                                            </h3>
                                            <div class="mb-1 text-muted">{{ $article->title }}</div>
                                            <p class="card-text mb-auto">{{$article->article }}</p>
                                            <a href="{{ route('admin.news.show', $article->id) }}">Открыть</a>
                                            <form action="{{ route('admin.news.destroy', $article->id) }}" method="POST">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button type="submit" class="btn btn-danger">Удалить</button>
                                            </form>
                                        </div>
                                        <img class="card-img-right flex-auto d-none d-md-block"
                                             data-src="holder.js/200x250?theme=thumb"
                                             alt="Thumbnail [200x250]"
                                             style="width: auto; max-height: 250px;"
                                             src="{{ asset("storage/$article->file")  }}" data-holder-rendered="true">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
