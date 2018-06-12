//Создание контакта
function createContacts() {
    $.ajax({
        type: 'GET',
        url: '/admin/contacts/create',
        success: function (response) {
            $('.modal-content').empty().append(response);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#store-contacts').submit(function (e) {
                e.preventDefault();
                $('.form-group').removeClass("has-error");
                $('.form-group strong').text('');
                var formData = new FormData($('#store-contacts')[0]);
                $.ajax({
                    method: 'POST',
                    url: 'contacts',
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

//Обновление контакта
function editContacts(id) {
    $.ajax({
        type: 'GET',
        url: '/admin/contacts/' + id + '/edit',
        success: function (response) {
            $('.modal-content').empty().append(response);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#update-contacts').submit(function (e) {
                e.preventDefault();
                var formData = new FormData($('#update-contacts')[0]);
                formData.append('_method', 'PATCH');
                $.ajax({
                    method: 'POST',
                    url: '/admin/contacts/' + id,
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

//Удаление контакта
function deleteContacts(id) {
    $.ajax({
        type: 'GET',
        url: '/admin/contacts/' + id,
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
                    url: '/admin/contacts/' + id,
                    data: {_method: 'delete', _token: $(this).data('token')},
                    success: function () {
                        location.reload();
                    }
                });
            });
        }
    });
}
