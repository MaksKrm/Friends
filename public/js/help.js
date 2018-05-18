


$(document).ready(function () {
    $(".coverbox").click(function () {
        $('#fon').fadeIn(300);
        var iddiv = $(this).attr("iddiv");
        $('#' + iddiv).fadeIn(300);
        $('#fon').attr('opendiv', iddiv);
        return false;
    });
    $('#fon, .close').click(function () {
        var iddiv = $("#fon").attr('opendiv');
        $('#fon').fadeOut(300);
        $('#' + iddiv).fadeOut(300);
    });
});


function send(){
    $.post('/sendmail', $('#contactform').serializeArray(), function (data) {
        console.log(data);
        if (data.result) {
            $('#senderror').hide();
            $('#sendmessage').show();
        }

    })
        .fail(function() {
            alert( "error" );
        })

}



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
    $('.group').removeClass("has-error");
    $('.group strong').text('');
}

