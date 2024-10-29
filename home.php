<?php 
include("policia.php");
?>   

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Respuesta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="secproces">
        <form method="post" action="home-servicios.php">
            <p>Bienvenido(a): <b><?php echo $_SESSION['usuario'];?></b><br>¡Queremos conocerte mejor!, sigue los pasos para crear tu personalidad cartelua.</p>
            <p><u><b>Paso 1/2:</b></u> Seleccione un avatar y descubre su color</p>

            <div class="carousel">
                <!-- Grupo de avatares -->
                <div class="slide">
                    <!-- En el atributo "value" se identifica el nombre de la imagen para su posterior uso en la siguiente pantalla --> 
                    <!-- uso del labels en las imagenes para asociarlo con los radio buttons y darle el estilo no visible -->
                    <label for="radio1"><img class="avatari" id="img1" src="img/avatar_1.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                    <input type = "radio" class="ocultaR" name="see" onClick="cambiarAvatar(1,'img1')" value ="avatar_1.png" id="radio1">
                    
                    <label for="radio2"><img class="avatari" id="img2" src="img/avatar_2.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                    <input type = "radio" class="ocultaR" name="see" onClick="cambiarAvatar(2,'img2')" value ="avatar_2.png" id="radio2">
                    
                    <label for="radio3"><img class="avatari" id="img3" src="img/avatar_3.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                    <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(3,'img3')" value ="avatar_3.png" id="radio3">

                    <label for="radio4"><img class="avatari" id="img4" src="img/avatar_4.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                    <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(4,'img4')" value ="avatar_4.png" id="radio4">

                    <label for="radio5"><img class="avatari" id="img5" src="img/avatar_5.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                    <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(5,'img5')" value ="avatar_5.png" id="radio5">
                </div>

                <div class="slide">
                    <label for="radio6"><img class="avatari" id="img6" src="img/avatar_6.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                    <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(6,'img6')" value ="avatar_6.png" id="radio6">
                    
                    <label for="radio7"><img class="avatari" id="img7" src="img/avatar_7.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                    <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(7,'img7')" value ="avatar_7.png" id="radio7">

                    <label for="radio8"><img class="avatari" id="img8" src="img/avatar_8.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                    <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(8,'img8')" value ="avatar_8.png" id="radio8">

                    <label for="radio9"><img class="avatari" id="img9" src="img/avatar_9.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                    <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(9,'img9')" value ="avatar_9.png" id="radio9">
                    
                    <label for="radio10"><img class="avatari" id="img10" src="img/avatar_10.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                    <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(10,'img10')" value ="avatar_10.png" id="radio10">
                </div>

                <div class="slide">
                    <label for="radio11"><img class="avatari" id="img11" src="img/avatar_11.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                    <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(11,'img11')" value ="avatar_11.png" id="radio11">

                    <label for="radio12"><img class="avatari" id="img12" src="img/avatar_12.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                    <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(12,'img12')" value ="avatar_12.png" id="radio12">

                    <label for="radio13"><img class="avatari" id="img13" src="img/avatar_13.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                    <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(13,'img13')" value ="avatar_13.png" id="radio13">
                    
                    <label for="radio14"><img class="avatari" id="img14" src="img/avatar_14.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                    <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(14,'img14')" value ="avatar_14.png" id="radio14">

                    <label for="radio15"><img class="avatari" id="img15" src="img/avatar_15.png" alt="Imagen 1" title="¡Hola <?php echo $_SESSION['usuario'];?>!,¿Me identifico contigo?."></label>
                    <input type = "radio" class="ocultaR" name="see" onclick="cambiarAvatar(15,'img15')" value ="avatar_15.png" id="radio15">
                </div>

                <div style="text-align: center;">
                    <input type="submit" name="activ_btn" class="botav" value="Siguiente paso" disabled>
                    <!--Pongo el color directamente sin alterar los colores de la clase, y con JS cambio el hover ya que en la etiqueta style no es posible -->
                    <a href="dashboard.php"><button style="background-color: #0000ff;" onmouseover="this.style.backgroundColor = '#FF0000';" onmouseout="this.style.backgroundColor = '#0000ff';" class ="botav">Regresar</button></a>
                </div><br>
            </div>
        </form> 
    </section>
    <!-- llama a la funcion que valida el boton tipo radio -->
    <script src="valida_registro.js"></script>  
</body>

</html>



