<header class="header-area">
    <!-- Navbar Area -->
    <div class="oneMusic-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="oneMusicNav">

                    <!-- Nav brand -->
                    <a  href="{{ route('home_page_index') }}" class="nav-brand">
                        <img width="100%" src="{{ asset('argon') }}/brand/{{ config_icon_logo_system() }}"  alt="{{ config_icon_logo_system() }}"">

                        {{-- <img src="{{ asset('assets/home_page/') }}/img/core-img/logo.png" alt=""> --}}
                    </a>

                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>

                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- Close Button -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="{{ route('home_page_index') }}">Home</a></li>
                                {{-- <li><a href="albums-store.html">Albums</a></li> --}}
                                {{-- <li><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="albums-store.html">Albums</a></li>
                                        <li><a href="event.html">Events</a></li>
                                        <li><a href="blog.html">News</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                        <li><a href="elements.html">Elements</a></li>
                                        <li><a href="{{ route('login') }}">Login</a></li>
                                        <li><a href="#">Dropdown</a>
                                            <ul class="dropdown">
                                                <li><a href="#">Even Dropdown</a></li>
                                                <li><a href="#">Even Dropdown</a></li>
                                                <li><a href="#">Even Dropdown</a></li>
                                                <li><a href="#">Even Dropdown</a>
                                                    <ul class="dropdown">
                                                        <li><a href="#">Deeply Dropdown</a></li>
                                                        <li><a href="#">Deeply Dropdown</a></li>
                                                        <li><a href="#">Deeply Dropdown</a></li>
                                                        <li><a href="#">Deeply Dropdown</a></li>
                                                        <li><a href="#">Deeply Dropdown</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="#">Even Dropdown</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li> --}}

                                @auth
                                    @if (Auth::user()->role_id==4 || Auth::user()->role_id==5)
                                    <li><a href="{{ route('home') }}"
                                        >Mis eventos</a></li>

                                    @endif
                                @endauth
                                <li><a href="{{ route('home_page_events') }}"
                                    >Eventos</a></li>
                                {{-- <li>
                                    <a href="{{ route('home_page_calendar') }}"
                                    >Calendario</a></li> --}}
                                {{-- <li><a href="#">Contacto</a></li> --}}
                            </ul>

                            <!-- Login/Register & Cart Button -->
                            <div class="login-register-cart-button d-flex align-items-center">
                                <!-- Login/Register -->
                                @if (Auth::check())
                                    <div class="login-register-btn mr-50">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">Cerrar Sesión</a>
                                        <form id="logoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                @else
                                    <div class="login-register-btn mr-50">
                                        <a href="{{ route('login') }}" id="loginBtn">Login / Register</a>
                                    </div>
                                @endif


                                <!-- Cart Button -->
                                {{-- <div class="cart-btn">
                                    <p><span class="icon-shopping-cart"></span> <span class="quantity">1</span></p>
                                </div> --}}
                            </div>
                        </div>
                        <!-- Nav End -->

                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
