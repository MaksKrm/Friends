@extends('adminlte::page')

@section('content')
    <h1>Добавить контакт</h1>
    <hr>
    <form action="{{ route('admin.contacts.store') }}" method="POST" enctype="multipart/form-data">
		{{ csrf_field() }}
		<div class="form-group">
			<label for="tittle">ФИО</label>
			<input type="text" class="form-control" id="contactName"  name="name">
		</div>
		<div class="form-group">
			<label for="address">Адрес</label>
			<input type="text" class="form-control" id="contactAddress"  name="address">
		</div>
    <div class="form-group">
			<label for="email">Email</label>
			<input type="text" class="form-control" id="contactEmail"  name="email">
		</div>
    <div class="form-group">
			<label for="phone">Телефон</label>
			<input type="text" class="form-control" id="contactPhone"  name="phone">
		</div>

		@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
		@endif
		<button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection
