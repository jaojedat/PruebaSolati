<?php
require_once 'config/Database.php';
require_once 'controllers/ProductoController.php';
require_once 'views/ProductoView.php';

header("Content-Type: application/json");

$method = $_SERVER['REQUEST_METHOD'];
$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');
$uriParts = explode('/', $uri);
$id = isset($uriParts[1]) ? intval($uriParts[1]) : null;
$controller = new ProductoController();

switch ($method) {
    case 'GET':
        if ($id) {
            $producto = $controller->getProducto($id);
            if ($producto) {
                ProductoView::response($producto);
            } else {
                ProductoView::response(["message" => "Producto no encontrado"], 404);
            }
        } else {
            $productos = $controller->getAllProductos();
            ProductoView::response($productos);
        }
        break;

    case 'POST':
        $data = json_decode(file_get_contents('php://input'), true);
        $nombre = $data['nombre'];
        $precio = $data['precio'];

        $id = $controller->createProducto($nombre, $precio);
        ProductoView::response(["id" => $id]);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents('php://input'), true);
        $nombre = $data['nombre'];
        $precio = $data['precio'];

        $controller->updateProducto($id, $nombre, $precio);
        ProductoView::response(["message" => "Producto actualizado"]);
        break;

    case 'DELETE':
        $controller->deleteProducto($id);
        ProductoView::response(["message" => "Producto eliminado"]);
        break;

    default:
        ProductoView::response(["message" => "Método no permitido"], 405);
        break;
}
?>
