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

        .fond {
            position: absolute;
            padding-top: 45px;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #f8b334;
        }

        .button-holder {
            display: inline-block;
            color: #ffffff;
            padding: 10px;
            margin: 10px;
            cursor: pointer;
            font-weight: 300;
            font-family: 'Roboto';
        }

        .mymagicoverbox_fenetre {
            z-index: 9999;
            position: fixed;
            margin-left: 50%;
            top: 100px;
            text-align: center;
            display: none;
            padding: 5px;
            background-color: #ffffff;
            color: #97BF0D;
            font-style: normal;
            font-size: 20px;
            font-weight: 300;
            font-family: 'Roboto';
        }

        .mymagicoverbox_fenetreinterieur {
            text-align: center;
            overflow: auto;
            padding: 10px;
            background-color: #ffffff;
            color: #666666;
            font-weight: 400;
            font-family: 'Roboto';
            font-size: 17px;
            border-top: 1px solid #e7e7e7;
            margin-top: 10px
        }

        .mymagicoverbox_fermer {
            color: #CB2025;
            cursor: pointer;
            font-weight: 400;
            font-size: 14px;
            font-style: normal
            font-family: 'Roboto';
        }

        #myfond_gris {
            display: none;
            background-color: #000000;
            opacity: 0.7;
            width: 100%;
            height: 100%;
            z-index: 9998;
            position: fixed;
            top: 0;
            bottom: 0;
            right: 0;
            left: 0;
        }
        .help-block {
            font-size: 14px;
        }
    </style>

    <div class="donate">

        <!-- Price List -->
        <div class="price-box">

            <div class="container">

                <p class="title">спасём жизнь тех</p>
                <h2>Кто нуждается в помощи</h2>

                <!-- Price Block -->
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
                <!-- Price Block Ends! -->

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
                        <div id="myfond_gris" opendiv=""></div>

                        <div iddiv="box_1" class="button-holder">
                            <button class="button">оставьте свои данные</button>
                        </div>

                        <div id="box_1" class="mymagicoverbox_fenetre" style="left:-225px; width:450px;">

                            <form id="contactform" method="POST" class="validateform">
                                {{ csrf_field() }}
                                <div id="sendmessage">
                                    Ваше сообщение отправлено!
                                </div>
                                <div class="row">
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}" id="div_name">
                                        <div>
                                            ФИО<input type="text" name="name" placeholder="* Введите ваше имя" required>
                                            <div class="help-block">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" id="div_email">
                                        <div>
                                            email<input type="email" name="email" placeholder="* Введите ваш email" required>
                                            <div class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}" id="div_phone">
                                        <div>
                                            телефон<input type="text" name="phone" placeholder="0661320919" >
                                            <div class="help-block">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('theme') ? ' has-error' : '' }}" id="div_theme">
                                        <div>
                                            тема<input type="text" name="theme" placeholder="еда" required>
                                            <div class="help-block">
                                                <strong>{{ $errors->first('theme') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}" id="div_message">
                                        <div>
                                            сообщение<textarea rows="12" name="message" class="input-block-level" placeholder="хочу помочь едой" required></textarea>
                                            <div class="help-block">
                                                <strong>{{ $errors->first('message') }}</strong>
                                            </div>
                                        </div>
                                    </div>
                                    <span style="width: 100%;"> Заполните, все обязательные поля!</span>
                                    <div>
                                        <button type="submit">Отправить</button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>
                <!-- Price Block Ends! -->

            </div>
        </div>
        <!-- Price List ends! -->

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
