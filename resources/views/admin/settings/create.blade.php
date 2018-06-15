<form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data" class="text-center">
    {{ csrf_field() }}
    <div class="form-group">
        <input type="hidden" name="id">
    </div>
    <div class="form-group">
        <input type="hidden" name="animal_id" value="99999">
    </div>
    <div class="margin-bottom-20">
        <img id="preview" class="thumbnail box-center margin-top-20" alt="No image"
             src="http://www.washaweb.com/tutoriaux/fileupload/imgs/image-temp-220.png">
    </div>
    <div class="row">
        <div class="col-sm-10">
              <span class="control-fileupload">
                <label for="file1" class="text-left">Пожалуйста, выберите файл логотипа</label>
                <input type="file" name="name" onchange="readURL(this);" id="file1">
              </span>
            @if ($errors->first('name'))
                <div class="alert alert-danger">{{  $errors->first('name') }}</div>
            @endif
        </div>
        <div class="col-sm-2">
            <button type="submit" class="btn btn-primary btn-block">
                <i class="icon-upload icon-white"></i> Загрузить
            </button>
        </div>
    </div>
</form>