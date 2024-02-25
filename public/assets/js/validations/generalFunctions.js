'use-scritc';

function uppercaseLetters(e)
{

    let ss = e.target.selectionStart;
    let se = e.target.selectionEnd;
    let reg =new RegExp(/^[A-Za-z0-9\s]+$/g);
    e.target.value = e.target.value.toUpperCase();
    e.target.selectionStart = ss;
    e.target.selectionEnd = se;
    value=e.target.value;
    if (!reg.test(value)) {


                Swal.fire({
                position: 'top-end',
                icon: 'error',
                title: 'Solo se permite letras.',
                showConfirmButton: false,
                timer: 1500
                });
                e.target.value='';
    }


}
function LimitAttach(tField, iType) {
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
            document.getElementById("alerta").style.display = "none";
            break;
        }
    }
    if (allowSubmit) {
    } else {
        tField.value = "";
        document.getElementById("alerta").style.display = "block";
    }
}

