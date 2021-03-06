<!-- Header -->
<header class="header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-12 col-sm-6 col-md-5 col-lg-3">
                <h1><a href="{{ route('index')}}">
                        @if(!empty($logo))
                            <img alt="Благотворительный фонд Друг"
                                 src="{{ asset("storage/$logo->name") }}">
                        @else
                            <img alt="Благотворительный фонд Друг"
                                 src="{{ asset("img/logo-drug.png") }}">
                        @endif </a></h1>
            </div>
            <div class="col-12 pb-1 col-sm-6 col-md-3 col-lg-3">
                <div class="slogan">Вместе спасём жизнь тех, кто просит о помощи</div>
            </div>
            <div class="col-7 my-3 pb-3 col-xs-4 col-sm-4 col-md-3 col-lg-2">
                <ul class="contacts">
                    @for ($i = 0; $i < 2; $i++)
                        @if(!empty($companyContacts[$i]))
                            <li>{{ $companyContacts[$i]->phone }}</li>
                        @else
                            <li>+380507050176</li>
                        @endif
                    @endfor
                </ul>
            </div>
            <div class="col-12 order-1 my-4 col-sm-4 push-sm-4 col-md-12 col-lg-1">
                <a href="https://www.liqpay.ua/ru/checkout/i87165963894" target="_blank" class="button">Помочь</a>
            </div>
            <div class="col-5 col-sm-4 pull-sm-4 col-md-1 col-lg-2 order-lg-12">
                <div class="social">
                    <ul class="menu">
                        <li><a href="https://www.facebook.com/groups/krmdrug/" target="_blank"><i
                                        class="fa fa-facebook fa-1x"></i></a></li>
                        <li><a href="https://vk.com/protectionanimals" target="_blank"><i
                                        class="fa fa-vk fa-1x"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
        @include('layouts.nav')
    </div>
</header>
<!-- Header ends -->