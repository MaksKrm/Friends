@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Создать новый отчет</h3>
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form method="post" action="{{ route('reports.store') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="hidden" name="id">
                                </div>
                                <div class="form-group">
                                    <label for="message">Название файла отчета</label>
                                    <input type="text" class="form-control" id="message" name="message"
                                           placeholder="отчет за май месяц" required>
                                </div>
                                @if ($errors->first('message'))
                                    <div class="alert alert-danger">{{  $errors->first('message') }}</div>
                                @endif
                                <div class="form-group">
                                    <label for="file_name">Загрузить файл</label>
                                    <input type="file" id="file_name" name="file_name" required>
                                </div>
                                @if ($errors->first('file_name'))
                                    <div class="alert alert-danger">{{  $errors->first('file_name') }}</div>
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
