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
    {{$helps->links()}}
</div>
