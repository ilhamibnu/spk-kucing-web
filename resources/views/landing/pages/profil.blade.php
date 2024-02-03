@extends('landing.layout.main')

@section('content')
<section class="hero-wrap hero-wrap-2" style="background-image: url({{ asset('landing/images/bg_2.jpg') }});" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text align-items-end">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs mb-2"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Profil <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-0 bread">Profil</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center mb-5">
                <h2 class="heading-section">Profil</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="wrapper">
                    <div class="row no-gutters">

                        <div class="contact-wrap w-100 p-md-5 p-4">
                            <h3 class="mb-4">Profil</h3>
                            <form action="/auth/profil" method="POST" class="contactForm">
                                @csrf
                                @method('POST')
                                <div class="row">
                                    <input hidden value="{{ Auth::user()->id }}" type="text" name="id_user" id="">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label" for="name">Full Name</label>
                                            <input type="text" value="{{ Auth::user()->name }}" class="form-control" name="name" id="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="label" for="email">Email Address</label>
                                            <input disabled type="email" value="{{ Auth::user()->email }}" class="form-control" id="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
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
