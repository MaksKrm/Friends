<div class="modal-header bg-success">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Добавить новый контакт</h4>
</div>
<div class="modal-body">
    <form method="POST" id="store-contacts" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="hidden" name="id">
        </div>
        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}" id="div_name">
			<label for="inputName">ФИО</label>
            <input type="text" class="form-control" id="inputName" name="name">
            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}" id="div_address">
            <label for="inputAddress">Адрес</label>
            <input type="text" class="form-control" id="inputAddress" name="address">
            <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}" id="div_email">
            <label for="inputEmail">Email</label>
            <input type="text" class="form-control" id="inputEmail" name="email">
            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}" id="div_phone">
            <label for="inputPhone">Телефон</label>
            <input type="text" class="form-control" id="inputPhone" name="phone">
            <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Отправить</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal"> Закрыть</button>
        </div>
    </form>
</div>
