<div class="modal-header bg-primary">
    <button type="button" class="close" data-dismiss="modal"
        aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Изменение информации</h4>
</div>
<div class="modal-body">
    <form id="update-informations" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <input type="hidden" name="id" value="{{ $information->id }}">
        </div>
        <div class="form-group {{ $errors->has('tittle') ? ' has-error' : '' }}" id="div_tittle">
            <label for="inputTitle">Название информации</label>
            <input type="text" class="form-control" id="inputTitle" name="tittle" value="{{ $information->tittle }}">
            <span class="help-block"><strong>{{ $errors->first('tittle') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('article') ? ' has-error' : '' }}" id="div_article">
            <label for="exampleFormControlTextarea1">Описание информации</label>
            <textarea class="form-control" name="article" id="exampleFormControlTextarea1"
                rows="3">{{ $information->article }}</textarea>
            <span class="help-block"><strong>{{ $errors->first('article') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}" id="div_file">
            <label for="inputPhotoFile">Загрузить фото</label>
            <input type="file" id="inputPhotoFile" name="file">
            <img class="card-img-right flex-auto d-none d-md-block"
                 alt="Фото товара"
                 style="width: auto; max-height: 60px;"
                 src="{{ asset("storage/$information->file")  }}"
                 data-holder-rendered="true">
            <span class="help-block"><strong>{{ $errors->first('file') }}</strong></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Отправить</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal"> Закрыть</button>
        </div>
    </form>
</div>
