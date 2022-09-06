<?php
 require "../conexion/conexion.php"; #Conexion a la BD
 session_start(); #Necesario para utilizar sesiones 
 if (!isset($_SESSION['idUsuario'])) { #si no existe sesion activa redirecciona al login
    header("Location: index.php");
 }
 #Asignacion de la sesion en Variables
 $tipoUsuario = $_SESSION['rol'];
 $idUser=$_GET['id'];
 $UsuarioSELECT = "SELECT u.idUsuario, u.nombreUsuario, u.passwordUsuario, rl.nombreRol FROM usuarios u
 JOIN roles rl on u.rol = rl.idRol
 where u.idUsuario = ".$idUser;
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
        <?php while ($row = $resultado->fetch_assoc()) { ?>
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Editar Usuario</h3></div>
                                    <div class="card-body">
                                        <form method="Post" action="../scriptsSQL/updateUsuario.php">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputTipoUsuario" type="hidden" name="idUser"
                                                         value="<?php echo "$idUser";?>"/> 
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputNombreUsuario" type="text" placeholder="Enter your first name" name="usuarioNombre" 
                                                        value="<?php echo $row['nombreUsuario']  ?>"/>
                                                        <label for="inputNombreUsuario"> Nombre de Usuario</label>
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
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    Rol de trabajo:
                                                    <select id="rol" class="form-control" name="rol" select="rol">     
                                                        <?php
                                                        $sql = "SELECT idRol, nombreRol FROM roles";
                                                        $resultset = mysqli_query($mysqli, $sql);
                                                        while( $rows = mysqli_fetch_assoc($resultset) ) { 
                                                        ?>
                                                        <option value="<?php echo $rows["idRol"]; ?>"><?php echo $rows["nombreRol"]; ?></option>
                                                        <?php }	?>
                                                    </select>   
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Guardar cambios</button ></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="../tablas/tablaUsuarios.php">Cancelar</a></div>
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
                                <a href="../politicas.php">Privacy Policy</a>
                                &middot;
                                <a href="../terminos.php">Terminos &amp; Condiciones</a>
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
