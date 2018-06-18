<div class="modal-header modal-shelter">
    <h5 class="modal-title">Контактные данные</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body justify-content-center">
    <div class="container">
        <div class="modal-shelter_contact mb-3">Спасибо Вам за проявленное желание помочь животному</div>
        <div class="mb-2">Контакт для связи:</div>
        <div class="modal-shelter_contact">{{ $animal->contacts }}</div>
        <div class="my-2">Контакты фонда:</div>
        <div class="modal-shelter_phone">+38 050 705 01 76</div>
        <div class="modal-shelter_phone">+38 050 705 01 76</div>
        <div class="modal-footer mt-2">
            <button class="button goods__btn_inform goods__btn_danger" type="button" data-dismiss="modal">Закрыть
            </button>
        </div>
    </div>
</div>
<style>
    .modal-header,
    .modal-body {
        width: 100%;
    }

    .modal-shelter {
        background: #afbb71;
    }

    .modal-shelter .modal-title {
        color: #fefdfb;
        line-height: 2;
    }

    .modal-shelter_phone {
        color: #009a3e;
    }

    .modal-shelter_contact,
    .modal-shelter_phone {
        font: 1.2rem "Grand Hotel", cursive;
    }

    .goods__btn_danger {
        background-color: #da251c;
    }

    .modal-body .goods__btn_inform {
        padding: 10px 20px;
    }
</style>