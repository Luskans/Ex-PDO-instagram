<?php
session_start();
require './utils/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if ($email != "" && $password != "") {

        $token = bin2hex(random_bytes(32));
        $request = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $request->execute(array(
            "email" => $email,
            "password" => $password
        ));
        $response = $request->fetch();

        if ($response) {
            $request = $db->prepare("UPDATE users SET token = :token WHERE email = :email AND password = :password");
            $request->execute(array(
                "token" => $token,
                "email" => $email,
                "password" => $password
            ));
            setcookie("token", $token, time() + 3600);
            // Connexion réussie
            header("Location: ./index.php ");
            exit();
        } else {
            $error_msg = "Email ou mot de passe incorrect";
            echo $error_msg;
        }
    }
}
?>

<form class="" action="login.php" method="POST">
    <input type="text" name="email" placeholder="E-mail" required><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit" name="submit">Login</button>
</form>
