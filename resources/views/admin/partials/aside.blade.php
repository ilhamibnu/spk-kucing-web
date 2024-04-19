<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="mb-2">
        <a href="/dashboard">
            <img class="img-fluid" src="{{ asset('logo/gatau4.png') }}" alt="">
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item @if(request()->is('dashboard')) active @endif">
            <a href="/dashboard" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item @if(request()->is('penyakit')) active @endif">
            <a href="/penyakit" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Penyakit</div>
            </a>
        </li>
        <li class="menu-item @if(request()->is('gejala')) active @endif">
            <a href="/gejala" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Gejala</div>
            </a>
        </li>

        <li class="menu-item @if(request()->is('simulasi-diagnosa')) active @endif">
            <a href="/simulasi-diagnosa" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Simulasi Diagnosa</div>
            </a>
        </li>

        <li class="menu-item @if(request()->is('riwayat')) active @endif">
            <a href="/riwayat" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Riwayat</div>
            </a>
        </li>

        <li class="menu-item @if(request()->is('user')) active @endif">
            <a href="/user" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">User</div>
            </a>
        </li>

        <li class="menu-item @if(request()->is('artikel')) active @endif">
            <a href="/artikel" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Artikel</div>
            </a>
        </li>

        <li class="menu-item @if(request()->is('data-dokter')) active @endif">
            <a href="/data-dokter" class="menu-link">
                <i class="menu-icon tf-icons bx bx-detail"></i>
                <div data-i18n="Form Elements">Dokter</div>
            </a>
        </li>

        <li class="menu-item" style="">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                <div data-i18n="Misc">About</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item @if(request()->is('data-jenis-kucing')) active @endif">
                    <a href="/data-jenis-kucing" class="menu-link">
                        <div data-i18n="Error">Jenis Kucing</div>
                    </a>
                </li>
                <li class="menu-item @if(request()->is('data-penyakit-kucing')) active @endif">
                    <a href="/data-penyakit-kulit" class="menu-link">
                        <div data-i18n="Under Maintenance">Penyakit Kulit</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
