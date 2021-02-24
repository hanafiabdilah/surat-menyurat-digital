<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset('images/icon/logo.png') }}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>                    
                </li>
                <li  class="{{ request()->is('transaksisurat') ? 'active' : '' }}">
                    <a  href="{{ route('transaksisurat.index') }}">
                        <i class="zmdi zmdi-email"></i>Transaksi Surat</a>                        
                </li>
                <li class="{{ request()->is('klasifikasi') ? 'active' : '' }}">
                    <a href="{{ route('klasifikasi.index') }}">
                        <i class="fas fa-user"></i>Klasifikasi</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>