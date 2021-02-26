<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="/" class="align-middle">
                    <h3 class="title-2">PENGELOLA SURAT</h3>
                </a>
                <button class="hamburger hamburger--slider" type="button">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <nav class="navbar-mobile">
        <div class="container-fluid">
            <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="{{ route('dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i>Dashboard</a>                    
                </li>
                <li>
                    <a href="{{ route('transaksisurat.index') }}">
                    <i class="zmdi zmdi-email"></i>Transaksi Surat</a>
                </li>
                <li>
                    <a href="{{ route('klasifikasi.index') }}">
                    <i class="fas fa-user"></i>Klasifikasi</a>
                </li>
                <li>
                    <a href="{{ route('sifatsurat.index') }}">
                    <i class="fa fa-book"></i>Sifat Surat</a>
                </li>
                <li>
                    <a href="{{ route('user.index') }}">
                    <i class="fa fa-users"></i>User</a>
                </li>
            </ul>
        </div>
    </nav>
</header>