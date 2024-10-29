<?php 
include("policia.php"); 
?>   

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel principal</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="secproces">
        <p>¡Bienvenido(a): <b><?php echo $user;?></b><br>Variedad de profesionales que han creado su diseño de tarjetas de presentación.</p>

        <!--Condiciones en caso que el usuario tenga o no tarjeta -->
        <?php 
        $busqueda = $conexion->query("SELECT * FROM tarjetas WHERE username = '$user'");
        $busqueda2 = $busqueda->fetch_assoc();
        if (!$busqueda2){ 
            echo '<nav> <!-- Menu de navegacion sin tarjeta asignada-->
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li>
                        <a href="#">Contacto</a>
                        <ul class="submenu">
                            <li><a href="actualiza_register.php">Ver mis datos</a></li>
                        </ul>
                    </li> 
                    <!--USO DE LA BARRA INCLINADA INVERTIDA QUE DESACTIVA EL CARACTER ESPECIAL,TRATA LA COMILLA SIMPLE COMO UN CARACTER NORMAL --> 
                    <li><a href="cerrar.php" onclick="return confirm(\'¿Realmente desea salir del sistema?\');">Salir</a></li>
                </ul>
            </nav>
            <form style="width: 50%;" method="POST" action="home.php">
                <button type="submit" class ="btn_das" name="mueshom">¡No tengo tarjeta!</button>
            </form> ';
        } else {
            echo '<nav> <!-- Menu de navegacion con tarjeta asignada-->
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li>
                        <a href="#">Tarjeta</a> <!--esta opcion solo aparecera si el usuario ya tiene su tarjeta -->
                        <ul class="submenu">
                            <li><a href="ver_tarjeta.php">Ver tarjeta</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#">Contacto</a>
                        <ul class="submenu">
                            <li><a href="actualiza_register.php">Ver mis datos</a></li>
                        </ul>
                    </li> 
                    <li><a href="cerrar.php" onclick="return confirm(\'¿Realmente desea salir del sistema?\');">Salir</a></li>
                </ul>
            </nav>
            <br><br>';
        } ?><br>
        
        <!--//////////////////////////////// IMPRIME CUADRO DE CONTENIDO DE TARJETAS ////////////////////////-->
        <div class="carousel_das">
            <?php
            ////// busca en la BD, la cantidad de tarjetas creadas 
            $result = $conexion->query("SELECT *, COUNT(*) OVER() AS cant FROM tarjetas");
            if ($result->num_rows > 0) {

                ////////// Bucle para recorrer la tabla y mostrar todas las tarjetas //////////////////////
                $contador = 0;       
                while ($result2 = $result->fetch_assoc()) {
                    $cantidad = $result2['cant']; //total de tarjetas en BD
                    $contador++;

                    ///////////////////////// Se busca los datos del usuario //////////////////////////////
                    $usern = $result2['username'];
                    $result3 = $conexion->query("SELECT * FROM usuarios WHERE username = '$usern'");
                    $result4 = $result3->fetch_assoc();
                    if (!$result4){
                        echo "Error de carga: " . $result4 . "<br>" . mysqli_error($conexion);
                    }
                    //Encontrar de la subcadena, la posicion (https://) entre el delimitador y luego se extrae
                    $inicio = strpos($result4['url'], "://") + 3;
                    //Imprime la url sin el 'http' o 'https'
                    $url_extra = substr($result4['url'], $inicio);
                    //////////////////////////////////////////////////////////////////////////////////////

                    //crea el primer slide
                    if ($contador == 1) {
                        echo("<div class='slide'>"); //Grupo de tarjetas
                    }?>

                    <!--estructura de la tarjeta -->
                    <div id="micolor3" style="background-color:<?php echo $result2['colorfon'];?>;" class="container_tarj_das">
                        <!--Panel izquierdo -->
                        <div class="tarjet_das">
                            <label id="micolor" style="color:<?php echo $result2['coloruser'];?>;" class="encabez_das"><?php echo $result4['username'];?></label><br>  
                            <label id="micolor2" style="color:<?php echo $result2['colorprofe'];?>;" class="encabez_das_2"><?php echo $result4['profesion'];?></label><br>
                            <label class="linea_das">-------------------------------------------</label>
                            
                            <img class="conten_das" src="img/llamar.png">
                            <label class="eq_content_das"><?php echo $result4['telefono'];?></label><br>
                            
                            <img class="conten_das" src="img/sobre-de-carta.png">
                            <label class="eq_content_das"><?php echo $result4['email'];?></label><br>      
                            
                            <img class="conten_das" src="img/sitio-web.png">
                            <label class="eq_content_das"><?php echo $url_extra;?></label>
                        </div>
                        <!--Panel derecho -->
                        <div><img class="conten_das_avatar" src="img/<?php echo $result2['avatar'];?>"></div>

                        <!-- Pie de la tarjeta -->
                        <div id="micolor4" style="background-color:<?php echo $result2['colorpie'];?>;" class="footer_das">
                            <img class="img_fa_das" src="img/facebook.png">
                            <img class="img_tw_das" src="img/twitter.png">
                            <img class="img_in_das" src="img/instagram.png">
                        </div>
                    </div>

                    <!----------condiciones para indicar crear grupo de slide de 5 tarjetas ----------->
                    <?php if ($contador == $cantidad) {
                        echo("</div>"); //cerrar slide
                        
                    } else {
                        if ($contador % 5 == 0) { //Se verifica si el resto de dividir $contador entre 5 es igual a 0
                            echo("</div>");
                            echo("<div class='slide'>"); //Grupo de tarjetas
                        }
                    }
                }
                /////////////// termina bucle /////////////////////////
            } else {
                echo "<div style='text-align: center;'><span class='error'>No existen tarjetas creadas en el sistema.</span></div>";
            }
            $conexion->close();
            ?>   
        </div><br>

    </section>
</body>
</html>



