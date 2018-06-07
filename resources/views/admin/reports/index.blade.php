@extends('adminlte::page')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Отчеты на гугл диске</h3>
                        <a class="btn btn-default pull-right"
                           href="{{route('reports.create')}}">Добавить файлы отчетов <i class="fa fa-plus"></i></a>
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
                                                <button type="button" class="btn btn-default" data-toggle="modal"
                                                        data-target="#exampleModal{{ $file->id }}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $file->id }}"
                                                     tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h4 class="modal-title">Удаление просьбы о помощи</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                Вы уверены, что хотите удалить данный отчет?
                                                                <div>"{{ $file->message }}"</div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('reports.destroy', $file->id) }}"
                                                                      method="POST">
                                                                    {!! csrf_field() !!}
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Закрыть
                                                                    </button>
                                                                    <button type="submit" class="btn btn-primary">
                                                                        Удалить
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
@endsection
