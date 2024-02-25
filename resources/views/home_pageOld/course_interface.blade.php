
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config_name_system() }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/home') }}/Estilo_Cursos_Interfaz.css">
    <link rel="stylesheet" href="{{ asset('assets/css/home') }}/barra.css">
    <link href="{{ asset('argon/brand') }}/{{ config_icon_logo_system() }}" rel="icon" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/home') }}/Estilo_index_R.css">
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
                                        <circle class="outer"  id="circulo3" cx="75" cy="75" r="30" />
                                    </svg>
                                    <span class="text center-abs" id="minutes"></span>
                                    <h3 id="textcolor3">Minutos</h3>
                                </div>
                                <div class="chart">
                                    <div class="circle center-abs"></div>
                                    <svg class="center-abs" width="150" height="150">
                                        <circle class="outer" id="circulo4"cx="75" cy="75" r="30" />
                                    </svg>
                                    <span class="text center-abs" id="seconds"></span>
                                    <h3 id="textcolor4">Segundos</h3>
                                </div>
                            </div>
                        </section>
                    </li>
                    <li class="menu__item">
                        <a href="{{ route('home_page_index') }}" class="menu__link">Torneo<span style="color:black">_</span>de<span style="color:black">_</span>Videojuegos</a>
                    </li>


                    <li class="menu__item">
                        <a href="{{ route('home_page_index') }}" class="menu__link">Horario</a>
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



        <div class="inf">
            <div class="contenedor_img">
            <img class="imge" src="{{asset($current_course->url_img )}}" >

            </div>

            <div class="contenedor_texto">
            <h3>{{$current_course->title}}</h3>
            <p>{{$current_course->description}}</p>
            @foreach($consulta as $taller)
            <h4>Curso impartido por: <span id="hj">{{$taller->name}}</span></h4>
            @endforeach
            <H4>Horario: <span id="hj">{{$current_course->hour}}</span></H4>
            <H4>Fecha: <span id="hj">{{$current_course->date}}</span></H4>
            </div>
        </div>





        <footer>
            <div class="container">

            <p>&copy; Copyright Software-Freedom Day 2022<br><br>Todos los derechos reservados. <br>Deasarrollado por {{ config_author_system() }}
            </p>
            <center>
                <a href="https://www.facebook.com/Freedom-Day-TI-Uttecam-477721659417275">
                    <span class="icono"></span>
                    <ion-icon class="tam" name="logo-facebook"></ion-icon>
                    <span class="texto"> </span>
                </a>

                <a class="icon" href="https://goo.gl/maps/BWKybpucUgH8QXzf6">
                    <span class="icono"></span>
                    <ion-icon name="location-outline"></ion-icon>
                    <span class="texto"> </span>
                </a>
            </center>
            </div>
        </footer>

        <script src="{{ asset('assets/js/home') }}/galeria.js"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://unpkg.com/scrollreveal"></script>
        <script src="{{ asset('assets/js/home') }}/menu.js"></script>
