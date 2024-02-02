<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Diagnosa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    {{-- @php
    $riwayat = App\Models\Riwayat::find($id);
    @endphp --}}

    <p class="mb-4">
        <b>Nama :</b> {{ $riwayat->nama }}
    </p>

    <p class="mb-4">
        <b>Tanggal :</b> {{ $riwayat->created_at->format('d M Y, H:m:s A') }}
    </p>

    <table class="table table-hover border">
        <thead class="thead-light">
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

    @foreach(unserialize($riwayat->hasil_diagnosa) as $diagnosa)
    <div class="card card-body shadow-none p-0 mt-1 border">
        <div class="card-header bg-primary text-white p-2">
            <h6 class="font-weight-bold">Tabel perhitungan penyakit: {{ $diagnosa['nama_penyakit'] }} ({{ $diagnosa['kode_penyakit'] }})</h6>
        </div>
        <table class="table table-hover">
            <thead class="thead-light">
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
                    <td><span class="text-danger">{{ number_format($diagnosa['hasil_cf'], 3) }}</span></td>
                </tr>
            </tfoot>
        </table>
    </div>
    @endforeach
    <div class="mt-1">
        <div class="alert alert-success">
            <h5 class="font-weight-bold">Kesimpulan</h5>
            <p>Berdasarkan dari gejala yang kamu pilih atau alami juga berdasarkan Role/Basis aturan yang sudah ditentukan oleh seorang pakar penyakit maka perhitungan Algoritma Certainty Factor mengambil nilai CF yang paling pinggi yakni <b>{{ number_format(unserialize($riwayat->cf_max)[0], 3) }} ({{ number_format(unserialize($riwayat->cf_max)[0], 3) * 100 }}%)</b> yaitu <b>{{ unserialize($riwayat->cf_max)[1] }}</b></p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        // window.print();

        window.onload = function() {
            window.print();
        }

    </script>
</body>
</html>
