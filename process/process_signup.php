<?php require('../utils/db_connect.php'); ?>

<?php
if(isset($_POST['ok'])) {
    
    $token = bin2hex(random_bytes(32));

    $request = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $request->execute([
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => $_POST['password'],
            "token" => $token
        ]);

    $id_user = $db->lastInsertId(); // On récupère l'id de l'user qu'on vient d'insérer

    header("Location: ../login.php");
}


?>
