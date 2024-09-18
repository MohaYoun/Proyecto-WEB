<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Objeto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="../../css/stylesLogin.css">
</head>

<body>
    <header>
        <?php

        require('../dbConnection/dbConnection.php');
        require('../AccesoDenegado/denegarAcceso.php');
        include('../Header/header.php');
        if (isset($_COOKIE['idioma'])) {
            $idioma = $_COOKIE['idioma'];
        } else {
            $idioma = "Idioma no establecido";
        }

        ?>
    </header>
    <?php


    if (isset($_GET['error'])) {
        $error = $_GET['error'];
    } else {
        $error = "";
    }

    $id = $_POST['id'];
    $tabla = $_POST['tabla'];
    $colm1 = $_POST['colum1'];
    $colm2 = $_POST['colum2'];
    $colm3 = $_POST['colum3'];

    if (isset($_POST[""])) {
        header("Location: ../Home/Home.php");
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
        if ($tabla == 'ejercicios') {
            $stmt = $conn->prepare("SELECT * FROM ejercicios where id = ?");
            $stmt->execute([$id]);
            $result = $stmt->fetchAll();
            $campo1 = $result[0]['Nombre'];
            $campo2 = $result[0]['Tipo'];
            $campo3 = $result[0]['Musculo'];
            $campoId = $result[0]['id'];
            if ($stmt->rowCount() < 1) {
                echo "Ha fallado";
            }
        } elseif ($tabla == 'suplementacion') {
            $stmt = $conn->prepare("SELECT * FROM suplementacion where id = ?");
            $stmt->execute([$id]);
            $result = $stmt->fetchAll();
            $campoId = $result[0]['id'];
            $campo1 = $result[0]['Nombre'];
            $campo2 = $result[0]['Marca'];
            $campo3 = $result[0]['Descripcion'];
            if ($stmt->rowCount() < 1) {
                echo "Ha fallado";
            }
        } elseif ($tabla == 'gimnasios') {
            $stmt = $conn->prepare("SELECT * FROM gimnasios where id = ?");
            $stmt->execute([$id]);
            $result = $stmt->fetchAll();
            $campoId = $result[0]['id'];
            $campo1 = $result[0]['Nombre'];
            $campo2 = $result[0]['Ubicacion'];
            $campo3 = $result[0]['Valoracion'];
            if ($stmt->rowCount() < 1) {
                echo "Ha fallado";
            }
        } elseif ($tabla == 'maquinas') {
            $stmt = $conn->prepare("SELECT * FROM maquinas where id = ?");
            $stmt->execute([$id]);
            $result = $stmt->fetchAll();
            $campoId = $result[0]['id'];
            $campo1 = $result[0]['Nombre'];
            $campo2 = $result[0]['Tipo'];
            $campo3 = $result[0]['Descripcion'];
            if ($stmt->rowCount() < 1) {
                echo "Ha fallado";
            }
        }
    }
    ?>
    <h1><?php echo ($idioma == "es") ? "Edicion de datos" : "Data editing"; ?></h1>
    <div class="mb-3 form-check">
        <table class="table table-striped">

            <div class="container">
                <form action="updateObjeto.php" method="post" id="modObjectFrom">
                    <?php
                    if ($colm1 === "Nombre") {
                        ($idioma == "es") ? $colm1 = "Nombre" : $colm1 = "Name";
                    }
                    if ($colm1 === "Tipo") {
                        ($idioma == "es") ? $colm1 = "Tipo" : $colm1 = "Type";
                    }
                    if ($colm1 === "Musculo") {
                        ($idioma == "es") ? $colm1 = "Musculo" : $colm1 = "Muscle";
                    }
                    if ($colm1 === "Marca") {
                        ($idioma == "es") ? $colm1 = "Marca" : $colm1 = "Brand";
                    }
                    if ($colm1 === "Descripcion") {
                        ($idioma == "es") ? $colm1 = "Descripcion" : $colm1 = "Description";
                    }
                    if ($colm1 === "Ubicacion") {
                        ($idioma == "es") ? $colm1 = "Ubicacion" : $colm1 = "Location";
                    }
                    if ($colm1 === "Valoracion") {
                        ($idioma == "es") ? $colm1 = "Valoracion" : $colm1 = "Rating";
                    }
            if ($colm2 === "Nombre") {
                ($idioma == "es") ? $colm2 = "Nombre" : $colm2 = "Name";
            }
            if ($colm2 === "Tipo") {
                ($idioma == "es") ? $colm2 = "Tipo" : $colm2 = "Type";
            }
            if ($colm2 === "Musculo") {
                ($idioma == "es") ? $colm2 = "Musculo" : $colm2 = "Muscle";
            }
            if ($colm2 === "Marca") {
                ($idioma == "es") ? $colm2 = "Marca" : $colm2 = "Brand";
            }
            if ($colm1 === "Descripcion") {
                ($idioma == "es") ? $colm2 = "Descripcion" : $colm2 = "Description";
            }
            if ($colm2 === "Ubicacion") {
                ($idioma == "es") ? $colm2 = "Ubicacion" : $colm2 = "Location";
            }
            if ($colm2 === "Valoracion") {
                ($idioma == "es") ? $colm2 = "Valoracion" : $colm2 = "Rating";
            }
            if ($colm3 === "Nombre") {
                ($idioma == "es") ? $colm2 = "Nombre" : $colm2 = "Name";
            }
            if ($colm3 === "Tipo") {
                ($idioma == "es") ? $colm3 = "Tipo" : $colm3 = "Type";
            }
            if ($colm3 === "Musculo") {
                ($idioma == "es") ? $colm3 = "Musculo" : $colm3 = "Muscle";
            }
            if ($colm3 === "Marca") {
                ($idioma == "es") ? $colm3 = "Marca" : $colm3 = "Brand";
            }
            if ($colm3 === "Descripcion") {
                ($idioma == "es") ? $colm3 = "Descripcion" : $colm3 = "Description";
            }
            if ($colm3 === "Ubicacion") {
                ($idioma == "es") ? $colm3 = "Ubicacion" : $colm3 = "Location";
            }
            if ($colm3 === "Valoracion") {
                ($idioma == "es") ? $colm3 = "Valoracion" : $colm3 = "Rating";
            }
                    ?>
                    <tr>
                        <th><label for="" class="form-check-label"><?php echo $colm1 ?></label></th>
                        <td><input type="text" name="camp1" id="cp1" value='<?php echo $campo1 ?>' class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <th><label for="" class="form-check-label"><?php echo $colm2 ?></label></th>
                        <td><input type="text" name="camp2" id="cp2" value='<?php echo $campo2 ?>' class="form-control">
                        </td>
                    </tr>
                    <tr>
                        <th><label for="" class="form-check-label"><?php echo $colm3 ?></label></th>
                        <td><input type="text" name="camp3" id="cp3" value='<?php echo $campo3 ?>' class="form-control">
                        </td>
                    </tr>
            </div>
        </table>
        <input type="hidden" name="campId" value='<?php echo $campoId ?>' id="cmp1"><br>
        <input type="hidden" name="tabla" value='<?= $tabla ?>' id="cmp2">
        <input type="hidden" name="Id" value='<?= $id ?>' id="cmp3">
        <button type="submit" id="btAceptar"
            class="btn btn-success"><?php echo ($idioma == "es") ? "Aceptar" : "Accept"; ?></button>
        <button type="button" id="btVuelta"
            class="btn btn-primary"><?php echo ($idioma == "es") ? "Volver" : "Return"; ?></button>
        <div id="msgError">
            <?php if (!empty($error)) {
                echo $error;
            }
            ?>
        </div>
        </form>
        <script src="../../js/editObjetos.js"></script>
    </div>
</body>

</html>