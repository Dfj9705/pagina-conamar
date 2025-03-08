<?php

namespace Controllers;

use Exception;
use Model\Noticia;
use MVC\Router;
use Intervention\Image\ImageManager;

class NoticiaController
{
    public static function index(Router $router)
    {
        isAuth();
        $router->render('admin/entradas', [
        ], 'layouts/appLayout');
    }

    public static function guardarAPI()
    {
        getHeadersApi();
        isAuthApi();
        $data = sanitizar($_POST);
        $db = Noticia::getDB();
        $db->beginTransaction();
        try {



            $files = $_FILES['not_imagen'];




            for ($i = 0; $i < count($files['name']); $i++) {
                $nombreArchivo = $files['name'][$i];
                $tipoArchivo = $files['type'][$i];
                $tamanoArchivo = $files['size'][$i];
                $temporalArchivo = $files['tmp_name'][$i];
                $errorArchivo = $files['error'][$i];

                // Comprobar si hubo algún error al subir la imagen
                if ($errorArchivo === UPLOAD_ERR_OK) {
                    // Ruta de destino
                    $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION); // Obtener la extensión del archivo
                    $nuevoNombre = uniqid('img_', true) . '.' . $extension; // Generar nuevo no
                    $rutaDestino = __DIR__ . '/../storage/' . $nuevoNombre;

                    $manager = new ImageManager(['driver' => 'gd']);
                    $imagen = $manager->make($temporalArchivo);
                    $imagen->resize(900, 800);
                    $imagen->save($rutaDestino);

                } else {
                    throw new Exception("Error al subir la imagen {$nombreArchivo}: {$errorArchivo}.", 500);
                }
            }

            $data['not_imagen'] = $rutaDestino;
            $data['not_slug'] = generarSlug($data['not_titulo']);
            $noticia = new Noticia($data);
            $resultado = $noticia->crear();
            echo json_encode([
                'codigo' => 1,
                'mensaje' => 'Noticia generada exitosamente.',
            ]);

            $db->commit();
        } catch (Exception $e) {
            echo json_encode([
                'codigo' => 0,
                'mensaje' => 'Error guardando noticia',
                'detalle' => $e->getMessage()
            ]);
            $db->rollBack();
            exit;
        }
    }
}