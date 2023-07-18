<?php require('../utils/db_connect.php'); ?>

<?php

if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {

    $token = bin2hex(random_bytes(32));

    $request = $db->prepare("INSERT INTO users (name, email, password, token) VALUES (:name, :email, :password, :token)");
    $request->execute([
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "token" => $token
        ]);

    $id_user = $db->lastInsertId(); // On récupère l'id de l'user qu'on vient d'insérer

    $request = $db->prepare("INSERT INTO profils (id_user) VALUES (:id_user)");
    $request->execute([
            'id_user' => $id_user
        ]);

    header("Location: ../login.php");
}


?>
