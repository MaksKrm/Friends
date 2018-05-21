<style>
    img {
        width: 60px;
        height: 50px;
    }
</style>
<form action="{{ route('animals.update',$animal->id) }}" method="POST" enctype="multipart/form-data" class="form-horizontal">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="id" value="{{ $animal->id }}">
    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="div_name">
        <label for="name">Кличка: </label>
        <div class="col-md-4">
            <input type="text" name="name" id="name" class="form-control" value="{{$animal->name}}"
                   @if($animal->name==null) placeholder="Не указанно">@endif
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        </div>
    </div>
    <div class="form-group{{ $errors->has('species') ? ' has-error' : '' }}" id="div_species">
        <label for="species">Вид: * </label>
        <div class="col-md-4">
            <select name="species" id="species" class="form-control" required >
                <option value="1" @if($animal->species==1) selected  > Кошки </option>
                <option value="1" @elseif($animal->species==2) selected @endif > Собаки </option>
            </select>
            <span class="help-block">
                <strong>{{ $errors->first('species') }}</strong>
            </span>
        </div>
    </div>
    <div class="form-group{{ $errors->has('breed') ? ' has-error' : '' }}" id="div_breed">
        <label for="breed">Порода: </label>
        <div class="col-md-4">
            <input type="text" name="breed" id="breed" class="form-control" value="{{$animal->breed}}"
                   @if($animal->breed==null) placeholder="Не указанно">@endif
            <span class="help-block">
                <strong>{{ $errors->first('breed') }}</strong>
            </span>
        </div>
    </div>
    <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}" id="div_sex">
        <label for="sex">Пол:  </label>
        <div class="col-md-4">
            <select name="sex" id="sex" class="form-control" required >
                <option value="0" @if($animal->sex==0) selected > Не указанно </option>
                <option value="1" @elseif($animal->sex==1) selected > Мужской </option>
                <option value="2" @elseif($animal->sex==2) selected  @endif> Женский </option>
            </select>
            <span class="help-block">
                <strong>{{ $errors->first('sex') }}</strong>
            </span>
        </div>
    </div>
    <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}" id="div_age">
        <label for="age">Возраст: </label>
        <div class="col-md-4">
            <input type="text" name="age" id="age" class="form-control"  value="{{$animal->age}}"
                   @if($animal->age==null) placeholder="Не указанно">@endif
            <span class="help-block">
                <strong>{{ $errors->first('age') }}</strong>
            </span>
        </div>
    </div>
    <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}" id="div_notes">
        <label for="notes">Примечания: </label>
        <div class="col-md-4">
            <textarea name="notes" id="notes" class="form-control" @if($animal->notes==null) placeholder="Не указанно"
                    @endif>
                {{$animal->notes}}</textarea>
            <span class="help-block">
                <strong>{{ $errors->first('notes') }}</strong>
            </span>
        </div>
    </div>
    <div class="form-group{{ $errors->has('contacts') ? ' has-error' : '' }}" id="div_contacts">
        <label for="contacts">Контакты: * </label>
        <div class="col-md-4">
            <input type="text" name="contacts" id="contacts" class="form-control"  required value="{{$animal->contacts}}"
                   @if($animal->contacts==null) placeholder="Не указанно">@endif>
            <span class="help-block">
                <strong>{{ $errors->first('contacts') }}</strong>
            </span>
        </div>
    </div>
    <input type="hidden" name="main_foto" value="{{$animal->main_foto}}">
    @foreach($others_foto as $foto)
    <input type="hidden" name="other_foto[]" value="{{$foto}}">
    @endforeach
    <div class="form-group{{ $errors->has('main_foto') ? ' has-error' : '' }}" id="div_main_foto">
        <label for="main_foto">Главное фото: * </label>
        <div class="col-md-4">
            <img src="{{asset("storage/$animal->main_foto")}}" alt="Animals Main Foto">
            <input type="file" name="main_foto" id="main_foto" class="form-control">
            <span class="help-block">
                <strong>{{ $errors->first('main_foto') }}</strong>
            </span>
        </div>
    </div>
    <div class="form-group{{ $errors->has('other_foto') ? ' has-error' : '' }}" id="div_other_foto">
        <label for="other_foto">Другие фото:  </label>
        <div class="col-md-4">
            @foreach($others_foto as $foto)
                <img src="{{asset("storage/$foto")}}" alt="Other foto" id="other_foto" >
            @endforeach
            <input type="file" name="other_foto[]" id="other_foto" multiple class="form-control">
            <span class="help-block">
                <strong>{{ $errors->first('other_foto') }}</strong>
            </span>
        </div>
    </div>
    <input type="submit" value="Редактировать">
</form>