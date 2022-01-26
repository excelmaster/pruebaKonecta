<?php
	class Conexion{
        private $password;
		private $dataBase;
		private $host;
		private $user;
		
		public function __construct(){
			$this->host     ="localhost"; 
			$this->user     ="root"; 
			$this->password =""; 
			$this->dataBase ="konectacafe"; 
		}

		public function conectarse(){
			$enlace = mysqli_connect($this->host, $this->user, $this->password, $this->dataBase);
			if($enlace){
				//echo "conectado a Konecta Cafe";	
			}else{
				die('Error de Conexión (' . mysqli_connect_errno() . ') '.mysqli_connect_error());
			}
			return($enlace);
			// mysqli_close($enlace); //cierra la conexion a nuestra base de datos, un ounto de seguridad importante.
		}
	}
?>