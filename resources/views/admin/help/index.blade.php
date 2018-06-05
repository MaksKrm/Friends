@extends('adminlte::page')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Необходимая помощь</h3>
                        <a class="btn btn-default pull-right"
                           href="{{route('help.create')}}">Добавить просьбу о помощи <i class="fa fa-plus"></i></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                    <tr>
                                        <th class="col-xs-1">id</th>
                                        <th class="col-xs-2">Тема просьбы</th>
                                        <th class="col-xs-4">Текст</th>
                                        <th class="col-xs-3">Контакты</th>
                                        <th class="col-xs-1"></th>
                                        <th class="col-xs-1"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($helps as $help)
                                        <tr>
                                            <th scope="row">{{ $help->id }}</th>
                                            <td>{{ $help->help }}</td>
                                            <td>{{ $help->message }}</td>
                                            <td>{{ $help->contact }}</td>
                                            <td>
                                                <a href="{{ route('help.edit', $help->id) }}"
                                                   class="btn btn-default"><i
                                                            class="fa fa fa-pencil"></i></a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-default" data-toggle="modal"
                                                        data-target="#exampleModal{{ $help->id }}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $help->id }}"
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
                                                                Вы уверены, что хотите удалить данную просьбу?
                                                                <div>"{{ $help->help }}"</div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('help.destroy', $help->id) }}"
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
                                {{$helps->links()}}
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection
