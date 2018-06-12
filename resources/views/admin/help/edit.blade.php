<div class="modal-header bg-primary">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Изменение помощи</h4>
</div>
<div class="modal-body">
    <form method="post" id="update-help" role="form">
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $help->id }}">
        <div class="form-group {{ $errors->has('help') ? ' has-error' : '' }}" id="div_help">
            <label for="inputHelp">Вид помощи</label>
            <input type="text" class="form-control" id="inputHelp" name="help"
                   placeholder="название темы" value="{{ $help->help }}" required>
            <span class="help-block"><strong>{{ $errors->first('help') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('contact') ? ' has-error' : '' }}" id="div_contact">
            <label for="inputContacts">Контакты</label>
            <input type="text" class="form-control" id="inputContacts" name="contact" placeholder="Введите ваши контакты"
                   value="{{ $help->contact }}" required>
            <span class="help-block"><strong>{{ $errors->first('contact') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('message') ? ' has-error' : '' }}" id="div_message">
            <label for="exampleFormControlTextarea1">Описание</label>
            <textarea class="form-control" name="message" id="exampleFormControlTextarea1"
                      rows="3" required>{{ $help->message }}</textarea>
            <span class="help-block"><strong>{{ $errors->first('message') }}</strong></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Сохранить</button>
        </div>
    </form>
</div>