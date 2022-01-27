<?php
	include 'toolbar.php';
?>
<form action="./controller/Productos.php?folder=<?= $_GET['folder']; ?>" method="POST">
  <div class="row">
    <div class="col text-center">
        <div class="alert alert-secondary" role="alert">
        Nuevo producto
        </div>
      <i class="material-icons" style="font-size: 80px;">add</i>
    </div>
  </div>
  <div class="form-group">
  	 <label for="name">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" autofocus placeholder="Nombre del producto" required>
  </div>
  <div class="form-group">
  	 <label for="last_name">Referencia</label>
    <input type="text" class="form-control" id="referencia" name="referencia" placeholder="Referencia del producto" required>
  </div>
  <div class="form-group">
  	 <label for="precio">Precio</label>
    <input type="number" class="form-control" id="precio" name="precio" placeholder="Precio del producto" required>
  </div>
  <div class="form-group">
  	 <label for="peso">Peso</label>
    <input type="number" class="form-control" id="peso" name="peso" placeholder="Peso del producto" required>
  </div>
  <div class="form-group">
  	 <label for="categoria">Categoría</label>
    <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria del producto" required>
  </div>
  <div class="form-group">
  	 <label for="stock">Stock</label>
    <input type="number" class="form-control" id="stock" name="stock" placeholder="Precio del producto" required>
  </div>
  <div class="form-group text-center">
  	<input type="submit" name="create" value="Crear" class="btn btn-primary">
  </div>
  <div class="form-group text-center">
  	<?php
  		if(isset($_GET['success'])){
	?>
			<div class="alert alert-success">
        El producto ha sido creado.
			</div>
	<?php
  		}else if(isset($_GET['error'])){
  	?>
			<div class="alert alert-danger">
        Ha ocurrido un error al crear el producto, por favor intente de nuevo.
			</div>
	<?php
  		}
  	?>
  </div>
</form>