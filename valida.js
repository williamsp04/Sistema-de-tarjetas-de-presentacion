/******** Al hacer click, Busca el elemento boton enviar en el html 
y ejecuta el evento, realizando las acciones indicadas en las funciones ******/

function iniciar(){
    var boton = document.getElementById("enviar");
    boton.addEventListener("click", enviarformulario);
}
function enviarformulario(){
    var formulario = document.querySelector("form[name='formulario']");
    let nombre = document.getElementById('usuario').value;
    let clave = document.getElementById('contraseña').value;
                    
    // Validacion campos del login
    if (nombre.trim() === '') {
        alert("El campo usuario no puede estar vacio");
    return;
    }

    if (clave.trim() === '') {
        alert("El campo contraseña no puede estar vacio");
    return;
    }                 
    formulario.submit(); 
}
window.addEventListener("load",iniciar);

///////////////////////////////////////////////
function validarNombre() {
    const nombre = document.getElementById('usuario');
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
function validarClave() {
    const clave = document.getElementById('contraseña');
    // Elimina espacios al inicio y final
    clave.value = clave.value.trim();    
}




