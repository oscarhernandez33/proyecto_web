<?php   
    session_start();
    if(empty($_SESSION["cuenta-admin"])){
        header ("Location: admin-login.php");
    }

    require_once ("../processes/Process_productos.php");
    $objProducto = new Process_productos("../");

    $listaProductos = $objProducto->obtenerProducto($_GET["id"]);
    $listaCategorias= $objProducto->obtenerCategorias();

    $mensaje = "";
    if(isset($_POST["editar"])){
        $id = $_GET["id"];
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $cantidad = $_POST["cantidad"];
        $categoria = $_POST["categoria"];
        $descripcion = $_POST["descripcion"];
        if(!empty($_FILES["imagen"]["tmp_name"])){
            $imagen = addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));
            $sql = "UPDATE Productos SET Nombre='$nombre', Precio='$precio', Cantidad='$cantidad', Categoria='$categoria',
             Descripcion='$descripcion', Imagen='$imagen' WHERE id_producto = '$id'";
        }
        else{
            $sql = "UPDATE Productos SET Nombre='$nombre', Precio='$precio', Cantidad='$cantidad', Categoria='$categoria',
             Descripcion='$descripcion' WHERE id_producto = '$id'";
        }
        $objProducto->editarProducto($sql);

        header("Location: productos.php");
    }

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Editar Productos - Mary´s Love </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/admin/admin-general.css">
        <link rel="stylesheet" href="../assets/css/admin/partials-admin.css">
        <link rel="stylesheet" href="../assets/iconos/styles.css">
        <link rel="stylesheet" href="../assets/css/admin/admin.css">
    </head>

    <body>
            <?php 
                require_once ("header-admin.php"); 
                require_once ("menu.php");
            ?>

        <!-- Encabezado de la seccion -->
        <section class="encabezado encabezado-productos">
            <h2> Productos de la página </h2>
        </section>

        <!-- Contenido Principal -->
        <main>
            <?php if($mensaje=="Se agrego el producto correctamente"): ?>
            <div class="alert alert-success" role="alert">
                <?= $mensaje; ?> <a href="productos.php">Recargar</a>
            </div>
            <?php endif ?>
            <div class="cont-box cont-productos">
                <b> Editar Producto</b> 
                <div class="cont-editar">
                    <form class="editar" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label> Nombre del producto </label>
                            <input type="text" class="form-control" name="nombre" value="<?=$listaProductos[1];?>" required>
                            <label> Precio del producto </label>
                            <input type="number" class="form-control" name="precio" value="<?=$listaProductos[2];?>" required>
                            <label> Cantidad del producto </label>
                            <input type="number" class="form-control" name="cantidad" value="<?=$listaProductos[5];?>" required>
                            <label> Categoría </label>
                            <select class="form-control form-control-sm" name="categoria" required>
                                <option value="sin categoria">Sin categoria</option>
                                <?php foreach($listaCategorias as $categoria): ?>
                                    <option value="<?=$categoria[1];?>" <?=$listaProductos[4]==$categoria[1]?"selected":""; ?>>
                                        <?=$categoria[1];?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1"> Descripcion del producto</label>
                            <textarea class="form-control" name="descripcion" rows="3"><?=$listaProductos[3];?></textarea>
                        </div>
                        <label for="exampleFormControlFile1"> Cargar Imagen</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagen"> </br>
                        <div class="cont-btn">
                            <button type="submit" class="btn btn-success" name="editar"> Editar</button>
                            <a href="productos.php" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php require_once("script_dependecia.php"); ?>
    </body>

</html>