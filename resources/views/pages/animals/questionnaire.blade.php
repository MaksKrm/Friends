<style>
    .modal-header,
    .modal-body {
        width: 100%;
    }

    h5.modal-title {
        color: #009a3e;
        line-height: 2;
    }

    .form-control {
        font-size: 14px;
    }

    .goods__btn_danger {
        background-color: #da251c;
    }

    .modal-body .goods__btn_inform {
        padding: 10px 20px;
    }
</style>

<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLabel">Курирование питомцем</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form action="" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <div class="row form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="name_block">
            <label class="col-sm-3 col-form-label" for="name">ФИО: *</label>
            <div class="col-sm-9">
                <input type="text" name="name" id="name" class="form-control" required>
                <strong id="name_block_strong"></strong>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('age') ? ' has-error' : '' }}" id="age_block">
            <label class="col-sm-3 col-form-label" for="age">Возраст: </label>
            <div class="col-sm-9">
                <input type="text" name="age" id="age" class="form-control">
                <strong id="age_block_strong"></strong>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('sex') ? ' has-error' : '' }}" id="sex_block">
            <label class="col-sm-3 col-form-label" for="sex">Пол: * </label>
            <div class="col-sm-9">
                <select name="sex" id="sex" class="form-control" required>
                    <option value=""> Не выбран</option>
                    <option value="Мужской"> Мужской</option>
                    <option value="Женский"> Женский</option>
                </select>
                <strong id="sex_block_strong"></strong>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('phone') ? ' has-error' : '' }}" id="phone_block">
            <label class="col-sm-3 col-form-label" for="phone">Телефон: </label>
            <div class="col-sm-9">
                <input type="text" name="phone" id="phone" class="form-control" required>
                <strong id="phone_block_strong"></strong>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('email') ? ' has-error' : '' }}" id="email_block">
            <label class="col-sm-3 col-form-label" for="email">Ваш еmail: </label>
            <div class="col-sm-9">
                <input type="email" name="email" id="email" class="form-control" required>
                <strong id="email_block_strong"></strong>
            </div>
        </div>
        <div class="row form-group{{ $errors->has('message') ? ' has-error' : '' }}" id="message_block">
            <label class="col-sm-3 col-form-label" for="message">Сообщение: </label>
            <div class="col-sm-9">
                <textarea name="message" id="message" class="form-control"></textarea>
                <strong id="message_block_strong"></strong>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
            <input type="button" class="button goods__btn_inform" id="send" value="Отправить">
            <button type="button" class="button goods__btn_inform goods__btn_danger" data-dismiss="modal">Закрыть
            </button>
        </div>
    </form>
</div>
<script src="/js/animals/send_mail.js"></script>