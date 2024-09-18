<?php
include("../dbConnection/dbConnection.php");
$tabla = $_POST['tabla'];
var_dump($tabla);
if (isset($_POST[""])) {
    header("Location: ../home/home.php");
    die();
} else {
    if ($tabla == 'Ejercicios' || $tabla == 'Exercises') {
        $tabla = "ejercicios";
    }
    if ($tabla == 'Gimnasios' || $tabla == 'Gyms') {
        $tabla = "gimnasios";
    }
    if ($tabla == 'Maquinas' || $tabla == 'Machines') {
        $tabla = "maquinas";
    }
    if ($tabla == 'Suplementacion' || $tabla == 'Supplementation') {
        $tabla = "suplementacion";
    }
    $stmt = $conn->prepare("DELETE FROM $tabla WHERE id=?");

    $stmt->execute([$_POST["id"]]);
    $result = $stmt->fetchAll();
    header("Location: ../home/home.php");
    if ($stmt->rowCount() < 1) {
        echo "Ha fallado";
    }
    print_r($result);
    header("Location: ../Home/home.php?tabla=" . $tabla);
    die();
}
