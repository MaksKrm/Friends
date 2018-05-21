<head>

    <meta charset="UTF-8">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <style>
        #sendmessage, #senderror {
            border: 1px solid #e6e6e6;
            background: #f6f6f6;
            display: none;
            text-align: center;
            padding: 15px 12px 15px 65px;
            margin: 10px 0;
            font-weight: 600;
            margin-bottom: 30px;
        }

        #senderror {
            color: #f00;
        }

        #senderror span {
            font-weight: bold;
        }

        .fond {
            position: absolute;
            padding-top: 45px;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #f8b334;
        }

        .mymagicoverbox {
            display: inline-block;
            color: #ffffff;
            padding: 10px;
            margin: 10px;
            cursor: pointer;
            font-weight: 300;
            font-family: 'Roboto';
        }

        .mymagicoverbox_fenetre {
            z-index: 9999;
            position: fixed;
            margin-left: 50%;
            top: 100px;
            text-align: center;
            display: none;
            padding: 5px;
            background-color: #ffffff;
            color: #97BF0D;
            font-style: normal;
            font-size: 20px;
            font-weight: 300;
            font-family: 'Roboto';
        }

        .mymagicoverbox_fenetreinterieur {
            text-align: center;
            overflow: auto;
            padding: 10px;
            background-color: #ffffff;
            color: #666666;
            font-weight: 400;
            font-family: 'Roboto';
            font-size: 17px;
            border-top: 1px solid #e7e7e7;
            margin-top: 10px
        }

        .mymagicoverbox_fermer {
            color: #CB2025;
            cursor: pointer;
            font-weight: 400;
            font-size: 14px;
            font-style: normal
            font-family: 'Roboto';
        }

        #myfond_gris {
            display: none;
            background-color: #000000;
            opacity: 0.7;
            width: 100%;
            height: 100%;
            z-index: 9998;
            position: fixed;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
        }
        .help-block {
            font-size: 14px;
        }
    </style>
</head>
<body>
<script>
    $(document).ready(function () {
        $('#contactform').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                type: 'POST',
                url: '/sendmail',
                data: $('#contactform').serialize(),
                success: function (data) {
                    $('#sendmessage').show();
                },
                error: function (response) {
                    errorFields(response);
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function () {

        $(".mymagicoverbox").click(function () {
            $('#myfond_gris').fadeIn(300);
            var iddiv = $(this).attr("iddiv");
            $('#' + iddiv).fadeIn(300);
            $('#myfond_gris').attr('opendiv', iddiv);
            return false;
        });

        $('#myfond_gris, .btn btn-theme margintop10 pull-left').click(function () {
            var iddiv = $("#myfond_gris").attr('opendiv');
            $('#myfond_gris').fadeOut(300);
            $('#' + iddiv).fadeOut(300);
        });

    });

    function errorFields(errors) {
        if (!errors.responseText) {
            return false
        }
        errors = JSON.parse(errors.responseText).errors;
        var key = Object.keys(errors);
        key.forEach(function (id) {
            $('#div_' + id).addClass("has-error");
            $('#div_' + id + ' strong').text(errors[id][0]);
        });
    }

    /**
     * Сброс ошибок.
     */
    function resetError() {
        $('.form-group').removeClass("has-error");
        $('.form-group strong').text('');
    }
</script>

<div id="myfond_gris" opendiv=""></div>

<div style="background-color:#00a096;" iddiv="box_1" class="mymagicoverbox">
    оставьте свои данные
</div>

<div id="box_1" class="mymagicoverbox_fenetre" style="left:-225px; width:450px;">

    <form id="contactform" method="POST" class="validateform">
        {{ csrf_field() }}
        <div id="sendmessage">
            Ваше сообщение отправлено!
        </div>
        <div class="row">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="div_name">
                <label for="name">Кличка: </label>
                <div class="col-md-4">
                    <input type="text" name="name" placeholder="* Введите ваше имя">
                    <div class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </div>
                </div>
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" id="div_email">
                <div class="col-md-4">
                    <input type="email" name="email" placeholder="* Введите ваш email" >
                    <div class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </div>
                </div>
            </div>
            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}" id="div_phone">
                <div class="col-md-4">
                    <input type="text" name="phone" placeholder="телефон" >
                    <div class="help-block">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </div>
                </div>
            </div>
            <div class="form-group{{ $errors->has('theme') ? ' has-error' : '' }}" id="div_theme">
                <div class="col-md-4">
                    <input type="text" name="theme" placeholder="* Введите тему сообщения" >
                    <div class="help-block">
                        <strong>{{ $errors->first('theme') }}</strong>
                    </div>
                </div>
            </div>
            <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}" id="div_message">
                <div class="col-md-4">
                    <textarea rows="12" name="message" class="input-block-level" placeholder="* Ваше сообщение..."></textarea>
                    <div class="help-block">
                        <strong>{{ $errors->first('message') }}</strong>
                    </div>
                </div>
            </div>
            <p>
                <button class="btn btn-theme margintop10 pull-left" type="submit">Отправить</button>
                <span class="pull-right margintop20">* Заполните, пожалуйста, все обязательные поля!</span>
            </p>
        </div>

    </form>
</div>
</body>