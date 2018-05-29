<style>
    img {
        width: auto;
        height: 60px;
    }

    textarea {
        max-width: 420px;
    }
</style>
<div class="modal-header bg-primary">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Редактирование объявления</h4>
</div>
<div class="modal-body">
    <form action="{{ route('animals.update',$animal->id) }}" method="POST" enctype="multipart/form-data"
          class="form-horizontal">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $animal->id }}">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="div_name">
            <label class="col-sm-3 col-form-label" for="name">Кличка: </label>
            <div class="col-sm-9">
                <input type="text" name="name" id="name" class="form-control" value="{{$animal->name}}"
                       @if($animal->name==null) placeholder="Не указанно">@endif
                <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
            </div>
        </div>
        <div class="form-group{{ $errors->has('species') ? ' has-error' : '' }}" id="div_species">
            <label class="col-sm-3 col-form-label" for="species">Вид: * </label>
            <div class="col-sm-9">
                <select name="species" id="species" class="form-control" required>
                    <option value="1" @if($animal->species==1) selected>Кошки</option>
                    <option value="1" @elseif($animal->species==2) selected @endif >Собаки</option>
                </select>
                <span class="help-block"><strong>{{ $errors->first('species') }}</strong></span>
            </div>
        </div>
        <div class="form-group{{ $errors->has('breed') ? ' has-error' : '' }}" id="div_breed">
            <label class="col-sm-3 col-form-label" for="breed">Порода: </label>
            <div class="col-sm-9">
                <input type="text" name="breed" id="breed" class="form-control" value="{{$animal->breed}}"
                       @if($animal->breed==null) placeholder="Не указано">@endif
                <span class="help-block"><strong>{{ $errors->first('breed') }}</strong></span>
            </div>
        </div>
        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}" id="div_sex">
            <label class="col-sm-3 col-form-label" for="sex">Пол: </label>
            <div class="col-sm-9">
                <select name="sex" id="sex" class="form-control" required>
                    <option value="0" @if($animal->sex==0) selected> Не указано</option>
                    <option value="1" @elseif($animal->sex==1) selected> Мужской</option>
                    <option value="2" @elseif($animal->sex==2) selected @endif> Женский</option>
                </select>
                <span class="help-block"><strong>{{ $errors->first('sex') }}</strong></span>
            </div>
        </div>
        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}" id="div_age">
            <label class="col-sm-3 col-form-label" for="age">Возраст: </label>
            <div class="col-sm-9">
                <input type="text" name="age" id="age" class="form-control" value="{{$animal->age}}"
                       @if($animal->age==null) placeholder="Не указано">@endif
                <span class="help-block"><strong>{{ $errors->first('age') }}</strong></span>
            </div>
        </div>
        <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}" id="div_notes">
            <label class="col-sm-3 col-form-label" for="notes">Примечания: </label>
            <div class="col-sm-9">
            <textarea name="notes" id="notes" class="form-control" @if($animal->notes==null) placeholder="Не указано"
                    @endif>{{ $animal->notes }}</textarea>
                <span class="help-block"><strong>{{ $errors->first('notes') }}</strong></span>
            </div>
        </div>
        <div class="form-group{{ $errors->has('contacts') ? ' has-error' : '' }}" id="div_contacts">
            <label class="col-sm-3 col-form-label" for="contacts">Контакты: * </label>
            <div class="col-sm-9">
                <input type="text" name="contacts" id="contacts" class="form-control" required
                       value="{{$animal->contacts}}"
                       @if($animal->contacts==null) placeholder="Не указано">@endif>
                <span class="help-block"><strong>{{ $errors->first('contacts') }}</strong></span>
            </div>
        </div>
        <input type="hidden" name="main_foto" value="{{ $animal->main_foto }}">
        @foreach($others_foto as $foto)
            <input type="hidden" name="other_foto[]" value="{{ $foto }}">
        @endforeach
        <div class="form-group{{ $errors->has('main_foto') ? ' has-error' : '' }}" id="div_main_foto">
            <label class="col-sm-3 col-form-label" for="main_foto">Главное фото: * </label>
            <div class="col-sm-9">
                <img src="{{ asset("storage/$animal->main_foto") }}" alt="Главное фото животного">
                <input type="file" name="main_foto" id="main_foto" class="form-control">
                <span class="help-block"><strong>{{ $errors->first('main_foto') }}</strong></span>
            </div>
        </div>
        <div class="form-group{{ $errors->has('other_foto') ? ' has-error' : '' }}" id="div_other_foto">
            <label class="col-sm-3 col-form-label" for="other_foto">Другие фото: </label>
            <div class="col-sm-9">
                @foreach($others_foto as $foto)
                    <img src="{{ asset("storage/$foto") }}" alt="Другие фото животного" id="other_foto">
                @endforeach
                <input type="file" name="other_foto[]" id="other_foto" multiple class="form-control">
                <span class="help-block"><strong>{{ $errors->first('other_foto') }}</strong></span>
            </div>
        </div>
        <div class="modal-footer">
            <input class="btn btn-success pull-left" type="submit" value="Сохранить">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Закрыть</button>
        </div>
    </form>
</div>
