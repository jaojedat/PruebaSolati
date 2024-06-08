# PruebaSolati
API RESTful con PHP, Esta API RESTful está construida utilizando PHP y sigue el patrón de diseño MVC (Modelo-Vista-Controlador).

## Estructura del Proyecto
El proyecto está organizado de la siguiente manera:
/api
/config
Database.php
/models
Producto.php
ProductoDAO.php
/controllers
ProductoController.php
/views
ProductoView.php
api.php

## Requisitos

- PHP >= 7.4
- MySQL
- Servidor web (como Apache)
- [Composer](https://getcomposer.org/) (opcional, para manejar dependencias)
- [Postman](https://www.postman.com/downloads/) para probar la API (opcional)

## Configuración de la Base de Datos

1. Abre PHPMyAdmin y crea una nueva base de datos llamada `dbsolati`.

2. Ejecuta la siguiente consulta SQL para crear la tabla `productos`:
sql
 ```sql
   CREATE TABLE productos (
       id INT AUTO_INCREMENT PRIMARY KEY,
       nombre VARCHAR(100) NOT NULL,
       precio DECIMAL(10, 2) NOT NULL
   ); 
 ```
## Clona este repositorio en tu directorio de proyectos (por ejemplo, C:\xampp\htdocs\api si estás usando XAMPP):
- https://github.com/jaojedat/PruebaSolati.git

## Ejecución del Proyecto
- Asegúrate de que el servidor web (como Apache) esté corriendo. Si estás usando XAMPP, abre el panel de control de XAMPP y asegúrate de que Apache esté iniciado.
- Navega a http://localhost/api/api.php en tu navegador web o usa Postman para probar la API.

# Pruebas con Postman
## Obtener Todos los Productos
- Método: GET
- URL: http://localhost/api/api.php

## Obtener un Producto por ID
- Método: GET
- URL: http://localhost/api/api.php/{id}
- Parámetro: id - ID del producto
  
## Crear un Nuevo Producto
- Método: POST
- URL: http://localhost/api/api.php
- Body: (raw, JSON)
{
    "nombre": "Nuevo Producto",
    "precio": 99.99
}
## Actualizar un Producto Existente
- Método: PUT
- URL: http://localhost/api/api.php/{id}
- Body: (raw, JSON)
  {
    "nombre": "Producto Actualizado",
    "precio": 149.99
}

## Eliminar un Producto
- Método: DELETE
- URL: http://localhost/api/api.php/{id}
- Parámetro: id - ID del producto
