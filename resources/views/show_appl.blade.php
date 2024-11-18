@extends('layouts.header')
@section('title', 'Подать заявку')
@section('content')

@error('address') 
   <div class="alert alert-danger">{{$message}}</div>
@enderror
@error('date_time') 
   <div class="alert alert-danger">{{$message}}</div>
@enderror


<div class="container">
<form method="post" action="{{route('make_appl')}}">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Тип услуги</label>
    <select class="form-control" name="service_type">
        <option value="0">генеральная уборка</option>
        <option value="1">уборка после ремонта</option>
        <option value="2">уборка офиса</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Дата и время выполнения</label>
    <input type="datetime-local" class="form-control" id="exampleInputPassword1" name="date_time">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Адрес</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="address">
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
</form>
</div>
@endsection