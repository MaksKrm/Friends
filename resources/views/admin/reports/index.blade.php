@extends('adminlte::page')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <meta name="csrf-token" content="{{ csrf_token() }}"/>
                        <h3 class="box-title">Отчеты на гугл диске</h3>
                        <button onclick="createReport()" class="btn btn-default pull-right" data-toggle="modal"
                                data-target="#modal-update">Создать
                            Отчет <i class="fa fa-plus"></i></button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                    <tr>
                                        <th class="col-xs-1">id</th>
                                        <th class="col-xs-2">создан</th>
                                        <th class="col-xs-4">сообщение</th>
                                        <th class="col-xs-3">имя файла</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($files as $file)
                                        <tr>
                                            <th scope="row">{{ $file->id }}</th>
                                            <td>{{ $file->created_at }}</td>
                                            <td>{{ $file->message }}</td>
                                            <td>{{ $file->file_name }}</td>
                                            <td>
                                                <button type="button" onclick="deleteReport({{ $file->id }})"
                                                        class="btn btn-default" data-toggle="modal"
                                                        data-target="#modal-update">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{$files->links()}}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <div class="box">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-8">
                                <h3>Создать новый отчет из файла excel</h3>
                                <div class="card">
                                    <div class="row justify-content-center">
                                        <div class="col-md-8">
                                            <form method="post" action="{{ route('import') }}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                    <label for="excel">Загрузить файл excel</label>
                                                    <input type="file" id="excel" name="excel" required>
                                                </div>
                                                @if ( Session::has('success') )
                                                    <div class="alert alert-success alert-dismissible" role="alert">
                                                        <strong>{{ Session::get('success') }}</strong>
                                                    </div>
                                                @endif

                                                @if ( Session::has('error') )
                                                    <div class="alert alert-error alert-dismissible" role="alert">
                                                        <strong>{{ Session::get('error') }}</strong>
                                                    </div>
                                                @endif

                                                @if ($errors->first('excel'))
                                                    <div class="alert alert-danger">{{  $errors->first('excel') }}</div>
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
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <div id="modal-update" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <script src="{{ asset('js/admin/reports/ajax_reports.js') }}"></script>
@endsection
