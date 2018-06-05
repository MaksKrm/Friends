<div class="container" id="load" style="position: relative;">

    <h4 style="text-align: center">здесь вы можете скачать наши все отчеты</h4>
    <dl>
        @foreach($reports as $report)
            <dt>{{ $report->message }}</dt>
            <dd>{{$report->created_at}}</dd>
            <dd> <a href="{{route('up_from_disk', $report->id)}}">скачать</a></dd>
        @endforeach
    </dl>
    <div class="row justify-content-center mt-3">{{$reports->links()}}</div>
</div>