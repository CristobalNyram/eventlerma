<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config_name_system() }}</title>
    <link rel="stylesheet" href="{{ asset('assets/css/home') }}/barra.css">

    <link href="{{ asset('argon/brand') }}/{{ config_icon_logo_system() }}" rel="icon" type="image/png">

    <link rel="stylesheet" href="{{ asset('assets/css/home') }}/Estilo_index_R.css">
    <link rel="stylesheet" href="{{ asset('assets/css/home') }}/Estilo_Ponente.css">

</head>
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
                                    <h3 id="texttcolor1">Dias</h3>
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


</header>

<body>
    <div class="Container_T">
        <div class="container">
            <div class="top">
                <div class="imgBx">
                    <div class="box">
                        <img src="{{asset($current_user->user_image )}}">
                    </div>
                </div>
                <div class="profiletextt">
                    <h3>{{$current_user->name}}<br>{{$current_user->first_surname}}<br>{{$current_user->second_surname}}<br> <span>Ponenete</span></h3>
                </div>
            </div>
            <div class="contentBox">
                <div class="leftSide">
                    <h3>Contactos</h3>
                    <ul>
                        <li>
                            <span class="icon">
                                <ion-icon name="call-outline"></ion-icon>
                            </span>
                            <span class="textt">+1 222 147 51 60</span>
                        </li>
                        <li>
                            <span class="icon">
                                <ion-icon name="mail-outline"></ion-icon>
                            </span>
                            <span class="textt">{{$current_user->email}}</span>
                        </li>
                        <li>
                            <span class="icon">
                                <ion-icon name="earth-outline"></ion-icon>
                            </span>
                            <span class="textt">www.apple.com</span>
                        </li>

                        <li>
                            <span class="icon">
                                <ion-icon name="location-outline"></ion-icon>
                            </span>
                            <span class="textt"> San Francisco, California, Estados Unidos</span>
                        </li>
                    </ul>
                    <h3>Educación</h3>
                    <ul class="education">
                        <li>
                            <h5>1975-1974</h5>
                            <h4>Reed College</h4>
                            <h6>Digital arts</h6>
                        </li>
                        <li>
                            <h5>1975-1978</h5>
                            <h4>Reed College</h4>
                            <h6>Digital arts</h6>
                        </li>
                        <li>
                            <h5>1980-1994</h5>
                            <h4>Reed College</h4>
                            <h6>Digital arts</h6>
                        </li>

                    </ul>
                    <h3>Language</h3>
                    <ul class="Language">
                        <li>
                            <span class="textt">English</span>
                            <span class="percent">
                                <div style="width: 90%"></div>
                            </span>
                        </li>
                        <li>
                            <span class="textt">Spanish</span>
                            <span class="percent">
                                <div style="width: 48%"></div>
                            </span>
                        </li>
                    </ul>
                    <h3>Interest</h3>
                    <ul class="interest">
                        <li><span class="icon">
                                <ion-icon name="reader-outline"></ion-icon>
                            </span>Reading</li>
                        <li><span class="icon">
                                <ion-icon name="brush-outline"></ion-icon>
                            </span>Drawing</li>
                        <li><span class="icon">
                                <ion-icon name="bicycle-outline"></ion-icon>
                            </span>Walking</li>

                    </ul>
                </div>
                <div class="rightSide">
                    <div class="aboutt">
                        <h3>Profile</h3>
                        <p>Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. Facilis, reiciendis amet
                            beatae quod praesentium minus delectus facere
                            voluptatibus animi libero distinctio molestias
                            ratione tempore maxime accusantium rerum iusto
                            iure atque?. <br><br>
                            Lorem ipsum dolor sit amet consectetur, adipisicing
                            elit. Itaque voluptatum ratione provident similique
                            deserunt, voluptates facere ab doloribus cumque
                            laudantium, porro quibusdam cum eum perferendis
                            veritatis obcaecati voluptatem illo quam.</p>
                    </div>
                    <div class="about">
                        <h3>Experiance</h3>
                        <div class="box">
                            <div class="year_company">
                                <h5>2014-2016</h5>
                                <h5>Company Name</h5>
                            </div>
                            <div class="textt">
                                <h4>Senior UX</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Minima nulla quas cupiditate illo modi,
                                    totam perspiciatis dicta excepturi similique
                                    dolorum iusto vero exercitationem, placeat ad
                                    qui itaque, quaerat temporibus voluptatibus!</p>

                            </div>
                        </div>
                        <div class="box">
                            <div class="year_company">
                                <h5>2016-2019</h5>
                                <h5>Company Name</h5>
                            </div>
                            <div class="textt">
                                <h4>Senior UX</h4>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing
                                    elit. Minima nulla quas cupiditate illo modi,
                                    totam perspiciatis dicta excepturi similique
                                    dolorum iusto vero exercitationem, placeat ad
                                    qui itaque, quaerat temporibus voluptatibus!</p>

                            </div>
                        </div>
                    </div>
                    <div class="about skills">
                        <h3>Professional Skill</h3>
                        <div class="box">
                            <h4>HTMl</h4>
                            <span class="percent">
                                <div style="width:90%;"></div>
                            </span>
                        </div>
                        <div class="box">
                            <h4>Css</h4>
                            <span class="percent">
                                <div style="width:90%;"></div>
                            </span>
                        </div>
                        <div class="box">
                            <h4>JavaScript</h4>
                            <span class="percent">
                                <div style="width:70%;"></div>
                            </span>
                        </div>
                        <div class="box">
                            <h4>PhP</h4>
                            <span class="percent">
                                <div style="width:40%;"></div>
                            </span>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="container__cards">

            <div class="card">
                <div class="cover">
                    <img src="images/p1.png" alt="">
                    <div class="img__back"></div>
                </div>
                <div class="description">
                    <h2>{{$current_user1->name}} {{$current_user1->first_surname}}</h2>
                    <p><span class="icon">
                            <ion-icon name="mail-outline"></ion-icon>
                        </span>
                        <span class="">{{$current_user1->email}}</span>
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, laboriosam.</p>
                    <input type="button" value="Leer Más">
                </div>
            </div>

            <div class="card">
                <div class="cover">
                    <img src="images/p2.png" alt="">
                    <div class="img__back"></div>
                </div>
                <div class="description">
                    <h2>{{$current_user2->name}} {{$current_user2->first_surname}}</h2>
                    <p><span class="icon">
                            <ion-icon name="mail-outline"></ion-icon>
                        </span>
                        <span class="">{{$current_user2->email}}</span>
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, laboriosam.</p>
                    <input type="button" value="Leer Más">
                </div>
            </div>

            <div class="card">
                <div class="cover">
                    <img src="images/p3.png" alt="">
                    <div class="img__back"></div>
                </div>
                <div class="description">
                    <h2>{{$current_user3->name}} {{$current_user3->first_surname}}</h2>
                    <p><span class="icon">
                            <ion-icon name="mail-outline"></ion-icon>
                        </span>
                        <span class="">{{$current_user3->email}}</span>
                    </p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, laboriosam.</p>
                    <input type="button" value="Leer Más">
                </div>
            </div>

        </div>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

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
<script src="{{ asset('assets/js/home') }}/galeria.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://unpkg.com/scrollreveal"></script>
<script src="{{ asset('assets/js/home') }}/menu.js"></script>
