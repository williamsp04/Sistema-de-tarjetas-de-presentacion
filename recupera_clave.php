<?php 
include("policia.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Recupera contraseña</title> 
    <link rel="stylesheet" href="style.css">
    <!-- Se activara durante el dibujado de la pagina --> 
    <script src="valida_registro.js"></script>
    
</head>
<body>
    <section class="secregist">
        
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <h1 class="titulo">Reestablecer contraseña</h1>
            <p style="font-size: 16px;color: chocolate;">Introduce el nombre de usuario y luego selecciona y responde una de las preguntas que utilizaste al momento de registrarse.</p>

            <p class="present"> <label class="etiqueta_reg" for="reg_usuario">Usuario:</label>
                <input style="font-weight: bold;text-transform: uppercase;" type="text" name="usuario" id="reg_usuario" oninput="validarNombre()" required>
                <span class="error" id="errorNombre"></span>
            </p>

            <p class="present"> <label class="etiqueta_reg" for="rec_preg">Pregunta de seguridad: </label>
                <?php
                echo'<select name="pregunta" class="rec_inp" id="rec_preg" required>
                        <option value="">seleccione</option>';
                //se busca preguntas en BD y mostrar en el selector
                $result = $conexion->query("SELECT pregunta FROM pregunta_seguridad");
                if ($result->num_rows > 0){
                    while($result2 = $result->fetch_assoc()) {
                        echo "<option value='" . $result2["pregunta"] . "'>" . $result2["pregunta"] . "</option>";
                    }
                } else {
                    echo "Error pregunta de seguridad: " . $result2 . "<br>" . mysqli_error($conexion);
                    return;
                }
                echo'</select>';
                ?>
                <input type="text" id="resp" name="respuesta" class="rec_inp" required>
                <div style="margin-top: -15px;"><a href="informacion.php">Olvide mi pregunta</a></div>
            </p> 
                
            <p><input type="submit" name="rec_cons" class ="btn_enviar2" value="Consultar"></p>
            <div class="log-regis"><a href="cerrar.php">Regresar</a></div>
        </form>
        <!--/////////////////////////////////////////////////////////////////////////////////////////-->
        <!--//////////////// valida los datos recibidos con los datos del usuario en BD //////////////-->
        <?php 
        if (isset($_POST['rec_cons'])) {

            $user = trim($_POST['usuario']);
            $pregu = $_POST['pregunta'];
            $resp = trim($_POST['respuesta']); // Elimina espacios en blanco del inicio y final*/

            if (empty($user) || empty($pregu) || empty($resp)){
                echo "<br><div style='text-align: center;'><span class='error'>Debe completar todos los campos</span></div>";
                return;
            }
            // **** validar campo user
            if (strlen($user) < 3) {
                echo "<br><div style='text-align: center;'><span class='error'>El nombre debe tener al menos 3 caracteres.</span></div>";
                return;
            }
            //Se busca las preguntas de seguridad del usuario en BD y se valida con lo ingresado.
            $result3 = $conexion->query("SELECT pregunta1,pregunta2,respuesta1,respuesta2 FROM usuarios WHERE username ='$user'");
            $result4 = $result3->fetch_assoc();
            if (!$result4){
                echo "<br><div style='text-align: center;'><span class='error'>El usuario no se encuentra en la base de datos,¡Debe registrarse en el sistema!</span></div>";
                return;
            }
            //***********************************************************************************************
            for ($i = 1; $i <= 2; $i++) {
                if ($pregu == $result4['pregunta'.$i] && $resp == $result4['respuesta'.$i]) {
                    $_SESSION['persona'] = $user;  //Recibe el usuario en otra pantalla
                    header('Location: recupera_clave2.php'); //cambia la clave
                    exit();
                } else {
                    echo "<br><div style='text-align: center;'><span class='error'>La pregunta y/o respuesta no coincide con sus datos registrados</span></div>"; 
                    return;
                }
            }
            $conexion->close();   
        }?>

    </section> 
</body> 
</html>