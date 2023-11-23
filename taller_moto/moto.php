<?php

require_once ("conexion.php");
class moto{
    private $id_moto;
    private $placa;
    private $marca;
    private $año;
    
    const TABLA = 'moto';

      public function getId() {
        return $this ->id_moto;
      }
      public function getPlaca(){
        return $this->placa;
      }
      public function getMarca(){
        return $this ->marca;
      }
      public function getAño(){
        return $this ->año;
      }
      
      public function setId($id_moto){
        $this->id_moto = $id_moto;
      }
      public function setPlaca($placa){
        $this->placa = $placa;
      }
      public function setMarca($marca){
        $this->marca = $marca;
      }
      public function setAño($año){
        $this->año= $año;
      }
      public function __construct($placa,$marca,$año,$id=null ){
        $this->id_moto = $id_moto;
        $this->placa = $placa;
        $this->marca = $marca;
        $this->año = $año;  
      }
       public function guardar_moto (){

        {

                $conexion = new Conexion();
                $consulta = $conexion->prepare('INSERT INTO ' .self::TABLA .'(placa, marca, año) VALUES (:placa, :marca, :año)');
                $consulta -> bindParam(':placa', $this->placa);
                $consulta -> bindParam(':marca', $this->marca);
                $consulta -> bindParam(':año', $this->año);
                $consulta -> execute();
                $this->id = $conexion->lastInsertid();
       }
       $conexion = null;
    }
    public static function mostrar:moto(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT id_moto, placa,marca,año FROM ' . self::TABLA . ' ORDER BY nombre');
        $consulta -> execute();
        $registros = $consulta->fetchAll();
        return $registros;

    }

}
?>
