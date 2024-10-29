<?php 
include("policia.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title> 
    <link rel="stylesheet" href="style.css">
    <!-- Se activara durante el dibujado de la pagina --> 
    <script src="valida_registro.js"></script>
</head>
<body>
    <section class="secregist">
        <!-- Se agrega el atributo "onsubmit="this.reset()" que invoca el metodo reset() 
            del formulario automaticamente despues que se envie, Esto limpia todos los campos -->
        <form name ="formulario" id="formul" method="post" action="procesar_registro.php">
            
            <h2 class="titulo">Registro de usuario</h2>
            <p class="subtitu">Todos los campos son OBLIGATORIOS</p>
            <!-- * El atributo FOR de la etiqueta, debe tener el mismo nombre que el atributo ID
                 evento oninput valida en tiempo real a medida que el usuario escribe en el campo 
                 * Atributo "required" (primera capa de validación en el navegador del usuario) -->
            <p class="present"> <label class="etiqueta_reg" for = "reg_usuario">Usuario *</label>
                <input type = "text" name = "usuario" id = "reg_usuario" oninput="validarNombre()" maxlength="20" placeholder="Escriba su usuario" required> 
                <span class="error" id="errorNombre"></span>
            </p>

            <p class="present"> <label class="etiqueta_reg" for = "reg_clave">Contraseña *</label>
                <input type = "password" name = "clave" id = "reg_clave" oninput="validarClave()" maxlength="8" placeholder="(De 3 hasta 8 caracteres)" required>
                <span class="error" id="errorClave"></span>
            </p>

            <p class="present"> <label class="etiqueta_reg" for="rec_preg">Pregunta de seguridad 1 * </label>
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
                    echo "Error pregunta de seguridad 1: " . $result2 . "<br>" . mysqli_error($conexion);
                    return;
                }
                echo'</select>';
                ?>
                <input type="text" id="resp" name="respuesta" class="rec_inp" required>
            </p>

            <p class="present"> <label class="etiqueta_reg" for="rec_preg2">Pregunta de seguridad 2 * </label>
                <?php
                echo'<select name="pregunta2" class="rec_inp" id="rec_preg2" required>
                        <option value="">seleccione</option>';
                //se busca preguntas en BD y mostrar en el selector
                $result3 = $conexion->query("SELECT pregunta FROM pregunta_seguridad");
                if ($result3->num_rows > 0){
                    while($result4 = $result3->fetch_assoc()) {
                        echo "<option value='" . $result4["pregunta"] . "'>" . $result4["pregunta"] . "</option>";
                    }
                } else {
                    echo "Error pregunta de seguridad 2: " . $result4 . "<br>" . mysqli_error($conexion);
                    return;
                }
                echo'</select>';
                ?>
                <input type="text" id="resp2" name="respuesta2" class="rec_inp" required>
            </p>

            <p class="present"> <label class="etiqueta_reg" for="reg_profes2">Profesión * </label>
                <select onchange="validaOtros()" name="profesion" class="reg_log" id="reg_profes2" required>
                    <option value="">seleccione</option>
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
                <input type="text" id="proinp2" name="otraprofesion" class="reg_log" style="display: none; text-transform: uppercase;">
                <span class="error" id="errorProfe"></span>
            </p>

            <p class="present"> <label class="etiqueta_reg" for = "reg_fecha">Fecha de nacimiento *</label>
                <input class="reg_log" type = "date" name = "fecha" id = "reg_fecha" min="1920-01-01" max="2030-12-31" required>
                <span class="error" id="errorFecha"></span>
            </p>

            <p class="present"> <label class="etiqueta_reg" for = "reg_email">Email *</label>
                <input class="reg_log" type = "email" name = "correo" id = "reg_email" oninput="validarEmail()"placeholder="(Ej:nombre@nombre.com)" maxlength="30" required>
                <span class="error" id="errorEmail"></span>
            </p>

            <p class="present"> <label class="etiqueta_reg" for = "reg_tel">Telefono *</label>
                <input class="reg_log" type = "tel" name = "telefono" id = "reg_tel" oninput="validarTelef()"maxlength="12" placeholder="(Ej:212-123-4567)" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}">
                <span class="error" id="errorTel" required></span>
            </p>    

            <p class="present"> <label class="etiqueta_reg" for = "reg_web">Sitio Web *</label>
                <input class="reg_log" type = "url" name = "web" id = "reg_web" oninput="validarURL()" placeholder="https://www.website.com" required>
                <span class="error" id="errorWeb"></span>
            </p>    

            <p> <input type = "submit" id ="enviar" value ="Guardar datos"></p>  
            <div class="log-regis"><a href="cerrar.php">Ya estoy registrado</a></div>

        </form> 
    </section> 
      
</body> 
</html>