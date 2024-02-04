<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Cetak Riwayat {{ $riwayat->nama }}</title>
</head>
<body>
    <div class="container">
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center">
                        <h2 class="heading-section">Detail Diagnosa {{ $riwayat->nama }}</h2>
                        <p>{{ $riwayat->created_at->format('d M Y, H:m:s') }}</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-light">
            <div class="container">
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
                    <div class="alert alert-primary">
                        <h5 class="font-weight-bold">Kesimpulan</h5>
                        <p>Berdasarkan dari gejala yang kamu pilih atau alami juga berdasarkan Role/Basis aturan yang sudah ditentukan oleh seorang pakar penyakit maka perhitungan Algoritma Certainty Factor mengambil nilai CF yang paling pinggi yakni <b>{{ number_format(unserialize($riwayat->cf_max)[0], 3) }} ({{ number_format(unserialize($riwayat->cf_max)[0], 3) * 100 }}%)</b> yaitu <b>{{ unserialize($riwayat->cf_max)[1] }}</b></p>
                    </div>
                </div>
            </div>
        </section>
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
