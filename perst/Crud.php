<?php

class Crud {
    protected $table;
    protected $conexion;
    protected $wheres ="";
    protected $sql = null;

    public function __construct($tabla = null){
        $this->conexion = (new Conexion() )->conectarDb();
        $this->tabla = $tabla;

    }

    public function get(){
        try {
            $this->sql = "select * from {$this->tabla} {$this->wheres}";
            //echo $this->sql;
            $sentencia = $this->conexion->prepare($this->sql);
            var_dump($sentencia);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }


}


?>