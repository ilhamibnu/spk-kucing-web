@extends('landing.layout.main')
@section('title','Register - ')
@section('content')
<div class="container">
    <div class="page-banner home-banner">
        <div class="row align-items-center flex-wrap-reverse h-100">
            <div class="col-md-6 py-5 wow fadeInLeft">
                <h1 class="mb-4">Sistem Pakar Diagnosa Penyakit Kucing</h1>
                @if(Auth::check())
                <a href="/diagnosa-user" class="btn btn-primary btn-split">Diagnosa Sekarang <div class="fab"><span class="mai-play"></span></div></a>
                @else
                <a href="/login-user" class="btn btn-primary btn-split">Diagnosa Sekarang <div class="fab"><span class="mai-play"></span></div></a>
                @endif
            </div>
            <div class="col-md-6 py-5 wow zoomIn">
                <div class="img-fluid text-center">
                    <img class="img-fluid" src="{{ asset('logo/gatau3.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-6 mb-5 mb-lg-0">
            @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mt-2">


                <?php

                            $nomer = 1;

                            ?>

                @foreach($errors->all() as $error)
                <li>{{ $nomer++ }}. {{ $error }}</li>
                @endforeach
            </div>
            @endif
            <form action="/register-user" method="POST">
                @csrf
                @method('POST')
                <h2 class="mb-4 font-weight-medium text-secondary">Register</h2>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="email">Name</label>
                        <input name="name" type="text" id="email" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <label class="text-black" for="email">Email</label>
                        <input name="email" type="email" id="email" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-md-12">
                        <label class="text-black" for="subject">Password</label>
                        <input name="password" type="password" id="subject" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group">

                    <div class="col-md-12">
                        <label class="text-black" for="subject">Re Password</label>
                        <input name="repassword" type="password" id="subject" class="form-control" required>
                    </div>
                </div>

                <div class="row form-group mt-4">
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit">Register</button>
                    </div>
                </div>

                <div class="row form-group mt-2">
                    <div class="col-md-12">
                        <p class="text-center">Or sign in with</p>
                        <div class="text-center">
                            <a href="/auth/google"><span class="css-bwxjrz"><img width="35px" height="35px" src="https://aid-frontend.prod.atl-paas.net/atlassian-id/front-end/5.0.529/google-logo.5867462c.svg" alt=""></span></a>
                        </div>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-12">
                        <p class="text-center">Already have an account? <a href="/login-user" class="text-primary">Login</a></p>
                    </div>
                </div>

            </form>
        </div>
        <div class="col-lg-6 px-0 text-center justify-content-center text-align-center">

            <img class="img-fluid" src="{{ asset('logo/gatau2.png') }}" alt="">

        </div>
    </div>
</div>

@endsection
