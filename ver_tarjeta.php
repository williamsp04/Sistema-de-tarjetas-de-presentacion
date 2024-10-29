<?php 
include("policia.php");
?>   

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Configuracion de tarjeta</title>
    <link rel="stylesheet" href="style.css">
    <script src="valida_registro.js"></script>
</head>
<body>
    <section class="secproces">
        <p>¡Hola de nuevo estimado <b><?php echo $user;?></b>!.</p>
        <p>Aqui puedes mejorar el estilo de su tarjeta de presentación.</p>
        <div class="container">
            <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- /////////////////////////////// ESTRUCTURA DE LA TARJETA ////////////////////////////////////// -->
            
            <!-- se busca los datos del usuario para mostrarlo en la tarjeta -->
            <?php 
            $result = $conexion->query("SELECT user.username AS username, user.profesion AS profesion, user.email AS email, user.telefono AS telefono, user.url AS url, tarj.avatar AS avatar, tarj.coloruser AS coloruser, tarj.colorprofe AS colorprofe, tarj.colorfon AS colorfon, tarj.colorpie AS colorpie 
                FROM usuarios AS user LEFT JOIN tarjetas AS tarj ON tarj.username = user.username 
                WHERE user.username = '$user'");

            $result2 = $result->fetch_assoc();
            if (!$result2){
                echo "Error de tarjeta: " . $result2 . "<br>" . mysqli_error($conexion);
                return;
            }
            ?>
            <!-- Muestra la tarjeta -->
            <div id="micolor3" style="background-color: <?php echo $result2['colorfon']; ?>;" class="container_config">
                <div class="config_tarjet">
                    <label id="micolor" style="color: <?php echo $result2['coloruser']; ?>;" class="encabez_config"><?php echo $result2['username'];?></label><br>  
                    <label id="micolor2" style="color: <?php echo $result2['colorprofe']; ?>;" class="encabez_config"><?php echo $result2['profesion'];?></label><br>
                    <label class="linea_config">-------------------------------------------</label><br>
                    
                    <img class="conten_config" src="img/llamar.png">
                    <label class="eq_content_config"><?php echo $result2['telefono'];?></label><br>
                    
                    <img class="conten_config" src="img/sobre-de-carta.png">
                    <label class="eq_content_config"><?php echo $result2['email'];?></label><br>      
                    

                    <img class="conten_config" src="img/sitio-web.png">
                    <label class="eq_content_config"><?php echo $result2['url'];?></label>       
                </div>  

                <!--Panel derecho -->
                <div><img class="conten_config_avatar" src="img/<?php echo $result2['avatar'];?>"></div>

                <!-- Pie de la tarjeta -->
                <div id="micolor4" style="background-color: <?php echo $result2['colorpie']; ?>;" class="footer_config">
                    <img class="img_fa" src="img/facebook.png">
                    <img class="img_tw" src="img/twitter.png">
                    <img class="img_in" src="img/instagram.png">
                </div>
            </div>
            <!-- //////////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- ///////////////////// ESTRUCTURA DE LA PALETA DE COLORES ////////////////////////////////////// -->

            <!-- Al hacer click en el boton se mostrara y ocultara -->
            <div id="paleta" style="display: none;" class="container_paleta_config">Paleta de colores:<br>
                <label class="linea">**************</label><br>

                <!-- Para que el usuario cambie el color de la etiqueta nombre --> 
                <button id="micolor" class="est_pal" onclick="cambiarColor('micolor','colornom')">Color de nombre </button>
                <!-- Para que el usuario cambie el color de la etiqueta profesion -->
                <button id="micolor2" class="est_pal" onclick="cambiarColor('micolor2','colorpro')">Color de profesión</button>
                <!-- Para que el usuario cambie el fondo de la tarjeta -->
                <button id="micolor3" class="est_pal" onclick="cambiarFondo('micolor3','colorfon')">Color de fondo</button>
                <!-- Para que el usuario cambie el color del pie de tarjeta -->
                <button id="micolor4" class="est_pal" onclick="cambiarFondo('micolor4','colorpie')">Color de pie</button>

                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <input type="hidden" id="colornom" name="colornom"> <!-- muestra color de nombre -->
                    <input type="hidden" id="colorpro" name="colorpro"> <!-- muestra color de profesion -->
                    <input type="hidden" id="colorfon" name="colorfon"> <!-- muestra color de fondo -->
                    <input type="hidden" id="colorpie" name="colorpie"> <!-- muestra color pie de tarjeta -->

                    <!-- Para guardar cambios -->
                    <hr><p><input type = "submit" class="btn_paleta" name="actualizar" value="Guardar cambios" disabled></p>
                    
                    <!-- /////////////////////////////////////////////////////////////////////////////////////// -->
                    <!-- ///////////////////// VALIDACION LADO SERVIDOR Y ACTUALIZACION EN BD ////////////////// -->
                    <?php
                    if (isset($_POST['actualizar'])) {
                        $col_nom = $_POST['colornom'];
                        $col_pro = $_POST['colorpro'];
                        $col_fon = $_POST['colorfon'];
                        $col_pie = $_POST['colorpie'];

                        // empty determina si las variables vienen vacias
                        if (empty($col_nom)) {
                            $col_nom = $result2['coloruser'];
                        }
                          
                        if (empty($col_pro)) {
                            $col_pro = $result2['colorprofe']; 
                        }

                        if (empty($col_fon)) {
                            $col_fon = $result2['colorfon'];
                        }

                        if (empty($col_pie)) {
                            $col_pie = $result2['colorpie'];
                        }
                        //////////////////////////////////////////////////////////////////////////////////////////
                        ///////////////////// VALIDACION DE FORMATO DE COLORES ///////////////////////////////////
                        
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
                        /////////////////////////////////////////////////////////////////////////////////////////////
                        /////////////////////////// ACTUALIZA EN BD CAMBIO DE COLORES ///////////////////////////////
                        
                        $result3 = $conexion->query("UPDATE tarjetas SET coloruser = '$col_nom_lim',colorprofe = '$col_pro_lim',colorfon = '$col_fon_lim',colorpie = '$col_pie_lim' WHERE username = '$user'");

                        if ($result3) {
                        //redirigir con un mensaje para que tome los cambios de colores
                          //echo '<script>alert("Datos actualizados correctamente."); window.location.href = "ver_tarjeta.php";</script>';
                          echo '<script>window.location.href = "ver_tarjeta.php";</script>';
                        } else {
                          echo "Error de actualizacion: " . $result3 . "<br>" . mysqli_error($conexion);
                          return;
                        }
                    }?>
                </form>
            </div>
            <!-- /////////////////////////////////////////////////////////////////////////////////////////////// -->
            <!-- ///////////////////// ESTRUCTURA DE MODIFICACION DE AVATARES ////////////////////////////////// -->

            <div id="caro_ava" style="display: none;" class="container_avatar_config">
                <?php 
                if (strlen($result2['avatar']) == 12) {
                    $filtro = 'img' . substr($result2['avatar'],7,1); //permitira marcar el avatar del usuario cargado en BD del 1 al 9
                } else {
                    $filtro = 'img' . substr($result2['avatar'],7,2); //permitira marcar el avatar del usuario cargado en BD a partir del 10
                }
                include("actualiza_avatar.php"); //incluye el archivo
                ?>
            </div>
        </div>
        
        <!-- Panel de activación de botones independientes -->
        <div><br>       
            <div class="btn_div_config">
                <p><input type = "submit" id="btn_camb" onclick="toggleDiv()" class ="btn_enviar" value ="Cambiar avatar"></p>
                <p><input type = "submit" id="btn_camb2" onclick="toggleDiv()" class ="btn_enviar" value ="Cambiar colores"></p>

                <form onsubmit="return confirm('¿Realmente desea eliminar el registro?');" method="POST"><input type = "submit" name="elimina" class ="btn_enviar" value ="Eliminar mi tarjeta">
                    <?php
                    if (isset($_POST['elimina'])) {
                        $result4 = $conexion->query("DELETE FROM tarjetas WHERE username = '$user'");
                        if ($result4) {
                            //elimina tarjeta y redirigir a la pagina principal
                            echo '<script>window.location.href = "dashboard.php";</script>';
                        } else {
                            echo "Error de eliminacion de tarjeta: " . $result4 . "<br>" . mysqli_error($conexion);
                            return;
                        }
                    } ?>
                </form>
                <?php $conexion->close(); ?>
                <p><a href="dashboard.php"><button class ="btn_enviar">Regresar</button></a></p>
            </div>
        </div>
        <br>

    </section>
</body>
</html>
