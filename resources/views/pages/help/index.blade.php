@extends('layouts.main')
@section('content')
    <div class="donate">
        <div class="price-box">
            <div class="container">
                <p class="title">спасём жизнь тех</p>
                <h2>Кто нуждается в помощи</h2>
                <div class="block fadeInLeft wow">
                    <p><span>материальная помощь</span> нашим питомцам</p>
                    <ul>
                        <li>карта Приватбанка</li>
                        <li>боксы для сбора денег</li>
                        <li>наличными при встрече</li>
                    </ul>
                    <div class="button-holder">
                        <a href="https://www.liqpay.ua/ru/checkout/i87165963894" target="_blank"
                           class="button">помочь</a>
                    </div>
                </div>
                <div class="block fadeInRight wow">
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
            </div>
        </div>
        <div class="types mt-4 pt-4">
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
        <div class="types">
            <div class="container">
                <h4>Материальная помощь</h4>
                <p>На данный момент источник финансирования фонда - членские взносы и добровольные пожертвования. Нас
                    мало, поэтому будем рады любой вашей помощи.</p>
                <h4>Реквизиты для оказания материальной помощи:</h4>
                <dl>
                    <dt>Карточка Приватбанка 5168 7573 0988 6267</dt>
                    <dd>Черкасова Кирина</dd>
                </dl>
                <h4>Адреса расположения боксов для сбора денег по городу:</h4>
                <div class="section float-left">
                    <dl>
                        <dt>ул. Дружбы</dt>
                        <dd>Дружбы,24 кафе "Фиеста"</dd>
                        <dd>Дружбы, 28 ветклиника "Айболит"</dd>
                        <dt>ул. Ярослава Мудрого</dt>
                        <dd>Ярослава Мудрого. ветклиника "Энималз"</dd>
                        <dt>ул.Юбилейная</dt>
                        <dd>Юбилейная, 50 "Гринвет"</dd>
                        <dt>ул. Б. Хмельницкого</dt>
                        <dd>Б.Хмельницкого, магазин "Брежнева"</dd>
                        <dt>ул. Академическая</dt>
                        <dd>Академическая, 30 "Зоомир"</dd>
                        <dd>Академическая, 75 "Кофе-клуб Чай-Town"</dd>
                        <dt>ул. Марата</dt>
                        <dd>Марата, "Мастерстудио"</dd>
                        <dt>ул. Катеринича</dt>
                        <dd>Катеринича, 13,к.57 "Рекл. Аген. Арт-Модер"</dd>
                        <dt>Старый город рынок</dt>
                        <dd>"Энималз"</dd>
                        <dt>ул. Школьная</dt>
                        <dd>Школьная, 5 СЦ "Планета знаний"</dd>
                        <dt>ул. В Садова</dt>
                        <dd>В.Садова, 70 "Аквамир"</dd>
                    </dl>
                </div>
                <div class="section float-right">
                    <dl>
                        <dt>Крытый рынок</dt>
                        <dd>"Зоомир", павильйон №260</dd>
                        <dd>Мясо, павильйон №192</dd>
                        <dt>ул. Парковая</dt>
                        <dd>Парковая, 15 "Мой питомец"</dd>
                        <dd>Парковая, 49 парикмахерская "Людмила"</dd>
                        <dd>Парковая, 50 "Зоомир"</dd>
                        <dd>Парковая, 59 "Аквазоо"</dd>
                        <dd>Парковая, 81-961 "Зоомама"</dd>
                        <dt>ул. Василя Стуса</dt>
                        <dd>Василя Стуса, 45 Гост. Краматорск, авиакасса</dd>
                        <dd>Василя Стуса, 49 ресторан "Мачос"</dd>
                        <dd>Василя Стуса, 53 "Нерру pets"</dd>
                        <dd>Василя Стуса, 69 "Zoomanji"</dd>
                        <dd>Василя Стуса, 74 "Любимчик"</dd>
                        <dt>ул. Дворцовая</dt>
                        <dd>ПРОГРЕСС, "Брусничка"</dd>
                        <dd>"Золотая рыбка</dd>
                        <dd>Дворцовая, 43 "Спорттовары"</dd>
                        <dd>Дворцовая, 45 "Сытая морда"</dd>
                        <dd>Дворцовая, "Сателит"</dd>
                    </dl>
                </div>
                <div class="button-holder">
                    <a href="https://www.liqpay.ua/ru/checkout/i87165963894" target="_blank" class="button">Помочь</a>
                </div>
            </div>
        </div>
        <div class="types">
            <div class="container">
                <h4>Что Вы должны знать</h4>
                <p>Местный благотворительный фонд помощи бездомным животным "Друг" г.Краматорск.</p>
                <dl>
                    <dt>Идентификационный номер 35672221</dt>
                    <dt>текущий счет в КФ КБ "Приватбанк":</dt>
                    <dd>26 00 80 60 87 05 86</dd>
                    <dd>МФО 33 55 48</dd>
                    <dd>ОКПО 35 67 22 21</dd>
                    <dd>назначение - благотворительный взнос</dd>
                    <dt>БФ "Друг" внесен в Единый реестр неприбыльных организаций и учреждений.</dt>
                    <dd>Заранее, большое спасибо!</dd>
                </dl>
            </div>
        </div>
    </div>
    <script src="/js/help/send_mail.js"></script>
@endsection
