<?php
require_once __DIR__ . '/../includes/app.php';


use Controllers\NoticiaController;
use Controllers\ProductoController;
use MVC\Router;
use Controllers\AppController;
use Controllers\AuthController;
use Controllers\ContactoController;
use Controllers\EmpresaController;
use Controllers\TramiteController;

$router = new Router();
// $router->setBaseURL('/' . $_ENV['APP_NAME']);

if ($_ENV['PAGADO']) {
    $router->get('/', [AppController::class, 'index']);
    $router->get('/mision-vision', [AppController::class, 'misionVision']);
    $router->get('/quienes-somos', [AppController::class, 'quienesSomos']);
    $router->get('/contacto', [AppController::class, 'contacto']);
    $router->get('/noticias', [AppController::class, 'noticias']);
    $router->get('/biblioteca', [AppController::class, 'biblioteca']);
    $router->post('/API/contacto/enviar', [ContactoController::class, 'enviar']);
    $router->get('/test', [AppController::class, 'test']);
    $router->get('/login', [AuthController::class, 'login']);
    $router->post('/login', [AuthController::class, 'loginAPI']);
    $router->get('/logout', [AuthController::class, 'logout']);

    $router->get('/admin/', [AppController::class, 'admin']);
    $router->get('/admin/entradas', [NoticiaController::class, 'index']);
    $router->post('/API/admin/entradas/guardar', [NoticiaController::class, 'guardarAPI']);
    $router->post('/API/admin/productos/modificar', [ProductoController::class, 'modificarAPI']);
    $router->get('/API/admin/productos/buscar', [ProductoController::class, 'buscarAPI']);
    $router->get('/API/admin/productos/categoria', [ProductoController::class, 'categoriaAPI']);
    $router->get('/API/admin/productos/fotos', [ProductoController::class, 'fotosAPI']);
    $router->post('/API/admin/productos/fotos/eliminar', [ProductoController::class, 'eliminarFotoAPI']);
    $router->post('/API/admin/productos/estado', [ProductoController::class, 'cambiarEstadoAPI']);
    $router->comprobarRutas();
    // Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
} else {
    http_response_code(503);
    echo "Servidor desahabilitado - Contacte al administrador";

}

