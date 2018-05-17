@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Изменить новость</h3>
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form method="post" action="{{ route('admin.news.update', $article->id) }}"
                                  enctype="multipart/form-data">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <div class="form-group">
                                    <label for="inputTitle">Название новости</label>
                                    <input type="text" class="form-control" id="inputTitle" name="title"
                                           placeholder="Название новости" value="{{ $article->title  }}">
                                </div>
                                @if ($errors->first('title'))
                                    <div class="alert alert-danger">{{  $errors->first('title') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Описание новости</label>
                                    <textarea class="form-control" name="article" id="exampleFormControlTextarea1"
                                              rows="3">{{ $article->article }}</textarea>
                                </div>
                                @if ($errors->first('article'))
                                    <div class="alert alert-danger">{{  $errors->first('article') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="inputFile">Загрузить файл</label>
                                    <input type="file" id="inputFile" name="file"/>
                                </div>
                                <input type="hidden" name="file" value="{{ $article->file }}">
                                @if ($errors->first('file'))
                                    <div class="alert alert-danger">{{  $errors->first('file') }}</div>
                                @endif
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Отправить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
