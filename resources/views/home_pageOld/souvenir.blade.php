<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config_name_system() }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/home') }}/Estilo_index_R.css">
    <link rel="stylesheet" href="{{ asset('assets/css/home') }}/Estilo_Souvenir.css">
    <link rel="stylesheet" href="{{ asset('assets/css/home') }}/barra.css">
    <link href="{{ asset('argon/brand') }}/{{ config_icon_logo_system() }}" rel="icon" type="image/png">

</head>
<header>
    <nav class="menu">
        <section class="menu__container">
            <ul class="menu__links">

                <li clas="menu_item">
                    <a href="{{ route('home_page_index') }}" class="logo" id="tope"><img src="{{ asset('assets/img/home/img') }}/logo.png" width="100px"></a>
                </li>

                <li class="menu_item">
                    <section class="containerR">

                        <div class="charts">


                            <div class="chart">
                                <!-- un circulo inicial de fondo -->
                                <div class="circle center-abs"></div>
                                <!-- area para SVG -->
                                <svg class="center-abs" width="150" height="150">
                                    <!-- un segundo circulo en SVG con su ubicacion en coordenadas x,y y el radio de expansion -->
                                    <circle class="outer" id="circulo1" cx="75" cy="75" r="30" />
                                </svg>
                                <!-- etiqueta para el contador, en este caso el dia -->
                                <span class="text center-abs" id="days"></span>
                                <h3 id="textcolor1">Dias</h3>
                            </div>
                            <div class="chart">
                                <div class="circle center-abs"></div>
                                <svg class="center-abs" width="150" height="150">
                                    <circle class="outer" id="circulo2" cx="75" cy="75" r="30" />
                                </svg>
                                <span class="text center-abs" id="hours"></span>
                                <h3 id="textcolor2">Horas</h3>
                            </div>
                            <div class="chart">
                                <div class="circle center-abs"></div>
                                <svg class="center-abs" width="150" height="150">
                                    <circle class="outer" id="circulo3" cx="75" cy="75" r="30" />
                                </svg>
                                <span class="text center-abs" id="minutes"></span>
                                <h3 id="textcolor3">Minutos</h3>
                            </div>
                            <div class="chart">
                                <div class="circle center-abs"></div>
                                <svg class="center-abs" width="150" height="150">
                                    <circle class="outer" id="circulo4" cx="75" cy="75" r="30" />
                                </svg>
                                <span class="text center-abs" id="seconds"></span>
                                <h3 id="textcolor4">Segundos</h3>
                            </div>
                        </div>
                    </section>
                </li>

                <li class="menu__item">
                    <a href="{{ route('really_index') }}" class="menu__link">Torneo<span style="color:black">_</span>de<span style="color:black">_</span>Videojuegos</a>
                </li>
                <li class="menu__item">
                    <a href="{{ route('timeline_index') }}" class="menu__link">Horario</a>
                </li>

                <li class="menu__item">

                    <a href="{{ route('home_page_sponsor') }}" class="menu__link">Patrocinadores</a>

                </li>

                <li class="menu__item">
                    <a href="{{ route('home_page_course') }}" class="menu__link">Talleres</a>
                </li>

                <li class="menu__item">
                    <a href="{{ route('home_page_conference') }}" class="menu__link">Conferencias</a>
                </li>

                <li class="menu__item">
                    <a href="{{ route('home_page_souvenir') }}" class="menu__link">Souvenirs</a>
                </li>

                <li class="menu__item">


                    <a href="{{ route('home_page_login') }}" class="menu__link">Inicio<span style="color:black">_</span>de<span style="color:black">_</span>Sesión</a>

                </li>

            </ul>

            <div class="menu__hamburguer">
                <img src="{{ asset('assets/img/home/img') }}/menu.svg" class="menu__img">
            </div>
        </section>
    </nav>

    <script src="{{ asset('assets/js/home') }}/reloj.js"></script>


    <script src="{{ asset('assets/js/home') }}/app.js"></script>


</header>

<div class="pos1">
    @foreach($souvenir3 as $souvenir)
    @foreach($precio3 as $packages)
    <div class="card">
        <div class="circleS" style="--clr:#bdc3c7">
            <img id="img" src="{{asset($souvenir->url_img )}}" class="logo">
        </div>
        <div class="content">
            <p><b>{{$packages->name}}</b><br>Incluye:</p>
            <li class="li">Entrada</li>
            <li class="li">Libreta</li>
            <li class="li">Sticker</li>
            <br>
            <!-- <p><b>Precio: ${{$packages -> price}}</b></p> -->
            <p><b>Precio: $300</b></p>
            <!-- <a href="{{ route('home_page_create') }}">Comprar</a> -->
        </div>
        <img id="bs" src="{{asset($souvenir->url_img )}}" class="product_img">
    </div>
    @endforeach
    @endforeach


    @foreach($souvenir2 as $souvenir)
    @foreach($precio2 as $packages)
    <div class="card">
        <div class="circleS" style="--clr:#bdc3c7">
            <img id="taza" src="{{asset($souvenir->url_img )}}" class="logo">
        </div>
        <div class="content">
            <p><b>{{$packages->name}}</b><br></p>
            <li class="li">Entrada</li>
            <li class="li">Libreta</li>
            <li class="li">Taza personalizada</li>
            <br>
            <p><b>Precio: ${{$packages->price}}</b></p>
            <!-- <a href="{{ route('home_page_create') }}">Comprar</a> -->
        </div>
        <img id="xa" src="{{asset($souvenir->url_img )}}" class="product_img">
    </div>
    @endforeach
    @endforeach

    @foreach($souvenir1 as $souvenir)
    @foreach($precio1 as $packages)
    <div class="card">
        <div class="circleS" style="--clr:#bdc3c7">
            <img id="pl" src="{{asset($souvenir->url_img )}}" class="logo">
        </div>
        <div class="content">
            <p><b>{{$packages->name}}</b><br>Incluye:</p>
            <li class="li">Entrada</li>
            <li class="li">Libreta</li>
            <li class="li">Playera</li>
            <li class="li">Stikers</li>
            <br>
            <p><b>Precio: ${{$packages->price}}</b></p>
            <!-- <a href="{{ route('home_page_create') }}">Comprar</a> -->
        </div>
        <img id="xa" src="{{asset($souvenir->url_img )}}" class="product_img">
    </div>
    @endforeach
    @endforeach




</div>


<footer>
    <h3>© Copyright Software-Freedom Day 2022</h3>
    <p>Todos los derechos reservados.</p>
    <p>Deasarrollado por {{ config_author_system() }}</p>


    <div class="iconos">

    <a class="icon" href="https://www.facebook.com/Freedom-Day-TI-Uttecam-477721659417275">
            <ion-icon name="logo-facebook"></ion-icon>
    </a>
    <a class="icon" href="https://goo.gl/maps/BWKybpucUgH8QXzf6">
        <ion-icon name="location-outline"></ion-icon>
    </a>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</footer>

<script src="{{ asset('assets/js/home') }}/galeria.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="{{ asset('assets/js/home') }}/menu.js"></script>
