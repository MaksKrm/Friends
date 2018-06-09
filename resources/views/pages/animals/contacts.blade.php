<div class="modal-header bg-success">
    <button type="button" class="close" data-dismiss="modal"
            aria-label="Close"><span aria-hidden="true">&times;</span>
    </button>
    <h4 class="modal-title"> Контактные данные </h4>
</div>
<div class="modal-body">
    <div class="container">
        <span>Спасибо Вам, за проявленное желание - помочь животному</span>
        <p>Контакт для связи</p>
        {{$animal->contacts}}
        <p>Контакты фонда: +38 050 705 01 76
            +38 050 705 01 76</p>
        <div class="modal-footer">
            <button class="btn btn-danger" type="button" data-dismiss="modal"> Закрыть </button>
        </div>
    </div>
</div>