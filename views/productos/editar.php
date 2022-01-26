<?php

  include './model/Product_model.php';
  $title="Edición de productos";

  $producto     = new Product();
  $id       = isset($_GET['id'])?$_GET['id']:null;
  $productos    = $producto->getProductById($id);
  $name     = '';
  $lastName = '';
  $email    = '';
  if($productos){
    $nombre     =$productos[0]['nombre'];
    $referencia =$productos[0]['referencia'];
    $precio    =$productos[0]['precio'];
    $peso    =$productos[0]['peso'];
    $categoria    =$productos[0]['categoria'];
    $stock    =$productos[0]['stock'];
  }

	include 'toolbar.php';
?>
<form action="./controller/Productos.php?folder=<?= $_GET['folder']; ?>" method="POST">
  <div class="row">
    <div class="col text-center">
      <i class="material-icons" style="font-size: 80px;">edit</i>
    </div>
  </div>
  <div class="form-group">
  	 <label for="name">Nombre</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Nombre del producto" autofocus required value="<?php echo $nombre; ?>">
  </div>
  <div class="form-group">
  	 <label for="referencia">Referencia</label>
    <input type="text" class="form-control" id="referencia" name="referencia" placeholder="referencia del producto" required value="<?php echo $referencia; ?>">
  </div>
  <div class="form-group">
  	 <label for="precio">Precio</label>
    <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio del producto" required value="<?php echo $precio; ?>">
  </div>
  <div class="form-group">
  	 <label for="peso">Peso</label>
    <input type="number" class="form-control" id="peso" name="peso" placeholder="Peso del producto" required value="<?php echo $peso; ?>">
  </div>
  <div class="form-group">
  	 <label for="categoria">Categoría</label>
    <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoría del producto" required value="<?php echo $categoria; ?>">
  </div>
  <div class="form-group">
  	 <label for="stock">Stock</label>
    <input type="number" class="form-control" id="stock" name="stock" placeholder="Stock del producto" required value="<?php echo $stock; ?>">
  </div>
  <div class="form-group text-center">
  	<input type="submit" name="edit" value="Editar" class="btn btn-primary">
  </div>
  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
				El producto ha sido actualizado.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
				Ha ocurrido un error al editar el producto, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
  <input type="hidden" name="id" value="<?php echo $id ?>">
</form>