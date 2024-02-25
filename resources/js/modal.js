(function(){

    $(".tablaProductos tbody").on("click", "img.myImg", function(){
        var imagen = $(this).src("myImg");
                $(".img01").attr("src", 'imagen');
        })


}());