<div class="table-responsive mt-2 slideInUp wow">
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

