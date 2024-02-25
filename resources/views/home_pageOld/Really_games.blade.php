
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config_name_system() }}</title>
    <link href="{{ asset('argon/brand') }}/{{ config_icon_logo_system() }}" rel="icon" type="image/png">





    <link rel="stylesheet" href="{{ asset('assets/css/home') }}/Estilos_Videojuegos.css">
    <link rel="stylesheet" href="{{ asset('assets/css/home') }}/Estilo_index_R.css">
    <link rel="stylesheet" href="{{ asset('assets/css/home') }}/barra.css">

    <link href="/estilosmenu.css" rel="stylesheet" type="text/css">
</head>
<header>
    <nav class="menu">
        <section class="menu__container">
            <ul class="menu__links">
                <li class="menu_links">
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



</header>

<body>
    <div class="">

        <video autoplay loop class="back-video" muted plays-inline>
            <source src="{{ asset('assets/img/home/img') }}/Esto es Xbox Game Pass  - Tráiler.mp4" type="video/mp4">

        </video>


        <div class="contenido_titulo">



        </div>
    </div>
    <!---pppppppppppppppppppppppppppppppppppppppppp--->
    <div class="intrucciones" style="margin-top: 90vh;">

        <div class="contenedor_m">
            <p class="titulo_i" style="margin-top: 15vh;">¿Como funciona?</p>
            <p class="Cuadro_P">Para participar registrate en 3 sencillos pasos</p>
            <div class="Pasos">
                <p class="Titulo_Paso">Paso 1</p>
                <p>Regístrate en el torneo de tu preferencia: <br>
                    Clash Royale.<br>
                    Gears 5.<br>
                    The King of Fighters.</p>
                <br>
                <img src="{{ asset('assets/img/home/img') }}/15.png" width="80px">
            </div>
            <div class="Pasos">
                <p class="Titulo_Paso">Paso 2</p>
                <p>Revisa el reglamento y práctica.</p>
                <br>
                <img src="{{ asset('assets/img/home/img') }}/15.png" width="80px">
            </div>
            <div class="Pasos">
                <p class="Titulo_Paso">Paso 3</p>
                <p>Busca la parte de registro y rellena los datos .</p>
                <br>
                <img src="{{ asset('assets/img/home/img') }}/15.png" width="80px">
            </div>
            <div class="Pasos">
                <p class="Titulo_Paso">Listo</p>
                <p>Revisa la información y asiste </p>
                <br>

            </div>



        </div>
        <div class="contenedorimg">
                 <img src="{{ asset('assets/img/home/img') }}/BannerFifa.png" width="100%" height="70%">
            </div>



    </div>
    <div class="FondoBlanco">
        <div class="Titulo_Juegos">

            <p>Videojuegos</p>
            <p>Conoce todos los torneos en los que puedes participar</p>

        </div>
        <div class="tarjetas" style="margin-top: 10vh;">

            <article class="tarjeta">
                <div class="tarjeta-contenedor">
                    <a href="/HTML/conferencia.html"><img src="{{ asset('assets/img/home/img') }}/clash.png" alt="" width="100%"
                            height="350px"></a>
                    <a href="/HTML/conferencia.html">
                        <h3>CLASH ROYALE</h3>
                    </a>
                    <hr color="#ff8000">

                    <br>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-laptop"
                        width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="3" y1="19" x2="21" y2="19" />
                        <rect x="5" y="6" width="14" height="10" rx="1" />
                    </svg>
                    <FONT SIZE=5> 1 VS 1 </FONT>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-gamepad"
                        width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <rect x="2" y="6" width="20" height="12" rx="2" />
                        <path d="M6 12h4m-2 -2v4" />
                        <line x1="15" y1="11" x2="15" y2="11.01" />
                        <line x1="18" y1="13" x2="18" y2="13.01" />
                    </svg>
                    <br>
                    <FONT SIZE=5>MOBILE</FONT>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trophy" width="40"
                        height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="8" y1="21" x2="16" y2="21" />
                        <line x1="12" y1="17" x2="12" y2="21" />
                        <line x1="7" y1="4" x2="17" y2="4" />
                        <path d="M17 4v8a5 5 0 0 1 -10 0v-8" />
                        <circle cx="5" cy="9" r="2" />
                        <circle cx="19" cy="9" r="2" />
                    </svg>




                </div>

                <div id="modal_container" class="modal-container">
                    <div class="modal">
                        <h1>Registro Clash Royale</h1>
                        <form>
                            <input type="text" id="" class="btn_modal" autocomplete="off" name=""
                                placeholder="Ingresa el nombre del equipo o del " required />
                            <br>
                            <input type="text" id="" class="btn_modal" autocomplete="off" name=""
                                placeholder="Contraseña" required />
                            <br>
                            <input type="text" id="" class="btn_modal" autocomplete="off" name=""
                                placeholder="Contraseña" required />
                        </form>
                        <button id="close">Cerrar</button>
                    </div>
                </div>

            </article>

            <article class="tarjeta">
                <div class="tarjeta-contenedor">
                    <a href=""><img src="{{ asset('assets/img/home/img') }}/gears.png" alt="" width="10%" height="350px"></a>
                    <a href="">
                        <h3>GEARS 5</h3>
                    </a>
                    <hr color="#ff8000">
                    <br>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-gamepad"
                        width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <rect x="2" y="6" width="20" height="12" rx="2" />
                        <path d="M6 12h4m-2 -2v4" />
                        <line x1="15" y1="11" x2="15" y2="11.01" />
                        <line x1="18" y1="13" x2="18" y2="13.01" />
                    </svg>

                    <FONT SIZE=5> 4 VS 4 </FONT>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-desktop"
                        width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <rect x="3" y="4" width="18" height="12" rx="1" />
                        <line x1="7" y1="20" x2="17" y2="20" />
                        <line x1="9" y1="16" x2="9" y2="20" />
                        <line x1="15" y1="16" x2="15" y2="20" />
                    </svg>
                    <br>
                    <br>
                    <FONT SIZE=5>XBOX PC</FONT>

                </div>



                <div id="modal_container" class="modal-container">
                    <div class="modal">
                        <h1>Ventana Modal</h1>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque assumenda dignissimos illo
                            explicabo natus quia repellat, praesentium voluptatibus harum ipsam dolorem cumque labore
                            sunt dicta consectetur, nesciunt maiores delectus maxime?
                        </p>
                        <button id="close">Cerrar</button>
                    </div>
                </div>
            </article>

            <article class="tarjeta">
                <div class="tarjeta-contenedor">
                    <a href=""><img src="{{ asset('assets/img/home/img') }}/king.png" alt="" width="150px" height="350px"></a>
                    <a href="">
                        <h3>The King of Fighters</h3>
                    </a>
                    <hr color="#ff8000">
                    <br>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-pavilon"
                        width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 21h7v-3a2 2 0 0 1 4 0v3h7" />
                        <line x1="6" y1="21" x2="6" y2="12" />
                        <line x1="18" y1="21" x2="18" y2="12" />
                        <path d="M6 12h12a3 3 0 0 0 3 -3a9 8 0 0 1 -9 -6a9 8 0 0 1 -9 6a3 3 0 0 0 3 3" />
                    </svg>
                    <FONT SIZE=5> 1 VS 1 </FONT>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-gamepad"
                        width="40" height="40" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <rect x="2" y="6" width="20" height="12" rx="2" />
                        <path d="M6 12h4m-2 -2v4" />
                        <line x1="15" y1="11" x2="15" y2="11.01" />
                        <line x1="18" y1="13" x2="18" y2="13.01" />
                    </svg>
                    <br>
                    <br>
                    <FONT SIZE=5>CONSOLA</FONT>


                </div>





                <div id="modal_container" class="modal-container">
                    <div class="modal">
                        <h1>Ventana Modal</h1>

                        <button id="close">Cerrar</button>
                    </div>
                </div>
            </article>
        </div>


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
</body>


        <script src="{{ asset('assets/js/home') }}/app.js"></script>
        <script src="{{ asset('assets/js/home') }}/modal.js"></script>
        <script src="{{ asset('assets/js/home') }}/reloj.js"></script>
