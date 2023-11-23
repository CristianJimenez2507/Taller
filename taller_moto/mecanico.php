<?php
 
require_once ("conexion.php");
class mecanico{
    private $id = null;
    private $nombre;
    private $apellido;
    private $especializacion;
   
   
    const TABLA = 'mecanico';
 
      public function getId() {
        return $this ->id;
      }
      public function getNombre(){
        return $this->nombre;
      }
      public function getApellido(){
        return $this ->apellido;
      }
      public function getEspecializacion(){
        return $this ->especializacion;
      }
      public function getContrasenia(){
        return $this ->contrasenia;
      }
      public function setId($id){
        $this->id = $id;
      }
      public function setNombre($nombre){
        $this->nombre = $nombre;
      }
      public function setApellido($apellido){
        $this->apellido = $apellido;
      }
      public function setEspecializacion($especializacion){
        $this->especializacion= $especializacion;
      }
 
      public function setContrasenia($contrasenia){
        $this-> contrasenia = $contrasenia;
      }
     
 
      public function __construct($nombre,$apellido,$especializacion,$contrasenia, $id=null ){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->especializacion = $especializacion;
        $this->contrasenia = $contrasenia;
       
      }
       public function guardarmecanico (){
        try{
          $conexion = new Conexion();
          $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, apellido, especializacion, contraseña) VALUES (:nombre, :apellido, :especializacion, :contrasenia)');
          $consulta -> bindParam(':nombre', $this->nombre);
          $consulta -> bindParam(':apellido', $this->apellido);
          $consulta -> bindParam(':especializacion', $this->especializacion);
          $consulta -> bindParam(':contrasenia', $this->contrasenia);
          $consulta -> execute();
          $this->id = $conexion->lastInsertid();
 
         
          $_SESSION['mensaje_exito'] = "Registro guardado con éxito";
          header("Location: mostrarmecanico.php");
 
        }catch (PDOException $e) {
 
          $_SESSION['mensaje_error'] = "Error al guardar el registro: " . $e->getMessage();
          header("Location: mostrarmecanico.php");
        }
        $conexion = null; 
    }
 
    public static function mostrarmecanico(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' ORDER BY nombre');
        $consulta -> execute();
        $registros = $consulta->fetchAll();
        return $registros;
 
    }
}
?>



