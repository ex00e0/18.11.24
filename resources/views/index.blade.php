@extends('layouts.header')
@section('title', 'Вход')
@section('content')

@error('login') 
   <div class="alert alert-danger">{{$message}}</div>
@enderror
@error('password') 
   <div class="alert alert-danger">{{$message}}</div>
@enderror
<div class="container">
<form method="post" action="{{route('login')}}">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Логин</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="login">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Войти</button>
</form>
</div>
@endsection