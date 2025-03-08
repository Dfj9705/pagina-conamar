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
        <script src="https://kit.fontawesome.com/27dfb146c7.js" crossorigin="anonymous"></script>
        <!-- Template Javascript -->
        <script defer src="<?= asset('./build/js/app.js') ?>"></script>
        <script defer src="<?= asset('./build/js/main.js') ?>"></script>
    </head>

    <body class="h-100">
        <?= $contenido ?>
        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 text-center text-md-start">
                        <p class="mb-0 text-center">&copy; CONAMAR <?= date('Y') ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->

    </body>

</html>