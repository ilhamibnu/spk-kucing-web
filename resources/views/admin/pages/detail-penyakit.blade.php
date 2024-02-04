@extends('admin.layout.main')
@section('title', 'Data Detail Penyakit ' . $penyakit->nama)

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Data Detail Penyakit {{ $penyakit->nama }}</h4>

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
        <div class="card-datatable table-responsive">
            <div class="text-end m-2">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#Add">Tambah</button>
            </div>
            <table class="table datatables table-hover responsive nowrap" style="width:100%" id="dataTable-1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Gejala</th>
                        <th>Nilai</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($detailPenyakit as $data )
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$data->gejala->nama}}</td>
                        <td>{{ $data->value_cf}}</td>
                        <td>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#Edit{{ $data->id }}" class="btn btn-warning">Edit</button>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#Delete{{ $data->id }}" class="btn btn-danger">Delete</button>
                        </td>

                        <!-- Modal Delete -->
                        <div class="modal fade" id="Delete{{ $data->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Delete</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Anda Yakin Akan Mengahapus Data Penyakit {{ $data->gejala->nama }}</p>
                                    </div>
                                    <form action="/detail-penyakit/{{ $data->id }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="Edit{{ $data->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel1">Edit</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="/detail-penyakit/{{ $data->id }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">

                                            <input hidden name="penyakit_id" value="{{ $penyakit->id }}" type="text">

                                            <div class="mb-3">
                                                <label for="exampleFormControlSelect1" class="form-label">Gejala</label>
                                                <select class="form-select" name="gejala_id" id="exampleFormControlSelect1" aria-label="Default select example">
                                                    <option selected value="{{ $data->gejala->id }}">{{ $data->gejala->nama }}</option>
                                                    @foreach ($gejala as $data2 )
                                                    <option value="{{$data2->id}}">{{$data2->nama}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="row">
                                                <div class="col mb-3">
                                                    <label for="nameBasic" class="form-label">Nilai</label>
                                                    <input type="text" name="value_cf" value="{{ $data->value_cf }}" id="nameBasic" class="form-control" placeholder="Enter Nilai" required />
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- Modal Add -->
        <div class="modal fade" id="Add" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel1">Add</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/detail-penyakit" method="post">
                        @csrf
                        @method('post')
                        <div class="modal-body">

                            <input hidden name="penyakit_id" value="{{ $penyakit->id }}" type="text">

                            <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label">Pilih Gejala</label>
                                <select class="form-select" name="gejala_id" id="exampleFormControlSelect1" aria-label="Default select example">
                                    <option disabled selected>Pilih Gejala</option>
                                    @foreach ($gejala as $data2 )
                                    <option value="{{$data2->id}}">{{$data2->nama}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row">
                                <div class="col mb-3">
                                    <label for="nameBasic" class="form-label">Nilai</label>
                                    <input type="text" name="value_cf" value="" id="nameBasic" class="form-control" placeholder="Enter Nilai" required />
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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
