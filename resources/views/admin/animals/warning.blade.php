<b>Вы хотит удолить объявление?</b>
<form action="" >
    <input name="_method" type="hidden" value="DELETE">
<button type="button" onclick="destroy({{$animal->id}})">ДА</button>
<button class="btn btn-default" type="button" data-dismiss="modal">НЕТ</button>
</form>
<script>
    function destroy(id) {
        $.ajax({
            type: 'DELETE',
            url: '/animals/' + id,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(response) {
                location.reload();
            }
        });
    }
</script>