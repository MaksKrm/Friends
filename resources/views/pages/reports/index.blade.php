@extends('layouts.main')
@section('content')
    <div class="price-box">
        <div class="container">
            <p class="title">Сколько нами потрачено</p>
            <h2>Отчёт за последний месяц</h2>
            <p class="title my-4">выбрать отчетный период</p>
            <form id="date_report" method="POST" class="validateform" action="{{route('choose_period')}}">
                {{ csrf_field() }}
                <?php $existing = [];
                foreach ($mounths as $mounth) {
                    $existing[] = date('n', strtotime($mounth->accounting_period));
                }
                $existing = array_unique($existing);
                ?>
                <select name="month">
                    <!-- Выбор месяца -->
                    @foreach ($existing as $val)
                        <?php
                        $date = date('m');
                        $months = [
                            '1' => 'Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
                            'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь',
                        ];
                        $selected = ($val == $date ? ' selected' : ''); ?>
                        <option value="{{$val}}"{{$selected}}>{{$months[$val]}}</option>
                    @endforeach
                </select>
                <!-- Выбор года -->
                <select name="year">
                    <?php $date = date('Y');?>
                    @foreach (range(2018, $date) as $val)
                        <?php $selected = ($val == $date ? ' selected' : ''); ?>
                        <option value="{{$val}}"{{$selected}}>{{$val}}</option>
                    @endforeach
                </select>
                <div>
                    <button type="submit" id="subbut" class="goods__btn_inform my-3">выбрать</button>
                </div>
            </form>
        </div>
    </div>
    @if (count($reports) > 0)
        <section class="types">
            @include('pages.reports.load')
        </section>
    @endif


    <script type="text/javascript">

        $(function () {
            $('.pagination a').live('click', function (e) {
                e.preventDefault();

                $('#load a').css('color', '#dfecf6');
                var url = $(this).attr('href');
                getArticles(url);
                window.history.pushState("", "", url);
            });

            function getArticles(url) {
                $.ajax({
                    url: url
                }).done(function (data) {
                    $('.types').html(data);
                }).fail(function () {
                    alert('Articles could not be loaded.');
                });
            }
        });
    </script>
@endsection
