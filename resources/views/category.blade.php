@extends ('layouts.master')
@section('title','Sản phẩm')
@section('main')
<div class="search">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 ">
                <div class="title" style="margin-bottom:-15px">
                    <p>COLLECTION</p>
                </div>
                <div class="btn-group">

                    <button type="button" class="btn btn-secondary dropdown-toggle nut" data-toggle="dropdown"
                        aria-expanded="false">
                        Choose...
                    </button>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{route('home.product')}}">All</a>
                        @foreach($catsGlobal as $cat)
                        <a class="dropdown-item" href="{{route('home.category', $cat->id)}}">{{$cat->name}}</a>
                        @endforeach

                        <!-- <a class="dropdown-item" href="#">Lantana - Texas Only</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Alcove</a>
                            <a class="dropdown-item" href="#">Crafted</a>
                            <a class="dropdown-item" href="#">Foundations</a>
                            <a class="dropdown-item" href="#">Loft</a>
                            <a class="dropdown-item" href="#">Masters</a>
                            <a class="dropdown-item" href="#">Tempo</a>
                            <a class="dropdown-item" href="#">Weathered</a> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-10 col-md-9">
                <div class="title" style="margin-bottom:-15px">
                    <p>Search</p>
                </div>
                <div class="btn-group">
                    <form class="form-inline">
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" name="" id="" class="form-control nut" placeholder="">
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="product">
    <div class="container">
        <div class="row">
            @foreach ($products as $prd)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <a href="{{route('home.productDetail', ['product' => $prd->id, 'slug' => Str::slug($prd->name)])}}"><img class="card-img-top"
                            src="{{(url(''))}}/uploads/{{$prd->image}}" alt=""></a>
                    <div class="card-body">
                        <a href="{{route('home.productDetail', ['product' => $prd->id, 'slug' => Str::slug($prd->name)])}}">{{$prd->name}}</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@stop()