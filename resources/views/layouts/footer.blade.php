<!-- footer -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h6>Немного о нас</h6>
                <p><strong>Благотворительный фонд "ДРУГ"- это не приют. Это единомышленники - волонтёры, которые в силу
                        возможностей помогают животным.</strong></p>
                <p>Мы предлагаем объединиться всем Краматорчанам, которые не равнодушны к проблеме бездомных и брошенных
                    животных, а также животных, подвергшихся жестокому обращению.</p>
            </div>
            <div class="col-md-3 blog">
                <h6>Последние новости</h6>
                <p class="title"><a href="#" title="">{{ $latestNews->title }}</a></p>
                <p>{{ str_limit($latestNews->text, $limit = 150, $end = '...') }}</p>
                <p><a href="{{ route('news.show', $latestNews->id) }}">Подробнее...</a></p>
            </div>
            <div class="col-md-3">
                <h6>Вам это понадобится</h6>
                <ul>
                    <li><a href="{{ route('index') }}">Главная</a></li>
                    <li><a href="{{route('information.index')}}">Полезная информация</a></li>
                    <li><a href="{{route('help')}}">Помощь</a></li>
                    <li><a href="{{route('pets.index')}}">Ищут хозяев</a></li>
                    <li><a href="{{route('reports')}}">Отчётность</a></li>
                    <li><a href="{{route('contacts')}}">Контакты</a></li>
                </ul>
            </div>
            <div class="col-md-3 contact-info">
                <h6>Ярмарка товаров</h6>
                <p>Приобретая товары у нас, вы помогаете фонду, ради спасения наших друзей</p>
                <p><a href="{{ route('shop.index')}}">Подробнее...</a></p>
                <p class="social">
                    <a href="https://www.facebook.com/groups/krmdrug/" target="_blank" class="fa fa-facebook"></a>
                    <a href="https://vk.com/protectionanimals" target="_blank" class="fa fa-vk"></a>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 copyright">
                <p>&copy; Copyright 2018. All rights reserved. <a href="https://aiti20.com/" title="IT2.0"
                                                                  target="_blank">IT2.0</a></p>
            </div>
        </div>
    </div>
</div>
<!-- footer ends -->