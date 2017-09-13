<?php
require_once('../wp-config.php');
date_default_timezone_set("America/Mazatlan");
echo '<!doctype html>
<html lang="es">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Importar comités</title>
    </head>
    <body>';
    echo '<form enctype="multipart/form-data" action="upload.php" name="forma" method="post">
    Selecciona el excel a importar: <input type="file" name="excel" accept=".csv"><br>
    <input type="submit" class="button" value="Enviar">
    </form>';
    echo '</body>
    </html>';
?>