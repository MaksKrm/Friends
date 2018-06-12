<div class="modal-header bg-success">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Добавить новую информацию</h4>
</div>
<div class="modal-body">
    <form method="POST" id="store-informations" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="hidden" name="id">
        </div>
        <div class="form-group {{ $errors->has('tittle') ? ' has-error' : '' }}" id="div_tittle">
            <label for="inputTitle">Название информации</label>
            <input type="text" class="form-control" id="inputTitle" name="tittle">
            <span class="help-block"><strong>{{ $errors->first('tittle') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('article') ? ' has-error' : '' }}" id="div_article">
            <label for="exampleFormControlTextarea1">Описание информации</label>
            <textarea class="form-control" name="article" id="exampleFormControlTextarea1"
                rows="3"></textarea>
            <span class="help-block"><strong>{{ $errors->first('article') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}" id="div_file">
            <label for="inputPhotoFile">Загрузить фото информации</label>
            <input type="file" id="inputPhotoFile" name="file">
            <span class="help-block"><strong>{{ $errors->first('file') }}</strong></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Отправить</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal"> Закрыть</button>
        </div>
    </form>
</div>
