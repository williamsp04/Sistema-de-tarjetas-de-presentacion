<?php  
include("policia.php");

//validacion para el boton regresar
if(!isset($_POST['guardatarj'])){ 
    header('Location: dashboard.php');
    exit();
}
    /////////////////////////////
    $user = $_SESSION['usuario'];
    $avatar = $_POST['avatar'];
    $col_nom = $_POST['colornom'];
    $col_pro = $_POST['colorpro'];
    $col_fon = $_POST['colorfon'];
    $col_pie = $_POST['colorpie'];

    // empty determina si las variables vienen vacias
    if (empty($avatar)) {
        echo "El paso 1 no fue completado, debe ingresar nuevamente y seleccionar su avatar.";
        return;
    }

    if (empty($col_nom)) {
        $col_nom = "#000000"; //por defecto color negro
    }
      
    if (empty($col_pro)) {
        $col_pro = "#000000"; //por defecto color negro   
    }

    if (empty($col_fon)) {
        $col_fon = ""; //por defecto sin color
    }

    if (empty($col_pie)) {
        $col_pie = "#a52a2a"; //por defecto color sombra de rojo 
    }
    ///////////////////////////////////////////////////////////////////////////
    /////////////VALIDACION DE FORMATO DE COLORES//////////////////////////////

    // **** validar el color en formato hexadecimal
    function validarFormat($color) {
        $patron = '/^#[a-f0-9]{6}$/i';
        return preg_match($patron, $color);
    }
    $col_nom_lim = trim($col_nom);  // Elimina espacios en blanco del inicio y final del color
    if (!validarFormat($col_nom_lim)) {
        echo "El formato del color nombre es invalido";
        return;  
    }
    $col_pro_lim = trim($col_pro);  // Elimina espacios en blanco del inicio y final del color
    if (!validarFormat($col_pro_lim)) {
        echo "El formato del color profesion es invalido";
        return;  
    }
    $col_fon_lim = trim($col_fon);
    if ($col_fon) {  //solo si el usuario selecciono un color
        if (!validarFormat($col_fon_lim)) {
            echo "El formato del color del fondo es invalido";
            return;  
        }
    }
    $col_pie_lim = trim($col_pie);
    if (!validarFormat($col_pie_lim)) {
        echo "El formato del color de pie es invalido";
        return;  
    }
    //////////////////////////////////////////////////////////////////////////
    /////////inserta registro de avatar y codigo de colores///////////////////

    $result3 = $conexion->query("INSERT INTO tarjetas (username,avatar,coloruser,colorprofe,colorfon,colorpie) 
                                VALUES ('$user','$avatar','$col_nom_lim','$col_pro_lim','$col_fon_lim','$col_pie_lim')");
    if ($result3) { //muestra mensaje de confirmacion y redirige a la principal
        echo "<script>alert('¡Su tarjeta ha sido creada!');</script>";
        echo '<script>window.location.href = "dashboard.php";</script>';
    } else {
        echo "Error: " . $result3 . "<br>" . mysqli_error($conexion);
    }
    $conexion->close();
?>



        

