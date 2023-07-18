<?php require('../utils/db_connect.php'); ?>

<?php
if(isset($_POST['ok'])) {

    $request = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $request->execute([
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => $_POST['password']
        ]);

    $id_user = $db->lastInsertId(); // On récupère l'id de l'user qu'on vient d'insérer

    $request = $db->prepare("INSERT INTO profils (id_user) VALUES (:id_user)");
    $request->execute([
            "id_user" => $id_user
        ]);

    echo "Enregistrement effectué avec succès.";
}


?>
