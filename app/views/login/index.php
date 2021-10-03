<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible">
        <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
        <meta content="" name="description">
        <link rel="icon" type="image/png" href="<?php echo URL_SISINV?>logo/favicon-32x32.png" sizes="32x32">
        <meta content="SERVICO NACIONAL APRENDIZAJE          - SENA" name="author">
        <title><?php echo NAME_SISINV; ?></title>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?php echo URL_SISINV;?>/css/styles.css" />
        <!-- Custom fonts for this template-->
        <link href="<?php echo URL_SISINV;?>/MATERIAL_THEME/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="<?php echo URL_SISINV;?>/css/styles.css" rel="stylesheet" type="text/css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@700&display=swap" rel="stylesheet">
    </head>
    <body id="page-top" class="bg-gradient-primary">
        <nav class="navbar navbar-expand-lg bg-light text-uppercase sticky-top shadow-lg p-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="<?php echo URL_SISINV?>logo/planning.svg" alt="Logo" style="width:50px;">
                  </a>
                <a class="navbar-brand js-scroll-trigger" href="#page-top">SIGINV</a>
                <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Inicio</a></li>
                        <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about"></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    
             
        <div class="container">
            <!-- Outer Row -->
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block ">
                                    <img src="<?php echo URL_SISINV?>logo/395.jpg" style="width:400px;" class="text-center" >
                                </div>
                                <div class="col-lg-6">
                                    <div class="p-5">
                                        <div class="text-center">
                                           <?php !empty($datos['message']) ? print "<div class='alert alert-danger fade show' role='alert'>{$datos['message']}</div>": $datos = ['message' => ''];
                                          ?>  
                                            <h1 class="h4 text-gray-900 mb-4">
                                                INICIAR SESION
                                            </h1>
                                        </div>
                                        <form class="user" action="<?php echo URL_SISINV;?>Login/SignIn" method="POST"> 
                                            <div class="form-group">
                                                <input required aria-describedby="username" class="form-control form-control-user" id="USERNAME" placeholder="NOMBRE DE USUARIO" type="text" name="USERNAME">
                                                </input>
                                            </div>
                                            <div class="form-group">
                                                <input required class="form-control form-control-user" id="PASSWORD" placeholder="CONTRASEÑA" type="password" name="PASSWORD">
                                                </input>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input class="custom-control-input" id="customCheck" type="checkbox">
                                                        <label class="custom-control-label" for="customCheck">
                                                            Recordarme
                                                        </label>
                                                    </input>
                                                </div>
                                            </div>
                                            <button class="btn btn-primary btn-user btn-block" type="submit">
                                                LOGIN
                                            </button>
                                        </form>
                                        <hr>
                                            <div class="text-center">
                                                <a class="small" href="forgot-password.html">
                                                    Olvide mi contraseña?
                                                </a>
                                            </div>
                                            <div class="text-center">
                                                <a class="small" href="register.html">
                                                    Crea una cuenta!
                                                </a>
                                            </div>
                                        </hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
        <div class="scroll-to-top d-lg-none position-fixed">
            <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
        </div>
        </div>
        <!-- Footer-->
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <!-- Footer Location-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Ubicacion</h4>
                        <p class="lead mb-0">
                            #16- a 16-123,, Dg. 18 
                            #111, Malambo, Atlántico
                            <br />
                            Clark, MO 65243
                        </p>
                    </div>
                    <!-- Footer Social Icons-->
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">nuestras redes sociales</h4>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                    </div>
                    <!-- Footer About Text-->
                    <div class="col-lg-4">
                        <h4 class="text-uppercase mb-4">Pagina Principal SENA</h4>
                        <p class="lead mb-0">
                            <a href="https://www.sena.edu.co/" target="_blank">Pagina del SENA Oficial</a><br>
                            <a href="http://oferta.senasofiaplus.edu.co/sofia-oferta" target="_blank">Portal Sena Sofia Plus</a>
                            
                        </p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Copyright Section-->
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright © Sena Malambo 2021  |  By Orion-Group</small></div>
        </div>
        <!-- Bootstrap core JavaScript-->
        <script src="<?php echo URL_SISINV;?>/MATERIAL_THEME/vendor/jquery/jquery.min.js">
        </script>
        <script src="<?php echo URL_SISINV;?>/MATERIAL_THEME/vendor/bootstrap/js/bootstrap.bundle.min.js">
        </script>
        <!-- Core plugin JavaScript-->
        <script src="<?php echo URL_SISINV;?>/MATERIAL_THEME/vendor/jquery-easing/jquery.easing.min.js">
        </script>
        <!-- Custom scripts for all pages-->
        <script src="<?php echo URL_SISINV;?>/MATERIAL_THEME/js/sb-admin-2.min.js">
        </script>
    </body>
</html>
