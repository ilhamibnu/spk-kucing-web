<!DOCTYPE html>

<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('admin/assets/') }}" data-template="vertical-menu-template-free">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon/favicon.ico') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/core.cs') }}s" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/pages/page-auth.css') }}" />
    <!-- Helpers -->
    <script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
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
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <img class="img-fluid" src="{{ asset('logo/gatau2.png') }}" alt="">
                                <span class="app-brand-logo demo">
                                </span>

                            </a>
                            {{-- <span class="app-brand-text demo text-body fw-bolder">Login</span> --}}
                        </div>
                        <!-- /Logo -->
                        {{-- <h4 class="mb-2">Welcome to Sneat! 👋</h4>
                        <p class="mb-4">Please sign-in to your account and start the adventure</p> --}}

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

                        <form class="mb-3" action="/login" method="POST">
                            @csrf
                            @method('post')
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" class="form-control" id="email" name="email-username" placeholder="Enter your email or username" required autofocus />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password">Password</label>
                                    {{-- <a href="auth-forgot-password-basic.html">
                                        <small>Forgot Password?</small>
                                    </a> --}}
                                </div>
                                <div class="input-group input-group-merge">
                                    <input type="password" name="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" required />
                                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            {{-- <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="remember-me" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div> --}}
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary d-grid w-100">Sign in</button>
                            </div>
                        </form>

                        {{-- <p class="text-center">
                            <span>New on our platform?</span>
                            <a href="auth-register-basic.html">
                                <span>Create an account</span>
                            </a>
                        </p> --}}
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if(Session::get('gagalogin'))
    <script>
        Swal.fire({
            icon: 'error'
            , title: 'Oops..'
            , text: 'Email or Password is incorrect!'
        , });

    </script>
    @endif
    {{--
    @if(Session::get('logout'))
    <script>
        Swal.fire({
            icon: 'success'
            , title: 'Success'
            , text: 'Logout Successfully!'
        , });

    </script>
    @endif --}}
</body>
</html>
