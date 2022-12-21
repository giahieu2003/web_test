@extends ('layouts.master')
@section('title','About')
@section('css')
<link rel="stylesheet" href="css/about.css">
@stop()
@section('main')
        <div class="container">
            <div class="card mb-5">
                <img src="https://abodeflooring.com/sites/default/files/styles/section_hero_tablet_2x/public/assets/hero_image/image/About%20Abode%20Website-01.jpg?itok=LZStV1iT" class="card-img-top">
            </div>
            <div class="row">
                <div class="col-lg-7">
                    <div class="title mb-4">
                        <h3>ABOUT ABODE</h3>
                    </div>
                    <div class="text">
                        <p>Abode flooring was developed to serve a growing demand for authentic hardwood flooring at a
                            budget conscious price. Abode meets this demand with well-made, well-designed hardwood
                            floors in a wide variety of contemporary colors and styles that deliver great looks, great
                            performance and great value, with features that include:
                            <li>engineered and solid options</li>
                            <li>precision milling and manufacturing</li>
                            <li>factory applied polyurethane finish</li>
                            <li>25 year residential wear warranty</li>
                            <li>trendy designer colors and stain treatments</li>
                        </p>
                        <p>In addition, most Abode products now carry GREENGUARD Gold certification, indicating they
                            meet some of the strictest emissions standards in the world. For more information, <a
                                href="">click
                                here</a>.</p>
                        <p>Abode is manufactured and distributed by Metropolitan, a leading supplier of specialty
                            flooring to North American homes for over 25 years. </p>
                        <p>Want more information? Drop us a line.</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="form">
                        <form action="" method="" role="form">
                            <div class="title-form">
                                <h4>Contact Us</h4>
                            </div>
                            <div class="form-group">
                                <label for="">NAME</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">EMAIL ADDRESS</label>
                                <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <div class="form-group">
                                <label for="">PHONE NUMBER (OPTIONAl)</label>
                                <input type="text" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="">YOUR MASSAGE</label>
                                <textarea name="text" id="" cols="20" rows="5" class="form-control"></textarea>
                            </div>
                            <div class="nut1">
                                <input class="btn btn-dark nut" type="submit" value="Submit">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>

@stop()