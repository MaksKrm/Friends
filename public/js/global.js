/**
 * Вывод ошибок валидации.
 *
 * @param errors
 */
function errorFields(errors) {
    if(!errors.responseText){
        return false
    }
    errors=JSON.parse(errors.responseText);
    var key=Object.keys(errors);
    key.forEach(function(id) {
        $('#div_'+ id).addClass("has-error");
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