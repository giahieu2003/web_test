@extends ('layouts.master')
@section('title','Trang chủ')
@section('main')
    <div class="banner">
        <div class="container container-v2">
            <div class="title-page">
                <h2></h2>
            </div>
            <div class="page">
                <a href="{{route('home.product')}}">Product <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                <a href="{{route('home.category', $product->cat->id)}}">{{$product->cat->name}}<i class="fa fa-angle-right" aria-hidden="true"></i></a>
                <a href="{{route('home.category', $product->id)}}">{{$product->name}}</a>
            </div>
        </div>
    </div>
    <div class=" detail_product mt-5">
        <div class="container">
            <div class=" row detail_info_pro">
                <div class="col-lg-6 col-md-6">
                    <img src="{{url('')}}/uploads/{{$product->image}}" style="width:90%">
                </div>
                <div class="col-lg-6 col-md-6 mt-2">
                    <div class="infor_product">
                        <div class="evaluate d-flex align-items-center">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <p class="m-0">No reviews</p>
                        </div>
                        <div class="name_fastfood mt-2">
                            <h1></h1>
                        </div>
                        <div class="price mt-2">
                            <span><s>đ{{number_format($product->price)}}</s> </span>
                            <span>đ{{number_format($product->sale_price)}}</span>
                        </div>
                    </div>
                    <div class="describe_product mt-4">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus, id non, nemo alias sed
                        distinctio laborum,
                        sint quidem hic quod accusamus omnis exercitationem? Mollitia harum quisquam recusandae tenetur
                        optio quidem?
                    </div>
                    <div class="option_user">
                        <!-- <div class="size mt-5 mb-4">
                            <div class="row d-flex align-items-center ">
                                <div class="col-lg-3 col-md-4 col-sm-3">
                                    <h5>Option:</h5>
                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-9 opt">
                                    <span>Beef</span>
                                    <span>Chese</span>
                                    <span>Salad</span>
                                </div>
                            </div>
                        </div> -->
                        <div class="size mt-5 mb-4">
                            <div class="row d-flex align-items-center ">
                                <div class="col-lg-3 col-md-4 col-sm-3">
                                    <h5>Quantity :</h5>
                                </div>
                                <div class="col-lg-9 col-md-8 col-sm-9 opt">
                                    <div class="input ml-3">
                                        <button class="btn-fake btn left_ip" (click)="mark('-')" id="tru"><i
                                                class="fa fa-minus"></i></button>
                                        <input type="text" value="1" id="quantity">
                                        <button class="btn-fake btn right_ip" (click)="mark('+')" id="cong"><i
                                                class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="addCart mt-5">
                        <button (click)="addCart()">ADD TO CART</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" mb-5 add_information text-center">
        <p >DESCRIPTION</p>
        <p class="add_info_title">ADDITIONAL INFORMATION</p>
        <p>REVIEW</p>
    </div>
    <!-- <div class="buyNow">
        <div class="container">
            <div class=" row justify-content-between">
                <div class="col-lg-6 col-md-6 col-sm-12 mt-5 w_768">
                    <div class="infor_product">
                        <div class="name_fastfood">
                            <h1>Adjustable Hook &
                                Loop Fastener</h1>
                        </div>
                    </div>
                    <div class="describe_product mt-4">
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus, id non, nemo alias sed
                        distinctio laborum,
                        sint quidem hic quod accusamus omnis exercitationem? Mollitia harum quisquam recusandae tenetur
                        optio quidem?
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus, id non, nemo alias sed
                        distinctio laborum,
                        sint quidem hic quod accusamus omnis exercitationem? Mollitia harum quisquam recusandae tenetur
                        optio quidem?
                    </div>
                    <div class="buy mt-5">
                        <a href="">Buy Now</a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 mt-5">
                    <div class="product_add">
                        <img src="https://cdn.shopify.com/s/files/1/0301/5648/8842/files/instagram3.jpg?v=10845364633733112642"
                            class="card-img" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <x-swiper-product title="Random Product" :data="$randomProducts"/>
    

@stop()