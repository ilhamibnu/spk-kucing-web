@extends('admin.layout.main')
@section('title', 'Dashboard')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
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
        <div class="col-lg-6 col-md-6 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center ">
                            <div class="card-title d-flex align-items-start justify-content-center">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('admin/assets/img/icons/unicons/chart-success.png') }}" alt="chart success" class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Penyakit</span>
                            <h3 class="card-title mb-2">{{ $jumlah_penyakit }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="card-title d-flex align-items-start justify-content-center">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('admin/assets/img/icons/unicons/wallet-info.png') }}" alt="Credit Card" class="rounded" />
                                </div>

                            </div>
                            <span>Gejala</span>
                            <h3 class="card-title text-nowrap mb-1">{{ $jumlah_detail_penyakit }}</h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Total Revenue -->
        <div class="col-lg-6 col-md-6 col-lg-4 order-3 order-md-2">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="card-title d-flex align-items-start justify-content-center">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('admin/assets/img/icons/unicons/paypal.png') }}" alt="Credit Card" class="rounded" />
                                </div>

                            </div>
                            <span class="d-block mb-1">Riwayat</span>
                            <h3 class="card-title text-nowrap mb-2">{{ $jumlah_riwayat }}</h3>

                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="card-title d-flex align-items-start justify-content-center">
                                <div class="avatar flex-shrink-0">
                                    <img src="{{ asset('admin/assets/img/icons/unicons/cc-primary.png') }}" alt="Credit Card" class="rounded" />
                                </div>

                            </div>
                            <span class="fw-semibold d-block mb-1">Artikel</span>
                            <h3 class="card-title mb-2">{{ $jumlah_artikel }}</h3>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-12 order-2 order-md-3 order-lg-2 mb-4">
            <div class="card">
                <div class="text-center">
                    {{-- <div class="col-md-8"> --}}
                    <h5 class="card-header m-0 me-2 pb-3">Persentase Riwayat Penyakit</h5>
                    <div class="card-body d-flex align-items-start justify-content-center">
                        <div id="chart"></div>
                    </div>
                    {{-- </div> --}}
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('script')
    <script>
        var nama = < ? php echo json_encode($nama_penyakit); ? > ;
        var persentase = < ? php echo json_encode($persentase); ? > ;

        // Definisikan warna yang ingin Anda gunakan untuk setiap label
        var colors = ['#FF5733', '#33FFC1', '#335BFF', '#FF33C1', '#33FF57', '#5733FF', '#FF335B', '#33C1FF', '#FF5983'];

        var options = {
            series: persentase
            , chart: {
                width: 380
                , type: 'pie'
            , }
            , labels: nama
            , colors: colors, // Gunakan warna yang telah ditentukan
            responsive: [{
                breakpoint: 480
                , options: {
                    chart: {
                        width: 200
                    }
                    , legend: {
                        position: 'bottom'
                    }
                }
            }]
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

    </script>
    @endsection

    @section('script')
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
