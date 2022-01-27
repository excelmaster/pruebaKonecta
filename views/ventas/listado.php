<?php

	include './model/Ventas_model.php';
	$venta  = new Ventas();


	//Si utiliza el filtro de busqueda
	if(isset($search)){
		$ventas = $venta->getventasBySearch($dataSearch);
	}else{
		//Trae todos los usuarios
		$dataSearch=NULL;
		$ventas =$venta->getVentas();
	}

	$title="Listado de Ventas";
	include './views/productos/toolbar.php';
?>
<div class="row">
	<div class="col text-center">
	<div class="alert alert-secondary" role="alert">
        Listado de Ventas
        </div>
		<i class="material-icons" style="font-size: 80px;">fact_check</i>
	</div>
</div>
<div class="row">
	<div class="col">
		<form action="./index.php?page=listado&folder=ventas" method="post" accept-charset="utf-8" class="form-inline">
			<div class="form-group mx-sm-3 mb-2">
    			<input type="text" class="form-control" name="dataSearch" autofocus required placeholder="Buscador" value="<?= $dataSearch;  ?>">
  			</div>
  			<button type="submit" name="btnSearch" class="btn btn-primary mb-2">Buscar</button>
		</form>
	</div>
</div>
<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover table-sm">
			<thead class="thead-dark">
				<th>Id</th>
				<th class="text-center">Nombre</th>
				<th class="text-center">Cantidad</th>
                <th class="text-center">Fecha</th>                				
			</thead>
			<tbody>
				<?php

					if(count($ventas)>0){

						foreach ($ventas as $column =>$value) {
				?>

							<tr id="row<?= $value['id']; ?>">
								<td><?= $value['id']; ?></td>
								<td><?= $value['nombre']; ?></td>
								<td><?= $value['cantidad']; ?></td>
                                <td><?= $value['fecha']; ?></td>                                
							</tr>
				<?php
						}
					}else{
				?>
					<tr>
						<td colspan="5">
							<div class="alert alert-info">
								No se hallaron productos.
							</div>
						</td>
					</tr>
				<?php
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="row">
		<div class="col">
			<div class="alert alert-success" id="msgSuccess" style="display: none;"></div>
			<div class="alert alert-danger" id="msgDanger" style="display: none;"></div>
		</div>
	</div>