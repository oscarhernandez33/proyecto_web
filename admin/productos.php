<?php   
    session_start();
    if(empty($_SESSION["cuenta-admin"])){
        header ("Location: admin-login.php");
    }

    require_once ("../processes/Process_productos.php");
    $objProducto = new Process_productos("../");

    // Obteniendo productos y categorias
    $productos = $objProducto->obtenerProductos("");
    $categorias = $objProducto->obtenerCategorias();

    $mensaje = "";
    if(isset($_POST["agregar"])){
        $nombre = $_POST["nombre"];
        $precio = $_POST["precio"];
        $cantidad = $_POST["cantidad"];
        $categoria = $_POST["categoria"];
        $descripcion = $_POST["descripcion"];
        if(!empty($_FILES["imagen"]["tmp_name"])){
            $imagen = addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));
            
            $sql = "INSERT INTO Productos VALUES(NULL,'$nombre','$precio','$descripcion','$categoria','$descripcion','$imagen')";
        }
        else{
            $sql = "INSERT INTO Productos VALUES(NULL,'$nombre','$precio','$descripcion','$categoria','$descripcion',NULL)";
        }
        $objProducto->insertarProducto($sql);
        $mensaje = "Se agrego el producto correctamente";
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Productos - Mary´s Love </title>
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
                <b> Lista de productos</b> 
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal2">
                    Nuevo producto</button> <br><br>
                <!--- Tabla de productos -->    
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Imagen</th>
                                <th scope="col">Nombre</>
                                <th scope="col">Precio</th>
                                <th scope="col">Categoria</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($productos as $listaProductos):?>
                            <tr>
                                <td scope="row">
                                    <img src="data:image/jpg;base64,<?=base64_encode($listaProductos[6]);?>" width="40px"> 
                                </td>
                                <td><?= $listaProductos[1]; ?></td>
                                <td><?= $listaProductos[2]; ?></td>
                                <td><?= $listaProductos[4]; ?></td>
                                <td><?= $listaProductos[5]; ?></td>
                                <td>
                                    <a href="editar_productos.php?id=<?=$listaProductos[0];?>" 
                                        class="btn btn-primary btn-sm"><i class="icon-pencil"></i></a>
                                    <a href="eliminar_productos.php?id=<?=$listaProductos[0];?>" 
                                        class="btn btn-danger btn-sm"> <i class="icon-trash-b"></i></a>
                                </td>
                            </tr>
                        <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Modal para agregar productos -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Nuevo producto</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post" enctype="multipart/form-data" action="">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Nombre:</label>
                                    <input type="text" class="form-control" name="nombre" id="recipient-name" required>
                                    <label for="recipient-name" class="col-form-label">Precio:</label>
                                    <input type="number" class="form-control" name="precio" id="recipient-name" required>
                                    <label for="recipient-name" class="col-form-label">Cantidad:</label>
                                    <input type="number" class="form-control" name="cantidad" id="recipient-name" required>
                                    <label for="recipient-name" class="col-form-label">Categoria:</label>
                                    <select class="form-control form-control-sm" name="categoria" required>
                                        <option value="sin categoria">Sin categoria</option>
                                        <?php foreach($categorias as $listaCategorias):?>
                                        <option value="<?= $listaCategorias[1];?>"> <?= $listaCategorias[1];?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="col-form-label">Descripcion:</label>
                                    <textarea class="form-control" id="message-text" name="descripcion" required></textarea>
                                </div>
                                <label for="exampleFormControlFile1">Cargar Imagen</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="imagen">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <button type="submit" name="agregar" class="btn btn-primary"> Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <?php require_once("script_dependecia.php"); ?>
    </body>

</html>