<?php
 require "../conexion/conexion.php"; #Conexion a la BD
 session_start(); #Necesario para utilizar sesiones 
 if (!isset($_SESSION['idUsuarios'])) { #si no existe sesion activa redirecciona al login
    header("Location: index.php");
 }
 #Asignacion de la sesion en Variables
 $tipoUsuario = $_SESSION['tipoUsuario'];
 $idUsuarios=$_GET['id'];

 $UsuarioSELECT = "SELECT u.idUsuarios, u.nombreUsuario, u.passwordUsuario, tu.tipoDeUsuario FROM usuarios u
 JOIN tipousuario tu on u.tipoUsuario = tu.idtipoUsuario
 where u.idUsuarios = ".$idUsuarios;

 $resultado = $mysqli->query($UsuarioSELECT); #Consulta de los datos del usuario

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modificar Usuario</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <?php 
        while ($row = $resultado->fetch_assoc()) { ?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Editar Usuario</h3></div>
                                    <div class="card-body">
                                        <form method="Post" action="#">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputTipoUsuario" type="text"  name="tipoUsuario" value="<?php  echo "$tipoUsuario";?>" disabled readonly/> 
                                                        <label for="inputFirstName"><!--<?php #echo "$idPaciente"; ?> --> Tipo de Usuario</label> 
                                                    </div>
                                                </div>
                                            </div>
                                                                                        <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputNombreUsuario" type="text" placeholder="Enter your first name" name="usuarioNombre" 
                                                        value="<?php echo $row['nombreUsuario']  ?>"/>
                                                        <label for="inputNombreUsuario">  Nombre de Usuario</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputUsuarioPw" type="text" placeholder="Enter your last name" name="usuarioPw"
                                                        value="<?php echo $row['passwordUsuario']  ?>"/>
                                                        <label for="inputUsuarioPw">Contraseña</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Guardar cambios</button ></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        
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
        <script src="../js/scripts.js"></script>
        <?php } ?>
    </body>
</html>
