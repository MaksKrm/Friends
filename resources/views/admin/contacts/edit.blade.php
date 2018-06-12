<div class="modal-header bg-primary">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Изменение контакта</h4>
</div>
<div class="modal-body">
    <form id="update-contacts" enctype="multipart/form-data" role="form">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <input type="hidden" name="id" value="{{ $contact->id }}">
        </div>
        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}" id="div_name">
            <label for="inputName">ФИО</label>
            <input type="text" class="form-control" id="inputName" name="name" value="{{ $contact->name }}">
            <span class="help-block"><strong>{{ $errors->first('name') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}" id="div_address">
            <label for="inputAddress">Адрес</label>
            <input type="text" class="form-control" id="inputAddress" name="address" value="{{ $contact->address }}">
            <span class="help-block"><strong>{{ $errors->first('address') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}" id="div_email">
            <label for="inputEmail">Email</label>
            <input type="text" class="form-control" id="inputEmail" name="email" value="{{ $contact->email }}">
            <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
        </div>
        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}" id="div_phone">
            <label for="inputPhone">Телефон</label>
            <input type="text" class="form-control" id="inputPhone" name="phone" value="{{ $contact->phone }}">
            <span class="help-block"><strong>{{ $errors->first('phone') }}</strong></span>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Отправить</button>
            <button class="btn btn-danger" type="button" data-dismiss="modal"> Закрыть</button>
        </div>
    </form>
</div>
