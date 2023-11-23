<?php

require_once ("conexion.php");
class moto{
    private $id_cita;
    private $hora;
    private $fecha;
    private $id_mecanico;
    private $id_cliente;
    
    const TABLA = 'moto';

      public function getId() {
        return $this ->id_cita;
      }
      public function getHora(){
        return $this->hora;
      }
      public function getFecha(){
        return $this ->fecha;
      }
      public function getIdMecanico(){
        return $this ->id_mecanico;
      }
      public function getIdCliente(){
        return $this ->id_cliente;
      }
      
      
      public function setId($id_cita){
        $this->id_cita = $id_cita;
      }
      public function setHora($hora){
        $this->hora = $hora;
      }
      public function setFecha($fecha){
        $this->fecha = $fecha;
      }
      public function setIdMecanico($id_mecanico){
        $this->id_mecanico= $mecanico;
      }
      public function setIdCliente($id_cliente){
        $this->id_cliente= $id_cliente;
      }
      public function __construct($hora,$fecha,$id_mecanico, $id_cliente, $id_cita=null ){
        $this->id_cita = $id_cita;
        $this->hora = $hora;
        $this->id_mecanico = $id_mecanico;
        $this->id_cliente = $id_cliente;  
      }
       public function guardar_cita (){

        {

                $conexion = new Conexion();
                $consulta = $conexion->prepare('INSERT INTO ' .self::TABLA .'(hora, fecha, id_mecanico, id_cliente) VALUES (:hora, :fecha, :id_mecanico, :id_cliente)');
                $consulta -> bindParam(':hora', $this->hora);
                $consulta -> bindParam(':fecha', $this->fecha);
                $consulta -> bindParam(':id_mecanico', $this->id_mecanico);
                $consulta -> bindParam(':id_cliente', $this->id_cliente);
                $consulta -> execute();
                $this->id = $conexion->lastInsertid();
       }
       $conexion = null;
    }
    public static function mostrarcita(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT id_cita, hora,fecha,id_mecanico, id_cliente FROM ' . self::TABLA . ' ORDER BY nombre');
        $consulta -> execute();
        $registros = $consulta->fetchAll();
        return $registros;

    }

}
?>