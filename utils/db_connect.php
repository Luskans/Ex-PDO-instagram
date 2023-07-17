<?php 

try {
    $db = new PDO('mysql:host=localhost;dbname=instakilo;charset=utf8','root','', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (\Throwable $th) {
    die('erreur db');
}

?>