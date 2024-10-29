<?php  
include("policia.php");
//
if(isset($_POST['usuario'])){
    ///////////// Informacion enviada por el formulario /////////////
    $user = $_POST['usuario'];
    $clave = $_POST['clave'];
    $pre = $_POST['pregunta'];
    $resp = $_POST['respuesta'];
    $pre2 = $_POST['pregunta2'];
    $resp2 = $_POST['respuesta2'];
    $profes = $_POST['profesion'];
    $otraprofes = $_POST['otraprofesion'];
    $fecha = $_POST['fecha'];
    $corr = $_POST['correo'];
    $tele = $_POST['telefono']; 
    $sitio = $_POST['web']; 
    ///////// Fin informacion enviada por el formulario ///

    // empty determina si las variables vienen vacias (si el required se desactiva)
    if (empty($user) || empty($clave) || empty($pre) || empty($resp) || empty($pre2) || empty($resp2) || empty($profes) || empty($fecha) || empty($corr) || empty($tele) || empty($sitio)){
        echo "Por favor, completa todos los campos.";
        return;
    }
    //////////////////////////////////////////////////////////////////////////////////////////
    /////////////// Validacion de campos /////////////////////////////////////////////////////

    // **** validar campo user
    $user_limp = trim($user);  // Elimina espacios en blanco del inicio y final del nombre
    if (strlen($user_limp) < 3) {
        echo "<br><div style='text-align: center;'><span class='error'>El nombre debe tener al menos 3 caracteres.</span></div>";
        return;
    }

    // **** validar la clave
    // Elimina espacios en blanco del inicio y final de la clave y valida con empty, si queda en blanco despues de eliminar espacios o desactivan JS
    $clave_limp = trim($clave);
    if (empty($clave_limp) || strlen($clave_limp) > 8 ) { 
        echo "<br><div style='text-align: center;'><span class='error'>La clave es invalida, debe ser menor o igual a 8 caracteres.</span></div>";
        return;
    }

    // **** validar la pregunta y respuesta 1
    $resp_limp = trim($resp);  // Elimina espacios en blanco del inicio y final de la respuesta
    if (($pre) && empty($resp_limp)) {
        echo "<br><div style='text-align: center;'><span class='error'>Debes indicar la respuesta de la pregunta 1.</span></div>";
        return;
    } 
    // **** validar la pregunta y respuesta 2
    $resp2_limp = trim($resp2);  // Elimina espacios en blanco del inicio y final de la respuesta
    if (($pre2) && empty($resp2_limp)) {
        echo "<br><div style='text-align: center;'><span class='error'>Debes indicar la respuesta de la pregunta 2.</span></div>";
        return;
    } 
    // **** validar la profesion 
    $otraprofes_limp = trim($otraprofes);  // Elimina espacios en blanco del inicio y final de la otra profesion
    if ($profes == "Otros" && empty($otraprofes_limp)) {
        echo "<br><div style='text-align: center;'><span class='error'>Debe indicar en el campo Otros, cual es su profesion.</span></div>";
        return;
    } 
    if ($profes == "Otros" && ($otraprofes_limp)){ //si escribe otra profesion
        $profes = $otraprofes_limp;
    }

    // **** validar la fecha
    $anno = date('Y', strtotime($fecha)); // formato que captura el input (YYYY-MM-DD)
    if (!($anno >= 1920 && $anno <= 2030)) {
        echo "La fecha de nacimiento no es válida o está fuera del rango.";
        return;
    }

    // **** validar el email con el formato requerido
    function validarEmail($email) {
        if (!preg_match('/^[^\s@]+@[^\s@]+\.com$/', $email)) {
            return false;
        } else {
            return true;
        }
        // Validación adicional (opcional):
        // - Verificar si el dominio existe utilizando DNS
        // - Verificar si el correo ya está registrado en tu base de datos
    }
    $corr_limp = trim($corr);  // Elimina espacios en blanco del inicio y final del email
    if (!validarEmail($corr_limp)) {
        echo "Correo invalido, no tiene el formato requerido.";
        return;
    }
    
    // **** validar el telefono
    function validarTelef($tele) {
        if (!preg_match('/^\d{3}-\d{3}-\d{4}$/', $tele)) {
            return false;
        } else {
            return true;
        }
    }
    $tele_limp = trim($tele);  // Elimina espacios en blanco del inicio y final del telefono
    if (!validarTelef($tele_limp)) {
        echo "El numero es invalido, no tiene el formato requerido.";
        return;
    } 
    
    // **** validar la url
    function validarURL($url) {
        $patron = '/(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w #!:.?+=&%@!\-\/]))?/';
        return preg_match($patron, $url);
    }
    if (!validarURL($sitio)) {
        echo "La dirección web es invalido, no tiene el formato requerido.";
        return;
    } 
    //////////////////////////////////////////////////////////////////////////////////////////////////////
    //////// SI NO HAY ERRORES SE CONSULTA O INSERTA EL REGISTRO EN LA BASE DE DATOS /////////////////////
    
    // Consultar el usuario para verificar si ya existe
    $result = $conexion->query("SELECT * FROM usuarios WHERE username ='$user_limp'");
    $result2 = $result->fetch_assoc();

    if ($result2){
        echo '<script>alert("Ya estas registrado en el sistema, intenta recuperar tu clave si no la recuerdas."); window.location.href = "index.php";</script>';
        //Muestra mensaje de error en el index
        $_SESSION['error'] = 'Ya estas registrado en el sistema, intenta recuperar tu clave si no la recuerdas.';
        echo $_SESSION['error'];
        return;
    } else {
        // Inserta nuevo usuario 
        $result3 = $conexion->query("INSERT INTO usuarios (username,password,pregunta1,respuesta1,pregunta2,respuesta2,profesion,fecha,email,telefono,url)VALUES ('$user_limp','$clave_limp','$pre','$resp_limp','$pre2','$resp2_limp','$profes','$fecha','$corr_limp','$tele_limp','$sitio')");
        
        if ($result3) {
          echo '<script>alert("Se ha registrado con exito!!, ya puede ingresar al sistema"); window.location.href = "cerrar.php";</script>';
          return;
        } else {
          echo "Error de registro de usuario: " . $result3 . "<br>" . mysqli_error($conexion);
          return;
        }
    }
    $conexion->close();  
}
?>
    


        

