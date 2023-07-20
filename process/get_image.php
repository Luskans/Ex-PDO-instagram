<?php

require('./utils/db_connect.php');

// On récupère toutes les infos de l'image selon l'id reçu en get
$request = $db->prepare('SELECT * FROM images WHERE id = :id');
$request->execute([
    'id' => $_GET['id']
]);
$image = $request->fetch();

// On récupère toutes les infos du profil selon l'id_user de l'image
$request = $db->prepare('SELECT * FROM profils WHERE id_user = :id_user');
$request->execute([
    'id_user' => $image['id_user']
]);
$profil = $request->fetch();

// On récupère tous les commentaires selon l'id de l'image
$request = $db->prepare('SELECT * FROM comments WHERE id_image = :id_image ORDER BY date DESC');
$request->execute([
    'id_image' => $image['id']
]);
$comments = $request->fetchAll();

// On récupère tous les auteurs des commentaires selon l'id_user du commentaire
$request = $db->prepare('SELECT * FROM comments WHERE id_image = :id_image');
$request->execute([
    'id_image' => $image['id']
]);
$autor_comment = $request->fetchAll();

?>