<?php
use Clases\Estudiante;

include_once "clases/Estudiante.php";
include_once "menu.php";
?>
<table border="1">
    <tr>
        <th>&nbsp;</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Programa</th>
        <th colspan="2">&nbsp;</th>
    </tr>
    <!-- TODO: cargar datos de los estudiantes -->
   <?php $i=1;
   
   ?>
    
     <?php foreach( Estudiante::listarEstudiante() as $arreglo):  ?>   
    <tr>
        <td><?= $i ?></td>
        <td><?= $arreglo['nombres']."<br>"; ?></td>
        <td><?= $arreglo['apellidos']."<br>"; ?></td>
        <td><?= $arreglo['nombre']."<br>"; ?></td>
        <td><a href="actualizarEs.php?id=<?=$arreglo['id']?>&nombre=<?=$arreglo['nombres']?>&apellidos=<?=$arreglo['apellidos']?>">Actualizar</a></td>
        <td><a href="eliminarEs.php?id=<?=$arreglo['id']?>">Eliminar</a></td>
        <?php $i++ ?>
    </tr>
     <?php endforeach; ?>
</table>
