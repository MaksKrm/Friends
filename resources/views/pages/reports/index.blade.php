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
            <p class="title">Отчёт</p>
            <h2>Сколько нами потрачено</h2>
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
            <div class="row justify-content-center mt-3">{{$all->links()}}</div>
        </div>
    </div>
@endsection
