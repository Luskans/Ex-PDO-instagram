<?php
session_start(); 

if(!empty($_POST['comment'])) {

    require('../utils/db_connect.php');

    // On récupère toutes les infos de l'image selon l'id reçu en get
    $request = $db->prepare('SELECT * FROM images WHERE id = :id');
    $request->execute([
        'id' => $_GET['id']
    ]);
    $image = $request->fetch();

    $request = $db->prepare('INSERT INTO comments (id_user, id_image, comment, date) VALUES (:id_user, :id_image, :comment, NOW())');
    $request->execute([
            'id_user' => $_SESSION['id'],
            'id_image' => $image['id'],
            'comment' => $_POST['comment']
        ]);

    header('Location: ../image.php?id='.$image['id']);
}


?>