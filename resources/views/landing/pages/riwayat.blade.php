@extends('landing.layout.main')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset('landing/images/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Riwayat <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Riwayat</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <h2 class="heading-section">Riwayat</h2>
            </div>
        </div>
    </div>
</section>
<section class="bg-light">
    <div class="container">
        <div class="row mb-5 pb-5">
            @foreach ($riwayat as $data )
            <div class="col-md-4 mt-5 d-flex align-self-stretch px-4 ftco-animate fadeInUp ftco-animated">
                <div class="d-block services text-center">
                    <div class="media-body p-4">
                        <h3 class="heading">{{$data->nama}}</h3>
                        <p>{{ $data->created_at->format('d M Y, H:m:s') }}</p>
                        <p></p>
                        <a href="/riwayat-user/detail/{{ $data->id }}" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection

@section('script')
@if(Session::get('success'))
<script>
    Swal.fire({
        icon: 'success'
        , title: 'Good'
        , text: 'Profil berhasil diubah'
    , });

</script>
@endif
@endsection
```
