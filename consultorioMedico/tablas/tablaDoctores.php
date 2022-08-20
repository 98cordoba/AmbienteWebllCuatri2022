<?php
 session_start(); #Necesario para utilizar sesiones
 require '../conexion/conexion.php'; #Conexion a la BD
 if (!isset($_SESSION['idUsuarios'])) { #si no existe sesion activa redirecciona al login
    header("Location: ../index.php");
 }
 $idUsuario = $_SESSION['idUsuarios'];
 $tipoUsuario = $_SESSION['tipoUsuario'];
 if ($tipoUsuario == 1) { #usuario administrador
    $where = "";
 } elseif($tipoUsuario == 2){ #segundo usuario #considerar switch
    $where = "WHERE idUsuario=$idUsuario";
 }
 $tDoctorSELECT = "SELECT d.idDoctor, d.nombreDoctor, d.apellidosDoctor, d.cedulaDoctor, d.telefonoDoctor, d.correoDoctor, d.especialidad, tu.tipoDeUsuario 
 FROM doctor d JOIN tipousuario tu on d.tipoUsuario = tu.idtipoUsuario";
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
        <title>Doctores</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark"> <!--Barra de navegacion -->
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../principal.php">Consultorio Medico</a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <ul class="navbar-nav ms-auto ms-auto me-0 me-md-3 my-2 my-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Configuracion</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="../logout.php">Cerrar sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav"> <!--Menu lateral-->
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Estadisticas</div>
                            <a class="nav-link" href="../principal.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <?php if($tipoUsuario == 1){ ?>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePacientes" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pacientes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePacientes" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../formularios/registrarPaciente.php">Agregar Paciente</a>
                                    <a class="nav-link" href="../formularios/registrarPaciente.php">Editar Paciente</a>
                                    <a class="nav-link" href="../formularios/registrarPaciente.php">Eliminar Paciente</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseDoctor" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Doctores
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseDoctor" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../formularios/registrarDoctor.php">Agregar Doctor</a>
                                    <a class="nav-link" href="../formularios/editarDoctor.php">Editar Doctor</a>
                                    <a class="nav-link" href="../formularios/registrarDoctor.php">Eliminar Doctor</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCitas" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Citas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseCitas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../formularios/registrarCita.php">Agregar Cita</a>
                                    <a class="nav-link" href="../formularios/registrarDoctor.php">Editar Cita</a>
                                    <a class="nav-link" href="../formularios/registrarDoctor.php">Eliminar Cita</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Medicamentos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="../login.html">Login</a>
                                            <a class="nav-link" href="../register.html">Register</a>
                                            <a class="nav-link" href="../password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="../errores/401.html">401 Page</a>
                                            <a class="nav-link" href="../errores/404.html">404 Page</a>
                                            <a class="nav-link" href="../errores/500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                            <?php } ?>
                            <div class="sb-sidenav-menu-heading">Tablas</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Citas
                            </a>
                            <a class="nav-link" href="../tablas/tablaUsuarios.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tabla de Usuarios
                            </a>
                            <a class="nav-link" href="../tablas/tablaPacientes.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tabla de Pacientes
                            </a>
                            <a class="nav-link" href="../tablas/tablaDoctores.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tabla de Doctores
                            </a>
                            <a class="nav-link" href="../tablas/tablaCitas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tabla de Citas
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Usuario:</div>
                        <?php echo $_SESSION['nombreUsuario'] ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Doctores</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="../principal.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tabla de Doctores</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                               <p>En esta tabla se detallan los Doctores registrados en el sistema de este centro medico.</p>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Doctores
                            </div>
                            <div class="card-body"> <!-- Contenido Tabla Doctores -->
                                <table id="datatablesSimple" class="table table-dark table-striped table-borderless">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Identificacion</th>
                                            <th>Contacto</th>
                                            <th>Especialidad</th>
                                            <th>Tipo Usuario</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>id</th>
                                            <th>Nombre</th>
                                            <th>Apellidos</th>
                                            <th>Identificacion</th>
                                            <th>Contacto</th>
                                            <th>Especialidad</th>
                                            <th>Tipo Usuario</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                            <tr>
                                                <?php $idDoctor =  $row['idDoctor'];?>
                                                <td><?php echo $row['idDoctor'] ?></td>
                                                <td><?php echo $row['nombreDoctor']  ?></td>
                                                <td><?php echo $row['apellidosDoctor']  ?></td>
                                                <td><?php echo $row['cedulaDoctor']  ?></td>
                                                <td><?php echo "Telefono: ".$row['telefonoDoctor']."<br>Correo: ".$row['correoDoctor']  ?></td>
                                                <td><?php echo $row['especialidad']  ?></td>
                                                <td><?php echo $row['tipoDeUsuario']  ?></td>
                                                <th><?php echo "<a href='../formularios/editarDoctor.php?id=$idDoctor'>Modificar</a><br><a href='../formularios/eliminarDoctor.php?id=$idDoctor'>Eliminar</a>" ?></th>
                                            </tr>
                                            <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="../js/datatables-simple-demo.js"></script>
    </body>
</html>