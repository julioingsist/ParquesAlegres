<?php
require_once "lib/nusoap.php";
$client = new nusoap_client("http://frasesdesabiduria.org/webservice/server.php");
 
$error = $client->getError();
if ($error) {
    echo "<h2>Error constructor</h2><pre>" . $error . "</pre>";
}
 
$result = $client->call("getFrase");
 
if ($client->fault) {
    echo "<h2>Fault</h2><pre>";
    print_r($result);
    echo "</pre>";
}
else {
    $error = $client->getError();
    if ($error) {
        echo "<h2>Error</h2><pre>" . $error . "</pre>";
    }
    else {
        echo '<pre>';
        echo 'ID: '.$result[0].'<br><br>Contenido: '.$result[1].'<br><br>URL: '.$result[2].'<br><br>Titulo: '.$result[3].'<br><br>Slug: '.$result[4].'<br><br>Categor&iacute;a: '.$result[5].'';
        echo '</pre>';
    }
}
?>