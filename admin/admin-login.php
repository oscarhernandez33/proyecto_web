<?php
    require_once ("cuenta-panel.php");
?>

<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login - Admin</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" 
            integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/admin/admin-general.css">
        <link rel="stylesheet" href="../assets/css/admin/admin-login.css">
    </head>
    <body>
        <!-- Sección principal -->
        <main>
            <!-- Titulo -->
            <h1 class="res"> 
                <span class="titulo-p-1"> Mary´s Love </span> <span class="titulo-p-2"> Panel Admin </span>
            </h1>
            <div class="login">
                <?php if($mensaje == "Datos incorrectos"): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Usuario o contraseña incorrectos
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php endif ?>
                <div class="container">
                    <div class="col-lg-80 login-box" >
                        <div class="col-lg-20 right-box">
                            <h2> Login </h2>
                            <!-- Formulario para ingresar sesión -->
                            <form class="form" method="post">
                        
                                <div class="form-group">
                                    <label for="username"> Nombre de usuario </label>
                                    <input type="text" id="username" name="nombre" class="form-control" required>
                                    
                                </div>
                        
                                <div class="form-group">
                                    <label for="password"> Contraseña </label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                </div>
                        
                                <div class="login-button">
                                    <button type="submit" name="btn-ingresar" class="btn btn-default">Ingresar</button>
                                </div>
                            </form>
                        </div>  
                    </div> 
                </div>
            </div>    
        </main>
        
        <!-- Archivos Java Script -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>
</html>