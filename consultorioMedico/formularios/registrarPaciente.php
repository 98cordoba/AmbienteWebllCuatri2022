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
        <title>Registrar Paciente</title>
        <link href="../css/styles.css" rel="stylesheet" />
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
                                        <form method="Post" action="../scriptsSQL/insertPaciente.php">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputNombre" type="text" placeholder="Nombre" name="pacienteNombre" required />
                                                        <label for="inputNombre">Nombre del Paciente</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputApellidos" type="text" placeholder="Apellidos" name="pacienteApellidos" required />
                                                        <label for="inputApellidos">Apellidos del paciente</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputCedula" type="text" placeholder="Cedula" name="pacienteCedula" required/>
                                                        <label for="inputCedula">Cedula del Paciente</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputFechaNaci" type="date" placeholder="Fecha de Nacimiento" name="pacienteFechaN" required/>
                                                        <label for="inputFechaNaci">Fecha de Nacimiento</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputTelefono" type="text" placeholder="Telefono" name="pacienteTelefono" required/>
                                                        <label for="inputTelefono">Numero Telefonico</label>
                                                    </div>
                                                </div>   
                                                <div class="col-md-6">
                                                <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputCorreo" type="email" placeholder="name@example.com" name="pacienteCorreo" required/>
                                                        <label for="inputCorreo">Correo</label>
                                                    </div>
                                                </div>                                                 
                                            </div>   
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputTelefono" type="number" placeholder="Telefono" name="expediente" required/>
                                                        <label for="inputTelefono">Expediente</label>
                                                    </div>
                                                </div>   
                                                                                                 
                                            </div>                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" onclick="return validarUsuario();">Registrar Paciente</button ></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="../tablas/tablaPacientes.php">Buscar un paciente</a></div>
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
        <script src="../js/validaciones.js"></script>
    </body>
</html>
