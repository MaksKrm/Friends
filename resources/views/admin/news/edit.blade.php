<div class="modal-header bg-primary">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Изменение новости</h4>
</div>
<div class="modal-body">
    <form id="update-news" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <input type="hidden" name="id" value="{{ $article->id }}">
        </div>
        <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}" id="div_title">
            <label for="inputTitle">Название товара</label>
            <input type="text" class="form-control" id="inputTitle" name="title" value="{{ $article->title }}"
                   placeholder="Название товара">
            <span class="help-block"><strong>{{ $errors->first('title') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('text') ? ' has-error' : '' }}" id="div_text">
            <label for="exampleFormControlTextarea1">Описание товара</label>
            <textarea class="form-control" name="text" id="exampleFormControlTextarea1"
                      rows="3">{{ $article->text }}</textarea>
            <span class="help-block"><strong>{{ $errors->first('text') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}" id="div_file">
            <label for="inputPhotoFile">Загрузить файл</label>
            <input type="file" id="inputPhotoFile" name="file"/>
            <img class="card-img-right flex-auto d-none d-md-block"
                 alt="Фото товара"
                 style="width: auto; max-height: 60px;"
                 src="{{ asset("storage/$article->file")  }}"
                 data-holder-rendered="true">
            <span class="help-block"><strong>{{ $errors->first('file') }}</strong></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Отправить</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal"> Закрыть</button>
        </div>
    </form>
</div>
