<?php
	include dirname(__file__,2)."/config/conexion.php";
	/**
	*
	*/
	class Ventas
	{
		private $conn;
		private $link;

		function __construct()
		{
			$this->conn   = new Conexion();
			$this->link   = $this->conn->conectarse();
		}

		//Trae todos los usuarios registrados
		public function getVentas()
		{
			$query  ="SELECT * FROM lista_ventas";
			$result =mysqli_query($this->link,$query);
			$data   =array();
			while ($data[]=mysqli_fetch_assoc($result));
			array_pop($data);
			return $data;
		}

		//Filtro de busqueda
		public function getventasBySearch($data=NULL){
			if(!empty($data)){
				$query  ="SELECT * FROM lista_ventas WHERE nombre LIKE'%".$data."%' ";
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
			$query  ="INSERT INTO productos (nombre, referencia, precio, peso,categoria,stock) VALUES ('".$data['nombre']."','".$data['referencia']."','".$data['precio']."','".$data['peso']."','".$data['categoria']."','".$data['stock']."')";
			$result =mysqli_query($this->link,$query);
			if(mysqli_affected_rows($this->link)>0){
				return true;
			}else{
				return false;
			}
		}

		//Obtiene el usuario por id
		public function getProductById($id=NULL){
			if(!empty($id)){
				$query  ="SELECT * FROM productos WHERE id=".$id;
				$result =mysqli_query($this->link,$query);
				$data   =array();
				while ($data[]=mysqli_fetch_assoc($result));
				array_pop($data);
				return $data;
			}else{
				return false;
			}
		}

		//edita el usuario por id
		public function setEditProduct($data){
			if(!empty($data['id'])){
				$query  ="UPDATE productos SET nombre='".$data['nombre']."',referencia='".$data['referencia']."', precio=".$data['precio'].", peso=".$data["peso"].", categoria='".$data["categoria"]."',stock=".$data["stock"]." WHERE id=".$data['id'];
				echo $query;
				$result =mysqli_query($this->link,$query);
				if($result){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}

		//Borra el usuario por id
		public function deleteProducto($id=NULL){
			if(!empty($id)){
				$query  ="DELETE FROM productos WHERE id=".$id;
				$result =mysqli_query($this->link,$query);
				if(mysqli_affected_rows($this->link)>0){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
    }
?>