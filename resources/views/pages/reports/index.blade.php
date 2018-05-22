@extends('layouts.main')

@section('content')
    <style>
        html, body {
            background-color: #f0f0f0;
            color: #000000;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }
        table{
            margin: 0 auto;
            margin-bottom: 10px;
            margin-top: 10px;
        }
        td {
            border: 1px solid black;
            padding: 5px;
        }
        .paginat ul {
            margin-left: 240px;
        }
        .paginat ul li{
            display: inline;
            margin-left: 30px;
        }

    </style>
    <div>
        <div style="text-align: center">отчет</div>
    <table>
        <tr>
            <td>отчетный период</td>
            <td>поступления</td>
            <td>количество</td>
            <td>расходы</td>
            <td>количество</td>
        </tr>
        @foreach($all as $report)
            <tr>
                <td>{{$report->accounting_period}}</td>
                <td>{{$report->income}}</td>
                <td>{{$report->income_val}}</td>
                <td>{{$report->expense}}</td>
                <td>{{$report->expense_val}}</td>
            </tr>

        @endforeach


    </table>
        <div class="paginat">{{$all->links()}}</div>


@endsection
