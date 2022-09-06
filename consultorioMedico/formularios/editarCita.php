<?php
  require "../conexion/conexion.php"; #Conexion a la BD
  session_start(); #Necesario para utilizar sesiones 
  if (!isset($_SESSION['idUsuario'])) { #si no existe sesion activa redirecciona al login
     header("Location: index.php");
  }
  #Asignacion de la sesion en Variables
  $tipoUsuario = $_SESSION['rol'];
  $idCita=$_GET['id'];
  $tCitasSELECT = "SELECT cm.idCita, cm.fechaCita, cm.descripcion, emp.nombreEmpleado FROM cita cm
  JOIN empleados emp on cm.doctorAsignado = emp.idEmpleado WHERE cm.idCita =".$idCita;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modificar Cita</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-success">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Modificar</h3></div>
                                    <div class="card-body">      
                                        <form method="Post" action="../scriptsSQL/updateCita.php">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="hidden" placeholder="Enter your first name" name="citaID"
                                                        value="<?php  echo "$idCita"; ?>" />
                                                    </div>
                                                </div>
                                            </div>  
                                            <div class="row mb-3">
                                                <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="descripcionCita"/>
                                                        <label for="inputFirstName">Descripcion</label>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="date" placeholder="Enter your last name" name="fechaCita" />
                                                        <label for="inputLastName">Fecha de la cita</label>
                                                    </div>
                                                </div>   
                                                <div class="col-md-6"> 
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    Doctor
                                                    <select id="rol" class="form-control" name="doc" select="doc">
                                                        
                                                        <?php
                                                        $sql = "SELECT e.idEmpleado, e.nombreEmpleado, e.apellidosEmpleado FROM empleados e 
                                                        JOIN usuarios u on u.idUsuario = e.usuario JOIN roles r on r.idRol = u.rol  
                                                        WHERE r.idRol = 5";
                                                        $resultset = mysqli_query($mysqli, $sql);
                                                        while( $rows = mysqli_fetch_assoc($resultset) ) { 
                                                        ?>
                                                        <option value="<?php echo $rows["idEmpleado"]; ?>"><?php echo $rows["nombreEmpleado"].' '.$rows["apellidosEmpleado"]; ?></option>
                                                        <?php }	?>
                                                    </select>
                                                    </div>
                                                </div> 
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-success btn-block" >Actualizar Cita</button ></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a class="link-success" href="../tablas/tablaCitas.php">Cancelar</a></div>
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
                                <a class="link-success" href="../politicas.php">Privacy Policy</a>
                                &middot;
                                <a class="link-success" href="../terminos.php">Terminos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </body>
</html>
