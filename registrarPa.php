<?php
use Clases\Programa;
use Clases\Facultad;

include_once "config/autoload.php";

include_once "menu.php";
?>
    <h1>Registrar Programa Academica</h1>
    <form method="post" action="#">
        <input type="text" name="nombre" placeholder="Programa Academica" required/><br>    
        <select name="facultad">
             <?php foreach(Facultad::listarFacultad() as $facultad):?>
             <option value="<?=$facultad['id'] ?>"><?=$facultad['nombre'] ?></option>
             <?php endforeach;?> 
        </select>
        <input type="submit" name="submit" value="Guardar">
    </form>

<?php 
if(isset($_POST['submit'])){

$nombre=$_POST['nombre'];
$id_fa=$_POST['facultad'];
 $programa=new Programa($nombre,$id_fa);
 if($programa->crearPrograma()){
      echo "Escuela creada";
 }else{
      echo "Error: Los datos no se guardaron";
 };
}




?>