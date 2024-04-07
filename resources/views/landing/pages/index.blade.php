@extends('landing.layout.main')

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
<div class="page-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card-service wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="header">
                        <img src="https://i.pinimg.com/236x/31/dc/e0/31dce0fa4a03ed6c181c60d5e4ad5f69.jpg" alt="">
                    </div>
                    <div class="body">
                        <h5 class="text-secondary">Kecepatan dan Efisiensi</h5>
                        <p>Sistem pakar dapat memberikan diagnosis dengan cepat dan efisien. Ini dapat menghemat waktu dalam proses mendiagnosis penyakit, yang penting untuk menangani kondisi kesehatan kucing dengan cepat.</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-service wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="header">
                        <img src="https://i.pinimg.com/236x/37/c4/1d/37c41dc1f85af331f6a7313965c52309.jpg" alt="">
                    </div>
                    <div class="body">
                        <h5 class="text-secondary">Aksesibilitas</h5>
                        <p>Sistem pakar dapat diakses kapan saja dan di mana saja melalui perangkat digital seperti komputer atau ponsel cerdas. Ini memungkinkan pemilik hewan peliharaan untuk mendapatkan informasi tentang kesehatan kucing mereka tanpa harus mengunjungi dokter hewan.</p>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card-service wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                    <div class="header">
                        <img src="https://i.pinimg.com/236x/1b/25/6c/1b256c3649182a40615c84e70ae26f5c.jpg" alt="">
                    </div>
                    <div class="body">
                        <h5 class="text-secondary">Konsistensi</h5>
                        <p>Sistem pakar dapat memberikan diagnosis yang konsisten berdasarkan aturan dan pengetahuan yang telah ditetapkan. Hal ini membantu dalam mengurangi kesalahan manusia atau variasi dalam proses mendiagnosis penyakit.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
