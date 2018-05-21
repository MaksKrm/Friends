@extends('layouts.admin.app')

@section('content')

	@foreach ($informations as $information)
		<div>
			<p>{{$information->created_at}}</p>
			<h1>{{$information->tittle}}</h1>
			<div style="max-width: 500px;">
				<p><img class="card-img-right flex-auto d-none d-md-block"
                    data-src="holder.js/200x250?theme=thumb"
					alt="Thumbnail [200x250]"
                    style="width: auto; max-width: 400px;"
                    src="{{ asset("storage/$information->file")  }}"
                    data-holder-rendered="true">
				</p>
			</div>
			<div>
				<p>{{$information->article}}</p>
			</div>
		</div>
	@endforeach

@endsection
