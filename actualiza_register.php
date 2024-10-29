<?php 
include("policia.php");

//Se busca datos del usuario para mostrarlo en los input
$result = $conexion->query("SELECT * FROM usuarios WHERE username ='$user'");
$result2 = $result->fetch_assoc();
if (!$result2){
    echo "Error datos de usuario: " . $result2 . "<br>" . mysqli_error($conexion);
    return;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualiza_registro</title> 
    <link rel="stylesheet" href="style.css">
    <script src="valida_registro.js"></script>
</head>
<body>
    <section class="secactreg">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            
            <h2 class="titulo">Actualización de datos personales</h2><br>
            <!-- * El atributo FOR de la etiqueta, debe tener el mismo nombre que el atributo ID
                 evento oninput valida en tiempo real a medida que el usuario escribe en el campo 
                 * Atributo "required" (primera capa de validación en el navegador del usuario) -->
            <p class="format"> <label class="etiqueta_reg" for="reg_profes">Profesión: </label>
                <input style="width: 20%; font-weight: revert" type="text" name="muesprofe" class="actreg" value="<?php echo $result2['profesion'];?>"disabled>
                <select style="width: 25%" onchange="mostrarCampo()" name="profesion" class="actreg" id="reg_profes">
                    <option value="">Seleccione</option>
                    <option value="Programador web">Programador web</option>
                    <option value="Enfermero">Enfermero</option>
                    <option value="Mecanico">Mecanico</option>
                    <option value="Contador publico">Contador publico</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Médico">Médico</option>
                    <option value="Músico">Músico</option>
                    <option value="Cajero">Cajero</option>
                    <option value="Otros">Otros</option>
                </select>
                <!-- Muestra campo de texto para escribir otra opcion -->
                <input type="text" id="proinp" name="otraprofesion" class="actreg2" style="display: none;">
                <span class="error" id="errorProfe"></span>
            </p>

            <p class="format"> <label class="etiqueta_reg" for = "reg_fecha">Fecha de nacimiento:</label>
                <input style="width: 14%; font-weight: revert" type="text" id="reg_fecha" class="actreg" value="<?php echo date("d-m-Y",strtotime($result2['fecha']));?>" disabled>
            </p>
            <!---------------------------------Pregunta 1 ------------------------------------------------------->
            <p class="format"> <label class="etiqueta_reg" for = "reg_resp">Pregunta seguridad 1:</label>
                <input style="font-weight: revert" type="text" class="actreg" value="<?php echo $result2['pregunta1'];?>"disabled>
                <input style="width: 23%; font-weight: revert" class="actreg" type = "text" name = "respuesta" id = "reg_resp" value="<?php echo $result2['respuesta1'];?>" disabled>

                <!-- campos editables -->
                <?php
                echo'<select style="margin-left: 23%" onclick="activarbutton()" name="pregunta" class="actreg" id="rec_preg">
                        <option value="">seleccione</option>';
                //se busca preguntas en BD, excepto la pregunta del usuario registrado y mostrar en el selector
                $pregun = $result2['pregunta1'];
                $result4 = $conexion->query("SELECT pregunta FROM pregunta_seguridad WHERE pregunta<>'$pregun'");
                if ($result4->num_rows > 0){
                    while($result5 = $result4->fetch_assoc()) {
                        echo "<option value='" . $result5["pregunta"] . "'>" . $result5["pregunta"] . "</option>";
                    }
                } else {
                    echo "Error pregunta de seguridad: " . $result5 . "<br>" . mysqli_error($conexion);
                    return;
                }
                echo'</select>';
                ?>
                <input style="width: 23%" type="text" id="resp" name="respuesta" class="actreg">
            </p>
            <!---------------------------------Pregunta 2 ------------------------------------------------------->
            <p class="format"> <label class="etiqueta_reg" for = "reg_resp2">Pregunta seguridad 2:</label>
                <input style="font-weight: revert" type="text" class="actreg" value="<?php echo $result2['pregunta2'];?>"disabled>
                <input style="width: 23%; font-weight: revert" class="actreg" type = "text" name = "respuesta2" id = "reg_resp2" value="<?php echo $result2['respuesta2'];?>" disabled>

                <!-- campos editables -->
                <?php
                echo'<select style="margin-left: 23%" onclick="activarbutton()" name="pregunta2" class="actreg" id="rec_preg2">
                        <option value="">seleccione</option>';
                //se busca preguntas en BD, excepto la pregunta del usuario registrado y mostrar en el selector
                $pregun2 = $result2['pregunta2'];
                $result6 = $conexion->query("SELECT pregunta FROM pregunta_seguridad WHERE pregunta<>'$pregun2'");
                if ($result6->num_rows > 0){
                    while($result7 = $result6->fetch_assoc()) {
                        echo "<option value='" . $result7["pregunta"] . "'>" . $result7["pregunta"] . "</option>";
                    }
                } else {
                    echo "Error pregunta de seguridad: " . $result7 . "<br>" . mysqli_error($conexion);
                    return;
                }
                echo'</select>';
                ?>
                <input style="width: 23%" type="text" id="resp2" name="respuesta2" class="actreg">
            </p> 
            <!---->
            <p class="format"> <label class="etiqueta_reg" for = "reg_email">Email:</label>
                <input style="font-weight: revert" type="text" class="actreg" value="<?php echo $result2['email'];?>"disabled>
                <input class="actreg" type = "email" onclick="activarbutton()" name = "correo" id = "reg_email" oninput="validarEmail()"placeholder="(Ej:nombre@nombre.com)" maxlength="30">
                <span class="error" id="errorEmail"></span>
            </p>

            <p class="format"> <label class="etiqueta_reg" for = "reg_tel">Telefono:</label>
                <input style="width: 20%; font-weight: revert" type="text" class="actreg" value="<?php echo $result2['telefono'];?>"disabled>
                <input style="width: 20%" class="actreg" type = "tel" onclick="activarbutton()" name = "telefono" id = "reg_tel" oninput="validarTelef()"maxlength="12" placeholder="(Ej:212-123-4567)" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                <span class="error" id="errorTel"></span>
            </p>    

            <p class="format"> <label class="etiqueta_reg" for = "reg_web">Sitio Web:</label>
                <input style="font-weight: revert" type="text" class="actreg" value="<?php echo $result2['url'];?>"disabled>
                <input class="actreg" type = "url" onclick="activarbutton()" name = "web" id = "reg_web" oninput="validarURL()" placeholder="https://www.website.com">
                <span class="error" id="errorWeb"></span>
            </p><br>  
            <div style="text-align: center;">
                <input type = "submit" name="actuaregist" class="botav" value ="Actualizar" disabled>  
                <button class="botav" style="background-color: #0000ff;" onmouseover="this.style.backgroundColor = '#FF0000';" onmouseout="this.style.backgroundColor ='#0000ff';"><a href="dashboard.php">Regresar</a></button>
            </div>

            <!--////////////////////////////// VALIDACION DEL ENVIO PARA LA ACTUALIZACION ////////////////////-->
            <?php 
            if (isset($_POST['actuaregist'])) {

                $profes = $_POST['profesion'];
                $otraprofes = trim($_POST['otraprofesion']); // Elimina espacios en blanco del inicio y final
                $pre = $_POST['pregunta'];
                $resp = trim($_POST['respuesta']); // Elimina espacios en blanco del inicio y final
                $pre2 = $_POST['pregunta2'];
                $resp2 = trim($_POST['respuesta2']); // Elimina espacios en blanco del inicio y final
                $corr = $_POST['correo'];
                $tele = $_POST['telefono']; 
                $sitio = $_POST['web']; 

                ///////////////////////// Validamos que las variables vengan con datos /////////////////////////////
                if (empty($profes) && empty($pre) && empty($pre2) && empty($corr) && empty($tele) && empty($sitio)){
                    echo '<script>alert("No hay cambios que modificar."); window.location.href = "dashboard.php";</script>';
                    return;
                }
                /// Validacion especial para otra profesion
                if ($profes == "Otros" && empty($otraprofes)) {
                    echo "<br><div style='text-align: center;'><span class='error'>No ha completado el campo otros, Debe indicar cual es su profesion.</span></div>";
                    return;
                } else {
                    if ($profes == "Otros" && ($otraprofes)) {
                        $profes = $otraprofes;
                    }
                }
                /// Validacion especial para las preguntas
                if (($pre) && empty($resp)) { //pregunta 1
                    echo "<br><div style='text-align: center;'><span class='error'>No ha completado la respuesta a la pregunta 1 seleccionada.</span></div>";
                    return;
                } else {
                    if (($pre) && ($resp)) {
                        $pre = $pre;
                        $resp = $resp;
                    }
                }
                if (($pre2) && empty($resp2)) { //pregunta 2
                    echo "<br><div style='text-align: center;'><span class='error'>No ha completado la respuesta a la pregunta 2 seleccionada.</span></div>";
                    return;
                } else {
                    if (($pre2) && ($resp2)) {
                        $pre2 = $pre2;
                        $resp2 = $resp2;
                    }
                }
                //**** llena variables para la actualizacion
                if (empty($profes)) {
                    $profes = $result2['profesion']; //datos de la BD
                }
                if (empty($pre) && empty($resp) ) {
                    $pre = $result2['pregunta1'];    //datos de la BD
                    $resp = $result2['respuesta1'];
                } 
                if (empty($pre2) && empty($resp2) ) {
                    $pre2 = $result2['pregunta2'];   //datos de la BD
                    $resp2 = $result2['respuesta2'];
                }  
                if (empty($corr)) {
                    $corr = $result2['email'];       //datos de la BD
                }
                if (empty($tele)) {
                    $tele = $result2['telefono'];    //datos de la BD
                } 
                if (empty($sitio)) {
                    $sitio = $result2['url'];        //datos de la BD
                }
                //////////////////////////////////////////////////////////////////////////////////////////
                /////////////// Validacion de campos /////////////////////////////////////////////////////

                // **** validar el email con el formato requerido
                function validarEmail($email) {
                    if (!preg_match('/^[^\s@]+@[^\s@]+\.com$/', $email)) {
                        return false;
                    } else {
                        return true;
                    }
                }
                $corr_limp = trim($corr);  // Elimina espacios en blanco del inicio y final del email
                if (!validarEmail($corr_limp)) {
                    echo "<br><div style='text-align: center;'><span class='error'>Correo invalido, no tiene el formato requerido.</span></div>";
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
                    echo "<br><div style='text-align: center;'><span class='error'>El numero es invalido, no tiene el formato requerido.</span></div>";
                    return;
                } 
                
                // **** validar la url
                function validarURL($url) {
                    $patron = '/(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w #!:.?+=&%@!\-\/]))?/';
                    return preg_match($patron, $url);
                }
                if (!validarURL($sitio)) {
                    echo "<br><div style='text-align: center;'><span class='error'>La dirección web es invalido, no tiene el formato requerido.</span></div>";
                    return;
                }
                ////////////////////////////////////////////////////////////////////////////////////////////////////
                /////////////// SI NO HAY ERRORES SE ACTUALIZA LOS CAMBIOS EN LA BASE DE DATOS /////////////////////
                
                $result3 = $conexion->query("UPDATE usuarios SET profesion='$profes',pregunta1='$pre',respuesta1='$resp',pregunta2='$pre2',respuesta2='$resp2',email='$corr_limp',telefono='$tele_limp',url='$sitio' WHERE username='$user'");
                if ($result3) {
                  echo '<script>alert("Datos actualizados correctamente."); window.location.href = "dashboard.php";</script>';
                } else {
                  echo "Error de actualizacion de usuario: " . $result3 . "<br>" . mysqli_error($conexion);
                }
            }
            $conexion->close();
            ?>

        </form> 
    </section>  
      
</body> 
</html>