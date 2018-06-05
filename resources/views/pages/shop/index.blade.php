@extends('layouts.main')

@section('content')
    <div class="shop">
        <div class="container">
            <p class="title">Приобретаете товары - помогаете фонду</p>
            <h3>Ярмарка товаров</h3>
            <div class="card-deck mt-2">
                <div class="row mb-2">
                    @foreach ($goods as $good)
                        <div class="col-xl-3 col-md-4 col-sm-6 col-xs-6 col-6">
                            <div class="card mb-4">
                                {{--      <img class="card-img-top"
                                           alt="Фото товара"
                                           src="{{ asset("storage/$good->photo")  }}"
                                           data-holder-rendered="true">--}}
                                <img class="card-img-top" src="{{ $good->photo }}" alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title"><a
                                                href="{{route('shop.show', $good->id)}}">{{ $good->title }}</a></h5>
                                    <p class="card-text">{{ str_limit($good->description, $limit = 100, $end = '...') }}</p>
                                </div>
                                <div class="card-footer">
                                    <div>
                                        <button onclick="buyGood({{ $good->id }})" class="goods__btn"
                                                data-toggle="modal"
                                                data-target="#modal-shop">Купить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- Modal -->
                <div class="modal fade" id="modal-shop" tabindex="-1" role="dialog"
                     aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="page top-pattern">
        <div class="container">
            {{ $goods->links() }}
        </div>
    </div>
    <script>
        function buyGood(id) {
            $.ajax({
                type: 'GET',
                url: '/shop/' + id,
                success: function (response) {
                    $('.modal-content').empty().append(response);
                },
                error: function () {
                    alert("Ошибка соединения");
                }
            });
        }
    </script>
@endsection