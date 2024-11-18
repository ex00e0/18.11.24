@extends('layouts.header')
@section('title', 'Регистрация')
@section('content')

@error('full_name') 
   <div class="alert alert-danger">{{$message}}</div>
@enderror
@error('phone') 
   <div class="alert alert-danger">{{$message}}</div>
@enderror
@error('email') 
   <div class="alert alert-danger">{{$message}}</div>
@enderror
@error('login') 
   <div class="alert alert-danger">{{$message}}</div>
@enderror
@error('password') 
   <div class="alert alert-danger">{{$message}}</div>
@enderror

<div class="container">
<form method="post" action="{{route('reg')}}">
    @csrf
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">ФИО</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="full_name">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Номер телефона</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="phone">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Электронная почта</label>
    <input type="email" class="form-control" id="exampleInputEmail1" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Логин</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="login">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form>
</div>
@endsection