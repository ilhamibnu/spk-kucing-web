@extends('landing.layout.main')
@section('title','Profil - ')
@section('content')

<div class="container">
    <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-6">
                <nav aria-label="Breadcrumb">
                    <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Profil</li>
                    </ul>
                </nav>
                <h1 class="text-center">Profil</h1>
            </div>
            <div class="text-center">
                <img class="img-fluid-2" src="{{ asset('logo/gatau7.png') }}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="page-section">
    <div class="container">
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
        <form action="/auth/profil" method="POST" class="contactForm">
            @csrf
            @method('POST')
            @if(Auth::user()->google == '1')
            <div class="form-group">
                <label class="text-black" for="email">Name</label>
                <input name="name" type="text" value="{{ Auth::user()->name }}" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="text-black" for="email">Email</label>
                <input readonly name="email" value="{{ Auth::user()->email }}" type="text" id="email" class="form-control" required>
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </div>
            @else
            <div class="form-group">
                <label class="text-black" for="email">Name</label>
                <input name="name" type="text" value="{{ Auth::user()->name }}" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="text-black" for="email">Email</label>
                <input name="email" value="{{ Auth::user()->email }}" type="text" id="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="text-black" for="email">Password</label>
                <input name="password" value="" type="password" id="email" class="form-control">
            </div>
            <div class="form-group">
                <label class="text-black" for="email">Re Password</label>
                <input name="repassword" value="" type="password" id="email" class="form-control">
            </div>
            <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" value="Update" class="btn btn-primary">
                </div>
            </div>
            @endif

        </form>
    </div>

</div>
@endsection
