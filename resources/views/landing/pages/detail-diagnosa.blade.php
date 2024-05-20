@extends('landing.layout.main')
@section('title','Detail Diagnosa ' . $riwayat->nama . ' - ')
@section('content')

<div class="container">
    <div class="page-banner">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-md-6">
                <nav aria-label="Breadcrumb">
                    <ul class="breadcrumb justify-content-center py-0 bg-transparent">
                        <li class="breadcrumb-item"><a href="/">Home</a></li>
                        <li class="breadcrumb-item active">Detail Diagnosa {{ $riwayat->nama }}</li>
                    </ul>
                </nav>
                <h1 class="text-center">Detail Diagnosa {{ $riwayat->nama }}</h1>
                <div class="text-center">
                    <p>{{ $riwayat->created_at->format('d M Y, H:m:s') }}</p>
                </div>

            </div>
        </div>
    </div>
</div>
<section class="bg-light">
    <div class="container">
        <div class="card">
            <div class="alert alert-primary">
                <h5 class="font-weight-bold">Kesimpulan</h5>
                <p>Berdasarkan dari gejala yang kamu pilih atau alami juga berdasarkan Role/Basis aturan yang sudah ditentukan oleh seorang pakar penyakit maka perhitungan Algoritma Certainty Factor mengambil nilai CF yang paling pinggi yakni <b>{{ number_format(unserialize($riwayat->cf_max)[0], 3) }} ({{ number_format(unserialize($riwayat->cf_max)[0], 3) * 100 }}%)</b> yaitu <b>{{ unserialize($riwayat->cf_max)[1] }}</b></p>
                <br>
                <br>
                <h5 class="font-weight-bold">Deskripsi</h5>
                <p>
                    {{ $riwayat->penyakit->deskripsi }}
                </p>
                <h5 class="font-weight-bold">Solusi</h5>
                <p>
                    {{ $riwayat->penyakit->solusi }}
                </p>
            </div>
            <div class="text-center ">
                <div class="mt-3 mb-3">
                    <a href="/riwayat-user/print/{{ $riwayat->id }}" class="btn btn-primary">Print</a>
                    <a href="/diagnosa-user/" class="btn btn-primary">Diagnosa Ulang</a>
                </div>
            </div>

            <div class="mb-4">
                <div class="text-center">
                    <h5 class="font-weight-bold">Detail Foto Gejala yang kucing kamu alami</h5>
                </div>

                <div class="row">
                    @foreach ($detailgejala as $itemdetailgejala )
                    <div class="col-lg-4">
                        <div class="card-service wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
                            <div class="header">
                                <img src="{{ asset('foto_gejala/' . $itemdetailgejala->gejala->foto) }}" alt="">
                            </div>
                            <div class="body">
                                <h5 class="text-secondary">{{ $itemdetailgejala->gejala->nama }}</h5>
                                <a href="{{ $itemdetailgejala->gejala->link_penjelasan }}" target="blank" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                    </div>

                    @endforeach

                </div>
            </div>
        </div>
        <div class="card-datatable table-responsive">
            <table class="table datatables table-hover responsive nowrap" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Gejala yang kamu alami saat ini</th>
                        <th>Tingkat keyakinan</th>
                        <th>CF User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(unserialize($riwayat->gejala_terpilih) as $gejala)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $gejala['kode'] }} - {{ $gejala['nama'] }}</td>
                        <td>{{ $gejala['keyakinan'] }}</td>
                        <td>{{ $gejala['cf_user'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card">
            @foreach(unserialize($riwayat->hasil_diagnosa) as $diagnosa)
            <div class="text-center card-header alert alert-primary text-white p-2">
                <h6 class="font-weight-bold">Tabel perhitungan penyakit: {{ $diagnosa['nama_penyakit'] }} ({{ $diagnosa['kode_penyakit'] }})</h6>
            </div>
            <div class="card-datatable table-responsive">
                <table class="table datatables table-hover responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Gejala</th>
                            <th>CF User</th>
                            <th>CF Expert</th>
                            <th>CF (H, E)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diagnosa['gejala'] as $gejala)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $gejala['kode'] }} - {{ $gejala['nama'] }}</td>
                            <td>{{ $gejala['cf_user'] }}</td>
                            <td>{{ $gejala['cf_role'] }}</td>
                            <td>{{ $gejala['hasil_perkalian'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="font-weight-bold">
                        <tr>
                            <td scope="row">Nilai CF</td>
                            <td><span class="text-warning">{{ number_format($diagnosa['hasil_cf'], 3) }}</span></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            @endforeach
        </div>
        <div class="card">

        </div>
    </div>
</section>
@endsection
