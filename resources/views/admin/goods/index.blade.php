@extends('adminlte::page')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <meta name="csrf-token" content="{{ csrf_token() }}"/>
                        <h3 class="box-title">Cписок товаров</h3>
                        <button onclick="createGood()" class="btn btn-default pull-right" data-toggle="modal"
                                data-target="#modal-update">Добавить товар <i class="fa fa-plus"></i></button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                <table id="example1" class="table table-bordered table-striped table-responsive">
                                    <thead>
                                    <tr>
                                        <th class="col-xs-2">Название товара</th>
                                        <th class="col-xs-4">Описание</th>
                                        <th class="col-xs-3">Фото</th>
                                        <th class="col-xs-1">Дата добавления</th>
                                        <th colspan="2" class="col-xs-1">Управление</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($goods as $good)
                                        <tr>
                                            <td>{{ $good->title }}</td>
                                            <td>{{ $good->description }}</td>
                                            <td><img class="card-img-right flex-auto d-none d-md-block"
                                                     alt="Фото товара"
                                                     style="width: auto; max-height: 100px;"
                                                     src="{{ asset("storage/$good->photo")  }}"
                                                     data-holder-rendered="true">
                                            </td>
                                            <td>{{ $good->created_at }}</td>
                                            <td>
                                                <meta name="csrf-token" content="{{ csrf_token() }}"/>
                                                <button onclick="editGood({{ $good->id }})" data-toggle="modal"
                                                        data-target="#modal-update"
                                                        class="btn btn-default"><i
                                                            class="fa fa fa-pencil"></i></button>
                                            </td>
                                            <td>
                                                <button type="button" onclick="deleteGood({{ $good->id }})"
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

    <script type='text/javascript'>
        function createGood() {
            $.ajax({
                type: 'GET',
                url: '/admin/goods/create',
                success: function (response) {
                    $('.modal-content').empty().append(response);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#storegood').submit(function (e) {
                        e.preventDefault();
                        var formData = new FormData($('#storegood')[0]);
                        $.ajax({
                            method: 'POST',
                            url: 'goods',
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function () {
                                location.reload();
                            },
                            error: function (response) {
                                errorFields(response);
                            }
                        });
                    });
                },
                error: function () {
                    alert("Ошибка соединения");
                }
            });
        }

        function errorFields(errors) {
            if (!errors.responseText) {
                return false
            }
            errors = JSON.parse(errors.responseText).errors;
            var key = Object.keys(errors);
            key.forEach(function (id) {
                $('#div_' + id).addClass("has-error");
                $('#div_' + id + ' strong').text(errors[id][0]);
            });
        }

        function editGood(id) {
            $.ajax({
                type: 'GET',
                url: '/admin/goods/' + id + '/edit',
                success: function (response) {
                    $('.modal-content').empty().append(response);
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $('#updategood').submit(function (e) {
                        e.preventDefault();
                        var formData = new FormData($('#updategood')[0]);
                        formData.append('_method', 'PATCH');
                        $.ajax({
                            method: 'POST',
                            url: '/admin/goods/' + id,
                            data: formData,
                            contentType: false,
                            processData: false,
                            success: function () {
                                location.reload();
                            },
                            error: function (response) {
                                errorFields(response);
                            }
                        });
                    });
                },
                error: function () {
                    alert("Ошибка соединения");
                }
            });
        }

        function deleteGood(id) {
            $.ajax({
                type: 'GET',
                url: '/admin/goods/' + id,
                success: function (response) {
                    $('.modal-content').empty().append(response);
                    $('#destroy-good').click(function () {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                        $.ajax({
                            type: 'POST',
                            url: '/admin/goods/' + id,
                            data: {_method: 'delete', _token: $(this).data('token')},
                            success: function () {
                                location.reload();
                            }
                        });
                    });
                }
            });
        }
    </script>
@endsection
