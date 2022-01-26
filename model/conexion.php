<?php 

class Conexion{
    private $conexion;
    private $configuracion = [
        "driver"  => "mysql",
        "host" => "localhost",
        "user" => "root",
        "password" => "",
        "db"=> "konectacafe",        
        "port" => "3306",
        "username" => "root",
        "password" => "",
        "charset" => "utf8mb4"
    ];
    
    public function __construct(){
        
    }

    public function conectarDb(){
        try {
            $controlador = $this->configuracion["driver"];
            $servidor = $this->configuracion["host"];
            $database = $this->configuracion["db"];
            $puerto = $this->configuracion["port"];
            $usuario = $this->configuracion["username"];
            $clave = $this->configuracion["password"];
            $codificacion = $this->configuracion["charset"]; 

            $ruta = "{$controlador}:host{$servidor}:{puerto};dbname={$database};charset={$codificacion}";
            $this->conexion = new PDO($ruta, $usuario, $clave);
            echo "conectado a dbxxxx";
            return $this->conexion;
        } catch (Exception $exc) {
            echo "no se logro conectar";
            echo $exc->getTraceAsString();
        }
    }

}

?>