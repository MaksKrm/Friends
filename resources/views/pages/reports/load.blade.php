<p class="title text-center mt-4">здесь вы можете скачать наши все отчеты</p>
<div class="container donate mt-4" id="load" style="position: relative;">
    <dl>
        @foreach($reports as $report)
            <dt class="my-3">{{ $report->message }}</dt>
            <dd>{{$report->created_at}}</dd>
            <dd class="mt-1"><a href="{{route('up_from_disk', $report->id)}}">скачать</a></dd>
        @endforeach
    </dl>
    <div class="row justify-content-center mt-3">{{$reports->links()}}</div>
</div>