<?php 
include("policia.php");
?>   

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tarjeta de servicios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="secproces">
        <p>¡Muy bien estimado <b><?php echo $_SESSION['usuario'];?></b>!, has llegado al último paso.</p>
        <p><u><b>Paso 2/2:</b></u> Configure el estilo de su tarjeta de presentación</p>
        <div class="container">
            <div id="micolor3" class="container_tarj">
                <!-- Estructura de la tarjeta -->
                <div class="tarjet">
                    <?php 
                    // se busca los datos del usuario para mostrarlo en la tarjeta
                    $user = $_SESSION['usuario'];
                    // recibe el nombre del archivo avatar
                    $avatar = $_POST['see'];
                    
                    $result = $conexion->query("SELECT * FROM usuarios WHERE username = '$user'");
                    $result2 = $result->fetch_assoc();
                    if (!$result2){
                        echo "Error de tarjeta: " . $result2 . "<br>" . mysqli_error($conexion);
                    }
                    $conexion->close();
                    ?>
                        
                    <label id="micolor" class="encabez"><?php echo $result2['username'];?></label><br>  
                    <label id="micolor2" class="encabez_2"><?php echo $result2['profesion'];?></label><br>
                    <label class="linea">-------------------------------------------</label><br>
                    
                    <img class="conten" src="img/llamar.png">
                    <label class="eq_content"><?php echo $result2['telefono'];?></label><br>
                    
                    <img class="conten" src="img/sobre-de-carta.png">
                    <label class="eq_content"><?php echo $result2['email'];?></label><br>      
                    

                    <img class="conten" src="img/sitio-web.png">
                    <label class="eq_content"><?php echo $result2['url'];?></label>       
                </div>  

                <!-- Pie de la tarjeta -->
                <div id="micolor4" class="footer">
                    <img class="img_fa" src="img/facebook.png">
                    <img class="img_tw" src="img/twitter.png">
                    <img class="img_in" src="img/instagram.png">
                </div>
            </div>

            <!-- Estructura de la paleta de colores -->
            <div class="container_paleta">Paleta de colores:<br>
                <label class="linea">**************</label><br>
                <!-- Para que el usuario cambie el color de la etiqueta nombre --> 
                <button id="micolor" class="est_pal" onclick="cambiarColor('micolor','colornom')">Color de nombre </button>
                <!-- Para que el usuario cambie el color de la etiqueta profesion -->
                <button id="micolor2" class="est_pal" onclick="cambiarColor('micolor2','colorpro')">Color de profesión</button>
                <!-- Para que el usuario cambie el fondo de la tarjeta -->
                <button id="micolor3" class="est_pal" onclick="cambiarFondo('micolor3','colorfon')">Color de fondo</button>
                <!-- Para que el usuario cambie el color del pie de tarjeta -->
                <button id="micolor4" class="est_pal" onclick="cambiarFondo('micolor4','colorpie')">Color de pie</button>
                    
                <script>
                    // Utilizando Fetch API 
                    function cambiarColor(camb,camb2) {
                        const input = document.getElementById([camb]);
                        const span = document.getElementById([camb2]);
                        // Realizamos una petición a un archivo PHP para obtener el nuevo color
                        fetch("procesar_color.php")
                        .then(response => response.text())
                        .then(data => {
                            input.style.color = data;
                            span.value = data; //asigna color al input hidden
                            //imprime en consola el color
                            const colorActual = window.getComputedStyle(input).color;
                            console.log(colorActual);
                            
                        });
                    }
                    function cambiarFondo(camb,camb2) {
                        const input = document.getElementById([camb]);
                        const span = document.getElementById([camb2]);
                        // Realizamos una petición a un archivo PHP para obtener el nuevo color
                        fetch("procesar_color.php")
                        .then(response => response.text())
                        .then(data => {
                            input.style.backgroundColor = data;
                            span.value = data; //asigna color al input hidden
                            //imprime en consola el color
                            const colorActual = window.getComputedStyle(input).backgroundColor;
                            console.log(colorActual);
                            
                        });
                    }
                </script> 
            </div>
        </div>

        <form action="procesar_tarjeta.php" method="post">
            <input type="hidden" id="colornom" name="colornom"> <!-- muestra color de nombre -->
            <input type="hidden" id="colorpro" name="colorpro"> <!-- muestra color de profesion -->
            <input type="hidden" id="colorfon" name="colorfon"> <!-- muestra color de fondo -->
            <input type="hidden" id="colorpie" name="colorpie"> <!-- muestra color pie de tarjeta -->
            <input type="hidden" name="avatar" value="<?php echo $avatar;?>">  <!-- muestra dato del avatar -->
            <br>      
            <div class="btn_div">
                <p><input type = "submit" class ="btn_enviar" name="guardatarj" value ="Guardar configuracion"></p>
                <p><a href="dashboard.php"><button class ="btn_enviar">Regresar</button></a></p>
            </div>
        </form>
        <br>

    </section>
        
</body>
</html>



