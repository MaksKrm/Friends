<style>
    .delete-logo {
        display: block;
        float: right;
        margin-top: 20px;
    }

    .delete-logo .btn {
        width: 145px;
    }
</style>
<form action="{{ route('admin.settings.update', $logo->id) }}"
      method="POST" enctype="multipart/form-data" class="text-center">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <div class="form-group">
        <input type="hidden" name="id" value="{{ $logo->id }}">
    </div>
    <div class="form-group">
        <input type="hidden" name="animal_id" value="99999">
    </div>
    <div class="margin-bottom-20">
        <img id="preview" class="thumbnail box-center margin-top-20" style="max-width: 280px; height: auto;"
             alt="Логотип"
             src="{{ asset("storage/$logo->name") }}">
    </div>
    <div class="row">
        <div class="col-sm-10">
              <span class="control-fileupload">
                <label for="file1" class="text-left">Пожалуйста, выберите файл логотипа</label>
                <input type="file" onchange="readURL(this);" name="name" id="file1">
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
<form class="delete-logo" action="{{ route('admin.settings.destroy', $logo->id) }}" method="POST">
    {!! csrf_field() !!}
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="btn btn-danger"><i class="icon-remove"></i>Удалить</button>
</form>