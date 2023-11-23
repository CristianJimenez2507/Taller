<?php
 
require_once ("conexion.php");
class cliente{
    private $id;
    private $nombre;
    private $apellido;
    private $celular;
    private $email;
    private $contrasenia;
   
    const TABLA = 'cliente';
 
      public function getId() {
        return $this ->id;
      }
      public function getNombre(){
        return $this->nombre;
      }
      public function getApellido(){
        return $this ->apellido;
      }
      public function getCelular(){
        return $this ->celular;
      }
      public function getEmail(){
        return $this ->email;
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
      public function setCelular($celular){
        $this->celular= $celular;
      }
      public function setEmail($email){
        $this->email = $email;
      }
 
      public function setContrasenia($contrasenia){
        $this-> contrasenia = $contrasenia;
      }
 
   
     
 
      public function __construct($nombre,$apellido,$celular,$email,$contrasenia, $id=null ){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->celular = $celular;
        $this->email = $email;
        $this->contrasenia = $contrasenia;
       
      }
       public function guardar (){
        try{
          $conexion = new Conexion();
          $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, apellido, celular, email, contraseña) VALUES (:nombre, :apellido, :celular, :email, :contrasenia)');
          $consulta -> bindParam(':nombre', $this->nombre);
          $consulta -> bindParam(':apellido', $this->apellido);
          $consulta -> bindParam(':celular', $this->celular);
          $consulta -> bindParam(':email', $this->email);
          $consulta -> bindParam(':contrasenia', $this->contrasenia);
          $consulta -> execute();
          $this->id = $conexion->lastInsertid();
 
         
          $_SESSION['mensaje_exito'] = "Registro guardado con éxito";
          header("Location: mostrar.php");
 
        }catch (PDOException $e) {
 
          $_SESSION['mensaje_error'] = "Error al guardar el registro: " . $e->getMessage();
          header("Location: mostrar.php");
        }
    }
 
    public static function mostrar(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT * FROM ' . self::TABLA . ' ORDER BY nombre');
        $consulta -> execute();
        $registros = $consulta->fetchAll();
        return $registros;
 
    }
}
?>