$(document).ready(function () {
    $('#enter').click(function () {
        $('.form-group').removeClass("has-error");
        $('.form-group strong').text('');
        var formData = new FormData();
        formData.append('name', $('#name').val());
        formData.append('sex', $("#sex").val());
        formData.append('species', $("#species").val());
        formData.append('breed', $('#breed').val());
        formData.append('age', $('#age').val());
        formData.append('notes', $('#notes').val());
        formData.append('contacts', $('#contacts').val());
        formData.append('main_foto', $('#main_foto').prop('files')[0]);
        var ins = document.getElementById('otherfoto').files.length;
        for (var x = 0; x < ins; x++) {
            formData.append("files []", document.getElementById('otherfoto').files [x]);
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '/pets',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            success: function (responce) {
                if (responce.status == "ok") {
                    alert('Объявление добавлено, вы увидите его на сайте - после одобрения модератором');
                    window.location.reload();
                }
            },
            error: function (getErrors) {
                var errors = JSON.parse(getErrors.responseText);
                errors = errors.errors;
                $.each(errors, function (index, value) {
                    $('#' + index + '_block').addClass("has-error");
                    var id = index + '_block_strong';
                    document.getElementById(id).innerHTML = value;
                });
            }
        });
    });

    //Стилизация поля input['file'] модального окна
    $('.custom-file-input').change(function () {
        $(this).next('.form-control-file').addClass("selected").html($(this).val().replace(/\\/g, '/').replace(/.*\//, ''));
    });

    $('.multiple .custom-file-input').change(function () {
        var names = [];
        for (var i = 0; i < $(this).get(0).files.length; ++i) {
            names.push($(this).get(0).files[i].name);
        }
        $(this).next('.form-control-file').addClass("selected").html("Добавлено " + names.length + " фото");
    });
});