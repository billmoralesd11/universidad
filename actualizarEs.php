<?php
use Clases\Estudiante;


include_once "config/autoload.php";
include_once "menu.php";
?>
    <h1>Actualizar Estudiantes</h1>
    <form method="POST" action="#">
        <input type="hidden" name="codigo" value="<?= $_GET['id'] ?>">
        <input type="text" name="nombres" placeholder="<?= $_GET['nombre'] ?>" required/><br>
        <input type="text" name="apellidos" placeholder="<?= $_GET['apellidos'] ?>" required/><br>
        <input type="submit" name="submit" value="Actualizar">
    </form>

<?php
if (isset($_POST["submit"])) {
    $codigo = $_POST["codigo"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];


    Estudiante::actualizarEstudiante($nombres,$apellidos,$codigo);
   
    header("location:index.php");
}
?>