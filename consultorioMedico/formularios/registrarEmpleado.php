<?php
  require "../conexion/conexion.php"; #Conexion a la BD
  session_start(); #Necesario para utilizar sesiones 
  if (!isset($_SESSION['idUsuario'])) { #si no existe sesion activa redirecciona al login
     header("Location: index.php");
  }
  #Asignacion de la sesion en Variables
  $tipoUsuario = $_SESSION['rol'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registrar Empleados</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="../js/jquery-3.5.1.js"></script>
        <script src="../js/jquery-ui-1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="../js/jquery-ui-1.12.1/jquery-ui.css">
        <script src="../js/carga.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> 
        <link rel="stylesheet" href="bootstrap-4.4.1-dist/css/bootstrap.css">
        <script src="bootstrap-4.4.1-dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
    </head>
    <body class="bg-success">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header text-success"><h3 class="text-center font-weight-light my-4">Crear nuevo Empleado</h3></div>
                                    <div class="card-body text-success">
                                        <form method="Post" action="../scriptsSQL/insertEmpleado.php">    
                                        <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputNombre" type="text" placeholder="" name="empleadoNombre" required/>
                                                        <label for="inputNombre">Nombre</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputApellidos" type="text" placeholder="" name="empleadoApellidos" required/>
                                                        <label for="inputApellidos">Apellidos</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputEspecialidad" type="Text" placeholder="" name="empleadoEspecialidad" required/>
                                                        <label for="inputEspecialidad">Especialidad</label> <!-- Cambiar por select group -->
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputCedula" type="text" placeholder="" name="empleadoCedula" required/>
                                                        <label for="inputCedula">Cedula</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputTelefono" type="text" placeholder="" name="empleadoTelefono" required/>
                                                        <label for="inputTelefono">Numero Telefonico</label>
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                    <input class="form-control" id="inputSalario" type="number" placeholder="" name="empleadoSalario" required/>
                                                        <label for="inputSalario">Salario</label>                                                       
                                                    </div>
                                                 </div>                                                           
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputCorreo" type="email" placeholder="" name="empleadoCorreo" required/>
                                                <label for="inputCorreo">Email address</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                            <div class="d-grid"><button type="submit" class="btn btn-success" onclick="return validarEmpleado();">Registrar Empleado</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a class="link-success" href="../menus/menuEmpleados.php">Regresar</a></div>
                                        <div class="small"><a class="link-success" href="../tablas/tablaEmpleados.php">Buscar Empleado</a></div>
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
                                <a  class="link-success" href="../politicas.php">Privacy Policy</a>
                                &middot;
                                <a  class="link-success" href="../terminos.php">Terminos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="../js/validaciones.js"></script>
    </body>
</html>
