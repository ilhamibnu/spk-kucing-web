<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Favicon icon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo/navlogo.jpg') }}">
    <title>@yield('title')Sistem Pakar Diagnosa Penyakit Kucing</title>

    <link rel="stylesheet" href="{{ ('/landing/css/maicons.css') }}">

    <link rel="stylesheet" href="{{ ('/landing/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ ('/landing/vendor/animate/animate.css') }}">

    <link rel="stylesheet" href="{{ ('/landing/css/theme.css') }}">

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

    <div class="back-to-top"></div>

    <header>
        @include('landing.partials.nav')
    </header>

    @yield('content')


    @include('landing.partials.footer')

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <script src="{{ ('/landing/js/jquery-3.5.1.min.js') }}"></script>

    <script src="{{ ('/landing/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ ('/landing/js/google-maps.js') }}"></script>

    <script src="{{ ('/landing/vendor/wow/wow.min.js') }}"></script>

    <script src="{{ ('/landing/js/theme.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(Session::get('logout'))
    <script>
        Swal.fire({
            icon: 'success'
            , title: 'Good'
            , text: 'Logout Berhasil'
        , });

    </script>
    @endif


    @if(Session::get('login'))
    <script>
        Swal.fire({
            icon: 'success'
            , title: 'Good'
            , text: 'Login Berhasil'
        , });

    </script>
    @endif

    @if(Session::get('loginerror'))
    <script>
        Swal.fire({
            icon: 'error'
            , title: 'Oops'
            , text: 'Login Gagal'
        , });

    </script>
    @endif

    @if(Session::get('register'))
    <script>
        Swal.fire({
            icon: 'success'
            , title: 'Good'
            , text: 'Register Berhasil'
        , });

    </script>
    @endif

    @if(Session::get('profilupdate'))
    <script>
        Swal.fire({
            icon: 'success'
            , title: 'Good'
            , text: 'Profil Berhasil Diupdate'
        , });

    </script>
    @endif

    @if(Session::get('resetpassword'))
    <script>
        Swal.fire({
            icon: 'success'
            , title: 'Good'
            , text: 'Link Reset Password Telah Dikirim Ke Email Anda'
        , });

    </script>
    @endif

    @if(Session::get('resetpasswordberhasil'))
    <script>
        Swal.fire({
            icon: 'success'
            , title: 'Good'
            , text: 'Reset Password Berhasil'
        , });

    </script>
    @endif

    @if(Session::get('emailtidakada'))
    <script>
        Swal.fire({
            icon: 'error'
            , title: 'Oops'
            , text: 'Email Tidak Terdaftar'
        , });

    </script>
    @endif

    @if(Session::get('linkkadaluarsa'))
    <script>
        Swal.fire({
            icon: 'error'
            , title: 'Oops'
            , text: 'Link Reset Password Telah Kadaluarsa'
        , });

    </script>
    @endif

    @if(Session::get('gagaldiagnosa'))
    <script>
        Swal.fire({
            icon: 'error'
            , title: 'Oops'
            , text: 'Gagal Melakukan Diagnosa, minimal harus memilih 2 gejala'
        , });

    </script>
    @endif

    @yield('script')

</body>
</html>
