@extends('landing.layout.main')
@section('title','Detail Penyakit Kulit ' . $artikel->judul . ' - ')
@section('content')

<div class="page-section pt-5">
    <div class="container">
        <nav aria-label="Breadcrumb">
            <ul class="breadcrumb p-0 mb-0 bg-transparent">
                <li class="breadcrumb-item"><a href="/">Home</a></li>
                <li class="breadcrumb-item"><a href="/penyakit-kulit-user">Penyakit Kulit</a></li>
                <li class="breadcrumb-item active">{{ $artikel->judul }}</li>
            </ul>
        </nav>

        <div class="row">
            <div class="col-lg-8">
                <div class="blog-single-wrap">
                    <div class="header">
                        <div class="post-thumb">
                            <img src="{{ asset('/penyakit-kulit/' . $artikel->image) }}" alt="">
                        </div>

                    </div>
                    <h1 class="post-title">{{ $artikel->judul }}</h1>
                    <div class="post-meta">
                        <div class="post-date">
                            <span class="icon">
                                <span class="mai-time-outline"></span>
                            </span> <a href="#">{{ $artikel->created_at->format('d M Y, H:m:s') }}</a>
                        </div>
                    </div>
                    <div class="post-content">
                        <p>{{ $artikel->isi }}</p>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
