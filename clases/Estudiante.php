<?php
namespace Clases;
use Clases\ConexionDB as db;


require_once "config/autoload.php";

class Estudiante extends Usuario
{
    private $codigo;

    public function __construct($codigo, $nombres, $apellidos, $telefono, $correo, $id_pa)
    {
        parent::__construct($nombres, $apellidos, $telefono, $correo, $id_pa);
        $this->codigo = $codigo;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
    }

    public function crearEstudiante() : bool {
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "INSERT INTO estudiantes(codigo, nombres, apellidos, telefono, correo, id_pa) 
                    VALUES('$this->codigo','$this->nombres', '$this->apellidos', '$this->telefono', '$this->correo', $this->id_pa)";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $numRows = $respuesta->rowCount();
            if($numRows!=0){
                $result = true;
            }else{
                $result = false;
            }

            $db->cerrarConexion();

            return $result;
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
    }

    public  static function listarEstudiante() :array {
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "SELECT es.id,es.nombres,es.apellidos,p.nombre from estudiantes as es join pa as p ON
            es.id_pa=p.id;";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $matriz=$respuesta->fetchAll();
            $db->cerrarConexion();
            return $matriz;
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
        
        
    }

    
    public  static function actualizarEstudiante($nombre,$apellido,$id) :void {
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "UPDATE estudiantes SET nombres='$nombre',apellidos='$apellido' where id=$id";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $db->cerrarConexion();
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
        
        
    }

    public  static function eliminarEstudiante($id) :void {
        try {
            $db = new db();
            $conn = $db->abrirConexion();

            $sql = "DELETE from estudiantes where id=$id ";
            $respuesta = $conn->prepare($sql);
            $respuesta->execute();
            $db->cerrarConexion();
            header("location: index.php");
        }
        catch (PDOException $e){
            echo $e->getMessage();
        }
        
        
    }
    
}