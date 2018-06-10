<style>
    img {
        width: auto;
        height: 60px;
    }
    .has-error{
        bordred: 1px solid red;
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
    <form method="" enctype="multipart/form-data" class="form-horizontal">
        {{ method_field('PUT') }}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" id="id" value="{{ $animal->id }}">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="name_block">
            <label class="col-sm-3 col-form-label" for="name">Кличка: </label>
            <div class="col-sm-9">
                <input type="text" name="name" id="name" class="form-control" value="{{$animal->name}}"
                       @if($animal->name==null) placeholder="Не указанно">@endif
                <strong></strong>
            </div>
        </div>
        <div class="form-group{{ $errors->has('species') ? ' has-error' : '' }}" id="species_block">
            <label class="col-sm-3 col-form-label" for="species">Вид: * </label>
            <div class="col-sm-9">
                <select name="species" id="species" class="form-control" required>
                    <option selected >
                        @switch($animal->species)
                            @case(1) Кошки @break
                            @case(2) Собаки @break
                        @endswitch
                    </option>
                    <option value="1" > Кошки</option>
                    <option value="2" >Собаки</option>
                </select>
                <strong></strong>
            </div>
        </div>
        <div class="form-group{{ $errors->has('breed') ? ' has-error' : '' }}" id="breed_block">
            <label class="col-sm-3 col-form-label" for="breed">Порода: </label>
            <div class="col-sm-9">
                <input type="text" name="breed" id="breed" class="form-control" value="{{$animal->breed}}"
                       @if($animal->breed==null) placeholder="Не указано">@endif
                <strong></strong>
            </div>
        </div>
        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}" id="sex_block">
            <label class="col-sm-3 col-form-label" for="sex">Пол: </label>
            <div class="col-sm-9">
                <input type="hidden" name="sex" value="$animal->sex">
                <select name="sex" id="sex" class="form-control">
                        <option selected >
                            @switch($animal->sex)
                                @case(0) Не указан @break
                                @case(1) Мужской @break
                                @case(2) Женский @break
                            @endswitch
                        </option>
                    <option value="1"> Мужской </option>
                    <option value="2"> Женский </option>
                    <option value="0"> Не указывать </option>
                </select>
                <strong></strong>
            </div>
        </div>
        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}" id="age_block">
            <label class="col-sm-3 col-form-label" for="age">Возраст: </label>
            <div class="col-sm-9">
                <input type="text" name="age" id="age" class="form-control" value="{{$animal->age}}"
                       @if($animal->age==null) placeholder="Не указано">@endif
                <strong></strong>
            </div>
        </div>
        <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}" id="notes_block">
            <label class="col-sm-3 col-form-label" for="notes">Примечания: </label>
            <div class="col-sm-9">
            <textarea name="notes" id="notes" class="form-control" @if($animal->notes==null) placeholder="Не указано"
                    @endif>{{ $animal->notes }}</textarea>
                <strong></strong>
            </div>
        </div>
        <div class="form-group{{ $errors->has('contacts') ? ' has-error' : '' }}" id="contacts_block">
            <label class="col-sm-3 col-form-label" for="contacts">Контакты: * </label>
            <div class="col-sm-9">
                <input type="text" name="contacts" id="contacts" class="form-control" required
                       value="{{$animal->contacts}}"
                       @if($animal->contacts==null) placeholder="Не указано">@endif>
                <strong></strong>
            </div>
        </div>
        <input type="hidden" name="main_foto" value="{{ $animal->main_foto }}">
        <div class="form-group{{ $errors->has('main_foto') ? ' has-error' : '' }}" id="main_foto_block">
            <label class="col-sm-3 col-form-label" for="main_foto">Главное фото: * </label>
            <div class="col-sm-9">
                <img src="{{ asset("storage/$animal->main_foto") }}" alt="Главное фото животного">
                <input type="file" name="main_foto" id="main_foto" class="form-control">
                <strong></strong>
            </div>
        </div>
        @foreach($others_foto as $foto)
            <input type="hidden" name="other_foto[]" value="{{ $foto }}">
        @endforeach
        <div class="form-group{{ $errors->has('other_foto') ? ' has-error' : '' }}" id="otherfoto_block">
            <label class="col-sm-3 col-form-label" for="otherfoto">Другие фото: </label>
            <div class="col-sm-9">
                @foreach($others_foto as $foto)
                    <img src="{{ asset("storage/$foto") }}" alt="Другие фото животного" id="otherfoto_block">
                @endforeach
                <input type="file" name="files[]" id="otherfoto" multiple="multiple" class="form-control">
                <strong></strong>
            </div>
        </div>
        <div class="modal-footer">
            <input class="btn btn-success pull-left" type="button" id="enter" value="Редактировать">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Закрыть</button>
        </div>
    </form>
</div>
<script src="/js/admin/animals/update_form.js"></script>