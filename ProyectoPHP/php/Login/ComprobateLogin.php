<?php

require("..\dbConnection\dbConnection.php");
try {
    session_start();
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = :userMail AND password = :pass");
    $stmt->bindParam(':userMail', $_POST['userMail']);
    $stmt->bindParam(':pass', hash("sha256", $_POST['pass']));
    $stmt->execute();

    $result = $stmt->fetchAll();


    if (count($result) > 0) {
        foreach ($result as $row) {
            $usuario = $row['username'];
            $_SESSION['usuario'] = $usuario;
        }
        $_SESSION['email'] = $_POST['userMail'];

        $_SESSION['login'] = true;
        foreach ($result as $row) {
            $idioma = $row['idioma'];
            if ($idioma == "esp") {
                setcookie('idioma', 'es', time() + (86400 * 30), "/");
            } else {
                setcookie('idioma', 'en', time() + (86400 * 30), "/");
            }
        }
        header("Location: ../Home/Home.php");

        $conn = null;
        //die();
    } else {
        header("Location: ../Login/Login.php?error=Usuario no encontrado o contraseña errónea.");
        $conn = null;
        die();
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
