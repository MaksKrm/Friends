@extends('layouts.main')
@section('content')
    <style>
        .price-box {
            margin-bottom: 0;
        }

        .price-box .table {
            background-color: #fff;
        }

        .price-box tr th {
            background-color: #afbb71;
            text-transform: uppercase;
            color: #262626;
            line-height: 3rem;
            letter-spacing: .2em;
        }

        .price-box .table th {
            border: none;
        }

        .price-box .pagination {
            font: 1rem "Grand Hotel", cursive;
            outline: none;
        }

        .price-box .page-item.active .page-link {
            background-color: #da251c;
            border-color: #da251c;
        }

        .price-box .page-item.disabled .page-link {
            color: #000;
            background-color: transparent;
            border-color: transparent;
        }

        .price-box .page-item:last-child .page-link,
        .price-box .page-item:first-child .page-link {
            color: #fff;
            background-color: transparent;
            border-color: transparent;
        }
    </style>
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
        <h2>выбрать отчетный период</h2>
        <form id="date_report" method="POST" class="validateform" action="{{route('choose_period')}}">
            {{ csrf_field() }}
            <select name="month">
                <!-- Выбор месяца -->
                @foreach (range(1, 12) as $val)
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
                @foreach (range(2018, $date) as $val)
                    <?php $date = date('Y');
                    $selected = ($val == $date ? ' selected' : ''); ?>
                    <option value="{{$val}}"{{$selected}}>{{$val}}</option>
                @endforeach
            </select>
            <button type="submit" id="subbut" class="button">выбрать</button>
        </form>
        <a href="{{route('reports')}}" class="button">вернуться</a>

    </div>

@endsection
