<?php
class Producto {
    private $id;
    private $nombre;
    private $precio;

    public function __construct($id = null, $nombre = '', $precio = 0.0) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
    }

    // Métodos getters y setters
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }
}
?>
