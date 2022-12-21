@extends('layouts.admin')

@section('title','Thêm danh mục')

@section('main')

<form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
    @csrf 
    <div class="form-group">
        <label for="">Id</label>
        <input type="text" class="form-control" name="id" placeholder="Input field">
        @error('id')
        <small style="color:red; font-style: italic">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Tên danh mục</label>
        <input type="text" class="form-control" name="name" placeholder="Input field">
        @error('name')
        <small style="color:red; font-style: italic">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Ảnh</label>
        <input type="file" class="form-control" name="upload" placeholder="Input field">
        @error('upload')
        <small style="color:red; font-style: italic">{{$message}}</small>
        @enderror
    </div>
    
    <div class="form-group">
        <label for="">Trạng thái danh mục</label>
        
        <div class="radio">
            <label>
                <input type="radio" name="status" value="1" checked>
                Hiển thị
            </label>
        </div>
        <div class="radio">
            <label>
                <input type="radio" name="status" value="0">
                Tạm ẩn
            </label>
        </div>
        
    </div>

    

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()