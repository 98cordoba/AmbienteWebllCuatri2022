<?php
 require "./conexion/conexion.php"; #Conexion a la BD
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-success">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card border-success shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header text-success"><h3 class="text-center font-weight-light my-4">Inicio de sesion</h3></div>
                                    <div class="card-body text-success">
                                        <form method="POST" action="./scriptsSQL/verificarUsuario.php">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputUsuario" name="usuario" type="text" placeholder="Usuario"/> <!-- si se utiliza required no es necesario validacion JS -->
                                                <label for="inputUsuario">Usuario</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="contraseñaUsuario" type="password" placeholder="Password"/> <!-- si se utiliza required no es necesario validacion JS -->
                                                <label for="inputPassword">Contraseña</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-success" onclick="return validarIngreso();">Ingresar</button></div>                                               
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/validaciones.js"></script>
    </body>
</html>