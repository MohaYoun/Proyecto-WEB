<?php
include("../dbConnection/dbConnection.php");
var_dump($_POST);
$id = $_POST['Id'];
$tabla = $_POST['tabla'];

if (isset($_POST[""])) {
    header("Location: ../Home/Home.php");
    die();
} else {
    if ($tabla === 'ejercicios') {
        $stmt = $conn->prepare("UPDATE ejercicios SET Nombre = ?, Tipo = ?, Musculo = ? WHERE id = ?");
        $stmt->execute([$_POST["camp1"], $_POST["camp2"], $_POST["camp3"], $_POST["campId"]]);
        $result = $stmt->fetchAll();
        var_dump($result);
        header("Location: ../Home/Home.php?tabla=" . $tabla);
        if ($stmt->rowCount() < 1) {
            echo "Ha fallado";
        }
        die();
    } elseif ($tabla === 'suplementacion') {
        $stmt = $conn->prepare("UPDATE suplementacion SET Nombre = ?, Marca = ?, Descripcion = ? WHERE id = ?");
        $stmt->execute([$_POST["camp1"], $_POST["camp2"], $_POST["camp3"], $_POST["campId"]]);
        $stmt->execute();
        $result = $stmt->fetchAll();
        header("Location: ../Home/Home.php" . $tabla);
        if ($stmt->rowCount() < 1) {
            echo "Ha fallado";
        }
    } elseif ($tabla === 'gimnasios') {
        $stmt = $conn->prepare("UPDATE gimnasios SET Nombre = ?, Ubicacion = ?, Valoracion = ? WHERE id = ?");
        $stmt->execute([$_POST["camp1"], $_POST["camp2"], $_POST["camp3"], $_POST["campId"]]);
        $stmt->execute();
        $result = $stmt->fetchAll();
        header("Location: ../Home/Home.php?tabla=" . $tabla);
        if ($stmt->rowCount() < 1) {
            echo "Ha fallado";
        }
    } elseif ($tabla === 'maquinas') {
        $stmt = $conn->prepare("UPDATE maquinas SET Nombre = ?, Tipo = ?, Descripcion = ? WHERE id = ?");
        $stmt->execute([$_POST["camp1"], $_POST["camp2"], $_POST["camp3"], $_POST["campId"]]);
        $stmt->execute();
        $result = $stmt->fetchAll();
        header("Location: ../Home/Home.php?tabla=" . $tabla);
        if ($stmt->rowCount() < 1) {
            echo "Ha fallado";
        }
    }
    header("Location: ../Home/Home.php?tabla=" . $tabla);
    die();
}
$conn = null;
