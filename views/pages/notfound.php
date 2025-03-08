<div class="container-fluid">
    <div class="row">
        <div class="col text-center">
            <h1><?= $codigo ?? '404' ?> - <?= $error ?? 'Página no encontrada' ?></h1>
            <p class="lead"><?= $detalle ?? 'Lo sentimos, la página que estás buscando no existe.' ?></p>
            <div class="row justify-content-center">
                <div class="col-8 col-sm-10 col-lg-2">
                    <img src="./images/otros/no.png" class="w-100" alt="imangen no encontrado">
                </div>
            </div>
            <p class="lead">Puedes intentar volver a la <a href="/">página de inicio</a>.</p>

        </div>
    </div>
</div>