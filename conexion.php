<!-- Credenciales de la base de datos -->
<?php 
$host = "localhost";
$usuario = "root";
$clave = "";
$base = "login";

// Crear la conexion
$conexion = new mysqli($host, $usuario, $clave, $base); 

// Verificar la conexion
// (->) operador de objeto, se usa para acceder a un miembro de un objeto
// la funcion (die) imprime el mensaje y finaliza el script
// funcion connect_error, devuelve la descripcion del error     
if ($conexion->connect_error) {
    die("conexion fallida: " . $conexion->connect_error);
}
//echo "conectado correctamente a la BD";
?>