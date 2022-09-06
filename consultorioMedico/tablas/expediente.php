<?php
    session_start(); #Necesario para utilizar sesiones
    require '../conexion/conexion.php'; #Conexion a la BD
    if (!isset($_SESSION['idUsuario'])) { #si no existe sesion activa redirecciona al login
        header("Location: ../index.php");
    }
    $idUsuario = $_SESSION['idUsuario'];
    $rol = $_SESSION['rol'];
    if ($rol == 1) { #usuario administrador
        $where = "";
    } elseif($rol == 2){ #segundo usuario #considerar switch
        $where = "WHERE idUsuario=$idUsuario";
    }
    $idPaciente=$_GET['id'];
    $expedienteSELECT = "SELECT cm.idCita, cm.fechaCita, cm.descripcion, p.nombrePaciente, p.apellidosPaciente, p.cedulaPaciente, p.expediente , d.nombreEmpleado, d.apellidosEmpleado, d.cedulaEmpleado
    FROM cita cm
    JOIN pacientes p on cm.cidPaciente = p.idPaciente
    JOIN empleados d on cm.doctorAsignado= d.idEmpleado
    where p.idPaciente = ".$idPaciente;
    $resultado = $mysqli->query($expedienteSELECT); #Consulta de la tabla Citas
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Expedientes</title>
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
                        <li><a class="dropdown-item" href="../menus/configuracion.php">Configuracion</a></li>
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
                            <div class="sb-sidenav-menu-heading">Menus</div>
                            <a class="nav-link" href="../principal.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Principal
                            </a>
                            <a class="nav-link" href="../menus/menuCitas.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-medical"></i></div>
                                Citas
                            </a>
                            <a class="nav-link" href="../menus/menuEmpleados.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                                Empleados
                            </a>
                            <a class="nav-link" href="../menus/menuPacientes.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                                Pacientes
                            </a>
                            <a class="nav-link" href="../menus/menuUsuarios.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                                Usuarios
                            </a>
                            <?php if($rol == 1){ ?>
                            <div class="sb-sidenav-menu-heading">Opciones</div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePacientes" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Pacientes
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePacientes" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../formularios/registrarPaciente.php">Agregar Paciente</a>
                                    <a class="nav-link" href="../tablas/tablaPacientes.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Tabla de Pacientes
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseEmpleado" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Empleados
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseEmpleado" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../formularios/registrarEmpleado.php">Agregar Empleado</a>
                                    <a class="nav-link" href="../tablas/tablaEmpleados.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Tabla de Empleados
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseCitas" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Citas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseCitas" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../tablas/tablaCitas.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Tabla de Citas
                                    </a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUser" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Usuarios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseUser" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../formularios/nuevoUsuario.php">Agregar Usuario</a>
                                    <a class="nav-link" href="../tablas/tablaUsuarios.php">
                                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                    Tabla de Usuarios
                                    </a>
                                </nav>
                            </div>
                            <?php } ?>
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
                        <h1 class="mt-4">Expedientes</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a class="link-success" href="../principal.php">Principal</a></li>
                            <li class="breadcrumb-item"><a class="link-success" href="../menus/menuPacientes.php">Pacientes</a></li>
                            <li class="breadcrumb-item"><a class="link-success" href="../tablas/tablaPacientes.php">Tabla de Pacientes</a></li>
                            <li class="breadcrumb-item active">Expedientes</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                               <p>En esta tabla se detallan los expedientes registradas en el sistema de este centro medico.</p>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Expediente
                            </div>
                            <div class="card-body"> <!-- Contenido Tabla Pacientes -->
                                <table id="datatablesSimple" class="table table-success table-striped table-borderless">
                                    <thead>
                                        <tr>
                                            <th>Cita</th>
                                            <th>Fecha de la cita</th>
                                            <th>Descripcion</th>
                                            <th>Datos del paciente</th>
                                            <th>Datos del Doctor</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Cita</th>
                                            <th>Fecha de la cita</th>
                                            <th>Descripcion</th>
                                            <th>Datos del paciente</th>
                                            <th>Datos del Doctor</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                            while ($row = $resultado->fetch_assoc()) { ?>
                                            <tr> <?php #$idExpediente = $row['idExpediente']?>
                                                <td><?php $CitaM = $row['idCita']; echo "<a href='tablaCitas.php?id=$CitaM'>$CitaM</a>"  ?> </td>
                                                <td><?php echo $row['fechaCita']  ?></td>
                                                <td><?php echo $row['descripcion']  ?></td>
                                                <td><?php echo $row['nombrePaciente']."<br> ".$row['apellidosPaciente']."<br> Cedula: ".$row['cedulaPaciente']  ?></td>
                                                <td><?php echo $row['nombreEmpleado']."<br> ".$row['apellidosEmpleado']."<br> Cedula: ".$row['cedulaEmpleado']  ?></td>
                                              <!--  <th><?php #echo "<a href='../formularios/editarExpediente.php?id=$idExpediente'>Modificar</a><br><a href='../scriptsSQL/deleteExpediente.php?id=$idExpediente'>Eliminar</a>" ?></th> -->
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
                                <a class="link-success" href="../politicas.php">Privacy Policy</a>
                                &middot;
                                <a class="link-success" href="../terminos.php">Terminos &amp; Condiciones</a>
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