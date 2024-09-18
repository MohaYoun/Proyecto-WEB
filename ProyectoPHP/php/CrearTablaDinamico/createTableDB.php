<?php
include("../dbConnection/dbConnection.php");
if (isset($_COOKIE['idioma'])) {
    $idioma = $_COOKIE['idioma'];
} else {
    $idioma = "Idioma no establecido";
}
$tabla = $_POST['tabla'];
$stmt = null;
if ($tabla === 'ejercicios') {
    $stmt = $conn->prepare("SELECT * FROM ejercicios");
    ($idioma == "es") ? $tabla = "Ejercicios" : $tabla = "Exercises";
} elseif ($tabla === 'suplementacion') {
    $stmt = $conn->prepare("SELECT * FROM suplementacion");
    ($idioma == "es") ? $tabla = "Suplementacion" : $tabla = "Supplementation";
} elseif ($tabla === 'gimnasios') {
    $stmt = $conn->prepare("SELECT * FROM gimnasios");
    ($idioma == "es") ? $tabla = "Gimnasios" : $tabla = "Gyms";
} elseif ($tabla === 'maquinas') {
    $stmt = $conn->prepare("SELECT * FROM maquinas");
    ($idioma == "es") ? $tabla = "Maquinas" : $tabla = "Machines";
}

if ($stmt) {
    $stmt->execute();
    $result = $stmt->fetchAll();


    $columnNames = [];
    for ($i = 0; $i < $stmt->columnCount(); $i++) {
        $columnMeta = $stmt->getColumnMeta($i);
        $columnNames[] = $columnMeta['name'];
    }

?>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr class="columnas">
                    <?php foreach ($columnNames as $columnName) : ?>
                        <?php if ($columnName !== "id") : ?>

                            <?php
                            if ($columnName === "Nombre") {
                                ($idioma == "es") ? $columnPlaceholder = "Nombre" : $columnPlaceholder = "Name";
                            }
                            if ($columnName === "Tipo") {
                                ($idioma == "es") ? $columnPlaceholder = "Tipo" : $columnPlaceholder = "Type";
                            }
                            if ($columnName === "Musculo") {
                                ($idioma == "es") ? $columnPlaceholder = "Musculo" : $columnPlaceholder = "Muscle";
                            }
                            if ($columnName === "Marca") {
                                ($idioma == "es") ? $columnPlaceholder = "Marca" : $columnPlaceholder = "Brand";
                            }
                            if ($columnName === "Descripcion") {
                                ($idioma == "es") ? $columnPlaceholder = "Descripcion" : $columnPlaceholder = "Description";
                            }
                            if ($columnName === "Ubicacion") {
                                ($idioma == "es") ? $columnPlaceholder = "Ubicacion" : $columnPlaceholder = "Location";
                            }
                            if ($columnName === "Valoracion") {
                                ($idioma == "es") ? $columnPlaceholder = "Valoracion" : $columnPlaceholder = "Rating";
                            }
                            ?>
                            <th class="fila"><?= $columnPlaceholder ?></th>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <th class="fila"><?php echo ($idioma == "es") ? "Editar" : "Edit"; ?></th>
                    <th class="fila"><?php echo ($idioma == "es") ? "Borrar" : "Delete"; ?></th>
                </tr>
            </thead>
            <tbody class="columnas">
                <?php if ($result) : ?>
                    <?php foreach ($result as $fila) : ?>
                        <tr id="resultado">
                            <?php foreach ($columnNames as $columnName) : ?>
                                <?php if ($columnName !== "id") : ?>

                                    <td><?= htmlspecialchars($fila[$columnName]) ?></td>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <td>
                                <form action="../EditObjeto/editarObjeto.php" method="post" class="form-inline">
                                    <input type="hidden" name="id" value="<?= $fila["id"] ?>">
                                    <input type="hidden" name="colum1" value="<?= $columnNames[1] ?>">
                                    <input type="hidden" name="colum2" value="<?= $columnNames[2] ?>">
                                    <input type="hidden" name="colum3" value="<?= $columnNames[3] ?>">
                                    <input type="hidden" name="tabla" value="<?= $tabla ?>">
                                    <button type="submit" class="btn btn-primary" name=""><?php echo ($idioma == "es") ? "Editar" : "Edit"; ?></button>
                                </form>
                            </td>
                            <td>
                                <form action="../AccionDelete/deleteObjeto.php" method="post" class="form-inline">
                                    <input type="hidden" name="id" value="<?= $fila["id"] ?>">
                                    <input type="hidden" name="tabla" value="<?= $tabla ?>">
                                    <button type="submit" class="btn btn-danger botonBorrar" name="botonBorrar" onclick="borrarCampo(event)"><?php echo ($idioma == "es") ? "Borrar" : "Delete"; ?></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan=" <?= count($columnNames) - 1 ?>">
                            <?php echo ($idioma == "es") ? "No hay resultados." : "Results not found."; ?>
                        </td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td colspan="<?= count($columnNames) - 1 ?>">
                        <form action="../AccionCreate/createObjeto.php" method="post" class="form-inline">
                            <?php foreach ($columnNames as $columnName) : ?>
                                <?php if ($columnName !== "id") : ?>
                                    <?php if ($columnName === "Nombre") {
                                        ($idioma == "es") ? $columnPlaceholder = "Nombre" : $columnPlaceholder = "Name";
                                    }
                                    if ($columnName === "Tipo") {
                                        ($idioma == "es") ? $columnPlaceholder = "Tipo" : $columnPlaceholder = "Type";
                                    }
                                    if ($columnName === "Musculo") {
                                        ($idioma == "es") ? $columnPlaceholder = "Musculo" : $columnPlaceholder = "Muscle";
                                    }
                                    if ($columnName === "Marca") {
                                        ($idioma == "es") ? $columnPlaceholder = "Marca" : $columnPlaceholder = "Brand";
                                    }
                                    if ($columnName === "Descripcion") {
                                        ($idioma == "es") ? $columnPlaceholder = "Descripcion" : $columnPlaceholder = "Description";
                                    }
                                    if ($columnName === "Ubicacion") {
                                        ($idioma == "es") ? $columnPlaceholder = "Ubicacion" : $columnPlaceholder = "Location";
                                    }
                                    if ($columnName === "Valoracion") {
                                        ($idioma == "es") ? $columnPlaceholder = "Valoracion" : $columnPlaceholder = "Rating";
                                    } ?>


                                    <input type="text" class="form-control mr-2" name="<?= $columnName ?>" placeholder="<?= $columnPlaceholder ?>">
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <input type="hidden" name="tabla" value="<?= $tabla ?>">
                            <button type="submit" class="btn btn-success"><?php echo ($idioma == "es") ? "Crear" : "Create"; ?>
                                <?= $tabla ?></button>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
<?php
} else {
    echo "Error: No se pudo preparar la consulta.";
}
?>