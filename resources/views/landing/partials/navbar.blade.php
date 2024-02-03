<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/"><span class="flaticon-pawprint-1 mr-2"></span>Pet sitting</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="fa fa-bars"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            @if(Auth::check())

            @if(Auth::user()->role_id == '2')
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/diagnosa-user">Diagnosa</a></li>
                        <li><a class="dropdown-item" href="/riwayat-user">Riwayat</a></li>
                        <li><a class="dropdown-item" href="/profil">Profil</a></li>
                        <li><a class="dropdown-item" href="/auth/logout">Logout</a></li>
                    </ul>
                </li>
            </ul>
            @endif

            @else
            <div class="navbar-nav ml-auto">
                <li class="nav-item"><a href="/auth/google" class="nav-link">Sign In With Google</a>
                </li>
            </div>
            @endif

        </div>
    </div>
</nav>
