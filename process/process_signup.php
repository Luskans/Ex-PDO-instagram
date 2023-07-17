<?php require('../utils/db_connect.php'); ?>

<?php
if(isset($_POST['ok'])) {

    $request = $db->prepare("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)");
    $request->execute([
            "name" => $_POST['name'],
            "email" => $_POST['email'],
            "password" => $_POST['password']
        ]);

    echo "Enregistrement effectué avec succès.";
}


?>
