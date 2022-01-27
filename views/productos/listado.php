<?php

	include './model/Product_model.php';
	$producto  = new Product();


	//Si utiliza el filtro de busqueda
	if(isset($search)){
		$productos = $producto->getProductsBySearch($dataSearch);
	}else{
		//Trae todos los usuarios
		$dataSearch=NULL;
		$productos =$producto->getProducts();
	}

	$title="Listado de Usuarios";
	include 'toolbar.php';
?>
<div class="row">
	<div class="col text-center">
	<div class="alert alert-secondary" role="alert">
        Listado de productos
        </div>
		<i class="material-icons" style="font-size: 80px;">redeem</i>
	</div>
</div>
<div class="row">
	<div class="col">
		<form action="./index.php" method="post" accept-charset="utf-8" class="form-inline">
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
				<th class="text-center">Referencia</th>
                <th class="text-center">Precio</th>
                <th class="text-center">Categoría</th>
                <th class="text-center">Stock</th>
				<th>Acciones</th>
				<th>&nbsp;</th>
			</thead>
			<tbody>
				<?php

					if(count($productos)>0){

						foreach ($productos as $column =>$value) {
				?>

							<tr id="row<?= $value['id']; ?>">
								<td><?= $value['id']; ?></td>
								<td><?= $value['nombre']; ?></td>
								<td><?= $value['referencia']; ?></td>
                                <td><?= $value['precio']; ?></td>
                                <td><?= $value['categoria']; ?></td>
                                <td><?= $value['stock']; ?></td>
								<td class="text-center">
									<a href="./index.php?page=editar&id=<?= $value['id'] ?>&folder=productos" title="Editar Producto: <?= $value['name'] ?>">
										<i class="material-icons btn_edit">edit</i>
									</a>
								</td>
								<td class="text-center">
									<a href="#" onclick="objProduct.deleteProductos(<?= $value["id"] ?>)" id="btnDeleteUser" title="Borrar Producto: <?= $value['name'] ?>">
										<i class="material-icons btn_delete">delete_forever</i>
									</a>
								</td>
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