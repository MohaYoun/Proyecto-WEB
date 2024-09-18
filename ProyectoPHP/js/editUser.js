window.onload = iniciar

function iniciar(){
document.getElementById("new2").addEventListener("keyup",comprobar,false)
document.getElementById("botonAceptarCambios").addEventListener("click",botonEnviar,false)
document.getElementById("botonVolver").addEventListener("click",botonVuelta,false)
document.getElementById("lc").addEventListener("keyup",comprobarVacio,false)
document.getElementById("pv").addEventListener("keyup",comprobarVacio,false)
}
function comprobar(){
    passnew = document.getElementById("new").value
    passold = document.getElementById("new2").value
    if(passnew != passold)
    {
        document.getElementById("msgError").innerHTML="Las contraseñas nuevas no coinciden."
        return false
    }
    else
    {
        document.getElementById("msgError").innerHTML=""
        return true
    }
}
function botonEnviar(event)
{
    if(!comprobar()){
        console.log("La comprobacion a salido mal");
        event.preventDefault();
    }else {
        console.log("La comprobacion a salido bien");
        document.getElementById("modUserForm").submit();
    }
}
function botonVuelta() {
    console.log("Botón Volver clickeado");
    window.location.href = "../Home/Home.php";
}
function comprobarVacio(){
    let localidad = document.getElementById('lc').value;
    let provincia = document.getElementById('pv').value;
    if (localidad !== "" && provincia !== "") {
        document.getElementById("msgError").innerHTML = "";
        return true;
    } else {
        document.getElementById("msgError").innerHTML = "Los campos Localidad u Provicia no pueden estar vacíos.";
        return false;
    }
}