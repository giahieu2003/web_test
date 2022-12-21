@extends ('layouts.master')
@section('title','Trang chủ')
@section('css')
<link rel="stylesheet" href="css/home.css">
@stop()
@section('main')
<div class="container">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <!-- <div class="carousel-item active">
                    <img class="d-block w-100"
                        src="https://abodeflooring.com/sites/default/files/styles/home_slider_tablet_2x/public/assets/hero_image/image/bedroom%20crop%202-01.jpg?itok=yDQ0bUnu"
                        alt="First slide">
                </div> -->
                <div id="carouselId" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselId" data-slide-to="1"></li>
                        <li data-target="#carouselId" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="https://abodeflooring.com/sites/default/files/styles/home_slider_tablet_2x/public/assets/hero_image/image/GREENGUARD%20GOLD_Abode.jpg?itok=yyQxltsu" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://abodeflooring.com/sites/default/files/styles/home_slider_tablet_2x/public/assets/hero_image/image/kitchen%20crop%202-01.jpg?itok=Wvm2CWUL" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="https://abodeflooring.com/sites/default/files/styles/home_slider_tablet_2x/public/assets/hero_image/image/Abode%20Home%20Page%20Image%20Angle-02.jpg?itok=vuKeCc3I" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                
            </div>
        </div>
    </div>
    <div class="title">
        <h5>ABODE IS A FRESH AND AFFORDABLE APPROACH TO HARDWOOD FLOORING </h5>
        <p>genuine hardwood | contemporary colors | great performance | unbeatable price</p>
        <span>COLLECTIONS</span>
    </div>
    <div class="container">
        <div class="container">
            <div class="row">
                @foreach ($cats as $cat)
                <div class="col-lg-4 col-md-6 mb-4" style="margin: 0 auto;">
                    <div class="card">
                        <img class="card-img-top" src="uploads/{{$cat->image}}" alt="">
                        <div class="card-body text-center">
                            <h4 class="card-title">{{$cat->name}}</h4>
                            <a href="{{route('home.category', $cat->id)}}">VIEW COLLECTION</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
    <div class="link text-center">
        <a href="{{route('home.product')}}" >Browse all Floors</a>
    </div>
@stop()