<script>
    function confirmLogout() {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "¿Deseas cerrar sesión?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, cerrar sesión',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }

    function soloInputsEnterosYMayor0(input) {
        // Eliminar caracteres no permitidos
        input.value = input.value.replace(/[^\d]/g, '');

        // Convertir el valor a un número entero
        var valor = parseInt(input.value);

        // Verificar si el valor es un número y si es mayor que cero
        if (isNaN(valor) || valor < 0) {
            input.value = ''; // Si no es un número válido, vaciar el campo
        }
    }

    function validarFechaApartirDeHoy(input) {
        var fechaIngresada = new Date(input.value);
        var fechaActual = new Date();

        // Convertir la fecha actual a formato YYYY-MM-DD para comparación
        var fechaActualFormateada = fechaActual.toISOString().slice(0, 10);

        // Convertir la fecha ingresada a formato YYYY-MM-DD para comparación
        var fechaIngresadaFormateada = fechaIngresada.toISOString().slice(0, 10);

        if (fechaIngresadaFormateada < fechaActualFormateada) {
            alert("La fecha no puede ser anterior a la fecha actual.");
            input.value = ''; // Limpiar el valor del campo de entrada
        }
    }
    $('.slug').on('input', function() {
        var text = $(this).val();
        var formattedText = text.replace(/\s+/g, '-').replace(/[^a-zA-Z0-9-_]/g, '').toLowerCase();
        $(this).val(formattedText);
    });

    // También puedes verificar al pegar texto en el campo
    $('.slug').on('paste', function(e) {
        var pasteData = e.originalEvent.clipboardData.getData('text');
        var validChars = /^[a-z0-9\-]+$/i;

        // Verificar si el texto pegado contiene caracteres no permitidos
        if (!validChars.test(pasteData)) {
            e.preventDefault();
            // Puedes mostrar un mensaje de error o limpiar el texto
            // Ejemplo: $(this).val('');
        }
    });

    function validarNumerosPositivosCostos(input) {
        var regex = /^\d+(\.\d{0,2})?$/;

        // Validar si el valor ingresado coincide con la expresión regular
        if (!regex.test(input.value)) {
            // Si no coincide, mostrar un mensaje de error y volver al valor anterior
            input.value = input.value.slice(0, -1);
        }
    }

    // Formateador de número de teléfono
    $('.phone_number').on('input', function() {
        var phone = $(this).val().replace(/[^\d]/g, ''); // Eliminar todo excepto los dígitos
        if (phone.length === 10) {
            phone = phone.replace(/(\d{3})(\d{3})(\d{2})(\d{2})/, "$1-$2-$3-$4");
            $(this).val(phone);
        }
    });

    // No permitir números negativos en el teléfono
    $('.phone_number').keypress(function(e) {
        var a = [];
        var k = e.which;

        for (var i = 48; i < 58; i++)
            a.push(i);

        if (!(a.indexOf(k) >= 0))
            e.preventDefault();
    });

    function LimitAttach_Adaptable(tField, iType) {
        file = tField.value;
        if (iType == 1) {
            extArray = new Array(".jpeg", ".jpe", ".jpg", ".png");
        }
        allowSubmit = false;
        if (!file) return;
        while (file.indexOf("\\") != -1) file = file.slice(file.indexOf("\\") + 1);
        ext = file.slice(file.indexOf(".")).toLowerCase();
        for (var i = 0; i < extArray.length; i++) {
            if (extArray[i] == ext) {
                allowSubmit = true;
                document.getElementById('alerta').style.display = "none";
                break;
            }
        }
        if (allowSubmit) {} else {
            tField.value = "";
            document.getElementById('alerta').style.display = "block";
        }
    }
</script>
