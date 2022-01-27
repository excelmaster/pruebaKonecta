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

		//Trae todas las ventas registradas
		public function getVentas()
		{
			$query  ="SELECT * FROM lista_ventas";
			$result =mysqli_query($this->link,$query);
			$data   =array();
			while ($data[]=mysqli_fetch_assoc($result));
			array_pop($data);
			return $data;
		}

		//Crea una nueva venta
		public function newVenta($data){
			// obtener el stock del producto
			//var_dump($data);
			$query = "SELECT stock FROM productos WHERE id = ".$data["producto"];
			$stockProducto = mysqli_query($this->link,$query); 
			$numstock =  $stockProducto->fetch_row()[0];
			echo $numstock;

			if( intval( $data["cantidad"])<= $numstock){
				$query = "INSERT INTO ventas (id_producto,cantidad) VALUES (".$data["producto"].",".$data["cantidad"].");";
				$result =mysqli_query($this->link,$query);
				if(mysqli_affected_rows($this->link)>0){
					$newstock = intval($numstock) - intval($data['cantidad']);
					$query = "update productos set stock=".$newstock." where id=".intval($data['producto']).";";
					echo $query;
					$result =mysqli_query($this->link,$query);
					return true;
				}else{
					return false;
				}
			} else {
				return false;
			}

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

    }
?>