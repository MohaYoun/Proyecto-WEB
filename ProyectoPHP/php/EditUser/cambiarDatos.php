<!-- cambiarDatos.php-->
<?php
require('../dbConnection/dbConnection.php');
require('../AccesoDenegado/denegarAcceso.php');


if (!isset($_SESSION["login"])) {
    header("Location: ../Login/Login.php");
}
if (isset($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = "";
}
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :userMail");
$stmt->bindParam(':userMail', $_SESSION["email"]);
$stmt->execute();
$resultado = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Datos usuario</title>
    <link rel="stylesheet" href="../../css/stylesLogin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</head>

<body>
    <header>
        <?php
        include('../Header/header.php');
        if (isset($_COOKIE['idioma'])) {
            $idioma = $_COOKIE['idioma'];
        } else {
            $idioma = "Idioma no establecido";
        }

        ?>
    </header>
    <div class="container-sm">
        <div class="mb-3 form-check">
            <table class="table table-striped">
                <h1><?php echo ($idioma == "es") ? "Perfil de usuario" : "User profile"; ?></h1>
                <form id="modUserForm" action="modUser.php" method="post">
                    <tr>
                        <th><label class="form-check-label">Email</label></th>
                        <td><input type="mail" name="mail" readonly value="<?php echo $_SESSION["email"] ?>"
                                class="form-control"></td>
                    </tr>
                    <tr>
                        <th><label
                                class="form-check-label"><?php echo ($idioma == "es") ? "Usuario: " : "Username: "; ?></label>
                        </th>
                        <td><input type="text" name="user" id="" value="<?php echo $_SESSION["usuario"] ?>"
                                class="form-control"></td>
                    </tr>
                    <tr>
                        <th><label
                                class="form-check-label"><?php echo ($idioma == "es") ? "Contraseña actual: " : "Current password: "; ?></label>
                        </th>
                        <td><input type="password" name="pwOLD" id="old" class="form-control"></td>
                    </tr>
                    <tr>
                        <th><label
                                class="form-check-label"><?php echo ($idioma == "es") ? "Contraseña nueva: " : "New password: "; ?></label>
                        </th>
                        <td><input type="password" name="pwNEW" id="new" class="form-control"></td>
                    </tr>
                    <tr>
                        <th><label
                                class="form-check-label"><?php echo ($idioma == "es") ? "Repetir contraseña nueva: " : "Repeat new password: "; ?></label>
                        </th>
                        <td><input type="password" name="pwNEW" id="new2" class="form-control"></td>
                    </tr>
                    <tr>
                        <th><label
                                class="form-check-label"><?php echo ($idioma == "es") ? "Localidad" : "Location"; ?></label>
                        </th>
                        <td><input type="text" name="local" id="lc" value="<?php echo $resultado[0]["localidad"] ?>"
                                class="form-control"></td>
                        </td>
                    </tr>
                    <tr>
                        <th><label
                                class="form-check-label"><?php echo ($idioma == "es") ? "Provincia" : "Province"; ?></label>
                        </th>
                        <td><input type="text" name="prov" id="pv" value="<?php echo $resultado[0]["provincia"] ?>"
                                class="form-control"></td>
                    </tr>
            </table>
            <div id="msgError">
                <?php if (!empty($error)) {
                    echo $error;
                }
                ?>
            </div>
            <input type="submit" id="botonAceptarCambios"
                value=<?php echo ($idioma == "es") ? "Aceptar cambios" : "Accept changes"; ?> class="btn btn-success">
            <input type="button" id="botonVolver" value=<?php echo ($idioma == "es") ? "Volver" : "Return"; ?>
                class="btn btn-primary">
            </form>
        </div>
        <script src="../../js/editUser.js"></script>
    </div>
</body>
</html>