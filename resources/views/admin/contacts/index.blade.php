@extends('adminlte::page')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Cписок контактов</h3>
                        <a class="btn btn-default pull-right"
                           href="{{ route('admin.contacts.create') }}">Добавить Контакт <i class="fa fa-plus"></i></a>
                    </div>
                    <!-- Button trigger modal -->

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                    <tr>
                                        <th class="col-xs-3">ФИО</th>
                                        <th class="col-xs-3">Адрес</th>
                                        <th class="col-xs-2">Email</th>
                                        <th class="col-xs-1">Телефон</th>
                                        <th class="col-xs-1"></th>
                                        <th class="col-xs-1"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td>{{ $contact->name }}</td>
                                            <td>{{ $contact->address }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->phone }}</td>
                                            <td>
                                                <a href="{{ route('admin.contacts.edit', $contact->id) }}"
                                                   class="btn btn-default"><i class="fa fa fa-pencil"></i></a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-default" data-toggle="modal"
                                                        data-target="#exampleModal{{ $contact->id }}">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $contact->id }}" tabindex="-1" role="dialog"
                                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close"><span aria-hidden="true">&times;</span>
                                                                </button>
                                                                <h4 class="modal-title">Удаление контакта</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                Вы уверены, что хотите удалить контакт?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form action="{{ route('admin.contacts.destroy', $contact->id) }}""
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
