@extends('adminlte::page')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <meta name="csrf-token" content="{{ csrf_token() }}"/>
                        <h3 class="box-title">Необходимая помощь</h3>
                        <button onclick="createHelp()" class="btn btn-default pull-right" data-toggle="modal"
                                data-target="#modal-update">
                            <i class="fa fa-plus">Добавить необходимую помощь </i></button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
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
                                                    <meta name="csrf-token" content="{{ csrf_token() }}"/>
                                                    <button onclick="editHelp({{ $help->id }})" data-toggle="modal"
                                                            data-target="#modal-update"
                                                            class="btn btn-default"><i
                                                                class="fa fa fa-pencil"></i></button>
                                                </td>
                                                <td>
                                                    <button type="button" onclick="deleteHelp({{ $help->id }})"
                                                            class="btn btn-default" data-toggle="modal"
                                                            data-target="#modal-update">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
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
    <div id="modal-update" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>
    <script src="{{ asset('js/admin/help/ajax_help.js') }}"></script>
@endsection
