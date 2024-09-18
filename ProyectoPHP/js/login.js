
window.onload = iniciar;

function iniciar() {
    document.getElementById("btSubmit").addEventListener("click", Submit, false);
}

function Submit(event) {
    let user = document.getElementById("username").value;
    let pass = document.getElementById("password").value;
    let msgError = document.getElementById("msgError");

    if (user != "" && user != null && pass != "" && pass != null) {
        msgError.innerText = "";
    } else {
        event.preventDefault();
        msgError.innerText = "Los campos no estan completos.";
        msgError.style.color = red;
    }
}