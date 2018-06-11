//Создание товара
function createGood() {
    $.ajax({
        type: 'GET',
        url: '/admin/goods/create',
        success: function (response) {
            $('.modal-content').empty().append(response);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#storegood').submit(function (e) {
                e.preventDefault();
                var formData = new FormData($('#storegood')[0]);
                $.ajax({
                    method: 'POST',
                    url: 'goods',
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

//Изменение товара
function editGood(id) {
    $.ajax({
        type: 'GET',
        url: '/admin/goods/' + id + '/edit',
        success: function (response) {
            $('.modal-content').empty().append(response);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#updategood').submit(function (e) {
                e.preventDefault();
                var formData = new FormData($('#updategood')[0]);
                formData.append('_method', 'PATCH');
                $.ajax({
                    method: 'POST',
                    url: '/admin/goods/' + id,
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

//Удаление товара
function deleteGood(id) {
    $.ajax({
        type: 'GET',
        url: '/admin/goods/' + id,
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
                    url: '/admin/goods/' + id,
                    data: {_method: 'delete', _token: $(this).data('token')},
                    success: function () {
                        location.reload();
                    }
                });
            });
        }
    });
}