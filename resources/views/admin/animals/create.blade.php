<style>
    textarea {
        max-width: 420px;
    }
    .has-error, strong {
        color: #ff0000;
        bordred: 1px solid #ff0000;
    }
</style>

<div class="modal-header bg-success">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Добавление объявления</h4>
</div>
<div class="modal-body">
    <form action="" method="POST" enctype="multipart/form-data" class="form-horizontal">
        {{ csrf_field() }}
        <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="name_block">
            <label class="col-sm-3 col-form-label" for="name">Кличка: </label>
            <div class="col-sm-9">
                <input type="text" name="name" id="name" class="form-control"
                placeholder="Введите кличку животного">
                <strong></strong>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('species') ? ' has-error' : '' }}" id="species_block">
            <label class="col-sm-3 col-form-label" for="species">Вид: * </label>
            <div class="col-sm-9">
                <select name="species" id="species" class="form-control" required>
                    <option value="">Выберите вид</option>
                    <option value="1">Кошки</option>
                    <option value="2">Собаки</option>
                </select>
                <strong></strong>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('breed') ? ' has-error' : '' }}" id="breed_block">
            <label class="col-sm-3 col-form-label" for="breed">Порода: </label>
            <div class="col-sm-9">
                <input type="text" name="breed" id="breed" class="form-control" placeholder="Введите породу животного">
                <strong></strong>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('sex') ? ' has-error' : '' }}" id="sex_block">
            <label class="col-sm-3 col-form-label" for="sex">Пол: </label>
            <div class="col-sm-9">
                <select name="sex" id="sex" class="form-control" required>
                    <option value="0">Не указан</option>
                    <option value="1">Мужской</option>
                    <option value="2">Женский</option>
                </select>
                <strong></strong>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('age') ? ' has-error' : '' }}" id="age_block">
            <label class="col-sm-3 col-form-label" for="age">Возраст: </label>
            <div class="col-sm-9">
                <input type="text" name="age" id="age" class="form-control" placeholder="Введите возраст">
                <strong></strong>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('notes') ? ' has-error' : '' }}" id="notes_block">
            <label class="col-sm-3 col-form-label" for="notes">Примечания: </label>
            <div class="col-sm-9">
                <textarea name="notes" id="notes" class="form-control"></textarea>
                <strong></strong>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('contacts') ? ' has-error' : '' }}" id="contacts_block">
            <label class="col-sm-3 col-form-label" for="contacts">Контакты: * </label>
            <div class="col-sm-9">
                <input type="text" name="contacts" id="contacts" class="form-control"
                       placeholder="Введите ваши контакты" required>
                <strong></strong>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('main_foto') ? ' has-error' : '' }}" id="main_foto_block">
            <label class="col-sm-3 col-form-label" for="main_foto">Главное фото: * </label>
            <div class="col-sm-9">
                <input type="file" name="main_foto" id="main_foto" class="form-control" required>
                <strong></strong>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('other_foto') ? ' has-error' : '' }}" id="otherfoto_block">
            <label class="col-sm-3 col-form-label" for="otherfoto">Другие фото: </label>
            <div class="col-sm-9">
                <input type = "file" id = "otherfoto" name = "files[]" multiple = "multiple">
                <strong></strong>
            </div>
        </div>
        <div class="modal-footer">
            <input class="btn btn-primary pull-left" type="button" id="enter" value="Добавить">
            <button class="btn btn-danger" type="button" data-dismiss="modal"> Закрыть</button>
        </div>
    </form>
</div>
<script src="/js/admin/animals/create_form.js"></script>



