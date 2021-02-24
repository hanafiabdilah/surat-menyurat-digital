<header class="header-mobile d-block d-lg-none">
    <div class="header-mobile__bar">
        <div class="container-fluid">
            <div class="header-mobile-inner">
                <a class="logo" href="index.html">
                    <img src="{{ asset('images/icon/logo.png') }}" alt="CoolAdmin" />
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
            </ul>
        </div>
    </nav>
</header>