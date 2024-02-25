<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freedom day Game</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>
    <script>
        function reinciar(){
            Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Juego reinicado exitosamente',
            showConfirmButton: false,
            timer: 1500
            }).then(resul=>location.reload());
        }
    </script>
    <style>
        #button_action{
            position:absolute ; right: 42%; bottom: 10%;
        }
       @media only screen and (max-width: 600px) {

        #button_action {
            position:absolute ; right:30%; bottom: 10%;
        }
        }

        @media only screen and (max-width: 500px) {

        #button_action {
            position:absolute ; right:23%; bottom: 10%;
        }
        }

        @media only screen and (max-width: 400px) {

        #button_action {
            position:absolute ; right:15%; bottom: 10%;
        }
        }
    </style>


    <div  id="button_cerrar" >
        <button type="button" class="btn btn-warning" id="" value="arriba" onclick="reinciar();">reiniciar juego</button>




    </div>

    <div  id="button_action" >
        <button type="button" class="btn btn-primary" id="arribaButton" value="arriba">arriba</button>
        <button type="button" class="btn btn-danger" id="disparoButton">disparar</button>

        <button type="button" class="btn btn-primary" id="abajoButton">abajo</button>



    </div>


    <canvas id="canvas1"></canvas>

    <!-- characters -->
    <img id="player" src="./assets/player.png">
    <img id="angler1" src="assets/angler1.png">
    <img id="angler2" src="assets/angler2.png">
    <img id="lucky" src="assets/lucky.png">
    <img id="hivewhale" src="./assets/hivewhale.png">
    <img id="drone" src="./assets/drone.png">
    <img id="bulbwhale" src="./assets/bulbwhale.png">
    <img id="moonfish" src="./assets/moonfish.png">
    <img id="stalker" src="./assets/stalker.png">
    <img id="razorfin" src="./assets/razorfin.png">


    <!-- props -->
    <img id="projectile" src="./assets/projectile.png">
    <img id="gears" src="assets/gears.png">
    <img id="smokeExplosion" src="assets/smokeExplosion.png">
    <img id="fireExplosion" src="assets/fireExplosion.png">
    <img id="shield" src="assets/shield.png">
    <img id="fireball" src="assets/fireball.png">

    <!-- environment -->
    <img id="layer1" src="assets/layer1.png">
    <img id="layer2" src="assets/layer2.png">
    <img id="layer3" src="assets/layer3.png">
    <img id="layer4" src="./assets/layer4.png">

    <!-- sounds -->
    <audio id="powerup" src="./assets/powerup.wav"></audio>
    <audio id="powerdown" src="./assets/powerdown.wav"></audio>
    <audio id="explosion" src="./assets/explosion.wav"></audio>
    <audio id="shot" src="./assets/shot_v2.mp3"></audio>
    <audio id="OhNo" src="./assets/oh_no_sound.wav"></audio>
    <audio id="OhYeaBaby" src="./assets/oh_yeah.mp3"></audio>


    <audio id="hit" src="assets/hit.wav"></audio>
    <audio id="shieldSound" src="./assets/aouch.mp3"></audio>
    <script defer
    src="https://code.jquery.com/jquery-3.6.1.min.js"
    integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ="
    crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="./script.js"></script>

</body>
</html>
