
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config_name_system() }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/home') }}/Estilo_index.css">
    <link rel="stylesheet" href="{{ asset('assets/css/home') }}/barra.css">
    <link href="{{ asset('argon/brand') }}/{{ config_icon_logo_system() }}" rel="icon" type="image/png">
    <link rel="stylesheet" href="{{ asset('assets/css/home') }}/Estilo_index_R.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
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
        <div class="fondo">
            <div class="textos">

            <img class=" ha animate__animated animate__pulse animate__delay-2s animate__infinite"  src="{{ asset('assets/img/home/img') }}/logo.png">
            </div>



        </div>

        <script src="{{ asset('assets/js/home') }}/menu.js"></script>
        <div id="q" class="que">
            <h1>¿QUÉ ES SOFTWARE-</span><span class="freed">FREEDOM <span class="day">DAY</span></span>?</h1><br>
            <p>Es un evento organizado por alumnos y docentes de la carrera de Tecnologías de la Información en la Universidad Tecnológica de Tecamachalco,
                ahora en nuestra 6ta Edición. El evento está enfocado en el área de Desarrollo de Software y Redes Inteligentes.<br>El
                evento Software-Freedom Day te invitamos a participar el dia 30 de Noviembre y 1 de Diciembre en este
                gran evento.
            </p>
            <img class="logo22" src="{{ asset('assets/img/home/img') }}/logo.png">
        </div>

        <div id="o" class="pro">
            <h1>Objetivo</h1><br>
            <p>Incentivar el interés por la ciencia y la tecnologia en los alumnos de la
                carrera de tecnologias de la información y comunicacion con el fin de
                ampliar su perspectiva y conocimientos en las tendencias tecnologias
                actuales ademas de prepararlos con herramientas que sean de utilidad
                para su incorporación  en el ambito laboral.</p>
        </div>


        <div id="p" class="ob">
            <h1>Proposito</h1><br>
            <p>Integrar y promover nuevos aprendizajes para todos los participantes que quieran
             actualizarse en los nuevos conocimientos y conceptos tecnológicos</p>
        </div>
        <!--Galeria-->


<div class="toky">
<div id="g" class="gal">
    <h2>GALERÍA</h2>
</div>
    <div class="reze" style="background-image: url(assets/img/home/img/galeria/01.png);" >
        <h3></h3>

    </div>


    <div class="reze" style="background-image: url(assets/img/home/img/galeria/02.png);">
        <h3></h3>
    </div>

    <div class="reze" style="background-image: url(assets/img/home/img/galeria/03.png);">
        <h3></h3>
    </div>

    <div class="reze" style="background-image: url(assets/img/home/img/galeria/04.png);">
    </div>

    <div class="reze" style="background-image: url(assets/img/home/img/galeria/05.png);">
    </div>

    <div class="reze active" style="background-image: url(assets/img/home/img/galeria/06.png);">
    </div>

    <div class="reze" style="background-image: url(assets/img/home/img/galeria/07.png);">
    </div>

    <div class="reze" style="background-image: url(assets/img/home/img/galeria/08.png);">
    </div>

    <div class="reze" style="background-image: url(assets/img/home/img/galeria/09.png);">
    </div>

    <div class="reze" style="background-image: url(assets/img/home/img/galeria/10.png);">
    </div>

    <div class="reze" style="background-image: url(assets/img/home/img/galeria/11.png);">
    </div>

    <div class="reze" style="background-image: url(assets/img/home/img/galeria/12.png);">
    </div>

    <div class="reze" style="background-image: url(assets/img/home/img/galeria/13.png);">
    </div>

    <div class="reze" style="background-image: url(assets/img/home/img/galeria/14.png);">
    </div>

    <div class="reze" style="background-image: url(assets/img/home/img/galeria/15.png);">
    </div>

    <div class="reze" style="background-image: url(assets/img/home/img/galeria/16.png);">
    </div>

    <div class="reze" style="background-image: url(assets/img/home/img/galeria/17.png);">
    </div>

</div>
<script src="{{ asset('assets/js/home') }}/galeria.js"></script>
<section id="patro">


    <h2>Patrocinios</h2>

<ul>

    @foreach($sponsors2 as $sponsor)

        <li>
            <img src="{{asset($sponsor->url_img )}}" width="100">
        </li>
        @endforeach
    </ul>


    </ul>

</section>

<footer>
    <h3>© Copyright Software-Freedom Day 2022</h3>
    <p>Todos los derechos reservados.</p>
    <p>Deasarrollado por
        {{-- {{ config_author_system() }} --}}
    </p>


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
