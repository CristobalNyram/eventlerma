<?php

if(extension_loaded("gd") && function_exists("gd_info")) {
    echo "Ok, GD cargado";
} else {
    echo "GD, NO INSTALADA";
}

?>