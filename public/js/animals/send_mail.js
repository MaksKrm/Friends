$( document ).ready(function() {
    $('#send').click(function (){
        $('.form-group').removeClass("has-error");
        $('.form-group strong').text('');
        var formData = $( "form" ).serialize();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: '/animalmail',
            data: formData,
            success: function(responce){
                if(responce.status=='ok'){
                    window.location.reload();
                }
            },
            error: function (getErrors) {
                var errors = JSON.parse(getErrors.responseText);
                errors = errors.errors;
                $.each(errors, function(index, value){
                    $('#'+index+'_block').addClass("has-error");
                    var id = index + '_block_strong';
                    document.getElementById(id).innerHTML = value;
                });
            }
        });
    });
});