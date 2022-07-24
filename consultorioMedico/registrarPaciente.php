<?php
 require "conexion.php"; #Conexion a la BD
 session_start(); #Necesario para utilizar sesiones
 if($_POST){ #Si se envio el formulario
    $usuario = $_POST['usuario']; #atributo name del form
    $contraseña = $_POST['contraseñaUsuario']; #atributo name del form
    $consultaUsuario = "SELECT idUsuario, contraseñaUsuario, nombreUsuario, tipoUsuario FROM usuarios WHERE usuario='$usuario'"; #Pregunta por el usuario
    $resultado = $mysqli->query($consultaUsuario); #Almacena el usuario
    $num = $resultado->num_rows; #Preguntar si el resultado esta vacio
    if($num>0){
        $row = $resultado->fetch_assoc();
        $password_bd = $row['contraseñaUsuario']; #Contraseña cifrada almacenada en la BD
        #$pass_c = $contraseña; #cifrado de la contraseña
        if($password_bd == $contraseña){ #Comparacion de contraseñas
            #almacenamiento de datos en variables
            $_SESSION['idUsuario'] = $row['idUsuario'];
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
        <title>Registrar Paciente</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Nuevo paciente</h3></div>
                                    <div class="card-body">
                                        <form method="Post" action="procesamientoServer.php">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="nombrePaciente" />
                                                        <label for="inputFirstName">Nombre del Paciente</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="apellidoPaciente"/>
                                                        <label for="inputLastName">Apellidos del paciente</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="number" placeholder="Enter your first name" name="cedulaPaciente"/>
                                                        <label for="inputFirstName">Cedula del Paciente</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="date" placeholder="Enter your last name" name="fechaPaciente"/>
                                                        <label for="inputLastName">Fecha de Nacimiento</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="number" placeholder="Enter your first name" name="telefonoPaciente"/>
                                                        <label for="inputFirstName">Numero Telefonico</label>
                                                    </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="correoPaciente" />
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Registrar Paciente</button ></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="tablaPacientes.php">Buscar un paciente</a></div>
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
