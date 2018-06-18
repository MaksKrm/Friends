@extends('adminlte::page')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <meta name="csrf-token" content="{{ csrf_token() }}"/>
                        <h3 class="box-title">Cписок контактов</h3>
                        <button onclick="createContacts()" class="btn btn-default pull-right" data-toggle="modal"
                                data-target="#modal-update">Добавить
                            Контакт <i class="fa fa-plus"></i></button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                        <tr>
                                            <th class="col-xs-4">ФИО</th>
                                            <th class="col-xs-3">Email</th>
                                            <th class="col-xs-3">Телефон</th>
                                            <th colspan="2" class="col-xs-1">Управление</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($contacts as $contact)
                                            <tr>
                                                <td>{{ $contact->name }}</td>
                                                <td>{{ $contact->email }}</td>
                                                <td>{{ $contact->phone }}</td>
                                                <td>
                                                    <meta name="csrf-token" content="{{ csrf_token() }}"/>
                                                    <button type="button" onclick="editContacts({{ $contact->id }})"
                                                            class="btn btn-default" data-toggle="modal"
                                                            data-target="#modal-update">
                                                        <i class="fa fa fa-pencil"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" onclick="deleteContacts({{ $contact->id }})"
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
                                {{ $contacts->links() }}
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

    <script src="{{ asset('js/admin/contacts/ajax_contacts.js') }}"></script>
@endsection
