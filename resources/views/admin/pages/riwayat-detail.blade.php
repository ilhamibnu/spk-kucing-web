@extends('admin.layout.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Detail</h4>
    <div class="card">
        <p class="mb-4 alert alert-warning">
            <i class="fas fa-user mr-1"></i> {{ $riwayat->nama }} <i class="fas fa-calendar ml-4 mr-1"></i> {{ $riwayat->created_at->format('d M Y, H:m:s') }}
        </p>
        <div class="card-datatable table-responsive">
            <table class="table datatables table-hover responsive nowrap">
                <thead class="thead-light">
                    <tr>
                        <th>Gejala yang kamu alami saat ini</th>
                        <th>Tingkat keyakinan</th>
                        <th>CF User</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(unserialize($riwayat->gejala_terpilih) as $gejala)
                    <tr>
                        <td>{{ $gejala['kode'] }} - {{ $gejala['nama'] }}</td>
                        <td>{{ $gejala['keyakinan'] }}</td>
                        <td>{{ $gejala['cf_user'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @foreach(unserialize($riwayat->hasil_diagnosa) as $diagnosa)
        <div class="card card-body p-0 mt-5 border" style="box-shadow: none !important;">
            <div class="card-header alert alert-warning text-white p-2">
                <h6 class="font-weight-bold">Tabel perhitungan penyakit: {{ $diagnosa['nama_penyakit'] }} ({{ $diagnosa['kode_penyakit'] }})</h6>
            </div>
            <div class="card-datatable table-responsive">
                <table class="table datatables table-hover responsive nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th>Gejala</th>
                            <th>CF User</th>
                            <th>CF Expert</th>
                            <th>CF (H, E)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($diagnosa['gejala'] as $gejala)
                        <tr>
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
                            <td><span class="text-danger">{{ number_format($diagnosa['hasil_cf'], 3) }}</span></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        @endforeach
        <div class="mt-5">
            <div class="alert alert-warning">
                <h5 class="font-weight-bold">Kesimpulan</h5>
                <p>Berdasarkan dari gejala yang kamu pilih atau alami juga berdasarkan Role/Basis aturan yang sudah ditentukan oleh seorang pakar penyakit maka perhitungan Algoritma Certainty Factor mengambil nilai CF yang paling pinggi yakni <b>{{ number_format(unserialize($riwayat->cf_max)[0], 3) }} ({{ number_format(unserialize($riwayat->cf_max)[0], 3) * 100 }}%)</b> yaitu <b>{{ unserialize($riwayat->cf_max)[1] }}</b></p>
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
