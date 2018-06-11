<div class="modal-header bg-success">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Создать новую новость</h4>
</div>
<div class="modal-body">
    <form method="POST" id="store-news" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="hidden" name="id">
        </div>
        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}" id="div_title">
            <label for="inputTitle">Название новости</label>
            <input type="text" class="form-control" id="inputTitle" name="title"
                   placeholder="Название новости">
            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('text') ? ' has-error' : '' }}" id="div_text">
            <label for="exampleFormControlTextarea1">Описание новости</label>
            <textarea class="form-control" name="text" id="exampleFormControlTextarea1"
                      rows="3" placeholder="Описание новости"></textarea>
            <span class="help-block"><strong>{{ $errors->first('text') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}" id="div_file">
            <label for="inputPhotoFile">Загрузить фото новости</label>
            <input type="file" id="inputPhotoFile" name="file"/>
            <span class="help-block"><strong>{{ $errors->first('file') }}</strong></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Отправить</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal"> Закрыть</button>
        </div>
    </form>
</div>
