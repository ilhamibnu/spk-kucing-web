<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('admin/assets/') }}" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>SPK Penyakit Kucing @yield('title')</title>

    <meta name="description" content="" />

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo/navlogo.jpg') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/new/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/new/datatablesbutton.css') }}">

    <script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script>

    <script src="{{ asset('admin/assets/js/config.js') }}"></script>

    <style>
        .img-fluid {
            max-width: 100%;
            height: auto;
            width: 100%;
        }

        @media (max-width: 768px) {
            .img-fluid {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .img-fluid {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 320px) {
            .img-fluid {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 280px) {
            .img-fluid {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 240px) {
            .img-fluid {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 200px) {
            .img-fluid {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 180px) {
            .img-fluid {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 160px) {
            .img-fluid {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 140px) {
            .img-fluid {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 120px) {
            .img-fluid {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 100px) {
            .img-fluid {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 80px) {
            .img-fluid {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 60px) {
            .img-fluid {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }


        /* // ubah ukuran foto sesuai dengan ukuran layar pengguna */
        .img-fluid-2 {
            max-width: 100%;
            height: auto;
            width: 100%;
        }

        @media (max-width: 768px) {
            .img-fluid-2 {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .img-fluid-2 {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 320px) {
            .img-fluid-2 {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 280px) {
            .img-fluid-2 {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 240px) {
            .img-fluid-2 {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 200px) {
            .img-fluid-2 {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

        @media (max-width: 180px) {
            .img-fluid-2 {
                max-width: 100%;
                height: auto;
                width: 100%;
            }
        }

    </style>



</head>

<body>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">


            @include('admin.partials.aside')


            <div class="layout-page">


                @include('admin.partials.navbar')


                <div class="content-wrapper">

                    @yield('content')

                    <div class="modal fade" id="Update" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel1">Update Profil</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="/updateprofil" method="post">
                                    @csrf
                                    @method('post')
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="nameBasic" class="form-label">Nama</label>
                                                <input type="text" name="name" value="{{ Auth::user()->name }}" id="nameBasic" class="form-control" placeholder="Enter Name" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="nameBasic" class="form-label">Email</label>
                                                <input type="email" name="email" value="{{ Auth::user()->email }}" id="nameBasic" class="form-control" placeholder="Enter Email" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="nameBasic" class="form-label">Password</label>
                                                <input type="password" name="password" value="" id="nameBasic" class="form-control" placeholder="Enter Password" />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="nameBasic" class="form-label">Repassword</label>
                                                <input type="password" name="repassword" value="" id="nameBasic" class="form-control" placeholder="Enter Repassword" />
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




                @include('admin.partials.footer')



                <div class="content-backdrop fade"></div>
            </div>

        </div>

    </div>



    <div class="layout-overlay layout-menu-toggle"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>



    <script src="{{ asset('admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/js/ui-toasts.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('admin/new/jquery.dataTables.js')}}"></script>

    <script src="https://cdn.datatables.net/buttons/2.3.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.6/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(Session::get('updateprofil'))
    <script>
        Swal.fire({
            icon: 'success'
            , title: 'Good'
            , text: 'Profil Berhasil Diupdate'
        , });

    </script>
    @endif

    @yield('script')
</body>
</html>
