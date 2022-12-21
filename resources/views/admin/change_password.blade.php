@extends('layouts.admin')

@section('title','Cập nhật profile')

@section('main')

<form action="" method="POST" role="form">
    @csrf @method('PUT')
    <div class="form-group">
        <label for="">Nhập mật khẩu để xác nhận</label>
        <input type="password" class="form-control" name="old_password" placeholder="Input password">
        @error('old_password') 
         <small style="color: red; font-style: italic">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Nhập mật khẩu để xác nhận</label>
        <input type="password" class="form-control" name="new_password" placeholder="Input password">
        @error('new_password') 
         <small style="color: red; font-style: italic">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Nhập mật khẩu để xác nhận</label>
        <input type="password" class="form-control" name="confirm_new_password" placeholder="Input password">
        @error('confirm_new_password') 
         <small style="color: red; font-style: italic">{{$message}}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

@stop()