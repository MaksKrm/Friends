$( document ).ready(function() {
    $('#enter').click(function (){
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
            url: '/admin/animals',
            data: formData,
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            success: function(responce){
                if(responce.status == "ok"){
                    window.location.reload();
                }
            },
            error: function (getErrors) {
                var errors = JSON.parse(getErrors.responseText);
                errors = errors.errors;
                console.log(errors);
                $.each(errors, function(index, value){
                    if (index.search(/files/i)!=-1) {
                        $('#otherfoto_block').addClass("has-error");
                        $("#otherfoto_block strong").text(value);
                    }
                    console.log(errors);
                    $('#'+index+'_block').addClass("has-error");
                    $('#'+index+'_block strong').text(value);
                });
            }
        });
    });
});