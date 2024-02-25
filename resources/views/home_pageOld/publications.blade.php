<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config_name_system() }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/home') }}/Estilo_publicaciones.css">
    <link href="{{ asset('argon/brand') }}/{{ config_icon_logo_system() }}" rel="icon" type="image/png">

</head>

<body>

    <div class="container__background-triangle">
        <div class="triangle triangle1"></div>
        <div class="triangle triangle2"></div>
        <div class="triangle triangle3"></div>
    </div>
    <header>
        <nav class="menu">
                <section class="menu__container">
                    <ul class="menu__links">
                        <li class="menu_item">
                            <a href="{{ route('home_page_index') }}" class="logo" id="tope"><img src="{{ asset('assets/img/home/img') }}/logo.png"></a>
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


                                <a href="{{ route('home_page_login') }}" class="menu__link">Inicio<span style="color:#000 ;">_</span>de<span style="color:#000 ;">_</span>Sesión</a>

                        </li>

                    </ul>

                    <div class="menu__hamburguer">
                        <img src="/menu.svg" class="menu__img">
                    </div>
                </section>
            </nav>


            </header>

    <div class="container__cards">
        <div class="card">
            <div class="cover__card">
                <img src="{{ asset('assets/img/home/img') }}/img-1.jpg" alt="">
            </div>
            <div class="titulo">
                <h2>Sabemos cómo aumentar los beneficios</h2>
                <br>
            </div>
            <div class="texto">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui sunt eius dolore pariatur. Error, provident et similique sunt voluptate odit eos facere expedita, culpa at officia magnam quia vel eius!</p>


            </div><hr>
            <div class="footer__card">
                <h3 class="user__name">Mamie Barnett</h3>
                <i>08 Marzo</i>
            </div>
        </div>
        <div class="card">
            <div class="cover__card">
                <img src="{{ asset('assets/img/home/img') }}/img-2.jpg" alt="">
            </div>
            <div class="titulo">
                <h2>Sabemos cómo aumentar los beneficios</h2>

            </div>
            <div class="texto">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui sunt eius dolore pariatur. Error, provident et similique sunt voluptate odit eos facere expedita, culpa at officia magnam quia vel eius!</p>


            </div>
            <hr>
            <div class="footer__card">
                <h3 class="user__name">Mamie Barnett</h3>
                <i>08 Marzo</i>
            </div>
        </div>
        <div class="card">
            <div class="cover__card">
                <img src="{{ asset('assets/img/home/img') }}/img-3.jpg" alt="">
            </div>
            <div class="titulo">
                <h2>Sabemos cómo aumentar los beneficios</h2>

            </div>

            <div class="texto">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Qui sunt eius dolore pariatur. Error, provident et similique sunt voluptate odit eos facere expedita, culpa at officia magnam quia vel eius!</p>


            </div><hr>
            <div class="footer__card">
                <h3 class="user__name">Mamie Barnett</h3>
                <i>08 Marzo</i>
            </div>
        </div>
    </div>
    <script src="Js/script.js"></script>
        <script src="Js/app.js"></script>
</body>
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
</html>
