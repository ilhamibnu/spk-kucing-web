<nav class="navbar navbar-expand-lg navbar-light bg-white sticky" data-offset="500">
    <div class="container">
        <a href="/">
            <img width="100px" src="{{ asset('logo/navlogo.png') }}" alt="">
        </a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item @if(request()->is('/')) active @endif">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item @if(request()->is('artikel-user')) active @endif">
                    <a class="nav-link" href="/artikel-user">Blog</a>
                </li>
                <li class="nav-item @if(request()->is('artikel')) active @endif dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        About
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/penyakit-kulit-user">Penyakit Kulit</a>
                        <a class="dropdown-item" href="/jenis-kucing-user">Jenis Kucing</a>
                    </div>
                </li>

                <li class="nav-item @if(request()->is('contact')) active @endif">
                    <a class="nav-link" href="/contact">Contact</a>
                </li>


                @if(Auth::check())
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/diagnosa-user">Diagnosa</a>
                        <a class="dropdown-item" href="/riwayat-user">Riwayat</a>
                        <a class="dropdown-item" href="/profil">Profil</a>
                        <a class="dropdown-item" href="/auth/logout">Logout</a>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a class="btn btn-primary ml-lg-2" href="/login-user">Login / Register</a>
                </li>
                @endif

            </ul>
        </div>

    </div>
</nav>
