@extends('layouts.app')

@section('content')
@include('layouts.navbars.navs.header')

<div class="container-fluid mt--6">

    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <h2 class="mb-0">Editar usuario</h2>
                </div>

                <form class="m-5" action="{{ route('publicg_update', $reg->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                        <input type="text" class="form-control" id="name" name="name" maxlength="55" value="{{ $reg->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="first_surname">Primer Apellido</label>
                        <input type="text" class="form-control" id="first_surname" name="first_surname"  maxlength="55" value="{{ $reg->first_surname }}" required>
                    </div>
                    <div class="form-group">
                        <label for="second_surname">Segundo Apellido</label>
                        <input type="text" class="form-control" id="second_surname" name="second_surname"  maxlength="55" value="{{ $reg->second_surname }}" required>
                    </div>

                    <div class="form-group">
                        <label for="phone_number">Número de Teléfono</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" maxlength="12" value="{{ $reg->phone_number }}" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Género</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="">Seleccionar</option>
                            <option value="H" {{ $reg->gender == 'H' ? 'selected' : '' }}>Masculino</option>
                            <option value="M" {{ $reg->gender == 'M' ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" maxlength="55" value="{{ $reg->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="reg_image">Imagen de Usuario</label>
                        <input type="file" class="form-control-file" id="reg_image" name="reg_image">
                    </div>
                    <div class="form-group">
                        <label for="date_birth">Fecha de Nacimiento</label>
                        <input type="date" class="form-control" id="date_birth" name="date_birth" value="{{ $reg->date_birth }}" required>
                    </div>
                    <div class="form-group">
                        <label for="status">Estado</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="">Seleccionar</option>
                            <option value="2" {{ $reg->status == '2' ? 'selected' : '' }}>Activo</option>
                            <option value="1" {{ $reg->status == '1' ? 'selected' : '' }}>Inactivo</option>
                        </select>
                    </div>

                    <div class="row  mt-5 d-flex justify-content-center">
                        <div class="col-lg-4 col-12">
                            <a href="{{  url()->previous()  }}" type="button" class="btn btn-danger">Cancelar</a>
                        </div>
                        <div class="form-group row d-flex justify-content-center">
                            <button type="submit" class="btn btn-default">Actualizar</button>
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

        $('#phone_number').on('input', function() {
            var phone = $(this).val().replace(/[^\d]/g, ''); // Eliminar todo excepto los dígitos
            if (phone.length === 10) {
                phone = phone.replace(/(\d{3})(\d{3})(\d{2})(\d{2})/, "$1-$2-$3-$4");
                $(this).val(phone);
            }
        });


     });
 </script>
</div>
@endsection
