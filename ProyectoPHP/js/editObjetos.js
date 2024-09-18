window.onload = iniciar

function iniciar(){
    document.getElementById("cp1").addEventListener("keyup",comprobar,false)
    document.getElementById("cp2").addEventListener("keyup",comprobar,false)
    document.getElementById("cp3").addEventListener("keyup",comprobar,false)
    document.getElementById("btAceptar").addEventListener("click",botonEnviar,false)
    document.getElementById("btVuelta").addEventListener("click",botonVuelta,false)
}
function comprobar(){
    campo1 = document.getElementById("cp1").value
    campo2 = document.getElementById("cp2").value
    campo3 = document.getElementById("cp3").value
    if(campo1 != "" && campo2 != "" && campo3 != "")
    {
        document.getElementById("msgError").innerHTML=""
        return true
    }
    else
    {
        document.getElementById("msgError").innerHTML="No se pueden meter campos vacios."
        return false        
    }
}
function botonEnviar(event)
{
    console.log("Botón Enviar clickeado");
    if(!comprobar()){
        console.log("La comprobacion a salido mal");
        event.preventDefault();
    }else{
        console.log("La comprobacion a salido bien");
        document.getElementById("modObjectForm").submit();
    }
}
function botonVuelta() {
    console.log("Botón Volver clickeado");
    window.location.href = "../Home/Home.php";
}