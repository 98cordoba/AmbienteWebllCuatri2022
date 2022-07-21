<?php
 require "conexion.php"; #Conexion a la BD
 session_start(); #Necesario para utilizar sesiones
 if($_POST){ #Si se envio el formulario
    $usuario = $_POST['usuario']; #atributo name del form
    $contraseña = $_POST['contraseñaUsuario']; #atributo name del form
    $consultaUsuario = "SELECT idUsuarios, passwordUsuario, nombreUsuario, tipoUsuario FROM usuarios WHERE nombreUsuario='$usuario'"; #Pregunta por el usuario
    $resultado = $mysqli->query($consultaUsuario); #Almacena el usuario
    $num = $resultado->num_rows; #Preguntar si el resultado esta vacio
    if($num>0){
        $row = $resultado->fetch_assoc();
        $password_bd = $row['passwordUsuario']; #Contraseña cifrada almacenada en la BD
       # $pass_c = $contraseña; #cifrado de la contraseña
        if($password_bd == $contraseña){ #Comparacion de contraseñas
            #almacenamiento de datos en variables
            $_SESSION['idUsuarios'] = $row['idUsuarios'];
            $_SESSION['nombreUsuario'] = $row['nombreUsuario'];
            $_SESSION['tipoUsuario'] = $row['tipoUsuario'];
            header("Location: principal.php"); #Redireccionamiento a la pantalla principal
        }else{
            echo "contraseña no coincide";
        }
    }else{
        echo "No existe usuario";
    }
 }
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
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputUsuario" name="usuario" type="text" placeholder="Usuario" />
                                                <label for="inputUsuario">Usuario</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputPassword" name="contraseñaUsuario" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <button type="submit" class="btn btn-primary">Login</button>                                                
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto"> <!-- Footer -->
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Fidelitas 2022</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>