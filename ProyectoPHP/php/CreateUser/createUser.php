<?php
require_once("../dbConnection/dbConnection.php");
try {
    $stmt = $conn->prepare("INSERT into usuarios (username, email, password, provincia, localidad, idioma) VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->execute([$_POST['user'], $_POST['email'], hash("sha256", $_POST['pass']), $_POST['provincia'], $_POST['localidad'], $_POST['idioma']]);
    $result = $stmt->fetchAll();


    if (count($result) > 0) {
        header("Location: ../Login/Login.php");
    } else {
        $_SESSION['usuario'] = $_POST['user'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['login'] = true;
        header("Location: ../Home/Home.php");
        if ($_POST['idioma'] == "esp") {
            setcookie("idioma", "es", time() + (86400 * 30), "/");
        } else {
            setcookie("idioma", "en", time() + (86400 * 30), "/");
        }
    }
} catch (PDOException $e) {
    if ($e->errorInfo[1] == 1062) {

        header("Location: ../CreateUser/createUserWeb.php?error=Ya existe el usuario o el correo.");
    } else {

        echo "Error: " . $e->getMessage();
    }
}
$conn = null;
