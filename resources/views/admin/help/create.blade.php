@extends('adminlte::page')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3> Добавление необходимой помощи</h3>
                <div class="card">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form method="post" action="{{route('help.store')}}">
                                {{ csrf_field() }}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input type="hidden" name="id">
                                </div>
                                <div class="form-group">
                                    <label for="inputHelp">Вид помощи</label>
                                    <input type="text" class="form-control" id="inputHelp" name="help"
                                           placeholder="Название темы" required>
                                </div>
                                <div class="form-group">
                                    <label for="inputContacts">Контакты</label>
                                    <input type="text" class="form-control" id="inputContacts" name="contact"
                                           placeholder="Введите ваши контакты" required>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Описание</label>
                                    <textarea class="form-control" name="message" id="exampleFormControlTextarea1"
                                              rows="3"></textarea>
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