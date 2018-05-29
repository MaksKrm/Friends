<div class="modal-header bg-danger">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title">Удаление объявления</h4>
</div>
<div class="modal-body">Вы уверены, что хотите удалить объявление?</div>
<div class="modal-footer">
    <form action="">
        <input name="_method" type="hidden" value="DELETE">
        <button class="btn btn-default" type="button" data-dismiss="modal" onclick="destroy({{ $animal->id }})">Да</button>
        <button class="btn btn-default" type="button" data-dismiss="modal">Нет</button>
    </form>
</div>

<script>
    function destroy(id) {
        $.ajax({
            type: 'DELETE',
            url: '/admin/animals/' + id,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            success: function (response) {
                location.reload();
            }
        });
    }
</script>