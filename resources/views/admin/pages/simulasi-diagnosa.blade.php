@extends('admin.layout.main')
@section('title', '- Simulasi Diagnosa')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Simulasi Diagnosa</h4>

    <!-- Basic Bootstrap Table -->
    <div class="card">
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

        <form action="/simulasi-diagnosa" method="post">
            @csrf
            @method('POST')
            <div class="mb-3 m-3">
                <label for="nameBasic" class="form-label">Nama</label>
                <input type="text" name="nama" value="" id="nameBasic" class="form-control" placeholder="Enter Nama" required />
            </div>

            @foreach ($gejala as $key => $value )
            <div class="mb-3 m-3">
                <label for="exampleFormControlSelect1" class="form-label">{{ $value->nama }}</label>
                <select class="form-select" name="diagnosa[]" id="exampleFormControlSelect1" aria-label="Default select example">
                    {{-- <option value="{{ $value->id }}+0">Tidak Tahu</option> --}}
                    <option selected value="">Tidak Tahu</option>
                    <option value="{{ $value->id }}+0.2">Tidak Yakin</option>
                    <option value="{{ $value->id }}+0.4">Ya, Sedikit Yakin</option>
                    <option value="{{ $value->id }}+0.6">Ya, Cukup Yakin</option>
                    <option value="{{ $value->id }}+0.8">Ya, Yakin</option>
                    <option value="{{ $value->id }}+1">Ya, Sangat Yakin</option>
                </select>
            </div>
            @endforeach
            <div class="mb-3 m-3">
                <button type="submit" class="btn btn-primary">Cek</button>
            </div>
        </form>

    </div>
    <!--/ Basic Bootstrap Table -->
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

<script>
    $('#dataTable-1').DataTable({
        autoWidth: true,
        // "lengthMenu": [
        //     [16, 32, 64, -1],
        //     [16, 32, 64, "All"]
        // ]
        dom: 'Bfrtip',


        lengthMenu: [
            [10, 25, 50, -1]
            , ['10 rows', '25 rows', '50 rows', 'Show all']
        ],

        buttons: [{
                extend: 'colvis'
                , className: 'btn btn-primary btn-sm'
                , text: 'Column Visibility',
                // columns: ':gt(0)'


            },

            {

                extend: 'pageLength'
                , className: 'btn btn-primary btn-sm'
                , text: 'Page Length',
                // columns: ':gt(0)'
            },


            // 'colvis', 'pageLength',

            {
                extend: 'excel'
                , className: 'btn btn-primary btn-sm'
                , exportOptions: {
                    columns: [0, ':visible']
                }
            },

            // {
            //     extend: 'csv',
            //     className: 'btn btn-primary btn-sm',
            //     exportOptions: {
            //         columns: [0, ':visible']
            //     }
            // },
            {
                extend: 'pdf'
                , className: 'btn btn-primary btn-sm'
                , exportOptions: {
                    columns: [0, ':visible']
                }
            },

            {
                extend: 'print'
                , className: 'btn btn-primary btn-sm'
                , exportOptions: {
                    columns: [0, ':visible']
                }
            },

            // 'pageLength', 'colvis',
            // 'copy', 'csv', 'excel', 'print'

        ]
    , });

</script>

@endsection
