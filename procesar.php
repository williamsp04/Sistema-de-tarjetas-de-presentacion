<?php  
include("policia.php");

//$user = mysqli_real_escape_string ($conexion, $_POST['usuario']);
//$clave = mysqli_real_escape_string ($conexion, $_POST['clave']);
$user = trim($_POST['usuario']); //elimina espacios al inicio y al final
$clave = trim($_POST['clave']);  //elimina espacios al inicio y al final

// **** validar campo user
if (empty($user)) {
    $_SESSION['error'] = 'Debe ingresar el nombre de usuario valido.';
    header('Location: index.php');
    exit;
}
if (strlen($user) < 3) {
    $_SESSION['error'] = 'El nombre debe tener al menos 3 caracteres.';
    header('Location: index.php');
    exit;
}

// **** validar la clave
if (empty($clave)) {
    $_SESSION['error'] = 'Debe ingresar una clave valida.';
    header('Location: index.php');
    exit;
}
// Elimina espacios en blanco del inicio y final de la clave y valida con empty, si queda en blanco despues de eliminar espacios o desactivan JS
if (empty($clave) || strlen($clave) > 8 ) { 
    $_SESSION['error'] = 'La clave es invalida, debe ser menor o igual a 8 caracteres.';
    header('Location: index.php');
    exit;
}

// Consultar la base de datos para verificar la información de inicio de sesión
$result = $conexion->query("SELECT * FROM usuarios WHERE username = '$user' AND password = '$clave'");
$result2 = $result->fetch_assoc();

if ($result2){
    // Los datos de la sesion se guarda en un array llamado $_SESSION
    $_SESSION['usuario'] = $user;
    header('Location: dashboard.php');
    exit;
} else {
    // Si la autenticación falla, se almacena un mensaje de error en la variable de sesión
    $_SESSION['error'] = 'Usuario o contraseña incorrectos.';
    header('Location: index.php');
    exit;
}
$conexion->close();

?>



        

