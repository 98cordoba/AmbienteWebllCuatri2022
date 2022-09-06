<?php
  require "../conexion/conexion.php"; #Conexion a la BD
  session_start(); #Necesario para utilizar sesiones 
  if (!isset($_SESSION['idUsuario'])) { #si no existe sesion activa redirecciona al login
     header("Location: index.php");
  }
  #Asignacion de la sesion en Variables
  $tipoUsuario = $_SESSION['rol'];
  $idEmp=$_GET['id'];
  $TEmpleadoSELECT = "SELECT e.idEmpleado, e.nombreEmpleado, e.apellidosEmpleado, e.cedulaEmpleado, e.telefonoEmpleado, e.correoEmpleado, e.especialidad, e.salario, r.nombreRol 
 FROM empleados e JOIN usuarios u on u.idUsuario = e.usuario JOIN roles r on r.idRol = u.rol
 where e.idEmpleado = ".$idEmp;
  $resultado = $mysqli->query($TEmpleadoSELECT); #Consulta de la tabla Doctores
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modificar Empleado</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Modificar</h3></div>
                                    <div class="card-body">
                                        <form method="Post" action="../scriptsSQL/updateEmpleado.php"> 
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="hidden" placeholder="Enter your first name" name="empleadoID"
                                                        value="<?php  echo "$idEmp"; ?>" />
                                                    </div>
                                                </div>
                                            </div>   
                                        <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="empleadoNombre"
                                                        value="<?php echo $row['nombreEmpleado']  ?>"/>
                                                        <label for="inputFirstName">Nombre del Doctor</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="empleadoApellidos"
                                                        value="<?php echo $row['apellidosEmpleado']  ?>"/>
                                                        <label for="inputLastName">Apellidos del Doctor</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="Text" placeholder="Enter your first name" name="empleadoEspecialidad"
                                                        value="<?php echo $row['especialidad']  ?>"/>
                                                        <label for="inputFirstName">Especialidad</label> <!-- Cambiar por select group -->
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="empleadoCedula"
                                                        value="<?php echo $row['cedulaEmpleado']  ?>"/>
                                                        <label for="inputLastName">Cedula</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="empleadoTelefono"
                                                        value="<?php echo $row['telefonoEmpleado']  ?>"/>
                                                        <label for="inputFirstName">Numero Telefonico</label>
                                                    </div>
                                                 </div>
                                                 <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputSalario" type="number" placeholder="Salario" name="empleadoSalario"
                                                    value="<?php echo $row['salario']  ?>"/>
                                                        <label for="inputSalario">Salario</label>                                                       
                                                    </div> 
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                  <div class="form-floating mb-3 mb-md-0">
                                                    Usuario
                                                    <select id="rol" class="form-control" name="user" select="user">   
                                                        <?php
                                                        $sql = "SELECT idUsuario, nombreUsuario FROM usuarios";
                                                        $resultset = mysqli_query($mysqli, $sql);
                                                        while( $rows = mysqli_fetch_assoc($resultset) ) { 
                                                        ?>
                                                        <option value="<?php echo $rows["idUsuario"]; ?>"><?php echo $rows["nombreUsuario"]; ?></option>
                                                        <?php }	?>
                                                    </select>    
                                                  </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-floating mb-3">
                                                    <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="empleadoCorreo"
                                                    value="<?php echo $row['correoEmpleado'] ?>"/>
                                                    <label for="inputEmail">Email address</label>
                                                </div>
                                            </div>
                                            </div> 
                                            <div class="mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary" >Actualizar Doctor</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="../tablas/tablaDoctores.php">Cancelar</a></div>
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
