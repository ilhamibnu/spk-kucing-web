@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Detail Riwayat {{ $riwayat->nama }}</h4>
    <div class="card">
        <p class="text-center mb-4 alert alert-primary">
            {{ $riwayat->nama }} - {{ $riwayat->created_at->format('d M Y, H:m:s') }}
        </p>
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
    </div>
</div>

@foreach(unserialize($riwayat->hasil_diagnosa) as $diagnosa)
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
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

    </div>
</div>
@endforeach

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="alert alert-primary">
            <h5 class="font-weight-bold">Kesimpulan</h5>
            <p>Berdasarkan dari gejala yang kamu pilih atau alami juga berdasarkan Role/Basis aturan yang sudah ditentukan oleh seorang pakar penyakit maka perhitungan Algoritma Certainty Factor mengambil nilai CF yang paling pinggi yakni <b>{{ number_format(unserialize($riwayat->cf_max)[0], 3) }} ({{ number_format(unserialize($riwayat->cf_max)[0], 3) * 100 }}%)</b> yaitu <b>{{ unserialize($riwayat->cf_max)[1] }}</b></p>
            <div class="text-center">
                <a class="btn btn-primary" href="/riwayat/print/{{ $riwayat->id }}">Cetak</a>
            </div>
        </div>
    </div>
</div>

@endsection


@section('script')
@if(Session::get('store'))
<script>
    Swal.fire({
        icon: 'success'
        , title: 'Good'
        , text: 'Data Berhasil Ditambahkan'
    , });

</script>
@endif
@if(Session::get('update'))
<script>
    Swal.fire({
        icon: 'success'
        , title: 'Good'
        , text: 'Data Berhasil Diubah'
    , });

</script>
@endif
@if(Session::get('destroy'))
<script>
    Swal.fire({
        icon: 'success'
        , title: 'Good'
        , text: 'Data Berhasil Dihapus'
    , });

</script>
@endif
@if(Session::get('gagal'))
<script>
    Swal.fire({
        icon: 'error'
        , title: 'Oops..'
        , text: 'Data Masih Memiliki Relasi'
    , });

</script>
@endif

@endsection
