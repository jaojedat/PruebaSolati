<?php
require_once 'Producto.php';

class ProductoDAO {
    private $pdo;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getAllProductos() {
        $stmt = $this->pdo->query("SELECT * FROM productos");
        $productos = [];
        while ($row = $stmt->fetch()) {
            $productos[] = new Producto($row['id'], $row['nombre'], $row['precio']);
        }
        return $productos;
    }

    public function getProductoById($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM productos WHERE id = ?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        if ($row) {
            return new Producto($row['id'], $row['nombre'], $row['precio']);
        }
        return null;
    }

    public function createProducto($nombre, $precio) {
        $stmt = $this->pdo->prepare("INSERT INTO productos (nombre, precio) VALUES (?, ?)");
        $stmt->execute([$nombre, $precio]);
        return $this->pdo->lastInsertId();
    }

    public function updateProducto($id, $nombre, $precio) {
        $stmt = $this->pdo->prepare("UPDATE productos SET nombre = ?, precio = ? WHERE id = ?");
        $stmt->execute([$nombre, $precio, $id]);
    }

    public function deleteProducto($id) {
        $stmt = $this->pdo->prepare("DELETE FROM productos WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>
