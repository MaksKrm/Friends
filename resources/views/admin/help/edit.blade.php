@extends('adminlte::page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>Редактирование помощи</h3>
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form method="post" action="{{ route('help.update', $help->id) }}">
                                <input type="hidden" name="_method" value="PATCH">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id" value="{{ $help->id }}">
                                <div class="form-group">
                                    <label for="inputHelp">Вид помощи</label>
                                    <input type="text" class="form-control" id="inputHelp" name="help"
                                           placeholder="name" value="{{ $help->help }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputContacts">Контакты</label>
                                    <input type="text" class="form-control" id="inputContacts" name="contact"
                                           value="{{ $help->contact }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Описание</label>
                                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1"
                                              rows="3">{{ $help->message }}</textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Добавить</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection