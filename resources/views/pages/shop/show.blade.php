<div class="modal-header">
    <h5 class="modal-title" id="exampleModalLongTitle">{{ $good->title }}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <span class="shop__id pb-2">id: {{ $good->id }}</span>
{{--    <img class="card-img-top"
         alt="Фото товара"
         src="{{ asset("storage/$good->photo")  }}"
         data-holder-rendered="true">--}}
    <img class="card-img-top" src="{{ $good->photo }}" alt="Card image cap">
    <p class="mt-3">{{ $good->description }}</p>
    <p class="shop__order">Для получения дальнейшей информации и заказа обратитесь по номеру</p>
    <p class="shop__contact">+38 050 705 01 76</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn shop__btn_close" data-dismiss="modal">Закрыть</button>
</div>