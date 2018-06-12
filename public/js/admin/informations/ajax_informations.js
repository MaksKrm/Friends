//Создание информации
function createInformations() {
    $.ajax({
        type: 'GET',
        url: '/admin/informations/create',
        success: function (response) {
            $('.modal-content').empty().append(response);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#store-informations').submit(function (e) {
                e.preventDefault();
                $('.form-group').removeClass("has-error");
                $('.form-group strong').text('');
                var formData = new FormData($('#store-informations')[0]);
                $.ajax({
                    method: 'POST',
                    url: 'informations',
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

//Обновление новости
function editInformations(id) {
    $.ajax({
        type: 'GET',
        url: '/admin/informations/' + id + '/edit',
        success: function (response) {
            $('.modal-content').empty().append(response);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#update-informations').submit(function (e) {
                e.preventDefault();
                var formData = new FormData($('#update-informations')[0]);
                formData.append('_method', 'PATCH');
                $.ajax({
                    method: 'POST',
                    url: '/admin/informations/' + id,
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

//Удаление новости

function deleteInformation(id) {
    $.ajax({
        type: 'GET',
        url: '/admin/informations/' + id,
        success: function (response) {
            $('.modal-content').empty().append(response);
            $('#destroy-good').click(function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/admin/informations/' + id,
                    data: {_method: 'delete', _token: $(this).data('token')},
                    success: function () {
                        location.reload();
                    }
                });
            });
        }
    });
}