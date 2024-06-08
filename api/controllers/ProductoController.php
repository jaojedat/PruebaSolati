<?php
require_once 'models/ProductoDAO.php';

class ProductoController {
    private $productoDAO;

    public function __construct() {
        $this->productoDAO = new ProductoDAO();
    }

    public function getAllProductos() {
        $productos = $this->productoDAO->getAllProductos();
        $productosArray = [];
        foreach ($productos as $producto) {
            $productosArray[] = [
                'id' => $producto->getId(),
                'nombre' => $producto->getNombre(),
                'precio' => $producto->getPrecio()
            ];
        }
        return $productosArray;
    }

    public function getProducto($id) {
        $producto = $this->productoDAO->getProductoById($id);
        if ($producto) {
            return [
                'id' => $producto->getId(),
                'nombre' => $producto->getNombre(),
                'precio' => $producto->getPrecio()
            ];
        }
        return null;
    }

    public function createProducto($nombre, $precio) {
        return $this->productoDAO->createProducto($nombre, $precio);
    }

    public function updateProducto($id, $nombre, $precio) {
        $this->productoDAO->updateProducto($id, $nombre, $precio);
    }

    public function deleteProducto($id) {
        $this->productoDAO->deleteProducto($id);
    }
}
?>
