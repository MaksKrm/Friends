<div class="modal-header bg-success">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Создать новую помощь</h4>
</div>
<div class="modal-body">
    <form method="post" id="store-help" role="form">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="hidden" name="id">
        </div>
        <div class="form-group {{ $errors->has('help') ? ' has-error' : '' }}" id="div_help">
            <label for="inputHelp">Вид помощи</label>
            <input type="text" class="form-control" id="inputHelp" name="help"
                   placeholder="Название темы" required>
            <span class="help-block"><strong>{{ $errors->first('help') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('contact') ? ' has-error' : '' }}" id="div_contact">
            <label for="inputContacts">Контакты</label>
            <input type="text" class="form-control" id="inputContacts" name="contact"
                   placeholder="Введите ваши контакты" required>
            <span class="help-block"><strong>{{ $errors->first('contact') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}" id="div_message">
            <label for="exampleFormControlTextarea1">Описание</label>
            <textarea class="form-control" name="message" id="exampleFormControlTextarea1"
                      rows="3" required></textarea>
            <span class="help-block"><strong>{{ $errors->first('message') }}</strong></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" id="subbut">Отправить</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal"> Закрыть</button>
        </div>
    </form>
</div>
