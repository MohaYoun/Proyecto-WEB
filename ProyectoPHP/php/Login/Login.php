<?php
if (isset($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = "";
    include('../dbConnection/dbConnection.php');
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="../../css/stylesLogin.css">
    <script type="text/javascript" src="../../js/login.js"></script>
</head>

<body>

    <h1>Acceso a la pagina</h1>

    <form action="../Login/ComprobateLogin.php" method="post" id="formLogin">

        <div class="mb-3 form-check" id="login">
            <label>Email: </label><br><input class="form-control" type="text" name="userMail" id="username"><br>
            <label>Contraseña: </label><br><input class="form-control" type="password" name="pass" id="password">
            <br>
            <div id="msgError">
                <?php if (!empty($error)) {
                    echo $error;
                }
                ?>
            </div><br>
            <div class="button-container">
                <button class="boton-login" type="submit" id="btSubmit">Acceder al sitio</button>
            </div>

        </div>
    </form>

    <div class="mb-3 form-check" id="registro">
        <form action="../CreateUser/createUserWeb.php" method="post">
            <label>Si no dispones de una cuenta puedes registrarte aqui: </label>
            <button class="btn btn-warning btn-right" type="submit">Registrarse</button>
        </form>
    </div>

</body>


</html>