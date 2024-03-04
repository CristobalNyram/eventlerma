@extends('layouts.app')

@section('content')
@include('layouts.navbars.navs.header')

<div class="container-fluid mt--6">



    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->

                <div class="card-header border-0">
                    <h2 class="mb-0">Agregar usuario</h2>

                </div>

                <form class="m-5" action="{{ route('publicg_store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ $error }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endforeach
                    @endif
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" maxlength="55" value="{{ old('name') }}" placeholder="Ingrese su nombre" required>
                    </div>
                    <div class="form-group">
                        <label for="first_surname">Primer Apellido</label>
                        <input type="text" class="form-control" id="first_surname" name="first_surname"  maxlength="55" value="{{ old('first_surname') }}" placeholder="Ingrese su primer apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="second_surname">Segundo Apellido</label>
                        <input type="text" class="form-control" id="second_surname" name="second_surname"  maxlength="55" value="{{ old('second_surname') }}" placeholder="Ingrese su segundo apellido" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" maxlength="39" placeholder="Ingrese su contraseña" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirm">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" maxlength="39" placeholder="Confirme su contraseña" required>
                    </div>
                    <div id="password_confirm_alert" class="alert alert-danger alert-dismissible fade show d-none" role="alert">
                        Las contraseñas no coinciden. Por favor, asegúrate de que las contraseñas sean iguales.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Número de Teléfono</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" maxlength="12" value="{{ old('phone_number') }}" placeholder="Ingrese su número de teléfono" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Género</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="" disabled selected>Seleccione su género</option>
                            <option value="H" {{ old('gender') == 'H' ? 'selected' : '' }}>Masculino</option>
                            <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" maxlength="55" value="{{ old('email') }}" placeholder="Ingrese su correo electrónico" required>
                    </div>
                    <div class="form-group">
                        <label for="user_image">Imagen de Usuario</label>
                        <input type="file" class="form-control-file" id="user_image" name="user_image" placeholder="Seleccione su imagen de usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="date_birth">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="date_birth" name="date_birth" value="{{ old('date_birth') }}" placeholder="Seleccione su fecha de nacimiento" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Estado</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" disabled selected>Seleccione el estado</option>
                            <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Activo</option>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <div class="row  mt-5 d-flex justify-content-center">
                        <div class="col-lg-4 col-12">
                            <a href="{{  url()->previous()  }}" type="button" class="btn btn-danger">Cancelar</a>
                        </div>
                        <div class="form-group row d-flex justify-content-center">
                            <button type="submit" class="btn btn-default">Agregar</button>
                        </div>
                    </div>
                </form>






            </div>
        </div>
    </div>


    @include('layouts.footers.auth')

    <script>
        $(document).ready(function() {
         // Validación de fecha de nacimiento
         $('#date_birth').change(function() {
             var dob = new Date($(this).val());
             var today = new Date();
             var age = today.getFullYear() - dob.getFullYear();
             var m = today.getMonth() - dob.getMonth();
             if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                 age--;
             }
             if (age < 3 || age > 100) {
                 alert('La fecha de nacimiento debe ser mayor de 3 años y menor de 100 años.');
                 $(this).val('');
             }
         });

         // Formateador de número de teléfono
         $('#phone_number').on('input', function() {
             var phone = $(this).val().replace(/\D/g, '');
             if (phone.length === 10) {
                 phone = phone.replace(/(\d{3})(\d{3})(\d{2})(\d{2})/, "$1-$2-$3-$4");
                 $(this).val(phone);
             }
         });
         $('#password_confirmation').on('input', function() {
            var password = $('#password').val();
            var confirmPassword = $(this).val();

            if (password !== confirmPassword) {
                $('#password_confirm_alert').removeClass('d-none');
            } else {
                $('#password_confirm_alert').addClass('d-none');
            }
        });

         // No permitir números negativos en el teléfono
         $('#phone_number').keypress(function(e) {
             var a = [];
             var k = e.which;

             for (var i = 48; i < 58; i++)
                 a.push(i);

             if (!(a.indexOf(k) >= 0))
                 e.preventDefault();
         });
     });
 </script>
</div>
@endsection

@push('js')


<script src="/assets/js/validations/generalFunctions.js"></script>
{{-- <script src="/assets/js/select2.js"></script> --}}

<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
