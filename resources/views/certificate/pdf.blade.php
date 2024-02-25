<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <style>
            #logo
            {
                position: absolute;
                margin-left: 190px;
                top: 100px;
            }

            #ci-4
            {
                position: absolute;
                height: 100%;
            }
            #ci-5 
            {
                position: absolute;
                margin-left: 35px;
                height: 100%;
            }

            #ci-6
            {
                position: absolute;
                height: 100%;
                margin-left: 1010px;
            }
            #ci-7 
            {
                position: absolute;
                margin-left: 985px;
                height: 100%;
            }

            .text1 h1 {
                position: absolute;
                margin-left: 250px;
                margin-top: 170px;
            }

            .text1 h2 {
                position: absolute;
                margin-left: 200px;
                margin-top: 240px;
            }

            .text2 h1 {
                position: absolute;
                margin-left: 200px;
                margin-top: 300px;
                color: #228B22;
                font-size: 50px;
            }
            .text3 #parrafo1 {
                position: absolute;
                margin-left: 300px;
                margin-top: 380px;
            }
            .text3 #parrafo2 {
                position: absolute;
                margin-left: 240px;
                margin-top: 430px;
            }
            .text3 #parrafo3 {
                position: absolute;
                margin-left: 500px;
                margin-top: 460px;
            }
            .text3 h3 {
                font-size: 25px;
            }

            #ci-8 {
                position: absolute;
                margin-left: 460px;
                margin-top: 550px;
            }
            #ci-9 {
                position: absolute;
                margin-left: 100px;
                margin-top: 550px;
            }
            #ci-10 {
                position: absolute;
                margin-left: 650px;
                margin-top: 550px;
            }
            #firma1 {
                position: absolute;
                margin-top: 600px;
                margin-left: 120px;
            }
            #firma2 {
                position: absolute;
                margin-top: 600px;
                margin-left: 750px;
            }


        </style>
    </head>
    <body>
        <img id="logo" src="https://i.ibb.co/dpsQdGN/ri-1.png">
        <img id="ci-4" src="https://i.ibb.co/3d1HSPf/ci-4.png">
        <img id="ci-5" src="https://i.ibb.co/GknNrwr/ci-5.png">
        <img id="ci-6" src="https://i.ibb.co/3d1HSPf/ci-4.png">
        <img id="ci-7" src="https://i.ibb.co/GknNrwr/ci-5.png">
        <div class="text1">
            <h1>CERTIFICADO DE FINALIZACIÓN</h1>
            <h2>LE OTORGAMOS EL SIGUIENTE RECONOCIMIENTO A</h2>
        </div>
        <div class="text2">
            <h1>{{ old('name', auth()->user()->name) }} {{ old('first_surname', auth()->user()->first_surname) }} {{ old('second_surname', auth()->user()->second_surname) }}</h1>
        </div>
        <div class="text3">
            <h3  id="parrafo1">Por finalizar el curso <strong>BASE DE DATOS</strong></h3>
            <h3  id="parrafo2">cumpliendo <strong>8</strong>hrs, en el evento Software Freedom-Day</h3>
            <h3 id="parrafo3">2022</h3>
        </div>
        <img id="ci-8" src="https://i.ibb.co/LR71T3Q/ci-8.png">
        <img id="ci-9" src="https://i.ibb.co/R63066n/ci-9.png">
        <img id="ci-10" src="https://i.ibb.co/R63066n/ci-9.png">
        <h3 id="firma1">Director de la carrera TI</h3>
        <h3 id="firma2">Ponente</h3>

    </body>
</html>