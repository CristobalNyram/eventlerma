@extends('layouts.app')

@section('content')
    @include('layouts.navbars.navs.header')

    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header border-0">
                        <h2 class="mb-0">Actualizar contraseña del usuario:{{ $current_user->name }}  {{ $current_user->first_surname }} {{ $current_user->second_surname }}</h2>
                    </div>

                    <form class="m-5" action="{{ route('password_edit') }}" method="POST" id="updatePasswordForm">
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

                        <div class="form-row">

                        <div class="form-group col-lg-6 col-12">
                            <label for="password">Nueva Contraseña</label>
                            <input type="hidden" name="id" id="id" value="{{$current_user->id}}">
                            <input type="password" class="form-control form-control-lg" id="password" name="password" value="{{ old('password')}}" placeholder="Nueva Contraseña" minlength="8"  max="50" required>
                        </div>

                        <div class="form-group col-lg-6 col-12">
                            <label for="confirm_password">Confirmar Contraseña</label>
                            <input type="password" class="form-control form-control-lg" id="confirm_password" name="confirm_password" value="{{ old('confirm_password') }}" placeholder="Confirmar Contraseña"  max="50"  minlength="8"  required>
                            <div id="passwordError" class="text-danger" style="display: none;">Las contraseñas no coinciden</div>
                        </div>
                        </div>

                        <div class="row mt-5 d-flex justify-content-center">
                            <div class="col-lg-4 col-12">
                                <a href="{{  url()->previous()  }}" type="button" class="btn btn-danger">Cancelar</a>
                            </div>
                            <div class="form-group row d-flex justify-content-center" id="updateButtonGroup" style="display:none;">
                                <button type="submit" class="btn btn-default" id="updateButton">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script>
        // Función para comparar las contraseñas y habilitar/deshabilitar el botón de "Actualizar"
        function comparePasswords() {
            var password = document.getElementById("password").value;
            var confirm_password = document.getElementById("confirm_password").value;
            var updateButton = document.getElementById("updateButton");
            var passwordError = document.getElementById("passwordError");
            updateButton.disabled = false;

            if (password === confirm_password && password !== '' && confirm_password !== '') {
                // Contraseñas coinciden y campos no están vacíos, habilitar el botón
                updateButton.disabled = false;
                passwordError.style.display = "none";
            } else {
                // Contraseñas no coinciden o campos están vacíos, deshabilitar el botón
                updateButton.disabled = true;
                if (password !== '' || confirm_password !== '') {
                    passwordError.style.display = "block";
                } else {
                    passwordError.style.display = "none";
                }
            }

            // Mostrar el botón solo cuando los campos de contraseña estén llenos
            var updateButtonGroup = document.getElementById("updateButtonGroup");
            if (password !== '' && confirm_password !== '') {
                updateButtonGroup.style.display = "block";
            } else {
                updateButtonGroup.style.display = "none";
            }
        }

        // Llamar a la función comparePasswords cuando se complete el evento onblur en los campos de contraseña
        document.getElementById("password").addEventListener("blur", comparePasswords);
        document.getElementById("confirm_password").addEventListener("blur", comparePasswords);
    </script>
@endpush
