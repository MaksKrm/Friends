function  sendform(id) {
    $('.form-group').removeClass("has-error");
    $('.form-group strong').text('');
    var data = $("form").serialize();
    // var formData = new FormData();
    // formData.set('name', $('#name').val());
    // formData.set('sex', $("#sex").val());
    // formData.set('species', $("#species").val());
    // formData.set('breed', $('#breed').val());
    // formData.set('age', $('#age').val());
    // formData.set('notes', $('#notes').val());
    // formData.set('contacts', $('#contacts').val());
    // formData.set('main_foto', $('#main_foto').prop('files')[0]);
    // var ins = document.getElementById('otherfoto').files.length;
    // for (var x = 0; x < ins; x++) {
    //     formData.set("files []", document.getElementById('otherfoto').files [x]);
    // }

    console.log(data);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "PUT",
        url: '/admin/animals/' + id,
        data: data,
        dataType: 'json',
        success: function (responce) {
            console.log(12132);
        },
        error: function (getErrors) {
            var errors = getErrors.responseJSON.errors;
            $.each(errors, function(index, value){
                $('#'+index+'_block').addClass("has-error");
                var id = index + '_block_strong';
                document.getElementById(id).innerHTML = value;
            });
        }
    });
}