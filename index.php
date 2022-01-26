<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "model/conexion.php";
        require_once "perst/Crud.php";

        $crud = new Crud("ventas");
        $resultado = $crud->get();
        var_dump($resultado);
        ?>
</body>
</html>