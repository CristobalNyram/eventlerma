{{-- <script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="/assets/vendor/jquery/dist/jquery.slim.min.js"></script> --}}

{{-- <link rel="stylesheet" href="/assets/vendor/select2/dist/css/select2.min.css">
<script src="/assets/vendor/select2/dist/js/select2.min.js" defer></script> --}}
{{--
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js" defer></script> --}}

{{-- <script src="/assets/vendor/sweetalert2/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="/assets/vendor/sweetalert2/dist/sweetalert2.min.css">

 --}}
 <script src="/assets/vendor/datatables.net/js/jquery.dataTables.min.js" defer></script>
 <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>
{{--


<link rel="stylesheet" href="/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<script src="/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js" defer></script>

<script src="/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js" defer></script>

<link rel="stylesheet" href="/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
<script src="/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" defer></script> --}}


{{-- <link rel="stylesheet" href="/assets/vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"> --}}
{{-- <script src="/assets/vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" defer></script> --}}

{{--
<script src="/assets/vendor/datatables.net-select/js/dataTables.select.min.js" defer></script>


<link rel="stylesheet" href="/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">

<script src="/assets/vendor/datatables.net-select-bs4/js/select.bootstrap4.min.js" defer></script> --}}




{{-- scripts end  --}}


<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/brand/{{ config_icon_logo_system() }}" class="navbar-brand-img" alt="{{ config_icon_logo_system() }}">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{asset(Auth::user()->user_image)}}">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">¡Bienvenid@ {{ auth()->user()->name }} !</h6>
                    </div>
                    @if ( check_acces_to_this_permission(Auth::user()->role_id,36))

                    <a id="edit_profile_link" href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02 text-primary"></i>
                        <span>{{ __('Mi perfil') }}</span>
                    </a>
                    @endif
                    {{-- <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Configuración') }}</span>
                    </a> --}}

                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16 text-primary"></i>
                        <span>{{ __('Soporte') }}</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    confirmLogout();">
                        <i class="ni ni-user-run text-danger"></i>
                        <span>{{ __('Cerrar sesión') }}</span>
                    </a>

                </div>
            </li>
        </ul>


        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img  src="{{ asset('argon') }}/brand/{{ config_icon_logo_system() }}">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->

            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                        placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link @if($menu === 'dashboard')  custom-active text-white @endif"
                        href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>

                @if (Auth::user()->role_id==4 || Auth::user()->role_id==5)
                <li class="nav-item">
                    <a class="nav-link @if($menu === 'home_page_events')  custom-active text-white @endif"
                        href="{{ route('home_page_events') }}">
                        <i class="ni ni-building text-primary"></i> {{ __('Eventos') }}
                    </a>
                </li>

                @endif


                  {{-- <li class="nav-item">
                    <a class="nav-link @if($menu === 'videogame')  custom-active text-white @endif"
                        href="{{ route('game_index') }}">
                        <i class="ni ni-app-2 text-primary"></i> {{ __('Video juego') }}
                    </a>
                </li> --}}



                </li>

            </ul>

            </ul>
            <hr class="my-3">
            <h6 class="navbar-heading text-muted">Reportes</h6>


            <hr class="my-3">
            <h6 class="navbar-heading text-muted">Admnistración</h6>
            <ul class="navbar-nav">

                {{-- <li class="nav-item">
                    <a class="nav-link  @if($menu === 'payments')  custom-active text-white  @endif"
                        href="{{ route('payment_index') }}">
                        <i class="ni ni-cart text-primary"></i>Pagos
                    </a>
                </li> --}}
                @if ( check_acces_to_this_permission(Auth::user()->role_id,25))
                <li class="nav-item">
                    <a class="nav-link @if($menu === 'publicg_all')  custom-active text-white  @endif"
                        href="{{ route('publicg_index') }}">
                        <i class="fas fa-school text-primary"></i>Publico general
                    </a>
                </li>
                @endif



                @if ( check_acces_to_this_permission(Auth::user()->role_id,10))
                <li class="nav-item">
                    <a class="nav-link @if($menu === 'events_all')  custom-active text-white @endif"
                        href="{{ route('event_index') }}">
                        <i class="ni ni-paper-diploma text-primary" aria-hidden="true"></i>
                        Eventos
                    </a>
                </li>
                @endif
                @if ( check_acces_to_this_permission(Auth::user()->role_id,29))
                <li class="nav-item">
                    <a class="nav-link @if($menu === 'sponsors_all')  custom-active text-white @endif"
                        href="{{ route('sponsor_index') }}">
                        <i class="ni ni-spaceship text-primary"></i>
                        Compañias
                    </a>
                </li>
                @endif


            </ul>



            </ul>


            <hr class="my-3">
            <h6 class="navbar-heading text-muted">Página principal</h6>
            <ul class="navbar-nav">



                {{-- @if ( check_acces_to_this_permission(Auth::user()->role_id,15))
                <li class="nav-item">
                    <a class="nav-link @if($menu === 'talks_all')  custom-active text-white @endif"
                        href="{{ route('talk_index') }}">
                        <i class="ni ni-chat-round text-primary" aria-hidden="true"></i>
                        Conferencias
                    </a>
                </li>
                @endif --}}
                {{-- @if ( check_acces_to_this_permission(Auth::user()->role_id,15))
                <li class="nav-item">
                    <a class="nav-link @if($menu === 'speakers_all')  custom-active text-white @endif"
                        href="{{ route('speaker_index') }}">
                        <i class="ni ni-tie-bow text-primary" aria-hidden="true"></i>
                        Conferencistas
                    </a>
                </li>
                @endif --}}
                {{-- @if ( check_acces_to_this_permission(Auth::user()->role_id,19))
                <li class="nav-item">
                    <a class="nav-link @if($menu === 'souvenirs_all')  custom-active text-white @endif"
                        href="{{ route('souvenir_index') }}">
                        <i class="ni ni-shop text-primary" aria-hidden="true"></i>
                        Souvenirs
                    </a>
                </li>
                @endif --}}
                {{-- @if ( check_acces_to_this_permission(Auth::user()->role_id,44))
                <li class="nav-item">
                    <a class="nav-link @if($menu === 'badge_all')  custom-active text-white @endif"
                        href="{{ route('badge_index') }}">
                        <i class="ni ni-shop text-primary" aria-hidden="true"></i>
                        Obtener Gafet
                    </a>
                </li>
                @endif --}}
                {{-- @if ( check_acces_to_this_permission(Auth::user()->role_id,45))
                <li class="nav-item">
                    <a class="nav-link @if($menu === 'certificate_all')  custom-active text-white @endif"
                        href="{{ route('certificate_index') }}">
                        <i class="ni ni-shop text-primary" aria-hidden="true"></i>
                        Obtener Certificado
                    </a>
                </li>
                @endif --}}
                {{-- @if ( check_acces_to_this_permission(Auth::user()->role_id,32))
                <!-- El rol id pertenece al 32 no al 19, se cambiara una vez se agrege el menu para asignar roles -->
                <!-- Tambien cambiar en el controlador de paquetes -->
                <li class="nav-item">
                    <a class="nav-link @if($menu === 'packages_all')  custom-active text-white @endif"
                        href="{{ route('package_index') }}">
                        <i class="ni ni-ruler-pencil text-primary" aria-hidden="true"></i>
                        Paquetes
                    </a>
                </li>
                @endif --}}
                    {{--
                @if ( check_acces_to_this_permission(Auth::user()->role_id,32))
            <li class="nav-item">
                    <a class="nav-link @if($menu === 'rallys_all')  custom-active text-white @endif"
                        href="{{ route('rally_index') }}">
                        <i class="ni ni-controller text-primary" aria-hidden="true"></i>
                        Rallys
                    </a>
                </li>
                @endif --}}
                <!-- </li> -->
            </ul>

            </ul>
            <!-- Navigation -->
            <!-- Divider -->
            @if ( check_acces_to_this_permission(Auth::user()->role_id,1))
            <hr class="my-3">
            <!-- Heading -->

            <h6 class="navbar-heading text-muted">Complementos</h6>
            <!-- Navigation -->
            <ul class="navbar-nav">


                @if ( check_acces_to_this_permission(Auth::user()->role_id,6))
                <li class="nav-item">
                    <a class="nav-link @if($menu === 'logbook') custom-active text-white @endif "
                        href="{{ route('logbook_index') }}">
                        <i class="ni ni-books text-primary"></i>Bitácora
                    </a>

                </li>
                @endif
                @if ( check_acces_to_this_permission(Auth::user()->role_id,6))
                <li class="nav-item">
                    <a class="nav-link @if($menu === 'setting_all') custom-active text-white @endif "
                        href="{{ route('setting_index') }}">
                        <i class="ni ni-books text-primary"></i>Configuración
                    </a>
                </li>
                @endif
                @if ( check_acces_to_this_permission(Auth::user()->role_id,2))
                <li class="nav-item">
                    <a class="nav-link  @if($menu === 'role') custom-active text-white @endif "
                        href="{{ route('role_index') }}">
                        <i class="ni ni-single-02 text-primary"></i>Roles
                    </a>
                </li>
                @endif
                @if ( check_acces_to_this_permission(Auth::user()->role_id,4))
                <li class="nav-item">
                    <a class="nav-link @if($menu === 'users_all')  custom-active text-white @endif"
                        href="{{ route('users_all_index') }}">
                        <i class="fa fa-users text-primary" aria-hidden="true"></i>
                        Usuarios
                    </a>
                </li>
                @endif

                @if ( check_acces_to_this_permission(Auth::user()->role_id,3))
                <li class="nav-item">
                    <a class="nav-link @if($menu === 'menus')  custom-active text-white @endif"
                        href="{{ route('menu_index') }}">
                        <i class="fa fa-bars text-primary" aria-hidden="true"></i>

                        Menus
                        {{-- null not acces to the system --}}
                    </a>
                </li>
                @endif




                </li>

            </ul>
            @endif


            {{-- styles in navbar --}}


        </div>
    </div>
</nav>
