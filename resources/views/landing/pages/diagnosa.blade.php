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
            <div class="alert alert-warning alert-dismissible fade show mt-2">
                Minimal harus memilih 2 gejala
            </div>
            <div class="form-group">
                <label class="text-black" for="email">Name</label>
                <input name="nama" type="text" id="email" class="form-control" required>
            </div>
            @foreach ($gejala as $key => $value )
            <div class="row">
                <div class="col-md-6">
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
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="mt-4">

                        </div>
                        <div class="mt-4 text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Detail{{ $value->id }}">
                                Detail
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="Detail{{ $value->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title fs-5" id="exampleModalLabel">Detail</h4>

                        </div>
                        <div class="modal-body">
                            <img src="{{ asset('foto_gejala/'.$value->foto) }}" alt="" class="img-fluid">
                            <div class="text-center mt-3">
                                <a href="{{ $value->link_penjelasan }}" class="btn btn-primary">Link</a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
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
