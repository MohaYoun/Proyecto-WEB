<?php
require_once("../dbConnection/dbConnection.php");

try {
  $passOLD = hash("sha256", $_POST["pwOLD"]);
  $stmt_comprobar = $conn->prepare("SELECT password FROM usuarios WHERE email = :mail");
  $stmt_comprobar->bindParam(':mail', $_POST["mail"]);
  $stmt_comprobar->execute();
  $resultado_comprobar = $stmt_comprobar->fetch();
  if (!empty($_POST["pwNEW"])) {
    if ($resultado_comprobar["password"] == $passOLD) {
      $stmt = $conn->prepare("UPDATE usuarios SET username = :user, localidad = :local, provincia = :prov, password = :pwNEW WHERE correoElectronico = :mail AND password = :pwOLD");
      $stmt->bindParam(':user', $_POST["user"]);
      $stmt->bindParam(':local', $_POST["local"]);
      $stmt->bindParam(':prov', $_POST["prov"]);
      $stmt->bindParam(':pwOLD', hash("sha256", $_POST["pwOLD"]));
      $stmt->bindParam(':pwNEW', hash("sha256", $_POST["pwNEW"]));
      $stmt->bindParam(':mail', $_POST["mail"]);
      $stmt->execute();
      $_SESSION['usuario'] = $_POST['user'];
      header("Location: ../Home/Home.php");
      die();
    } else {
      header("Location: cambiarDatos.php?error=La clave actual no coincide con la almacenada en el sistema.");
      die();
    }
  } else {
    if ($resultado_comprobar["password"] == $passOLD) {
      $stmt = $conn->prepare("UPDATE usuarios SET username = :user, localidad = :local, provincia = :prov WHERE email = :mail and password = :pwOLD");
      $stmt->bindParam(':user', $_POST["user"]);
      $stmt->bindParam(':local', $_POST["local"]);
      $stmt->bindParam(':prov', $_POST["prov"]);
      $stmt->bindParam(':mail', $_POST["mail"]);
      $stmt->bindParam(':pwOLD', hash("sha256", $_POST["pwOLD"]));
      $stmt->execute();
      $_SESSION['usuario'] = $_POST['user'];
      header("Location: ../Home/Home.php");
      die();
    } else {
      header("Location: cambiarDatos.php?error=La clave actual no coincide con la almacenada en el sistema.");
      die();
    }
  }
} catch (PDOException $e) {
  echo "Error: " . $e->getMessage();
}
$conn = null;
