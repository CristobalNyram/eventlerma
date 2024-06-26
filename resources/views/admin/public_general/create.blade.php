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
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
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
                    <div class="form-row">

                    <div class="form-group col-lg-4 col-12">
                            <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" maxlength="55" value="{{ old('name') }}" placeholder="Ingrese su nombre" required>
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="first_surname">Segundo apellido</label>
                        <input type="text" class="form-control" id="first_surname" name="first_surname"  maxlength="55" value="{{ old('first_surname') }}" placeholder="Ingrese su Segundo apellido" required>
                    </div>
                    <div class="form-group col-lg-4 col-12">
                        <label for="second_surname">Segundo apellido</label>
                        <input type="text" class="form-control" id="second_surname" name="second_surname"  maxlength="55" value="{{ old('second_surname') }}" placeholder="Ingrese su Segundo apellido" required>
                    </div>
                    <div class="form-group col-lg-6 col-12">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" maxlength="39" placeholder="Ingrese su contraseña" required>
                    </div>
                    <div class="form-group col-lg-6 col-12">
                        <label for="password_confirm">Confirmar Contraseña</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" maxlength="39" placeholder="Confirme su contraseña" required>
                    </div>
                    <div id="password_confirm_alert" class="form-group col-12 alert alert-danger alert-dismissible fade show d-none" role="alert">
                        Las contraseñas no coinciden. Por favor, asegúrate de que las contraseñas sean iguales.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            {{-- <span aria-hidden="true">&times;</span> --}}
                        </button>
                    </div>
                    <div class="form-group col-lg-6 col-12">
                        <label for="phone_number">Número de teléfono</label>
                        <input type="text" class="form-control phone_number" id="phone_number" name="phone_number" maxlength="13" value="{{ old('phone_number') }}" placeholder="Ingrese su Número de teléfono" required>
                    </div>
                    <div class="form-group col-lg-6 col-12">
                        <label for="gender">Género</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="" disabled selected>Seleccione su género</option>
                            <option value="H" {{ old('gender') == 'H' ? 'selected' : '' }}>Masculino</option>
                            <option value="M" {{ old('gender') == 'M' ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6 col-12">
                        <label for="email">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" maxlength="55" value="{{ old('email') }}" placeholder="Ingrese su Correo electrónico" required>
                    </div>
                    <div class="form-group col-lg-6 col-12">
                        <label for="user_image">Imagen de usuario</label>
                        <input type="file" class="form-control-file" id="user_image" name="user_image" placeholder="Seleccione su Imagen de usuario" required>
                    </div>
                    <div class="form-group col-lg-6 col-12">
                        <label for="date_birth">Fecha de nacimiento</label>
                        <input type="date" class="form-control" id="date_birth" name="date_birth" value="{{ old('date_birth') }}" placeholder="Seleccione su Fecha de nacimiento" required>
                    </div>
                    <div class="form-group col-lg-6 col-12">
                        <label for="status">Estado</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="" disabled selected>Seleccione el estado</option>
                            <option value="2" {{ old('status') == '2' ? 'selected' : '' }}>Activo</option>
                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>
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
         // Validación de Fecha de nacimiento
         $('#date_birth').change(function() {
             var dob = new Date($(this).val());
             var today = new Date();
             var age = today.getFullYear() - dob.getFullYear();
             var m = today.getMonth() - dob.getMonth();
             if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                 age--;
             }
             if (age < 12 || age > 100) {
                 alert('La Fecha de nacimiento debe ser mayor de 12 años y menor de 100 años.');
                 $(this).val('');
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
