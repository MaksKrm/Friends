@extends('adminlte::page')

@section('content')
    <style>

        /* box component */
        .box {
            border-color: #e6e6e6;
            background: #FFF;
            border-radius: 6px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.25);
            padding: 10px;
            margin-bottom: 40px;
        }

        .box-center {
            margin: 20px auto;
        }

        /* input [type = file]
        ----------------------------------------------- */

        input[type=file] {
            display: block !important;
            right: 1px;
            top: 1px;
            height: 34px;
            opacity: 0;
            width: 100%;
            background: none;
            position: absolute;
            overflow: hidden;
            z-index: 2;
        }

        .control-fileupload {
            display: block;
            border: 1px solid #d6d7d6;
            background: #FFF;
            border-radius: 4px;
            width: 100%;
            height: 36px;
            line-height: 36px;
            padding: 0px 10px 2px 10px;
            overflow: hidden;
            position: relative;

        /* File upload button */
        :before {
            /* inherit from boostrap btn styles */
            padding: 4px 12px;
            margin-bottom: 0;
            font-size: 14px;
            line-height: 20px;
            color: #333333;
            text-align: center;
            text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75);
            vertical-align: middle;
            cursor: pointer;
            background-color: #f5f5f5;
            background-image: linear-gradient(to bottom, #ffffff, #e6e6e6);
            background-repeat: repeat-x;
            border: 1px solid #cccccc;
            border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25);
            border-bottom-color: #b3b3b3;
            border-radius: 4px;
            box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05);
            transition: color 0.2s ease;
        }

        label {
            line-height: 24px;
            color: #999999;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            position: relative;
            z-index: 1;
            margin-right: 90px;
            margin-bottom: 0px;
            cursor: text;
        }

    </style>

    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Изменить логотип</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12 col-md-12">
                                @if(!empty($logo))
                                    @include('admin.settings.edit')
                                @else
                                    @include('admin.settings.create')
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Изменить контакты</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    @if(!empty($contact))
                                        <form method="POST" action="{{ route('admin.settings.update', $contact->id) }}">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="form-group row">
                                                <label for="inputPhone" class="col-sm-2 col-form-label">Контактный
                                                    телефон</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="phone" class="form-control" id="inputPhone"
                                                           value="{{ $contact->phone }}" placeholder="Телефон">
                                                    <input type="hidden" name="id" value="{{ $contact->id }}">
                                                    <input type="hidden" name="name" value="admin">
                                                </div>
                                            </div>
                                            @if ($errors->first('phone'))
                                                <div class="alert alert-danger">{{  $errors->first('phone') }}</div>
                                            @endif
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Изменить</button>
                                                </div>
                                            </div>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.settings.store') }}" method="POST">
                                            {{ csrf_field() }}
                                            <div class="form-group row">
                                                <label for="inputPhone" class="col-sm-2 col-form-label">Контактный
                                                    телефон</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="phone" class="form-control" id="inputPhone"
                                                           placeholder="Телефон">
                                                    <input type="hidden" name="id" value="99999">
                                                    <input type="hidden" name="name" value="admin">
                                                </div>
                                            </div>
                                            @if ($errors->first('phone'))
                                                <div class="alert alert-danger">{{  $errors->first('phone') }}</div>
                                            @endif
                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-primary">Изменить</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
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
        </div>
    </section>
    <script src="{{ asset('js/admin/settings/script.js') }}"></script>
@endsection