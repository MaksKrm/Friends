@extends('adminlte::page')

@section('content')
  <h1>Редактирование контактов</h1>
  <hr>
  <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PATCH">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="form-group">
    <label for="tittle">ФИО</label>
    <input type="text" class="form-control" id="contactName"  value="{{$contact->name}}" name="name">
  </div>
  <div class="form-group">
    <label for="address">Адрес</label>
    <input type="text" class="form-control" id="contactAddress"  value="{{$contact->address}}" name="address">
  </div>
  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" id="contactEmail"  value="{{$contact->email}}" name="email">
  </div>
  <div class="form-group">
    <label for="phone">Телефон</label>
    <input type="text" class="form-control" id="contactPhone"  value="{{$contact->phone}}"name="phone">
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
