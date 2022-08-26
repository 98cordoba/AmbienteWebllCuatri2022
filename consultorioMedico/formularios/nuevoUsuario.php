<?php

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Registrarme</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="../js/jquery-3.5.1.js"></script>
        <script src="../js/jquery-ui-1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="../js/jquery-ui-1.12.1/jquery-ui.css">
        <script src="../js/carga.js"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Bienvenido</h3><br><h4>Por favor complete el registro</h4></div>
                                    <div class="card-body">
                                        <form method="Post" action="../scriptsSQL/insertUsuario.php">
                                            <div class="row mb-3">    
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" name="usuarioNombre"/>
                                                        <label for="inputLastName">Nombre de usuario</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" type="Text" placeholder="Enter your first name" name="passwordUsuario"/>
                                                        <label for="inputFirstName">Contraseña</label> 
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                    Rol de trabajo:<br />
                                                    <select name="idtipoUsuario" id="idtipoUsuario " style="font-size:Medium;width:296px;">
                                                    
                                                    </select><br />
                                                    <!-- <select class="form-select" aria-label="Default select example">
                                                    <option selected>Seleccione el rol de trabajo</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                    </select> -->
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                            <button type="submit" class="btn btn-primary" >Registrarme</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="../index.php">Iniciar sesion</a></div>
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
    </body>
</html>
