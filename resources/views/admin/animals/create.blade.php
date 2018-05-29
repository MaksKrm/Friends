<style>
    textarea {
        max-width: 420px;
    }
</style>

<div class="modal-header bg-success">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Добавление объявления</h4>
</div>
<div class="modal-body">
    <form action="{{route('animals.store')}}" method="POST" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }}
        <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="div_name">
            <label class="col-sm-3 col-form-label" for="name">Кличка: </label>
            <div class="col-sm-9">
                <input type="text" name="name" id="name" class="form-control"
                placeholder="Введите кличку животного">
                <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('species') ? ' has-error' : '' }}" id="div_species">
            <label class="col-sm-3 col-form-label" for="species">Вид: * </label>
            <div class="col-sm-9">
                <select name="species" id="species" class="form-control" required>
                    <option value="">Выберите вид</option>
                    <option value="1">Кошки</option>
                    <option value="2">Собаки</option>
                </select>
                <span class="help-block"><strong>{{ $errors->first('species') }}</strong></span>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('breed') ? ' has-error' : '' }}" id="div_breed">
            <label class="col-sm-3 col-form-label" for="breed">Порода: </label>
            <div class="col-sm-9">
                <input type="text" name="breed" id="breed" class="form-control" placeholder="Введите породу животного">
                <span class="help-block"><strong>{{ $errors->first('breed') }}</strong></span>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('sex') ? ' has-error' : '' }}" id="div_sex">
            <label class="col-sm-3 col-form-label" for="sex">Пол: </label>
            <div class="col-sm-9">
                <select name="sex" id="sex" class="form-control" required>
                    <option value="0">Не указан</option>
                    <option value="1">Мужской</option>
                    <option value="2">Женский</option>
                </select>
                <span class="help-block"><strong>{{ $errors->first('sex') }}</strong></span>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('age') ? ' has-error' : '' }}" id="div_age">
            <label class="col-sm-3 col-form-label" for="age">Возраст: </label>
            <div class="col-sm-9">
                <input type="text" name="age" id="age" class="form-control" placeholder="Введите возраст">
                <span class="help-block"><strong>{{ $errors->first('age') }}</strong></span>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('notes') ? ' has-error' : '' }}" id="div_notes">
            <label class="col-sm-3 col-form-label" for="notes">Примечания: </label>
            <div class="col-sm-9">
                <textarea name="notes" id="notes" class="form-control"></textarea>
                <span class="help-block"><strong>{{ $errors->first('notes') }}</strong></span>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('contacts') ? ' has-error' : '' }}" id="div_contacts">
            <label class="col-sm-3 col-form-label" for="contacts">Контакты: * </label>
            <div class="col-sm-9">
                <input type="text" name="contacts" id="contacts" class="form-control"
                       placeholder="Введите ваши контакты" required>
                <span class="help-block"><strong>{{ $errors->first('contacts') }}</strong></span>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('main_foto') ? ' has-error' : '' }}" id="div_main_foto">
            <label class="col-sm-3 col-form-label" for="main_foto">Главное фото: * </label>
            <div class="col-sm-9">
                <input type="file" name="main_foto" id="main_foto" class="form-control" required>
                <span class="help-block"><strong>{{ $errors->first('main_foto') }}</strong></span>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('other_foto') ? ' has-error' : '' }}" id="div_other_foto">
            <label class="col-sm-3 col-form-label" for="other_foto">Другие фото: </label>
            <div class="col-sm-9">
                <input type="file" name="other_foto[]" id="other_foto" class="form-control" multiple>
                <span class="help-block"><strong>{{ $errors->first('other_foto') }}</strong></span>
            </div>
        </div>
        <div class="modal-footer">
            <input class="btn btn-primary pull-left" type="submit" name="enter" value="Добавить">
            <button class="btn btn-danger" type="button" data-dismiss="modal"> Закрыть</button>
        </div>
    </form>
</div>



