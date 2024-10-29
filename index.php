<?php 
include("policia.php");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>formularios</title> 
    <link rel="stylesheet" href="style.css">
    <style>
        /* Uso de las pseudoclases, modifica el estilo cuando el contenido no es valido
        funciona con el atributo required */
        input:valid{
            background: #EEEEFF;    /* fondo azul */
        }
        input:invalid{
            background: #FFEEEE;}   /* fondo rojo */
    </style>
</head>
<body>
    <section class="secindex">
        <form name ="formulario" method="post" action="procesar.php">
            
            <h2 class="titu_ind">Sistema de tarjetas de presentación</h2>
            <!-- El atributo FOR de la etiqueta, debe tener el mismo nombre que el atributo ID -->
            <p> <label class="etiqueta" for = "usuario">Usuario:</label>
                <input type = "text" name = "usuario" id = "usuario" oninput="validarNombre()" placeholder="Ingrese el usuario" required >
                <br><span class="error" id="errorNombre"></span>
            </p> 
            
            <p> <label class="etiqueta" for = "contraseña">Contraseña:</label>
                <input type = "password" name = "clave" id = "contraseña" oninput="validarClave()" maxlength="8" placeholder="Ingrese la clave" required>
            </p> 

            <!--Utilizando sesiones para almacenar el error y mostrarla en la misma página de inicio de sesión. -->
            <?php if (isset($_SESSION['error'])) { ?>
                <div class="error"><?php echo $_SESSION['error']; ?></div>
                <?php unset($_SESSION['error']); ?> <!-- Eliminamos el mensaje de error después de mostrarlo -->
            <?php } ?>

            <p> <input type = "submit" id ="enviar" value ="Ingresar"></p>  
        </form> 
        
        <p><a class="log-regis" href="log_register.php">Registrarse</a></p>
        <p><a class ="btn_ind" href="recupera_clave.php">Olvidaste tu clave?</a></p>
    </section> 
    <!-- Se activara durante el dibujado de la pagina -->
    <script src="valida.js"></script>  
</body> 
</html>