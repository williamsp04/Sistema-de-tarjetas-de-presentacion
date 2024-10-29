///////////////////////////// MODULO VER TARJETA ////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////////

// mostrar y ocultar la paleta de colores
function toggleDiv() {
    const boton = document.getElementById('btn_camb');
    const info = document.getElementById('caro_ava'); //div avatar
    const boton2 = document.getElementById('btn_camb2');
    const info2 = document.getElementById('paleta');  //div paleta de colores

    boton.addEventListener('click', () => {
      info.style.display = 'block';
      info2.style.display = 'none';
    });

    boton2.addEventListener('click', () => {
      info.style.display = 'none';
      info2.style.display = 'block';
    });
}
// Utilizando Fetch API 
function cambiarColor(camb,camb2) {
    const input = document.getElementById([camb]);
    const span = document.getElementById([camb2]);
    const submitButton = document.querySelector('input[name=actualizar]');

    //habilita boton guardar
    submitButton.disabled = false;  
    //cambian el color del boton, Estos eventos se disparan cuando el ratón entra y sale de un elemento,
    submitButton.addEventListener('mouseover', () => {
    submitButton.style.backgroundColor = '#800000'; //rojo oscuro
    });
    submitButton.addEventListener('mouseout', () => {
    submitButton.style.backgroundColor = '#FF0000'; //rojo
    });

    // Realizamos una petición a un archivo PHP para obtener el nuevo color
    fetch("procesar_color.php")
    .then(response => response.text())
    .then(data => {
        input.style.color = data;
        span.value = data; //asigna color al input hidden
        //imprime en consola el color
        //const colorActual = window.getComputedStyle(input).color;
        //console.log(colorActual);
    });
}
function cambiarFondo(camb,camb2) {
    const input = document.getElementById([camb]);
    const span = document.getElementById([camb2]);
    const submitButton = document.querySelector('input[name=actualizar]');

    //habilita boton guardar
    submitButton.disabled = false;  
    //cambian el color del boton, Estos eventos se disparan cuando el ratón entra y sale de un elemento,
    submitButton.addEventListener('mouseover', () => {
    submitButton.style.backgroundColor = '#800000'; //rojo oscuro
    });
    submitButton.addEventListener('mouseout', () => {
    submitButton.style.backgroundColor = '#FF0000'; //rojo
    });

    // Realizamos una petición a un archivo PHP para obtener el nuevo color
    fetch("procesar_color.php")
    .then(response => response.text())
    .then(data => {
        input.style.backgroundColor = data;
        span.value = data; //asigna color al input hidden
        //imprime en consola el color
        //const colorActual = window.getComputedStyle(input).backgroundColor;
        //console.log(colorActual);
    });
}
/////////////////////////////////////////////////////////////////////////
///uso multiple
function validarResp(reval) {
    const respu = document.getElementById([reval]);
    // Elimina espacios al inicio y final
    respu.value = respu.value.trim();    
}
///////////////////////// MODULO REGISTRO Y ACTUALIZACION DE USUARIO //////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////

//valida otra profesion
function validaOtros() {
    var select = document.getElementById("reg_profes2");
    var otro = document.getElementById("proinp2");

    if (select.value === "Otros") {
        otro.style.display = "block";
    } else {
        otro.style.display = "none";
    }
}
function mostrarCampo() {
    var select = document.getElementById("reg_profes");
    var otro = document.getElementById("proinp");
    var submitButton = document.querySelector('input[name=actuaregist]');
    
    submitButton.disabled = false;
    //cambian el color del boton, Estos eventos se disparan cuando el ratón entra y sale de un elemento,
    submitButton.addEventListener('mouseover', () => {
    submitButton.style.backgroundColor = '#FF0000'; //cuando el cursor pasa sobre el elemento.
    });
    submitButton.addEventListener('mouseout', () => {
    submitButton.style.backgroundColor = '#0000ff'; //cuando el cursor se aleja del elemento.
    });

    if (select.value === "Otros") {
        otro.style.display = "block";
    } else {
        otro.style.display = "none";
    }
}
function activarbutton() {
    var submitButton = document.querySelector('input[name=actuaregist]');
    
    submitButton.disabled = false;
    //cambian el color del boton, Estos eventos se disparan cuando el ratón entra y sale de un elemento,
    submitButton.addEventListener('mouseover', () => {
    submitButton.style.backgroundColor = '#FF0000'; //cuando el cursor pasa sobre el elemento.
    });
    submitButton.addEventListener('mouseout', () => {
    submitButton.style.backgroundColor = '#0000ff'; //cuando el cursor se aleja del elemento.
    });
}
//funciones que se activaran al escribir en el input
function validarEmail() {
    const emailInput = document.getElementById('reg_email');
    const errorEmail = document.getElementById('errorEmail');

    // Elimina espacios al inicio y final
    emailInput.value = emailInput.value.trim();

    emailInput.addEventListener('input', () => {
        const emailRegex = /^[^\s@]+@[^\s@]+\.com$/;  //expresiones regulares
        if (!emailRegex.test(emailInput.value)) {
            emailInput.style.color = 'red';
            errorEmail.textContent = 'El email no es válido.';

        } else {
            errorEmail.textContent = '';
            emailInput.style.color = 'blue';
        }
    });
}
//////////////////////////////////////////////
function validarNombre() {
    const nombre = document.getElementById('reg_usuario');
    const errorNombre = document.getElementById('errorNombre');
    // Elimina espacios al inicio y final
    nombre.value = nombre.value.trim();

    if (nombre.value.length < 3) {
        errorNombre.textContent = 'El nombre debe tener al menos 3 caracteres.';
        nombre.style.color = 'red';
    } else {
        errorNombre.textContent = '';
        nombre.style.color = 'blue';
    }
}
////////////////////////////////////////////////
function validarClave() {
    const clave = document.getElementById('reg_clave');
    const errorClave = document.getElementById('errorClave');

    // Elimina espacios al inicio y final
    clave.value = clave.value.trim();
    if (clave.value) {
        errorClave.textContent = 'la clave introducida es: ' + clave.value;
        errorClave.style.color = 'blue';
    } else {
        errorClave.textContent = '';
    }     
}
////////////////////////////////////////////////
function validarTelef(telefono) {
    const telInput = document.getElementById('reg_tel');
    const errorTelef = document.getElementById('errorTel');

    // Elimina espacios al inicio y final
    telInput.value = telInput.value.trim();

    telInput.addEventListener('input', (event) => {
        let input = event.target.value.replace(/\D/g, ''); // Eliminar cualquier caracter que no sea un número
        input = input.substring(0, 12); // Limitar a 12 dígitos (ajustar según el formato deseado)

        // Ejemplo para un formato de teléfono simple (XXX-XXX-XXXX)
        const regex = /^\d{3}-\d{3}-\d{4}$/;
        // Formato XXX-XXX-XXXX (ajustar según el formato deseado)
        let formattedInput = input.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
        
        //indicadores de caracteres introducidos
        if (!regex.test(telInput.value)) {
            telInput.style.color = 'red';
            errorTelef.textContent = 'El numero es invalido';
        } else {
            errorTelef.textContent = '';
            telInput.style.color = 'blue';
        }
        //aplica el formato a los numeros introducidos
        event.target.value = formattedInput;
    });
}
///////////////////////////////////////////////////
function validarURL(url) {
    const urlInput = document.getElementById('reg_web');
    const errorWeb = document.getElementById('errorWeb');

    // Elimina espacios al inicio y final
    urlInput.value = urlInput.value.trim();

    urlInput.addEventListener('input', () => {
        const regexWeb = /^(https?:\/\/)?[\w-]+(\.[\w-]+)+[/#?]?$/;
    
        if (!regexWeb.test(urlInput.value)) {
            urlInput.style.color = 'red';
            errorWeb.textContent = 'El sitio web es invalido';
        } else {
            errorWeb.textContent = '';
            urlInput.style.color = 'blue';
        }
    });
}
/////////////////////////// REGISTRO DE AVATARES ///////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////

/* funcion que permite activar y desactivar filtros en avatares al hacer click en una imagen
   tambien permite activar el boton enviar al seleccionar un avatar */
function cambiarAvatar(e,valor){   
    var img= document.getElementById([valor]); //recibe el parametro ID de la imagen
    //var submitButton = document.querySelector('input[type="submit"]');
    var submitButton = document.querySelector('input[name=activ_btn]');

    img.classList.add('filtroAv');  //muestra estado original avatar
    submitButton.disabled = false;  //habilita boton enviar

    //cambian el color del boton, Estos eventos se disparan cuando el ratón entra y sale de un elemento,
    submitButton.addEventListener('mouseover', () => {
    submitButton.style.backgroundColor = '#FF0000'; //cuando el cursor pasa sobre el elemento.
    });
    submitButton.addEventListener('mouseout', () => {
    submitButton.style.backgroundColor = '#0000ff'; //cuando el cursor se aleja del elemento.
    });
    //aqui empieza a colocar filtro a avatares no seleccionados
    let contador = 0; 
    let nuavatar = 15; //numero de archivo avatares
    while (contador < nuavatar) {
        contador++;
        if (contador !== e) {
            document.getElementById('img' + contador).classList.remove('filtroAv');
        }
    }
    //console.log(contador,'img' + contador);
}
///////////////////////////////////////////////////////////////////////////////////////////////

// OTRO METODO PARA VALIDAR EL ENVIO DE TIPO RADIO
/*const form = document.getElementById('forava');
const submitButton = document.querySelector('input[type="submit"]');

form.addEventListener('submit', (event) => {
  event.preventDefault(); // Evita el envío del formulario por defecto

  // Selecciona todos los grupos de radio buttons (ajusta los nombres según tu HTML)
  const radioGroups = document.querySelectorAll('input[type="radio"]');

  let isValid = true;

  radioGroups.forEach(radio => {
    if (!document.querySelector(`input[name="${radio.name}"]:checked`)) {
      isValid = false;
      //alert('Debes seleccionar una opción');
    }
  });

  if (isValid) {
    // Si todos los grupos tienen una opción seleccionada, envía el formulario
    form.submit();
  }
});*/


