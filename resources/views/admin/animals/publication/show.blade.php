<b>Вы хотит удолить объявление?</b>
<form action="" method="post">
    {{ csrf_field() }}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <input name="_method" type="hidden" value="DELETE">
    <button class="btn btn-default" type="button" data-dismiss="modal" onclick="destroy({{$animal->id}})">Да</button>
    <button class="btn btn-default" type="button" data-dismiss="modal">НЕТ</button>
</form>
<script>
    function destroy(id) {
        $.ajax({
            type: 'DELETE',
            url: '/admin/publication/' + id,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function(response) {
                location.reload();
            }
        });
    }
</script>