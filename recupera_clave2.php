<?php 
include("policia.php"); //recibe la variable global del usuario
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cambia contraseña</title> 
    <link rel="stylesheet" href="style.css">
    <!-- Se activara durante el dibujado de la pagina --> 
    <script src="valida_registro.js"></script>
</head>
<body>
    <section class="secregist">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        
            <p class="present"> <label class="etiqueta_reg" for="reg_clave">Nueva contraseña *</label>
                <input type="password" name="clave" id="reg_clave" oninput="validarClave()" maxlength="8" placeholder="(De 3 hasta 8 caracteres)" required>
                <span class="error" id="errorClave"></span>
            </p>

            <p class="present"> <label class="etiqueta_reg" for="reg_clave2">Repetir nueva contraseña *</label>
                <input type="password" name="clave2" id="reg_clave2" oninput="validarClave()" maxlength="8" placeholder="(De 3 a 8 caracteres)" required>
            </p>

            <p> <input type="submit" id="enviar" name="restacontra" value ="Reestablecer"></p>  
        </form>

        <div id="reg_recu" class="log-regis"><a href="cerrar.php">Regresar</a></div>

        <?php 
        if (isset($_POST['restacontra'])){
            $clave_1 = $_POST['clave'];
            $clave_2 = $_POST['clave2'];

            if (empty($clave_1) || empty($clave_2)) {
                echo "<br><div style='text-align: center;'><span class='error'>Debe completar todos los campos</span></div>";
                return;
            } 
            if ($clave_1 !== $clave_2) {
                echo "<br><div style='text-align: center;'><span class='error'>Las claves introducidas no coinciden, verifique.</span></div>";
                return;
            }
            ////////////////////////////////////////////////////////////////////////////////////////////////////
            /////////////// SI NO HAY ERRORES SE ACTUALIZA LOS CAMBIOS EN LA BASE DE DATOS /////////////////////
            
            $result3 = $conexion->query("UPDATE usuarios SET password = '$clave_1' WHERE username = '$user'");
            if ($result3) {
              echo '<script>alert("Tu contraseña fue cambiado con exito. Ya puedes ingresar a tu cuenta con la nueva contraseña."); window.location.href = "cerrar.php";</script>';
            } else {
              echo "Error de actualizacion de clave: " . $result3 . "<br>" . mysqli_error($conexion);
            }
        }
        $conexion->close();
        ?>
        
    </section>   
</body> 
</html>