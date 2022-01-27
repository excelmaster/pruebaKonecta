<?php
include './model/Product_model.php';

$producto     = new Product();
$productos    = $producto->getProducts();
$create =true;
//var_dump($productos);
?>
<pre></pre>
<div class="card">
  <div class="card-header">
    <h3>VENTAS</h3>
  </div>
  <div class="card-body">
    <h5 class="card-title">Venta de productos</h5>
    <p class="card-text">escoja un producto e ingrese la cantidad de unidades a vender.</p>
    <form action="./controller/Ventas.php?folder=<?= $_GET['folder']; ?>" method="POST">
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="producto">Producto</label>
          <select class="form-control" id="producto" name="producto">
            <option selected>Escoja un producto...</option>
            <?php 
                foreach($productos as $p){
                    echo '<option value="'.$p["id"].'">'.$p["nombre"].'</option>';
                } 
            ?>            
          </select>
        </div>
        <div class="form-group col-md-2">
          <label for="cantidad">Cantidad</label>
          <input type="number" class="form-control" id="cantidad" name="cantidad">
        </div>
      </div>
      <button type="submit" name="create" class="btn btn-primary">Registrar</button>
      <pre></pre>
      <div class="form-group text-center">
        <?php
            if(isset($_GET['success'])){
        ?>
                <div class="alert alert-success">
                    Se ha registrado la venta exitósamente.
                </div>
        <?php
            }else if(isset($_GET['error'])){
        ?>
                <div class="alert alert-danger">
                    La cantidad de unidades a vender excede el stock disponible, disminuya la cantidad e intente de nuevo.
                </div>
        <?php
            }
        ?>
    </div>
    </form>
  </div>
</div>