<?php
include("../dbConnection/dbConnection.php");
var_dump($_POST);
$tabla = $_POST['tabla'];

if (isset($_POST[""])) {
    header("Location: ../Home/home.php");
    die();
} else {
    if ($tabla == 'Ejercicios' || $tabla == 'Exercises') {
        $stmt = $conn->prepare("INSERT INTO ejercicios (nombre, tipo, musculo) VALUES (?, ?, ?)");
        $stmt->execute([$_POST["Nombre"], $_POST["Tipo"], $_POST["Musculo"]]);
        $result = $stmt->fetchAll();
        $tabla = "ejercicios";
        header("Location: ../Home/home.php?tabla=ejercicios");
        if ($stmt->rowCount() < 1) {
            echo "Ha fallado";
        }
    } elseif ($tabla == 'Suplementacion' || $tabla == 'Supplementation') {
        $stmt = $conn->prepare("INSERT INTO suplementacion (Nombre, Marca, Descripcion) VALUES (?, ?, ?)");
        $stmt->execute([$_POST["Nombre"], $_POST["Marca"], $_POST["Descripcion"]]);
        $result = $stmt->fetchAll();
        $tabla = "suplementacion";
        header("Location: ../Home/home.php?tabla=suplementacion");
        if ($stmt->rowCount() < 1) {
            echo "Ha fallado";
        }
    } elseif ($tabla == 'Gimnasios' || $tabla == 'Gyms') {
        $stmt = $conn->prepare("SELECT * FROM gimnasios");
        $stmt = $conn->prepare("INSERT INTO gimnasios (Nombre, Ubicacion, Valoracion) VALUES (?, ?, ?)");
        $stmt->execute([$_POST["Nombre"], $_POST["Ubicacion"], $_POST["Valoracion"]]);
        $result = $stmt->fetchAll();
        $tabla = "gimnasios";
        header("Location: ../Home/home.php?tabla=gimnasios");
        if ($stmt->rowCount() < 1) {
            echo "Ha fallado";
        }
    } elseif ($tabla == 'Maquinas' || $tabla == 'Machines') {
        $stmt = $conn->prepare("SELECT * FROM maquinas");
        $stmt = $conn->prepare("INSERT INTO maquinas (Nombre, Tipo, Descripcion) VALUES (?, ?, ?)");
        $stmt->execute([$_POST["Nombre"], $_POST["Tipo"], $_POST["Descripcion"]]);
        $result = $stmt->fetchAll();
        $tabla = "maquinas";
        header("Location: ../Home/home.php?tabla=maquinas");
        if ($stmt->rowCount() < 1) {
            echo "Ha fallado";
        }
    }
    header("Location: ../Home/home.php?tabla=" . $tabla);
    die();
}
