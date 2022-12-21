@extends('layouts.admin')

@section('title','Chỉnh sửa sản phẩm')

@section('main')

<form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-md-9">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="Input field">
                @error('name')
                <small style="color: red; font-style: italic">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Mô tả sản phẩm</label>
                <textarea name="content" class="form-control">{{$product->content}}</textarea>
                @error('content')
                <small style="color: red; font-style: italic">{{$message}}</small>
                @enderror
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="">Danh mục</label>

                <select name="category_id" id="input" class="form-control">
                    <option value="">Chọn danh mục</option>
                    @foreach($cats as $cat)
                    <option value="{{$cat->id}}" {{$cat->id == $product->category_id ? 'selected' : ''}}>{{$cat->name}}</option>
                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="">Giá sản phẩm</label>
                <input type="text" class="form-control" name="price"  value="{{$product->price}}" placeholder="Input field">
                @error('price')
                <small style="color: red; font-style: italic">{{$message}}</small>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Giá KM</label>
                <input type="text" class="form-control" name="sale_price"  value="{{$product->sale_price}}" placeholder="Input field">
                @error('sale_price')
                <small style="color: red; font-style: italic">{{$message}}</small>
                @enderror
            </div>

            <div class="form-group">

                <label for="">trạng thái</label>

                <div class="radio">
                    <label>
                        <input type="radio" name="status" value="1" {{$product->status == 1 ? 'checked' : ''}}>
                        Hiển thị
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="status" value="0" {{$product->status == 0 ? 'checked' : ''}}>
                        Tạm ẩn
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="">Ảnh</label>
                <input type="file" class="form-control" name="upload" >
                <img src="{{url('uploads')}}/{{$product->image}}" style="width:100%">
                @error('upload')
                <small style="color: red; font-style: italic">{{$message}}</small>
                @enderror
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>

@stop()