<?php 
//Nunca iniciara sesion si se llama desde el navegador, para desviar su acceso no autorizado se redirige
if(!isset($_SESSION['usuario'])){
    header('Location: dashboard.php');
    exit();
}
?>   
 
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualiza_avatares</title>
    <link rel="stylesheet" href="style.css">
    <script>
       // Al cargar la página muestra avatar registrado en BD
       window.onload = function() {
        var us_ava = '<?php echo $filtro;?>'; //llamar variable php con indicador del avatar del usuario logueado
           const miImagen = document.getElementById([us_ava]);
           miImagen.classList.add('filtroAv'); // Aplica una clase definida en CSS
       };
    </script>
</head>
<body>
    <!--los datos enviados por el formulario se procesarán en la misma página -->
    <form style="float: left;" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="carousel_config">
            <!-- Grupo de avatares -->
            <div class="slide">
                <!-- En el atributo "value" se identifica el nombre de la imagen para su posterior uso en la siguiente pantalla --> 
                <!-- uso del labels en las imagenes para asociarlo con los radio buttons y darle el estilo no visible -->
                <label for="radio1"><img class="avatar" id="img1" src="img/avatar_1.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                <input type = "radio" class="ocultaR" name="see" onClick="cambiarAvatar(1,'img1')" value ="avatar_1.png" id="radio1">
                
                <label for="radio2"><img class="avatar" id="img2" src="img/avatar_2.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                <input type = "radio" class="ocultaR" name="see" onClick="cambiarAvatar(2,'img2')" value ="avatar_2.png" id="radio2">
                
                <label for="radio3"><img class="avatar" id="img3" src="img/avatar_3.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(3,'img3')" value ="avatar_3.png" id="radio3">

                <label for="radio4"><img class="avatar" id="img4" src="img/avatar_4.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(4,'img4')" value ="avatar_4.png" id="radio4">

                <label for="radio5"><img class="avatar" id="img5" src="img/avatar_5.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(5,'img5')" value ="avatar_5.png" id="radio5">
            </div>  

            <div class="slide">
                <label for="radio6"><img class="avatar" id="img6" src="img/avatar_6.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(6,'img6')" value ="avatar_6.png" id="radio6">
                
                <label for="radio7"><img class="avatar" id="img7" src="img/avatar_7.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(7,'img7')" value ="avatar_7.png" id="radio7">

                <label for="radio8"><img class="avatar" id="img8" src="img/avatar_8.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(8,'img8')" value ="avatar_8.png" id="radio8">

                <label for="radio9"><img class="avatar" id="img9" src="img/avatar_9.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(9,'img9')" value ="avatar_9.png" id="radio9">
                
                <label for="radio10"><img class="avatar" id="img10" src="img/avatar_10.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(10,'img10')" value ="avatar_10.png" id="radio10">
            </div>

            <div class="slide">
                <label for="radio11"><img class="avatar" id="img11" src="img/avatar_11.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(11,'img11')" value ="avatar_11.png" id="radio11">

                <label for="radio12"><img class="avatar" id="img12" src="img/avatar_12.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(12,'img12')" value ="avatar_12.png" id="radio12">

                <label for="radio13"><img class="avatar" id="img13" src="img/avatar_13.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(13,'img13')" value ="avatar_13.png" id="radio13">
                
                <label for="radio14"><img class="avatar" id="img14" src="img/avatar_14.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(14,'img14')" value ="avatar_14.png" id="radio14">

                <label for="radio15"><img class="avatar" id="img15" src="img/avatar_15.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(15,'img15')" value ="avatar_15.png" id="radio15">
            </div>
            
            <input type="submit" class="botav" name="activ_btn" value="Actualizar avatar" disabled>
        </div>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
        <!-- //////////////////////////////// ACTUALIZAR AVATAR EN BD ////////////////////////////////////// -->
        <?php
        if(isset($_POST['activ_btn'])){ 
            $avatar = $_POST['see'];
            $user = $_SESSION['usuario'];

            $result = $conexion->query("UPDATE tarjetas SET avatar = '$avatar' WHERE username = '$user'");
            echo '<script>window.location.href = "ver_tarjeta.php";</script>';
            if (!$result){
                echo "Error de actualizacion avatar: " . $result . "<br>" . mysqli_error($conexion);
            } 
        }
        ?>
        <!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
    </form>
    
    <!-- llama a la funcion que valida el boton tipo radio -->
    <script src="valida_registro.js"></script>
</body>
</html>


