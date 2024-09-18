window.onload = iniciar;

function iniciar() {
    document.getElementById("btCrear").addEventListener("click", Crear, false);
    document.getElementById("passwordRep").addEventListener("keyup", comprobarPassIguales, false);
    document.getElementById("selectProvincia").addEventListener("change", cargarSelectLocalidad, false);
    cargarSelectProvincia();
    cargarSelectLocalidad();
}

function cargarSelectProvincia() {
    fetch("../../JSON/Provincias.json")
        .then(response => response.json())
        .then(data => visualizarProvincia(data));
}
function visualizarProvincia(datos) {
    let selectProvincia = document.getElementById("selectProvincia");
    datos.forEach(provincia => {
        let optionProvincia = document.createElement("option");
        optionProvincia.id = provincia.code;
        optionProvincia.value = provincia.label;
        optionProvincia.textContent = `${provincia.label}`;
        selectProvincia.appendChild(optionProvincia);
    })
}

function cargarSelectLocalidad() {
    fetch("../../JSON/Localidades.json")
        .then(response => response.json())
        .then(data => visualizarLocalidad(data));
}

function visualizarLocalidad(datos) {
    let selectLocalidad = document.getElementById("selectLocalidad");
    let provincia = document.getElementById("selectProvincia").options[document.getElementById("selectProvincia").selectedIndex].id;
    let localidadesFiltradas = datos.filter(localidad => localidad.parent_code === provincia);
    selectLocalidad.innerHTML = '';

    localidadesFiltradas.forEach(localidad => {
        let optionLocalidad = document.createElement("option");
        optionLocalidad.id = localidad.code;
        optionLocalidad.value = localidad.label;
        optionLocalidad.textContent = `${localidad.label}`;
        selectLocalidad.appendChild(optionLocalidad);
    })
}

function comprobarNombre(event) {
    let user = document.getElementById("username").value;
    let msgErrorNombre = document.getElementById("msgErrorNombre");
    if (user != "" && user != null) {
        msgErrorNombre.innerText = "";
        return true;
    } else {
        event.preventDefault();
        msgErrorNombre.innerText = "Rellena el campo de nombre.";
        return false;
    }
}

function comprobarPassIguales() {
    let password = document.getElementById('password').value;
    let passwordRep = document.getElementById('passwordRep').value;
    let msgErrorPassRep = document.getElementById('msgErrorPassRep');
    if (password != passwordRep) {
        msgErrorPassRep.innerText = "Las contraseñas no coinciden";
        return false;
    } else {
        msgErrorPassRep.innerText = "";
        return true;
    }
}

function comprobarPassVacia() {
    let password = document.getElementById('password').value;
    let msgErrorPass = document.getElementById('msgErrorPass');
    if (password != null && password != "") {
        msgErrorPass.innerText = "";
        return true;
    } else {
        msgErrorPass.innerText = "Inserta una contraseña.";
        return false;
    }
}

function comprobarEmail(event) {
    let validRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    let email = document.getElementById("email").value;
    let msgErrorEmail = document.getElementById("msgErrorEmail");
    if (validRegex.test(email) && email != "" && email != null) {
        msgErrorEmail.innerText = "";
        return true;
    } else if (validRegex.test(email) == false) {
        msgErrorEmail.innerText = "Inserte un email válido.";
        event.preventDefault();
        return false;
    }
}

function comprobarProvincia() {
    let provincia = document.getElementById("selectProvincia").options[document.getElementById("selectProvincia").selectedIndex].textContent;
    let msgErrorProvincia = document.getElementById("msgErrorProvincia");
    if (provincia != "" && provincia != null) {
        msgErrorProvincia.innerText = "";
        return true;
    } else {
        msgErrorProvincia.innerText = "Selecciona la provincia.";
        return false;
    }
}

function comprobarLocalidad() {
    let localidad = document.getElementById("selectLocalidad").options[document.getElementById("selectLocalidad").selectedIndex].textContent;
    let msgErrorLocalidad = document.getElementById("msgErrorLocalidad");
    if (localidad != "" && localidad != null) {
        msgErrorLocalidad.innerText = "";
        return true;
    } else {
        msgErrorLocalidad.innerText = "Selecciona la localidad.";
        return false;
    }
}

function comprobarIdioma() {
    let esp = document.getElementById("esp").checked;
    let eng = document.getElementById("eng").checked;
    let idioma;
    let msgErrorIdioma = document.getElementById("msgErrorIdioma");
    if (esp) {
        idioma = "Español";
    } else if (eng) {
        idioma = "Ingles"
    }
    if (idioma != "" && idioma != null) {
        msgErrorIdioma.innerText = "";
        return true;
    } else {
        msgErrorIdioma.innerText = "Selecciona el idioma.";
        return false;
    }
}

function Crear(event) {
    let passwordRep = document.getElementById('passwordRep').value;
    if (comprobarNombre(event) != false & comprobarEmail(event) != false & comprobarPassVacia() != false & passwordRep != "" & passwordRep != null & comprobarPassIguales() != false & comprobarProvincia() != false & comprobarLocalidad() != false & comprobarIdioma() != false) {
        msgError.innerText = "";
    } else {
        event.preventDefault();
        msgError.innerText = "Error en los campos, o campos vacios.";

    }
}

