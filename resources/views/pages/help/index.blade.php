@extends('layouts.main')

@section('content')
    <style>
        #sendmessage, #senderror {
            border: 1px solid #e6e6e6;
            background: #f6f6f6;
            display: none;
            text-align: center;
            padding: 15px 12px 15px 65px;
            margin: 10px 0;
            font-weight: 600;
            margin-bottom: 30px;
        }

        #senderror {
            color: #f00;
        }

        #senderror span {
            font-weight: bold;
        }

        .donate .modal-content {
            display: block;
        }

        .button-block {
            margin-bottom: 30px;
            clear: both;
        }

        .block {
            vertical-align: top;
        }

        .donate .modal-header {
            background: #ffeae5;
        }

        .donate p.modal-title {
            text-transform: uppercase;
            color: #262626;
            letter-spacing: .2em;
            font-weight: 700;
            line-height: 1;
        }

        .button-cancel {
            background: #da251c;
            border-bottom: 4px solid #268658;
            color: #fff;
        }

        .donate .modal-footer {
            justify-content: space-around;
        }

    </style>

    <div class="donate">

        <!-- Price List -->
        <div class="price-box">

            <div class="container">

                <p class="title">спасём жизнь тех</p>
                <h2>Кто нуждается в помощи</h2>

            {{--                <!-- Price Block -->
                            <div class="block promo">
                                <p><span>мы нуждаемся</span> в вашей помощи</p>
                                <ul>
                                    <li>корм</li>
                                    <li>медикаменты</li>
                                    <li>ветеринарная помощь</li>
                                    <li>ваша любовь и забота</li>
                                </ul>
                                <div class="button-holder">
                                    <a href="#" class="button">помочь</a>
                                </div>
                            </div>
                            <!-- Price Block Ends! -->--}}

            <!-- Price Block -->
                <div class="block">
                    <p><span>материальная помощь</span> нашим питомцам</p>
                    <ul>
                        <li>карта Приватбанка</li>
                        <li>WME-кошелёк</li>
                        <li>боксы для сбора денег</li>
                        <li>наличными при встрече</li>
                    </ul>
                    <div class="button-holder">
                        <a href="#" class="button">помочь</a>
                    </div>
                </div>
                <!-- Price Block Ends! -->

                <!-- Price Block -->
                <div class="block">
                    <p><span>другая помощь</span> нашим питомцам</p>
                    <ul>
                        <li>взятие на передержку</li>
                        <li>питание</li>
                        <li>бытовые и моющие средства</li>
                        <li>транспортировка</li>
                    </ul>
                    <div class="button-block">
                        <button type="button" class="button" data-toggle="modal" data-target="#exampleModalLong">
                            Помочь
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog"
                             aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <p class="modal-title" id="exampleModalLongTitle">Обратная связь</p>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div id="box_1" class="modal-body">
                                        <form id="contactform" method="POST" class="validateform">
                                            {{ csrf_field() }}
                                            <div class="alert alert-success" id="sendmessage">
                                                Ваше сообщение отправлено!
                                            </div>
                                            <div class="row form-group {{ $errors->has('name') ? ' has-error' : '' }}"
                                                 id="div_name">
                                                <label for="example-text-input"
                                                       class="col-sm-2 col-form-label">ФИО</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" name="name"
                                                           placeholder="* Введите ваше имя" required
                                                           id="example-text-input">
                                                </div>
                                                <div class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </div>
                                            </div>
                                            <div id="div_email"
                                                 class="form-group {{ $errors->has('email') ? ' has-error' : '' }} row">
                                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" class="form-control" id="inputEmail3"
                                                           name="email" placeholder="* Введите ваш email"
                                                           required>
                                                </div>
                                                <div class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </div>
                                            </div>
                                            <div id="div_phone"
                                                 class="form-group {{ $errors->has('phone') ? ' has-error' : '' }} row">
                                                <label for="example-tel-input"
                                                       class="col-sm-2 col-form-label">Телефон</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="example-tel-input"
                                                           name="phone" placeholder="0661320919">
                                                </div>
                                                <div class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </div>
                                            </div>

                                            <div id="div_theme"
                                                 class="form-group {{ $errors->has('theme') ? ' has-error' : '' }} row">
                                                <label for="example-text-input"
                                                       class="col-sm-2 col-form-label">Тема</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control" type="text" id="example-text-input"
                                                           name="theme" placeholder="еда" required>
                                                </div>
                                                <div class="help-block">
                                                    <strong>{{ $errors->first('theme') }}</strong>
                                                </div>
                                            </div>
                                            <div id="div_message"
                                                 class="form-group {{ $errors->has('message') ? ' has-error' : '' }} row">
                                                <label class="col-sm-2" for="exampleTextarea">Сообщение</label>
                                                <div class="col-sm-10">
                                                <textarea class="form-control" id="exampleTextarea" name="message"
                                                          rows="3"
                                                          placeholder="хочу помочь едой" required></textarea>
                                                </div>
                                                <div class="help-block">
                                                    <strong>{{ $errors->first('message') }}</strong>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="button-cancel" data-dismiss="modal">
                                                    Закрыть
                                                </button>
                                                <button type="submit" id="subbut" class="button">Отправить</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Price Block Ends! -->
            </div>
        </div>
        <!-- Price List ends! -->

        <!-- Types II -->
        <div class="types">
            <div class="container">

                <h4>Что нам необходимо?</h4>

                <p>Общество защиты животных г.Краматорск. Благотворительный фонд помощи бездомным животным."Друг"</p>

                <dl>
                    @foreach($all as $item)
                        <dt>{{ $item->help }}</dt>
                        <dd>{{ $item->message }}</dd>
                        <dd>{{ $item->contact }}</dd>
                    @endforeach
                </dl>
            </div>
        </div>
        <!-- Types II Ends! -->

        <!-- Types -->
        <div class="types">
            <div class="container">

                <h4>Материальная помощь</h4>

                <p>На данный момент источник финансирования фонда - членские взносы и добровольные пожертвования. Нас
                    мало, поэтому будем рады любой вашей помощи.</p>

                <!-- Types of Donation -->
                <div class="section float-left">

                    <h4>Реквизиты для оказания материальной помощи:</h4>

                    <dl>
                        <dt>Карточка Приватбанка 5168 7572 7448 5244</dt>
                        <dd>Черкасова Кирина</dd>
                        <dt>Адреса расположения боксов для сбора денег по городу:</dt>
                        <dd><a href="https://vk.com/topic-32288609_28909726" target="_blank">VK</a></dd>
                        <dt>Внести наличными по адресу: Социалистическая, 74.</dt>
                        <dd>Зоомагазин "Любимчик".</dd>
                    </dl>

                </div>
                <!-- Types of Donation Ends! -->

                <!-- Wish list -->
                <div class="section float-right">

                    <h4>WME-КОШЕЛЁК</h4>

                    <ul>
                        <li>Рубли: WMR R776226239527</li>
                        <li>Гривны: WMU U243031953928</li>
                        <li>Доллар: WMZ Z341977068373</li>
                        <li>Евро: WME E567097933882</li>
                    </ul>

                </div>
                <!-- Wish list Ends! -->

                <div class="button-holder">
                    <a href="#" class="button">Помочь</a>
                </div>

            </div>
        </div>
        <!-- Types Ends! -->

        <!-- Types II -->
        <div class="types">
            <div class="container">

                <h4>Что Вы должны знать</h4>

                <p>Общество защиты животных г.Краматорск. Благотворительный фонд помощи бездомным животным."Друг"</p>

                <dl>
                    <dt>Идентификационный номер 35672221</dt>
                    <dt>текущий счет в КФ КБ "Приватбанк":</dt>
                    <dd>26 00 80 60 87 05 86</dd>
                    <dd>МФО 33 55 48</dd>
                    <dd>назначение - благотворительный взнос</dd>
                    <dt>БФ "Друг" внесен в Единый реестр неприбыльных организаций и учреждений.</dt>
                    <dd>Заранее, большое спасибо!</dd>
                </dl>

            </div>
        </div>
        <!-- Types II Ends! -->


    </div>
@endsection
