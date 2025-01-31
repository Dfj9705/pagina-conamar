<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8">
        <title>CONAMAR</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta http-equiv="Expires" content="0">
        <meta http-equiv="Last-Modified" content="0">
        <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
        <meta http-equiv="Pragma" content="no-cache">

        <!-- Favicon -->
        <link href="/images/logos/CONAMAR.png" rel="icon">


        <meta name="description" content="Página de la Comisión Nacional de Administración Maritima.">
        <meta name="keywords" content="comisión, marina, defensa, nacional">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="https://conamar.gob.gt/">

        <meta property="og:title" content="CONAMAR">
        <meta property="og:description" content="Pagina de la Comisión Nacional de Administración Maritima.">
        <meta property="og:image" content="https://conamar.gob.gt/images/logos/CONAMAR.png">
        <meta property="og:url" content="https://conamar.gob.gt">
        <meta property="og:type" content="website">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">

        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="Comisión Nacional de Administración Maritima.">
        <meta name="twitter:description" content="Pagina de la Comisión Nacional de Administración Maritima.">
        <meta name="twitter:image" content="https://conamar.gob.gt/images/logos/CONAMAR.png">
        <meta name="twitter:url" content="https://conamar.gob.gt">

        <meta http-equiv="Content-Language" content="es">


        <meta name="author" content="Abner Daniel Fuentes Juárez">
        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Red+Rose:wght@600;700&display=swap"
            rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
        <link rel="stylesheet" href="<?= asset('build/css/styles.css') ?>">
        <!-- JavaScript Libraries -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/f1593bdde9.js" crossorigin="anonymous"></script>
        <!-- Template Javascript -->
        <script defer src="<?= asset('./build/js/app.js') ?>"></script>
        <script defer src="<?= asset('./build/js/main.js') ?>"></script>
    </head>

    <body>
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
        </div>
        <!-- Spinner End -->
        <?php if (isset($_ENV['BUILDING'])): ?>
            <div class="progress fixed-top mb-4">
                <div class="progress-bar progress-bar-striped bg-warning progress-bar-animated " role="progressbar"
                    aria-label="Warning striped example" style="width: 100%" aria-valuenow="100" aria-valuemin="0"
                    aria-valuemax="100"><span class="text-danger fw-bold"><img class="me-2" width="25px"
                            src="./images/otros/en-construccion.png" alt="">SITIO EN CONSTRUCCIÓN</span></div>
            </div>
        <?php endif ?>
        <!-- Topbar Start -->
        <div class="container-fluid bg-primary text-white py-2 d-none d-lg-flex border-bottom border-warning border-5">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div><small class="me-3"><i class="fa fa-map-marker-alt me-2"></i>Guatemala, Guatemala</small>
                    </div>
                    <div>
                        <small class="me-3"><i class="fa fa-clock me-2"></i><span id="time"></span></small>
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->


        <!-- Brand Start -->
        <div class="container-fluid bg-light text-white pt-4 pb-5 d-none d-lg-flex">
            <div class="container h-100 pb-2">
                <div class="d-flex align-items-center">
                    <div class="d-flex me-4" style="width: 15%;">
                        <img src="/images/logos/CONAMAR.png" class="w-100" alt="">
                    </div>
                    <div class="d-flex flex-column" style="text-align:left">
                        <a href="/" class="display-6 mb-0 text-decoration-none text-dark mb-3">Comisión Nacional de
                            Administración Maritima</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Brand End -->


        <!-- Navbar Start -->
        <div class="container-fluid bg-primary text-w sticky-top">
            <div class="container">
                <nav class="navbar bg-primary navbar-expand-lg navbar-light text-white py-lg-0 px-lg-3">
                    <a href="/" class="navbar-brand d-lg-none d-flex">
                        <img src="/images/logos/CONAMAR.png" width="38px" alt="">
                        <h1 class="text-white m-0">CONAMAR</h1>
                    </a>
                    <button type="button" class="navbar-toggler me-0" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="navbar-toggler-icon text-white"></span>
                    </button>
                    <div class="collapse navbar-collapse text-white" id="navbarCollapse">
                        <div class="navbar-nav">
                            <a href="/" class="nav-item nav-link">Inicio</a>
                            <a href="/mision-vision" class="nav-item nav-link">Misión y Visión</a>
                            <a href="/quienes-somos" class="nav-item nav-link">Historia</a>
                            <a href="/blog" class="nav-item nav-link">Noticias</a>
                            <a href="/biblioteca" class="nav-item nav-link">Biblioteca virtual</a>
                            <a href="/contacto" class="nav-item nav-link">Contáctenos</a>
                        </div>
                        <div class="ms-auto d-none d-lg-flex">
                            <a target="_blank" class="btn btn-sm-square btn-light ms-2" target="_blank"
                                href="https://www.facebook.com/share/1DFigzn5Ey/"><i class="fab fa-facebook-f"></i></a>
                            <a target="_blank" class="btn btn-sm-square btn-light ms-2"
                                href="https://www.instagram.com/digemar_dgam?igsh=eXM0MW9zdzJ0N3Vr"><i
                                    class="fab fa-instagram"></i></a>

                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Navbar End -->

        <?= $contenido ?>


        <!-- Footer Start -->
        <div class="container-fluid footer position-relative bg-dark text-white-50 py-5 wow animate__animated animate__fadeIn"
            data-wow-delay="0.1s">
            <div class="container">
                <div class="row g-5 py-5">
                    <div class="col-lg-12 pe-lg-5 overflow-hidden">
                        <a href="/" class="navbar-brand">
                            <h1 class="h1 text-white mb-0">CONAMAR</h1>
                        </a>
                        <p class="fs-5 mb-4"></p>
                        <p class="text-white"><i class="fa fa-map-marker-alt me-2"></i>Guatemala, Guatemala
                        </p>
                        <p><a class="text-decoration-none text-white" href="tel:+50235710052"><i
                                    class="fa fa-phone-alt me-2"></i>+502 35710052</p></a>
                        <p><a class="text-decoration-none text-white" href="mailto:informatica@dgam.gob.gt"><i
                                    class="fa fa-envelope me-2"></i>informatica@dgam.gob.gt</p></a>
                        <div class="d-flex mt-4">
                            <a target="_blank" class="btn btn-lg-square btn-primary me-2"
                                href="https://www.facebook.com/share/1DFigzn5Ey/"><i class="fab fa-facebook-f"></i></a>
                            <a target="_blank" class="btn btn-lg-square btn-primary me-2"
                                href="https://www.instagram.com/digemar_dgam?igsh=eXM0MW9zdzJ0N3Vr"><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark text-white-50 py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="mb-0 text-center">&copy; CONAMAR <?= date('Y') ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-danger btn-lg-square rounded-circle back-to-top"><i
                class="fas fa-arrow-up"></i></a>



    </body>

</html>