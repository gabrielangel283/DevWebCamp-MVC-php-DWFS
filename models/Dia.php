<?php

namespace Model;

class Dia extends ActiveRecord
{
    protected static $tabla = 'dias';
    protected static $columnasDB = ['id', 'nombre'];

    public $id;
    public $nombre;

    public function __construct($agrs = [])
    {
        $this->id = $agrs['id'] ?? null;
        $this->nombre = $agrs['nombre'] ?? '';
    }
}
