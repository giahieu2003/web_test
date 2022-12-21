@extends('layouts.admin')

@section('title','Cập nhật profile')

@section('main')

<form action="" method="POST" role="form">
    @csrf @method('PUT')

    <div class="form-group">
        <label for="">Tên tài khoản</label>
        <input type="text" class="form-control" name="name" value="{{$auth->name}}" placeholder="Input field">
        @error('name') 
         <small style="color: red; font-style: italic">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Địa chỉ email</label>
        <input type="text" class="form-control" value="{{$auth->email}}" name="email" placeholder="Input email">
        @error('email') 
         <small style="color: red; font-style: italic">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Nhập mật khẩu để xác nhận</label>
        <input type="password" class="form-control" name="password" placeholder="Input password">
        @error('password') 
         <small style="color: red; font-style: italic">{{$message}}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

@stop()