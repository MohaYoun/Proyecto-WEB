    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" type="text/css" href="../../css/stylesLogin.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="icon" href="../../img/casa.png">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
        <script src="../../js/delete.js" type="text/javascript"></script>
    </head>

    <body>

        <?php
        require('../dbConnection/dbConnection.php');
        require('../AccesoDenegado/denegarAcceso.php');
        ?>
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

        <h1 class="cabecera"><?php echo ($idioma == "es") ? "Contenido de tablas" : "Table content"; ?></h1>
        <br>
        <center>
            <div class="ContendorBotonesTablas">
                <button class="btn btn-warning"
                    onclick="cargarTabla('ejercicios')"><?php echo ($idioma == "es") ? "Ejercicios" : "Exercises"; ?>
                </button>
                <button class="btn btn-primary"
                    onclick="cargarTabla('suplementacion')"><?php echo ($idioma == "es") ? "Suplementacion" : "Supplementation"; ?></button>
                <button class="btn btn-warning"
                    onclick="cargarTabla('gimnasios')"><?php echo ($idioma == "es") ? "Gimnasios" : "Gyms"; ?></button>
                <button class="btn btn-primary"
                    onclick="cargarTabla('maquinas')"><?php echo ($idioma == "es") ? "Maquinas" : "Machines"; ?></button>
            </div>
        </center>
        <div class="mb-3 form-check" id="login">
            <div id="tablaContenedor"></div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="../../js/CargaTabla.js"></script>

        <script>
        $(document).ready(function() {
            const urlParams = new URLSearchParams(window.location.search);
            const tabla = urlParams.get('tabla');

            if (tabla) {
                cargarTabla(tabla);
            }
        });
        </script>
    </body>


    </html>