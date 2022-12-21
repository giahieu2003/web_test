@extends('layouts.admin')

@section('title','Thêm mới sản phẩm')

@section('main')

<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" placeholder="Input field">
                @error('name')
                <small style="color: red; font-style: italic">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Mô tả sản phẩm</label>
                <textarea name="content" class="form-control"></textarea>
                @error('content')
                <small style="color: red; font-style: italic">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="">Danh mục</label>

                <select name="category_id" id="input" class="form-control" required="required">
                    <option value="">Chọn danh mục</option>
                    @foreach($cats as $cat)
                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="">Giá sản phẩm</label>
                <input type="text" class="form-control" name="price" placeholder="Input field">
                @error('price')
                <small style="color: red; font-style: italic">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Giá KM</label>
                <input type="text" class="form-control" name="sale_price" placeholder="Input field">
                @error('sale_price')
                <small style="color: red; font-style: italic">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">

                <label for="">trạng thái</label>

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
            <div class="form-group">
                <label for="">Ảnh</label>
                <input type="file" class="form-control" name="upload" >
                @error('upload')
                <small style="color: red; font-style: italic">{{$message}}</small>
                @enderror
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()