@extends('layouts.main')
@section('content')
    <div class="price-box">
        <div class="container">
            <p class="title">Сколько нами потрачено</p>
            <div id="types"></div>
            <h2>выберите отчетный период</h2>
            <form id="date_report" method="POST" class="validateform">
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
                    <button type="submit" href="{{route('choose_period')}}" id="subbut" class="goods__btn_inform my-3">выбрать</button>
                </div>
            </form>
        </div>
    </div>
    @if (count($reports) > 0)
        <section class="types">
            @include('pages.reports.load')
        </section>
    @endif
    <script src="/js/reports/ajax_reports.js"></script>
@endsection
