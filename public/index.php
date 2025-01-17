<?php
require_once __DIR__ . '/../includes/app.php';


use Controllers\ProductoController;
use MVC\Router;
use Controllers\AppController;
use Controllers\AuthController;
use Controllers\ContactoController;
use Controllers\EmpresaController;
use Controllers\TramiteController;

$router = new Router();
// $router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [AppController::class, 'index']);
$router->get('/mision-vision', [AppController::class, 'misionVision']);
$router->get('/quienes-somos', [AppController::class, 'quienesSomos']);
$router->get('/contacto', [AppController::class, 'contacto']);
$router->get('/productos', [AppController::class, 'productos']);
$router->post('/API/contacto/enviar', [ContactoController::class, 'enviar']);
$router->get('/test', [AppController::class, 'test']);
$router->get('/login', [AuthController::class, 'login']);
$router->post('/login', [AuthController::class, 'loginAPI']);
$router->get('/logout', [AuthController::class, 'logout']);

$router->get('/admin/', [AppController::class, 'admin']);
$router->get('/admin/productos', [ProductoController::class, 'index']);
$router->post('/API/admin/productos/guardar', [ProductoController::class, 'guardarAPI']);
$router->post('/API/admin/productos/modificar', [ProductoController::class, 'modificarAPI']);
$router->get('/API/admin/productos/buscar', [ProductoController::class, 'buscarAPI']);
$router->get('/API/admin/productos/categoria', [ProductoController::class, 'categoriaAPI']);
$router->get('/API/admin/productos/fotos', [ProductoController::class, 'fotosAPI']);
$router->post('/API/admin/productos/fotos/eliminar', [ProductoController::class, 'eliminarFotoAPI']);
$router->post('/API/admin/productos/estado', [ProductoController::class, 'cambiarEstadoAPI']);
// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
