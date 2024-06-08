<?php
class ProductoView {
    public static function response($data, $status = 200) {
        http_response_code($status);
        echo json_encode($data);
    }
}
?>
