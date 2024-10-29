<!-- Control de redireccion de archivos (policia) -->
<?php 
//Iniciar una nueva sesión o reanudar la existente.
session_start(); 

// obtiene la URL completa del navegador
/*$protocolo = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'];
$url_actual = $protocolo . '://' . $host . $_SERVER['REQUEST_URI'];*/

/* la variable superglobal ($_SERVER['REQUEST_URI']) muestra de la URL solo el nombre de carpeta y archivo 
   con explode, extrae de la variable superglobal el nombre del archivo en la posicion 2 utilizando el delimitador (/) */
$url = explode("/", $_SERVER['REQUEST_URI'])[2];

switch ($url) {

case "log_register.php":
    // invocamos archivo de conexion BD
    include("conexion.php");

    break;

case "dashboard.php":
    if(isset($_SESSION['usuario'])){
        include("conexion.php");
        $user = $_SESSION['usuario'];
    } else {
        header('Location: index.php');
        exit();
    }
    break;

case "home.php":
    if(!isset($_SESSION['usuario']) || !isset($_POST['mueshom'])){
        header('Location: dashboard.php');
        exit();
    }
    break;

case "home-servicios.php":
    
    if (isset($_SESSION['usuario'])) {
        // invocamos archivo de conexion BD
        include("conexion.php");
    } else {
        header('Location: dashboard.php');
        exit;
    }
    // valida si no se envió la respuesta del input avatar seleccionado, o no se valido el boton siguiente paso
    if (!isset($_POST['see']) || !isset($_POST['activ_btn'])) {    
        header('Location: dashboard.php');
        exit;
    }
    break;

case 'actualiza_register.php':
    if (isset($_SESSION['usuario'])) {
        // invocamos archivo de conexion BD
        include("conexion.php");
        $user = $_SESSION['usuario'];
    } else {
        header('Location: dashboard.php');
        exit;
    }
    break;

case "ver_tarjeta.php":
    if(isset($_SESSION['usuario'])){
        // invocamos archivo de conexion BD
        include("conexion.php");
        //Si no tiene tarjeta asignada redirige a la principal
        $user = $_SESSION['usuario'];
        $verifica = $conexion->query("SELECT * FROM tarjetas WHERE username = '$user'");
        $verifica2 = $verifica->fetch_assoc();
        if (!$verifica2){
            header('Location: dashboard.php');
            exit();
        } 
    } else {
        header('Location: dashboard.php');
        exit;
    }
    break;

case "index.php":
    // Verificar si hay una sesión activa
    if (isset($_SESSION['usuario'])) {
        // Si el usuario está logueado, redireccionarlo a otra página (por ejemplo, la página principal)
        header('Location: dashboard.php');
        exit();
    }
    break;

case "recupera_clave.php":
    // invocamos archivo de conexion BD
    include("conexion.php");

    break;

case "recupera_clave2.php":
    if(isset($_SESSION['persona'])){
        $user = $_SESSION['persona'];
        // invocamos archivo de conexion BD
        include("conexion.php"); 
    } else {
        header('Location: index.php');
        exit;
    }
    break;

case "procesar.php":
    if(isset($_POST['usuario']) && isset($_POST['clave'])){
        // invocamos archivo de conexion BD
        include("conexion.php"); 
    } else {
        header('Location: index.php');
        exit;
    }
    break;

case "procesar_registro.php":
    if(isset($_POST['usuario'])){
        // invocamos archivo de conexion BD
        include("conexion.php"); 
    } else {
        header('Location: index.php');
        exit;
    }
    break;

case "procesar_tarjeta.php":
    if(isset($_SESSION['usuario'])){
        // invocamos archivo de conexion BD
        include("conexion.php"); 
    } else {
        header('Location: index.php');
        exit;
    }
    break;

default:
    header('Location: index.php');
    exit;

    break;
}

?>