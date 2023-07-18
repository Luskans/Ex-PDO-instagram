<?php

require('./utils/db_connect.php');

// On récupère toutes les images selon le filtre choisi
$request = $db->query('SELECT * FROM images ORDER BY date DESC');
$images = $request->fetchAll();
// var_dump($images);


?>