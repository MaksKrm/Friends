@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Создать новую новость</h3>
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form method="post" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id">
                                </div>
                                <div class="form-group">
                                    <label for="inputTitle">Название новости</label>
                                    <input type="text" class="form-control" id="inputTitle" name="title"
                                           placeholder="Название новости">
                                </div>
                                @if ($errors->first('title'))
                                    <div class="alert alert-danger">{{  $errors->first('title') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Описание новости</label>
                                    <textarea class="form-control" name="text" id="exampleFormControlTextarea1"
                                              rows="3"></textarea>
                                </div>
                                @if ($errors->first('text'))
                                    <div class="alert alert-danger">{{  $errors->first('text') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="inputFile">Загрузить файл</label>
                                    <input type="file" id="inputFile" name="file"/>
                                </div>
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
