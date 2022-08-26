<?php
  require "../conexion/conexion.php"; #Conexion a la BD
  session_start(); #Necesario para utilizar sesiones 
  if (!isset($_SESSION['idUsuarios'])) { #si no existe sesion activa redirecciona al login
     header("Location: index.php");
  }
  #Asignacion de la sesion en Variables
  $tipoUsuario = $_SESSION['tipoUsuario'];
  $idDoc=$_GET['id'];
  $tDoctorSELECT = "SELECT d.nombreDoctor, d.apellidosDoctor, d.cedulaDoctor, d.telefonoDoctor, d.correoDoctor, d.especialidad, tu.tipoDeUsuario 
  FROM doctor d JOIN tipousuario tu on d.tipoUsuario = tu.idtipoUsuario
  where d.idDoctor = ".$idDoc;
  $resultado = $mysqli->query($tDoctorSELECT); #Consulta de la tabla Doctores
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modificar Doctor</title>
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
                                        <form method="Post" action="../scriptsSQL/updateDoctor.php"> 
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="hidden" placeholder="Enter your first name" name="doctorID"
                                                        value="<?php  echo "$idDoc"; ?>" />
                                                    </div>
                                                </div>
                                            </div>   
                                        <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="doctorNombre"
                                                        value="<?php echo $row['nombreDoctor']  ?>"/>
                                                        <label for="inputFirstName">Nombre del Doctor</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="doctorApellidos"
                                                        value="<?php echo $row['apellidosDoctor']  ?>"/>
                                                        <label for="inputLastName">Apellidos del Doctor</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="Text" placeholder="Enter your first name" name="doctorEspecialidad"
                                                        value="<?php echo $row['especialidad']  ?>"/>
                                                        <label for="inputFirstName">Especialidad</label> <!-- Cambiar por select group -->
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="number" placeholder="Enter your last name" name="doctorCedula"
                                                        value="<?php echo $row['cedulaDoctor']  ?>"/>
                                                        <label for="inputLastName">Cedula</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="doctorTelefono"
                                                        value="<?php echo $row['telefonoDoctor']  ?>"/>
                                                        <label for="inputFirstName">Numero Telefonico</label>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="number" placeholder="Enter your first name" name="doctorTpUsuario"
                                                        value="<?php echo $row['tipoDeUsuario']  ?>"/>
                                                        <label for="inputFirstName">Tipo de usuario</label>
                                                    </div>
                                                 </div>                                                           
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="doctorCorreo"
                                                value="<?php echo $row['correoDoctor'] ?>"/>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary" >Actualizar Doctor</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="../tablas/tablaDoctores.php">Buscar un Doctor</a></div>
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
