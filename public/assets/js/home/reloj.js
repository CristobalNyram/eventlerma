// Establecer la fecha en la que estamos contando hacia atrás
// Establecer la fecha aqui, en formato ingles
var countDownDate = new Date("Nov 31, 2022 8:00:00").getTime();
// Actualizar la cuenta regresiva cada 1 segundo
var x = setInterval(function() {
  // Obtener la fecha y la hora de hoy
  var now = new Date().getTime();
  // Encuentre la distancia entre ahora y la fecha de la cuenta regresiva
  var distance = countDownDate - now;
  // Cálculos de tiempo para días, horas, minutos y segundos.
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
  // Muestra el resultado en el elemento con id="demo"
  document.getElementById("days").innerHTML =  days;
  document.getElementById("hours").innerHTML =  hours;
  document.getElementById("minutes").innerHTML =  minutes;
  document.getElementById("seconds").innerHTML =  seconds;
  // aqui añadimos nuestra funcion, para que se segun 
  // el conteo regresivo anime los circulos
  effectCircle(days, hours, minutes, seconds);
}, 1000);
effectCircle = function(d, h, m, s){
    // valores maximos
    const max_sec = 60;
    const max_min = 60;
    const max_hour = 24;
    const max_day = 30;
    // valor del relleno del contorno
    // ojo es el mismo establecido en la hoja de estilos
    const strokeDashoffset = 189; 
    var circleSVG = document.getElementsByClassName('outer');
    // circulo dias
    var valPerDay = strokeDashoffset / max_day; // el valor de cada periodo segun la longitud del circulo
    var size = strokeDashoffset - (valPerDay * d); // restamos el valor del periodo a la longitud del circulo
    circleSVG[0].style.strokeDashoffset = size; // establemos nuevo valor al la longitud del circulo
    // circulo horas
    var valPerHour = strokeDashoffset / max_hour;
    var size = strokeDashoffset - (valPerHour * h);
    circleSVG[1].style.strokeDashoffset = size;
    // circulo minutos
    var valPerMin = strokeDashoffset / max_min;
    var size = strokeDashoffset - (valPerMin * m);
    circleSVG[2].style.strokeDashoffset = size;
    // circulo segundos
    var valPerSecond = strokeDashoffset / max_sec;
    var size = strokeDashoffset - (valPerSecond * s);
    circleSVG[3].style.strokeDashoffset = size;
}