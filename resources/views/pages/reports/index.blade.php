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
            <h2>Сколько нами потрачено</h2>
            <p class="title">Отчёт за последний месяц</p>
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
                    @foreach($all as $report)
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
        </div>
        <h2>выбрать отчетный период</h2>
        <form id="date_report" method="POST" class="validateform" action="{{route('choose_period')}}">
            {{ csrf_field() }}
            <?php $existing=[];
            foreach($mounths as $mounth){
                $existing[]=date('n',strtotime($mounth->accounting_period));
            }
            $existing=array_unique($existing);
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
                <button type="submit" id="subbut" class="button">выбрать</button>
        </form>
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
