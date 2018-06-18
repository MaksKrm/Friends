<div class="modal-header bg-success">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Создать новый отчет</h4>
</div>
<div class="modal-body">

    <form method="post"  id="store-report" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="hidden" name="id">
        </div>
        <div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}" id="div_message">
            <label for="message">Название файла отчета</label>
            <input type="text" class="form-control" id="message" name="message"
                   placeholder="отчет за май месяц">
            <span class="help-block"><strong>{{ $errors->first('message') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('file_name') ? ' has-error' : '' }}" id="div_file_name">
            <label for="file_name">Загрузить файл</label>
            <input type="file" id="file_name" name="file_name">
            <span class="help-block"><strong>{{ $errors->first('file_name') }}</strong></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="subbut">Отправить</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal"> Закрыть</button>
        </div>

    </form>
</div>