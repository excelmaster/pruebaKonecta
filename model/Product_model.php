<?php
	include dirname(__file__,2)."/config/conexion.php";
	/**
	*
	*/
	class Product
	{
		private $conn;
		private $link;

		function __construct()
		{
			$this->conn   = new Conexion();
			$this->link   = $this->conn->conectarse();
		}

		//Trae todos los usuarios registrados
		public function getProducts()
		{
			$query  ="SELECT * FROM productos";
			$result =mysqli_query($this->link,$query);
			$data   =array();
			while ($data[]=mysqli_fetch_assoc($result));
			array_pop($data);
			return $data;
		}

		//Filtro de busqueda
		public function getProductsBySearch($data=NULL){
			if(!empty($data)){
				$query  ="SELECT * FROM productos WHERE nombre LIKE'%".$data."%' ";
				$result =mysqli_query($this->link,$query);
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
				array_pop($data);
				return $data;
			}else{
				return false;
			}
		}

		//Crea un nuevo usuario
		public function newProduct($data){
			$query  ="INSERT INTO users (name, last_name, email) VALUES ('".$data['name']."','".$data['last_name']."','".$data['email']."')";
			$result =mysqli_query($this->link,$query);
			if(mysqli_affected_rows($this->link)>0){
				return true;
			}else{
				return false;
			}
		}
    }
?>