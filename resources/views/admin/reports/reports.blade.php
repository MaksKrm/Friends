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
        <div>
            <form action="{{ route('import') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                Выберите файл excel : <input type="file" name="file">
                <input type="submit" value="загурузить">
            </form>
        </div>

        <div>
            <a href="https://drive.google.com/drive/folders/1gSe9RiAnykSadviPL-qJOiEWR-zIVnMP" target="_blank"> загрузить фото отчет</a>
        </div>

@endsection