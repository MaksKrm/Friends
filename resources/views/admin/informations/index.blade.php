@extends('adminlte::page')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <meta name="csrf-token" content="{{ csrf_token() }}"/>
                        <h3 class="box-title">Cписок полезной информации</h3>
                        <button onclick="createInformations()" class="btn btn-default pull-right" data-toggle="modal"
                                data-target="#modal-update">Добавить
                            Информацию <i class="fa fa-plus"></i></button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped table-responsive">
                                        <thead>
                                        <tr>
                                            <th class="col-xs-3">Название</th>
                                            <th class="col-xs-3">Текст</th>
                                            <th class="col-xs-2">Файл</th>
                                            <th class="col-xs-1">Дата создания</th>
                                            <th colspan="2" class="col-xs-1">Управление</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($informations as $information)
                                            <tr>
                                                <td>{{ $information->tittle }}</td>
                                                <td>{{ str_limit($information->article, $limit = 100, $end = '...') }}</td>
                                                <td><img class="card-img-right flex-auto d-none d-md-block"
                                                         alt="Фото новости"
                                                         style="width: auto; max-height: 100px;"
                                                         src="{{ asset("storage/$information->file")  }}"
                                                         data-holder-rendered="true">
                                                </td>
                                                <td>{{ $information->created_at }}</td>
                                                <td>
                                                    <meta name="csrf-token" content="{{ csrf_token() }}"/>
                                                    <button onclick="editInformations({{ $information->id }})" data-toggle="modal"
                                                            data-target="#modal-update"
                                                            class="btn btn-default">
                                                            <i class="fa fa fa-pencil"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button type="button" onclick="deleteInformation({{ $information->id }})"
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
                                {{ $informations->links() }}
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

    <script src="{{ asset('js/admin/informations/ajax_informations.js') }}"></script>
@endsection
