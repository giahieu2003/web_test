@extends('layouts.master')
@section('css')
<link rel="stylesheet" href="css/about.css">
@stop()
@section('title','Login & Register')
@section('main')
<hr>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <div class="form">
                <form action="" method="post">
                    @csrf
                    <div class="title-form py-3">
                        <h4><i class="fa fa-unlock"></i> Login</h4>
                    </div>
                    <div class="form-group">
                        <!-- <label for="">EMAIL ADDRESS</label> -->
                        <input type="text" class="form-control" placeholder="Email" name="email">
                    </div>
                    <div class="form-group">
                        <!-- <label for="">Password</label> -->
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <div class="nut1">
                        <input class="btn btn-dark nut" type="submit" value="Submit">
                    </div>

                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form">
                <form action="{{route('home.register')}}" method="post">
                    @csrf
                    <div class="title-form py-3">
                        <h4><i class="fa fa-lock"></i> Register</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <!-- <label for="">NAME</label> -->
                                <input type="text" class="form-control" placeholder="Name" name="name">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <!-- <label for="">EMAIL ADDRESS</label> -->
                                <input type="text" class="form-control" placeholder="Email" name="email">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <!-- <label for="">PHONE NUMBER (OPTIONAl)</label> -->
                        <input type="text" class="form-control" placeholder="Phone number" name="phone">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="">Password</label> -->
                                <input type="password" class="form-control" placeholder="Password" name="password">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label for="">Password</label> -->
                                <input type="password" class="form-control" placeholder="Confirm password"
                                    name="confirm_password">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <!-- <label for="">Adress</label> -->
                                <div class="radio">
                                    <label class="mr-2">
                                        <input type="radio" name="gender" value="1" checked="checked">
                                        Male
                                    </label>
                                    <label>
                                        <input type="radio" name="gender" value="0">
                                        Female
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <!-- <label for="">Adress</label> -->
                                <input type="text" class="form-control" placeholder="Address" name="address">
                            </div>

                        </div>
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