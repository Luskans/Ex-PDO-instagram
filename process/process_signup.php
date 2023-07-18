<?php require('../utils/db_connect.php'); ?>

<?php
if(isset($_POST['ok'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $token = bin2hex(random_bytes(32));

    $request = $db->prepare("INSERT INTO users (name, email, password, token) VALUES (:name, :email, :password, :token)");
    $request->execute([
        "name" => $name,
        "email" => $email,
        "password" => $password,
        "token" => $token
    ]);

    header("Location: ../login.php");
    exit();
}
?>
