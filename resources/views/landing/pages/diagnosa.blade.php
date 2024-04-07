@extends('landing.layout.main')
@section('title','Diagnosa - ')
@section('content')

<div class="container">
    <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-6">
                <nav aria-label="Breadcrumb">
                    <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Diagnosa</li>
                    </ul>
                </nav>
                <h1 class="text-center">Diagnosa</h1>
            </div>
            <div class="text-center">
                <img class="img-fluid-2" src="{{ asset('logo/gatau5.png') }}" alt="">
            </div>
        </div>
    </div>
</div>

<div class="page-section">
    <div class="container">
        <form action="/diagnosa-user" method="POST" class="contactForm">
            @csrf
            @method('POST')
            <div class="form-group">
                <label class="text-black" for="email">Name</label>
                <input name="nama" type="text" id="email" class="form-control" required>
            </div>
            @foreach ($gejala as $key => $value )
            <div class="form-group">
                <label class="text-black" for="email">{{ $value->nama }}</label>
                <select class="form-control" name="diagnosa[]" id="exampleFormControlSelect1" aria-label="Default select example">
                    <option selected value="">Tidak Tahu</option>
                    <option value="{{ $value->id }}+0.2">Tidak Yakin</option>
                    <option value="{{ $value->id }}+0.4">Ya, Sedikit Yakin</option>
                    <option value="{{ $value->id }}+0.6">Ya, Cukup Yakin</option>
                    <option value="{{ $value->id }}+0.8">Ya, Yakin</option>
                    <option value="{{ $value->id }}+1">Ya, Sangat Yakin</option>
                </select>
            </div>
            @endforeach
            <div class="row form-group">
                <div class="col-md-12">
                    <input type="submit" value="Diagnosa" class="btn btn-primary">
                </div>
            </div>
        </form>
    </div>

</div>
@endsection
