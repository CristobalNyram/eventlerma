<footer class="footer-area">
    <div class="container">
        <div class="row d-flex flex-wrap align-items-center">
            <div class="col-12 col-md-6">
                <a href="#">
                    {{-- <img src="{{ asset('assets/home_page/') }}/img/core-img/logo.png" alt=""> --}}
                    <img src="{{ asset('argon') }}/brand/{{ config_icon_logo_system() }}"  alt="{{ config_icon_logo_system() }}" height="40px" >
                </a>
                <p class="copywrite-text">
                    <a href="#">
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Derechos de autor ©<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Esta web fue creada con <i class="fa fa-heart-o" aria-hidden="true"></i> por
                        {{ config_author_system() }}
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </a>
                </p>
            </div>

            <div class="col-12 col-md-6">
                <div class="footer-nav">
                    <ul class="social-icons">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        <!-- Agrega más iconos según las redes sociales que desees -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
