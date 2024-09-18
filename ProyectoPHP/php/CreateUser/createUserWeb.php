<?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = "";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../../css/stylesCreateUser.css">
    <script type="text/javascript" src="../../js/createUser.js"></script>
</head>

<body>

    <form action="../CreateUser/createUser.php" method="post">

        <h1>Creacion de usuarios</h1>

        <div class="mb-3 form-check">
            <label class="form-check-label">Usuario: </label><input type="text" class="form-control" name="user" id="username">
            <div id="msgErrorNombre" class="msgError">

            </div>


            <label class="form-check-label">Email: </label><input type="text" class="form-control" name="email" id="email">
            <div id="msgErrorEmail" class="msgError">

            </div>


            <label class="form-check-label">Contraseña: </label><input type="password" class="form-control" name="pass" id="password">
            <div id="msgErrorPass" class="msgError">

            </div>


            <label class="form-check-label">Repetir contraseña: </label><input class="form-control" type="password" name="passwordRep" id="passwordRep">
            <div id="msgErrorPassRep" class="msgError">

            </div>


            <label class="form-check-label">Provincia: </label>
            <select class="form-select" id="selectProvincia" name="provincia">
                <option value="value1"></option>
            </select>
            <div id="msgErrorProvincia" class="msgError">

            </div>


            <label class="form-check-label">Localidad: </label>
            <select class="form-select" id="selectLocalidad" name="localidad">
                <option value="value1"></option>
            </select>
            <div id="msgErrorLocalidad" class="msgError">

            </div>


            <label class="form-check-label">Idioma: </label><br>
            <div class="form-radio">
                <input type="radio" name="idioma" value="esp" class="form-check-input" id="esp"><label class="form-check-label">
                    Español</label>
            </div>
            <div class="form-radio">
                <input type="radio" name="idioma" value="eng" class="form-check-input" id="eng"><label class="form-check-label">
                    English</label>
            </div>
            <div id="msgErrorIdioma" class="msgError">

            </div><br>

            <div id="msgError" class="msgError">
                <?php if (!empty($error)) {
                    echo $error;
                }
                ?>
            </div>
            <div class="button-container">
                <button class="boton-crear" type="submit" id="btCrear">Crear usuario</button>
    </form>
    <form action="../Login/Login.php" method="post">
        <button class="boton-volver" type="submit" id="btVolver">Volver al login</button>
        </div>
    </form>

    </div>
</body>


</html>