<?php
if (isset($_COOKIE['idioma'])) {
    $idioma = $_COOKIE['idioma'];
} else {
    $idioma = "Idioma no establecido";
}
$apiKey = "eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJqcmFtaXJvYzA0QGdtYWlsLmNvbSIsImp0aSI6IjZmZDM2MDVjLTA2MGUtNGNlNy05NzZhLWY5ODhmYzJkZjZlMCIsImlzcyI6IkFFTUVUIiwiaWF0IjoxNzA3MTYzOTYyLCJ1c2VySWQiOiI2ZmQzNjA1Yy0wNjBlLTRjZTctOTc2YS1mOTg4ZmMyZGY2ZTAiLCJyb2xlIjoiIn0.1GM20Z-HwLaQhrvlHXroMXWIFcdkRFGxvHkhS007huc";
$url = "https://opendata.aemet.es/opendata/api/prediccion/especifica/municipio/diaria/28079/?api_key=eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJqcmFtaXJvYzA0QGdtYWlsLmNvbSIsImp0aSI6IjZmZDM2MDVjLTA2MGUtNGNlNy05NzZhLWY5ODhmYzJkZjZlMCIsImlzcyI6IkFFTUVUIiwiaWF0IjoxNzA3MTYzOTYyLCJ1c2VySWQiOiI2ZmQzNjA1Yy0wNjBlLTRjZTctOTc2YS1mOTg4ZmMyZGY2ZTAiLCJyb2xlIjoiIn0.1GM20Z-HwLaQhrvlHXroMXWIFcdkRFGxvHkhS007huc";

$curl = curl_init();

curl_setopt_array(
    $curl,
    array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "Accept: application/json"
        ),
    )
);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    $data = json_decode($response, true);
    if (!empty($data) && isset($data['datos'])) {
    } else {
        echo "No se encontró el campo 'datos' en la respuesta.";
    }
}
$datosUrl = $data['datos'];

$curl_datos = curl_init();

curl_setopt_array(
    $curl_datos,
    array(
        CURLOPT_URL => $datosUrl,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "Accept: application/json"
        ),
    )
);

$response_datos = curl_exec($curl_datos);
$err_datos = curl_error($curl_datos);
$response_datos = trim($response_datos);
curl_close($curl_datos);

if ($err_datos) {
    echo "cURL Error #:" . $err_datos;
} else {
    $conversorISOUTF8 = mb_convert_encoding($response_datos, "UTF-8", "ISO-8859-15");
    $datos_finales = json_decode($conversorISOUTF8, null);
    $temperatura_maxima = $datos_finales[0]->prediccion->dia[0]->temperatura->maxima;
}

?>


<nav class="navegador">
    <div class="navegacion">
        <ul class="lista">
            <center>
                <li>
                    <h3><?php echo ($idioma == "es") ? "Bienvenido" : "Welcome"; ?> <?php echo  $_SESSION['usuario'] ?>
                    </h3>
                </li>
                <li><?php if (!empty($temperatura_maxima)) : ?>
                        <h4>Madrid
                            <?php echo $temperatura_maxima ?> ºC
                        </h4>
                    <?php else : ?>
                        <p>Datos climáticos no disponibles.</p>
                    <?php endif; ?>
                </li>
                <li><a href="../EditUser/cambiarDatos.php">
                        <h4><?php echo ($idioma == "es") ? "Mis datos" : "My data"; ?></h4>
                    </a></li>
                <li>
                    <h4><?php if (isset($_COOKIE['idioma'])) {
                            echo ($idioma == "es") ? "Idioma: " . $idioma : "Language: " . $idioma;
                        } else {
                            echo ($idioma == "es") ? "Idioma no seleccionado" : "Language not selected";
                        } ?></h4>
                </li>
                <li class="logout"><a href="../Logout/logout.php">
                        <h4><?php echo ($idioma == "es") ? "Cerrar sesion" : "Log out"; ?></h4>
                    </a>
                </li>
            </center>
        </ul>
    </div>
</nav>