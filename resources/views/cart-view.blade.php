@extends('layouts.master')

@section('title','Giỏ hàng')
@section('main')

<!-- breadcrumb-area-start -->
<!-- breadcrumb-area-end -->

<!-- cart area -->
<section class="cart-area pb-80">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{route('cart.updateAll')}}" method="post">
                    @csrf
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">Images</th>
                                    <th class="text-center">Courses</th>
                                    <th class="text-center">Unit Price</th>
                                    <th class="text-center">Quantity</th>
                                    <th class="text-center">Total</th>
                                    <th class="text-center">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cart->items as $item)
                                <tr>
                                    <input type="hidden" name="id[]" value="{{$item->id}}">
                                    <td class="text-center">
                                        <a href="shop-details.html">
                                            <img src="{{url('uploads')}}/{{$item->image}}" width="100">
                                        </a>
                                    </td>
                                    <td class="text-center">
                                        <span>{{$item->name}}</span >
                                    </td>
                                    <td class="text-center">
                                        <span class="amount">${{$item->price}}</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="cart-minus">-</span>
                                        <input class="cart-input" type="text" name="quantity[]" value="{{$item->quantity}}">
                                        <span class="cart-plus">+</span>
                                    </td>
                                    <td class="text-center">
                                        <span class="amount">${{$item->price * $item->quantity}}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="{{route('cart.delete', $item->id)}}"><i class="fa fa-times" style="color:black;"></i></a>
                                    </td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon2 addCart" style="float:right; width:100px">
                                    <button class="tp-btn tp-color-btn banner-animation" name="update_cart"
                                        type="submit">Update cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-md-5 ">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul class="mb-20">
                                    <li>Subtotal <span>${{$cart->totalPrice}}</span></li>
                                    <li>Total <span>${{$cart->totalPrice}}</span></li>
                                </ul>
                                <div class="addCart">
                                <button><a href="{{route('cart.checkout')}}" style="text-decoration:none; color:white"> Proceed to
                                    Checkout</a></button>
                                    </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- cart area end-->
@stop()