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
    <form enctype="multipart/form-data" class="form-horizontal" method="POST">
        <input type="hidden" name="id" id="id" value="{{$animal->id}}">
        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="name_block">
            <label class="col-sm-3 col-form-label" for="name">Кличка: </label>
            <div class="col-sm-9">
                <input type="text" name="name" id="name" class="form-control" value="{{$animal->name}}"
                       @if($animal->name==null) placeholder="Не указанно">@endif
                <strong id="name_block_strong" ></strong>
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
                <strong id="species_block_strong" ></strong>
            </div>
        </div>
        <div class="form-group{{ $errors->has('breed') ? ' has-error' : '' }}" id="breed_block">
            <label class="col-sm-3 col-form-label" for="breed">Порода: </label>
            <div class="col-sm-9">
                <input type="text" name="breed" id="breed" class="form-control" value="{{$animal->breed}}"
                       @if($animal->breed==null) placeholder="Не указано">@endif
                <strong id="breed_block_strong" ></strong>
            </div>
        </div>
        <div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}" id="sex_block">
            <label class="col-sm-3 col-form-label" for="sex">Пол: </label>
            <div class="col-sm-9">
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
                <strong id="sex_block_strong" ></strong>
            </div>
        </div>
        <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}" id="age_block">
            <label class="col-sm-3 col-form-label" for="age">Возраст: </label>
            <div class="col-sm-9">
                <input type="text" name="age" id="age" class="form-control" value="{{$animal->age}}"
                       @if($animal->age==null) placeholder="Не указано">@endif
                <strong id="age_block_strong" ></strong>
            </div>
        </div>
        <div class="form-group{{ $errors->has('notes') ? ' has-error' : '' }}" id="notes_block">
            <label class="col-sm-3 col-form-label" for="notes">Примечания: </label>
            <div class="col-sm-9">
            <textarea name="notes" id="notes" class="form-control" @if($animal->notes==null) placeholder="Не указано"
                    @endif>{{ $animal->notes }}</textarea>
                <strong id="notes_block_strong" ></strong>
            </div>
        </div>
        <div class="form-group{{ $errors->has('contacts') ? ' has-error' : '' }}" id="contacts_block">
            <label class="col-sm-3 col-form-label" for="contacts">Контакты: * </label>
            <div class="col-sm-9">
                <input type="text" name="contacts" id="contacts" class="form-control" required
                       value="{{$animal->contacts}}"
                       @if($animal->contacts==null) placeholder="Не указано">@endif>
                <strong id="contacts_block_strong" ></strong>
            </div>
        </div>
        <div class="form-group{{ $errors->has('main_foto') ? ' has-error' : '' }}" id="main_foto_block">
            <label class="col-sm-3 col-form-label" for="main_foto">Главное фото: * </label>
            <div class="col-sm-9">
                {{--<img src="{{ asset("storage/$animal->main_foto") }}" alt="Главное фото животного">--}}
                <img src="{{$animal->main_foto}}" alt="Главное фото животного">
                <input type="file" name="main_foto" id="main_foto" class="form-control">
                <strong id="main_foto_block_strong" ></strong>
            </div>
        </div>
        <div class="form-group{{ $errors->has('other_foto') ? ' has-error' : '' }}" id="otherfoto_block">
            <label class="col-sm-3 col-form-label" for="otherfoto">Другие фото: </label>
            <div class="col-sm-9">
                @if(!empty($animal->images))
                    @foreach($animal->images as $foto)
                        {{--<img src="{{ asset("storage/$foto->name") }}"--}}
                             {{--alt="Другие фото животного">--}}
                        <img src="{{$foto->name}}"
                             alt="Другие фото животного">
                    @endforeach
                @endif
                <input type="file" name="files[]" id="otherfoto" multiple="multiple" class="form-control">
                <strong id="otherfoto_block_strong"></strong>
            </div>
        </div>
        <div class="modal-footer">
            <input class="btn btn-success pull-left" type="button" onclick="sendform({{$animal->id}})" id="enter" value="Редактировать">
            <button class="btn btn-danger" type="button" data-dismiss="modal">Закрыть</button>
        </div>
    </form>
</div>
<script src="/js/admin/animals/update_form.js"></script>