<header>
    <div style="background-color:#384848; width:100%; color:#fff">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <p style="font-size:11px; margin-top: 11px">ABODE IS A FRESH AND AFFORDABLE APPROACH TO HARDWOOD
                        FLOORING </p>
                </div>
                <div class="col-md-5 text-right">
                    @if (auth('cus')->check())
                    <div class="row" style="font-size:14px; margin-top: 11px">
                        <div class="col-md-10">
                            <a href="{{route('home.profile')}}">Hi <span style="text-transform:uppercase">{{auth('cus')->user()->name}}</span></a>
                        </div>
                        <div class="col-md-2">
                            <a href="{{route('home.logout')}}">Logout</a>
                        </div>
                    </div>


                    @else
                    <a style="font-size:14px; margin-top: 3px" class="nav-link" href="{{route('home.login')}}">Login/ Regiser</a>

                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="logo1">
        <img src="https://abodeflooring.com/themes/custom/tabulatum/logo.svg" alt="" srcset=""
            style="margin: 0 auto; display: block; padding: 30px;">
    </div>
    <nav class=" navbar navbar-expand-sm navbar-light menu">
        <!-- <div class="container"> -->

        <button class="navbar-toggler d-lg-none res" type="button" data-toggle="collapse"
            data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
            aria-label="Toggle navigation">
            <a class="navbar-brand " href="#"></a>
            <span class="navbar-toggler-icon icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav  mt-2 mt-lg-0" style="margin: 0 auto;">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home.index')}}">HOME</a>
                </li>
                <li class="nav-item ml-4">
                    <a class="nav-link" href="{{route('home.product')}}">PRODUCT</a>
                </li>
                <li class="nav-item ml-4">
                    <a class="nav-link" href="{{route('cart.view')}}">CART</a>
                </li>
                <li class="nav-item ml-4">
                    <a class="nav-link" href="">RESOURCES</a>
                </li>
                <li class="nav-item ml-4">
                    <a class="nav-link" href="">LOOKBOOK</a>
                </li>
                <li class="nav-item ml-4">
                    <a class="nav-link" href="{{route('home.about')}}">ABOUT ABODE</a>
                </li>

            </ul>
        </div>
    </nav>
</header>