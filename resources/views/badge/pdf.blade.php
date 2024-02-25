<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;700&display=swap');


        * {

            box-sizing: border-box;
        }

        body {
            font-family: 'biko', sans-serif;
        }

        div {
            width: 11.7cm;
            position: absolute;
            margin-left: 150px;
            margin-top: 100px;
            height: 10cm;
            border-style: double;
        }

        #bloque {
            position: absolute;
            width: 160px;
            margin-left: 280px;
            height: 375px;
        }

        #ri2 {
            bottom: 279px;
            position: absolute;
            left: 0;
            width: 150px;
        }

        #logo {
            width: 100px;
            position: absolute;
            left: 170px;
            top: 40px;
        }

        #perfil {
            border-radius: 50%;
            width: 100px;
            height: 95px;
            position: absolute;
            left: 19.5rem;
            top: 60px;
        }

        #ri3 {
            width: 155px;
            position: absolute;
            left: 285px;
            top: 230px;

        }

        #ri4 {
            width: 100px;
            position: absolute;
            left: 300px;
            top: 230px;

        }

        #nombre {
            position: absolute;
            bottom: 160px;
            margin-left: 80px;
        }

        #apellidos {
            position: absolute;
            bottom: 130px;
            margin-left: 40px;
        }

        #roles {
            position: absolute;
            bottom: 100px;
            margin-left: 100px;
        }
        #CODERS
        {
            position: absolute;
            top: 330px;
            margin-left: 10px;
            opacity: 0.5;
        }
        #frase
        {
            position: absolute;
            top: 335px;
            margin-left: 125px;
            font-size: 14px;
            opacity: 0.5;
        }

    </style>
    <title>Gafet</title>
</head>

<body>
    <div>
        <img id="bloque" src="https://i.ibb.co/WxVP3sH/ci-4.png">
        <img id="ri2" src="https://i.ibb.co/SBqY7YT/ri-2.png">
        <img id="perfil" src="{{old('user_image', auth()->user()->user_image)}}">
        <img id="logo" src="https://i.ibb.co/87XSQ16/ri-5.png">
        <img id="ri3" src="https://i.ibb.co/qp7W9gt/ri-3.png">

        <h1 id="nombre">{{ old('name', auth()->user()->name) }}</h1>
        <h2 id="apellidos">{{ old('first_surname', auth()->user()->first_surname) }} {{ old('second_surname', auth()->user()->second_surname) }}</h2>
        @foreach($consulta as $rol)
        <h3 id="roles">{{$rol->name}}</h3>
        @endforeach
        <h4 id="CODERS">CODERSTI</h4>
        <h4 id="frase">#HAZLODIFERENTE</h4>
    </div>

</body>

</html>