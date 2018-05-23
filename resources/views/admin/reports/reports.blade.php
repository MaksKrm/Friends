@extends('adminlte::page')

@section('content')
    <div>
        @if ( Session::has('success') )
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ Session::get('success') }}</strong>
            </div>
        @endif
        @if ( Session::has('error') )
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>{{ Session::get('error') }}</strong>
            </div>
        @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                <div>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif
        <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}" id="div_file">
                <div class="col-md-4">
                    Выберите файл excel : <input type="file" name="file">
                    <span class="help-block">
                <strong>{{ $errors->first('file') }}</strong>
            </span>
                </div>
            </div>
            <div class="form-group{{ $errors->has('main_foto') ? ' has-error' : '' }}" id="div_main_foto">
                <label for="main_foto">Главное фото: * </label>
                <div class="col-md-4">
                    <input type="file" name="main_foto" id="main_foto" class="form-control">
                    <span class="help-block">
                <strong>{{ $errors->first('main_foto') }}</strong>
            </span>
                </div>
            </div>
            <input type="submit" style="margin-top: 3%">
        </form>
    </div>
@endsection

