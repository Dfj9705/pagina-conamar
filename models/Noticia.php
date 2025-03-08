<?php

namespace Model;

use Model\ActiveRecord;

class Noticia extends ActiveRecord
{
    protected static $tabla = 'noticias';
    protected static $idTabla = 'not_id';
    protected static $columnasDB = ['not_titulo', 'not_contenido', 'not_imagen', 'not_autor', 'not_categoria', 'not_fecha', 'not_slug', 'not_estado'];

    public $not_id;
    public $not_titulo;
    public $not_contenido;
    public $not_imagen;
    public $not_autor;
    public $not_categoria;
    public $not_fecha;
    public $not_slug;
    public $not_estado;

    public function __construct($args = [])
    {
        $this->not_id = $args['not_id'] ?? null;
        $this->not_titulo = $args['not_titulo'] ?? '';
        $this->not_contenido = $args['not_contenido'] ?? '';
        $this->not_imagen = $args['not_imagen'] ?? null;
        $this->not_autor = $args['not_autor'] ?? 'CONAMAR';
        $this->not_categoria = $args['not_categoria'] ?? 1;
        $this->not_fecha = $args['not_fecha'] ?? date('Y-m-d H:i:s');
        $this->not_slug = $args['not_slug'] ?? '';
        $this->not_estado = $args['not_estado'] ?? 1;
    }
}
