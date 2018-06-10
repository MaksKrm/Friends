$(document).ready(function () {
    //отправка почты аяксом
    $('#contactform').submit(function (e) {
        e.preventDefault();
        $("#subbut").attr('disabled', true).text('ожидайте результата').css({
            'background': '#787674',
            'border-bottom': '#268658'
        });
        $.ajax({
            type: 'POST',
            url: '/sendmail',
            data: $('#contactform').serialize(),
            success: function (data) {
                $('#sendmessage').show();
                $('#subbut').text('отправлено');
                resetError();
            },
            error: function (response) {
                $("#subbut").removeAttr('disabled').text('отправить повторно').css({'background': '#268658'});
                errorFields(response);
            }
        });
    });

//вывод ошибок валидации
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

   //сброс ошибок валидации
    function resetError() {
        $('.form-group').removeClass("has-error");
        $('.form-group strong').text('');
    }
})