<div class="row align-items-center justify-content-xl-between">
    <div class="col-xl-6">
        <div class="copyright text-center text-xl-left text-muted">
            &copy; {{ now()->year }} <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">{{ config_author_system() }}</a>
        </div>
    </div>
    <div class="col-xl-6">
        <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            {{-- <li class="nav-item">
                <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Politicas de privacidad</a>
            </li> --}}
            <li class="nav-item">
                <a href="{{route('home_page_index')}}" class="nav-link" target="_blank">Página principal</a>
            </li>

            <li class="nav-item">
                <a href="https://wa.me/527292461338?text=Hola,%20necesito%20soporte%20en%20la%20plataforma%20de%20LERMA." class="nav-link" target="_blank">Soporte</a>
            </li>

        </ul>
    </div>
</div>
