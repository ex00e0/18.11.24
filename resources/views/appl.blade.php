@extends('layouts.header')
@section('title', 'Мои заявки')
@section('content')

@error('success') 
<script>alert("{{$message}}");</script>
@enderror
<div class="container">
@foreach($appl as $a)
<div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title">Заявка № {{$a->id}}</h5>
    <p class="card-text">Статус: {{$a->status}}</p>
    <p class="card-text">Время: {{$a->date_time}}</p>
    <p class="card-text">Адрес: {{$a->address}}</p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
  </div>
</div>
@endforeach
</div>
@endsection