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
<<<<<<< HEAD
        <title>Registrar Empleados</title>
=======
        <title>Registrar Doctores</title>
>>>>>>> 6a40a144e1f5d6c7feba682f6026b5817f2d1715
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
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
<<<<<<< HEAD
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Crear nuevo Empleado</h3></div>
=======
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Crear nuevo Doctor</h3></div>
>>>>>>> 6a40a144e1f5d6c7feba682f6026b5817f2d1715
                                    <div class="card-body">
                                        <form method="Post" action="../scriptsSQL/insertEmpleado.php">    
                                        <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
<<<<<<< HEAD
                                                        <input class="form-control" id="inputNombre" type="text" placeholder="" name="doctorNombre" required/>
                                                        <label for="inputNombre">Nombre</label>
=======
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="doctorNombre"/>
                                                        <label for="inputFirstName">Nombre del Doctor</label>
>>>>>>> 6a40a144e1f5d6c7feba682f6026b5817f2d1715
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
<<<<<<< HEAD
                                                        <input class="form-control" id="inputApellidos" type="text" placeholder="" name="doctorApellidos" required/>
                                                        <label for="inputApellidos">Apellidos</label>
=======
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="doctorApellidos"/>
                                                        <label for="inputLastName">Apellidos del Doctor</label>
>>>>>>> 6a40a144e1f5d6c7feba682f6026b5817f2d1715
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
<<<<<<< HEAD
                                                        <input class="form-control" id="inputEspecialidad" type="Text" placeholder="" name="doctorEspecialidad" required/>
                                                        <label for="inputEspecialidad">Especialidad</label> <!-- Cambiar por select group -->
=======
                                                        <input class="form-control" id="inputFirstName" type="Text" placeholder="Enter your first name" name="doctorEspecialidad"/>
                                                        <label for="inputFirstName">Especialidad</label> <!-- Cambiar por select group -->
>>>>>>> 6a40a144e1f5d6c7feba682f6026b5817f2d1715
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
<<<<<<< HEAD
                                                        <input class="form-control" id="inputCedula" type="text" placeholder="" name="doctorCedula" required/>
                                                        <label for="inputCedula">Cedula</label>
=======
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="doctorCedula"/>
                                                        <label for="inputLastName">Cedula</label>
>>>>>>> 6a40a144e1f5d6c7feba682f6026b5817f2d1715
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
<<<<<<< HEAD
                                                        <input class="form-control" id="inputTelefono" type="text" placeholder="" name="doctorTelefono" required/>
                                                        <label for="inputTelefono">Numero Telefonico</label>
=======
                                                        <input class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" name="doctorTelefono"/>
                                                        <label for="inputFirstName">Numero Telefonico</label>
>>>>>>> 6a40a144e1f5d6c7feba682f6026b5817f2d1715
                                                    </div>
                                                </div>
                                                 <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
<<<<<<< HEAD
                                                    <input class="form-control" id="inputSalario" type="number" placeholder="" name="doctorSalario"/>
=======
                                                    <input class="form-control" id="inputSalario" type="number" placeholder="Salario" name="doctorSalario"/>
>>>>>>> 6a40a144e1f5d6c7feba682f6026b5817f2d1715
                                                        <label for="inputSalario">Salario</label>                                                       
                                                    </div>
                                                 </div>                                                           
                                            </div>
                                            <div class="form-floating mb-3">
<<<<<<< HEAD
                                                <input class="form-control" id="inputCorreo" type="email" placeholder="" name="doctorCorreo" required/>
                                                <label for="inputCorreo">Email address</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary" onclick="return validarEmpleado();">Registrar Empleado</button>
=======
                                                <input class="form-control" id="inputEmail" type="email" placeholder="name@example.com" name="doctorCorreo"/>
                                                <label for="inputEmail">Email address</label>
                                            </div>
                                            <div class="mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary" >Registrar Doctor</button>
>>>>>>> 6a40a144e1f5d6c7feba682f6026b5817f2d1715
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
<<<<<<< HEAD
                                        <div class="small"><a href="../tablas/tablaEmpleado.php">Buscar Empleado</a></div>
=======
                                        <div class="small"><a href="../tablas/tablaDoctores.php">Buscar un Doctor</a></div>
>>>>>>> 6a40a144e1f5d6c7feba682f6026b5817f2d1715
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
<<<<<<< HEAD
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="../js/validaciones.js"></script>
=======
        
        <script>
            $(document).ready(function () {
    cargaRoles();

});//(document).ready ==============================

function cargaRoles() { //Inicio funcion carga roles
    try {
        $.ajax({
            url: '../gets/getRoles.php'
        }).done(function (data) {
                LlenaRolesJson(data);
            });
    } catch (err) {
        alert(err);
    } 
}//Fin cargaRoles ==============================================
function LlenaRolesJson(TextoJSON) { //Inicio funcion llenar roles
    var elValor;
    var elHTML;
    var ObjetoJSON = JSON.parse(TextoJSON); 
    for (i = 0; i < ObjetoJSON.length; i++) {
        elValor = ObjetoJSON[i].id;
        elHTML = ObjetoJSON[i].nombre;
        $('#rolTrabajo').append($('<option></option>').val(elValor).html(elHTML));
    }
}//Fin LlenaDiasJson ================================================

        </script>
>>>>>>> 6a40a144e1f5d6c7feba682f6026b5817f2d1715
    </body>
</html>
