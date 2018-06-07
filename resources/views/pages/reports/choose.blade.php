@extends('layouts.main')
@section('content')
    <div class="price-box">
        <div class="container">
            @if(count($date)==0)
                <h2>за выбранный период отчетов нет</h2>
            @else
                <h2>Сколько нами потрачено</h2>
                <p class="title">Отчёт</p>
                <div class="table-responsive mt-2">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Отчетный период</th>
                            <th scope="col">Поступления</th>
                            <th scope="col">Количество</th>
                            <th scope="col">Расходы</th>
                            <th scope="col">Количество</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($date as $report)
                            <tr>
                                <td>{{$report->accounting_period}}</td>
                                <td>{{$report->income}}</td>
                                <td>{{$report->income_val}}</td>
                                <td>{{$report->expense}}</td>
                                <td>{{$report->expense_val}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
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
            <div class="row">
                <div class="container">
                    <button type="submit" id="subbut" class="goods__btn_inform my-3">выбрать</button>
                    <a href="{{route('reports')}}" class="goods__btn_inform my-3 button">вернуться</a>
                </div>
            </div>
        </form>
    </div>

@endsection
