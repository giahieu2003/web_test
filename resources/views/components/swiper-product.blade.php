@foreach($data as $item)
<div class="buyNow">
    <div class="container">
        <div class=" row justify-content-between">
            <div class="col-lg-6 col-md-6 col-sm-12 mt-5 w_768">
                <div class="infor_product">
                    <div class="name_fastfood">
                        <h1>{{$item->name}}</h1>
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
                    <img src="{{url('')}}/uploads/{{$item->image}}"
                        class="card-img" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach