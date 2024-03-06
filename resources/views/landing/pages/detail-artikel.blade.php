@extends('landing.layout.main')

@section('title', '- ' . $artikel->judul)

@section('content')
<div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('https://images.unsplash.com/photo-1533743983669-94fa5c4338ec?q=80&w=1992&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
            <div class="col-md-11 ftco-animate text-center">
                <h1 class="mb-4">Highest Quality Care For Pets You'll Love </h1>
                <p><a href="#" class="btn btn-primary mr-md-4 py-3 px-4">Learn more <span class="ion-ios-arrow-forward"></span></a></p>
            </div>
        </div>
    </div>
</div>

<section class="ftco-counter" id="section-counter">
    <div class="container">
        <div class="row">

        </div>
    </div>
</section>

<section class="ftco-section bg-light ftco-faqs">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 order-md-last">
                <div class="img img-video d-flex align-self-stretch align-items-center justify-content-center justify-content-md-center mb-4 mb-sm-0" style="background-image:url({{ asset('artikel-foto/' . $artikel->image) }});">
                    {{-- <a href="https://vimeo.com/45830194" class="icon-video popup-vimeo d-flex justify-content-center align-items-center">
                        <span class="fa fa-play"></span>
                    </a> --}}
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-6">
                <div class="heading-section mb-5 mt-5 mt-lg-0">
                    <h2 class="mb-3">{{ $artikel->judul }}</h2>
                    <p>{!! nl2br(e($artikel->isi)) !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
@if(Session::get('logout'))
<script>
    Swal.fire({
        icon: 'success'
        , title: 'Good'
        , text: 'Logout Berhasil'
    , });

</script>
@endif
@if(Session::get('login'))
<script>
    Swal.fire({
        icon: 'success'
        , title: 'Good'
        , text: 'Login Berhasil'
    , });

</script>
@endif
@endsection
