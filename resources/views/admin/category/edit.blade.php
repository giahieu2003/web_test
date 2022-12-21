@extends('layouts.admin')

@section('title','Chỉnh sửa danh mục')

@section('main')

<form action="{{route('category.update', $cat->id)}}" method="POST" role="form">
    @csrf @method('PUT')
    <legend>Form title</legend>

    <input type="hidden" name="id" value="{{$cat->id}}">

    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" class="form-control" name="name" value="{{$cat->name}}" placeholder="Input field">
        @error('name')
        <small style="color: red; font-style: italic">{{$message}}</small>
        @enderror
    </div>

    <div class="form-group">
        <label for="">Ảnh</label>
        <input type="file" class="form-control" name="upload">
        <img src="{{url('uploads')}}/{{$cat->image}}" style="width:100%">
        @error('upload')
        <small style="color: red; font-style: italic">{{$message}}</small>
        @enderror
    </div>


    <div class="form-group">
        <label for="">trạng thái danh mục</label>

        <div class="radio">
            <label>
                <input type="radio" name="status" value="1" {{$cat->status == 1 ? 'checked' : ''}}>
                Hiển thị
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="0" {{$cat->status == 0 ? 'checked' : ''}}>
                Tạm ẩn
            </label>
        </div>

    </div>



    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()