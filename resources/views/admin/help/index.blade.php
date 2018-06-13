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
                            Добавить необходимую помощь<i class="fa fa-plus"></i></button>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            @if (count($helps) > 0)
                                <section class="types">
                                    @include('admin.help.load')
                                </section>
                            @endif
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
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="/js/admin/help/ajax_pagin.js"></script>
    <script src="{{ asset('js/admin/help/ajax_help.js') }}"></script>
@endsection
