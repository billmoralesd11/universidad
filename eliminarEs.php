<?php
use Clases\Estudiante;

//include_once "clases/Estudiante.php";
include_once "config/autoload.php";
include_once "menu.php";

    $codigo = $_GET["id"];
    Estudiante::eliminarEstudiante($codigo);
   
?>