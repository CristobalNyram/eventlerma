<!DOCTYPE html>
<html lang="es">
@include('home_page.layouts.head')

<body>
    <!-- Preloader -->
    @include('home_page.layouts.preloader')

    <!-- ##### Header Area Start ##### -->
    @include('home_page.layouts.header')

    <!-- ##### Header Area End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    <section class="breadcumb-area bg-img bg-overlay" style="background-image: url({{ asset('assets/home_page/') }}/img/bg-img/breadcumb3.jpg);">
        <div class="bradcumbContent">
            <p>Calendario de evento</p>
            <h2>Calendario</h2>
        </div>
    </section>

    <!-- ##### Calendar Area Start ##### -->
    <div class="container mt-5">
        <div id="calendar"></div>
    </div>
    <!-- ##### Calendar Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('home_page.layouts.footer')
    <!-- ##### Footer Area End ##### -->

    <!-- ##### All Javascript Script ##### -->
    @include('home_page.layouts.scripts_footer')

</body>
</html>
