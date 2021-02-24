<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header"></form>
                <div class="header-button">
                <div class="noti__item js-item-menu">                                        
                </div>
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <div class="image">
<<<<<<< HEAD
                                <img src="{{ asset('images/icon/avatar-01.jpg') }}" alt="{{ Auth::user()->nama }}" />
=======
                                <img src="{{ asset('storage/userfoto') }}/{{ Auth::user()->foto }}" alt="{{ Auth::user()->nama }}" />
>>>>>>> 8a642119028e670fa34692a250b68bc305e7337d
                            </div>
                            <div class="content">
                                <a class="js-acc-btn" href="#">{{ Auth::user()->nama }}</a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
<<<<<<< HEAD
                                            <img src="{{ asset('images/icon/avatar-01.jpg') }}" alt="{{ Auth::user()->nama }}" />
=======
                                            <img src="{{ asset('storage/userfoto')}}/{{ Auth::user()->foto }}" alt="{{ Auth::user()->nama }}" />
>>>>>>> 8a642119028e670fa34692a250b68bc305e7337d
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#">{{ Auth::user()->nama }}</a>
                                        </h5>
                                        <span class="email">{{ Auth::user()->email }}</span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="{{ route('account') }}">
                                            <i class="zmdi zmdi-account"></i>Account</a>
                                    </div>
                                    <div class="account-dropdown__item">
                                        <a href="{{ route('password') }}">
                                            <i class="zmdi zmdi-key"></i>Ubah Password</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="{{ route('logout') }}">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>