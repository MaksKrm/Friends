//Создание отчета
function createReport() {
    $.ajax({
        type: 'GET',
        url: '/admin/reports/create',
        success: function (response) {
            $('.modal-content').empty().append(response);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#store-report').submit(function (e) {
                e.preventDefault();
                $("#subbut").attr('disabled', true).text('ожидайте').css({
                    'background': '#787674',
                    'border-bottom': '#268658'
                });
                $('.form-group').removeClass("has-error");
                $('.form-group strong').text('');
                var formData = new FormData($('#store-report')[0]);
                $.ajax({
                    method: 'POST',
                    url: 'reports',
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function () {
                        location.reload();
                    },
                    error: function (response) {
                        errorFields(response);
                    }
                });
            });
        },
        error: function () {
            alert("Ошибка соединения");
        }
    });
}

//Вывод ошибок
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

//Удаление отчета

function deleteReport(id) {
    $.ajax({
        type: 'GET',
        url: '/admin/reports/' + id,
        success: function (response) {
            $('.modal-content').empty().append(response);
            $('#destroy-report').click(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/admin/reports/' + id,
                    data: {_method: 'delete', _token: $(this).data('token')},
                    success: function () {
                        location.reload();
                    }
                });
            });
        }
    });
}