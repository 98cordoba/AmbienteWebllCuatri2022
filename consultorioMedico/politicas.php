<?php
 session_start(); #Necesario para utilizar sesiones
 if (!isset($_SESSION['idUsuario'])) { #si no existe sesion activa redirecciona al login
    header("Location: index.php");
 }
 #Asignacion de la sesion en Variables
 $rol = $_SESSION['rol'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Terminos y condiciones</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="./css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    </head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark"> <!--Barra de navegacion -->
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="principal.php">Consultorio Medico</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav ms-auto ms-auto me-0 me-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="./menus/configuracion.php">Configuracion</a></li>
                    <li><hr class="dropdown-divider" /></li>
                    <li><a class="dropdown-item" href="logout.php">Cerrar sesion</a></li>
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
                        <a class="nav-link" href="principal.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Princial
                        </a>
                        <a class="nav-link" href="./menus/menuCitas.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-book-medical"></i></div>
                            Citas
                        </a>
                        <a class="nav-link" href="./menus/menuEmpleados.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                            Empleados
                        </a>
                        <a class="nav-link" href="./menus/menuPacientes.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-user fa-fw"></i></div>
                            Pacientes
                        </a>
                        <a class="nav-link" href="./menus/menuUsuarios.php">
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
                                <a class="nav-link" href="./formularios/registrarPaciente.php">Agregar Paciente</a>
                                <a class="nav-link" href="./tablas/tablaPacientes.php">
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
                                <a class="nav-link" href="./formularios/registrarEmpleado.php">Agregar Empleado</a>
                                <a class="nav-link" href="./tablas/tablaEmpleados.php">
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
                                <a class="nav-link" href="./tablas/tablaCitas.php">
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
                                <a class="nav-link" href="./formularios/nuevoUsuario.php">Agregar Usuario</a>
                                <a class="nav-link" href="./tablas/tablaUsuarios.php">
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
                    <h1 class="mt-4">Politicas de Privacidad</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="./principal.php">Principal</a></li>
                        <li class="breadcrumb-item active">Politicas de Privacidad</li>
                    </ol>
                    <div class="row">
                        <div class="col">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Privacidad
                                    </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Privacidad: </strong>Somos un centro medico privado por lo cual la confidencialidad con respecto a la identidad de los pacientes 
                                        o con las condiciones o medicamentos que este pueda presentar, es un pilar importante en nuestras bases y valores como empresa, por esto deberan ser tomados con la mayor seriedad y profesionalismo para evitar cualquier fuga de datos. 
                                        En caso de que se compruebe cualquier mal intencion con respecto a la informacion del centro medico o de sus pacientes, la empresa esta aturizada a tomar las medidas 
                                        laborales o judiciales, segun sea el caso, que amerite cualquier accion no permitida como colaborador de la empresa.
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Confidencialidad
                                    </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Confidencialidad: </strong>Al tratarse de un establecimiento de salud nos regimos por los estandares nacionales de confidencialidad que rigen para cualquier otro centro medico
                                        a nivel del territorio nacional. Tratando todo dato sensible o no sensible con el mayor cuidado correspondiente a los diferentes procesos realizados dentro del sistema con el fin de mantener 
                                        la privacidad de los clientes o colaboradores de la empresa.
                                    </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Represalias
                                    </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <strong>Represalias: </strong> Se le recuerda que al firmar el contrato de ingreso a la empresa usted da su consentimiento de haber leido todos los terminos y condiciones,asi como las 
                                        politicas de privacidad de la empresa. Por lo tanto en caso de que se logre contastar cualquier falta grave o incumplimiento del contrato la empresa se vera en la obligacion de tomar las
                                        medidas necesarias tanto empresariales como judiciales en caso de ser necesarias por la violación a nuestra politica de confidencialidad.
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto"> <!-- Footer -->
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Fidelitas 2022</div>
                            <div>
                                <a href="./politicas.php">Privacy Policy</a>
                                &middot;
                                <a href="./terminos.php">Terminos &amp; Condiciones</a>
                            </div>
                        </div>
                    </div>
                </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="./assets/demo/chart-area-demo.js"></script>
        <script src="./assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="./js/datatables-simple-demo.js"></script>
</body>
</html>