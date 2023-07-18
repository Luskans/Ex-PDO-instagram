<?php
session_start();
require './utils/db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        $token = bin2hex(random_bytes(32));
        $request = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $request->execute(array(
            "email" => $_POST["email"],
            "password" => $_POST["password"]
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
            echo "Email ou mot de passe incorrect";
        }
    }
}
?>

<form class="" action="login.php" method="POST">
    <input type="text" name="email" placeholder="E-mail"><br>
    <input type="password" name="password" placeholder="Password"><br><br>
    <button type="submit" name="submit">Login</button> <br> <br>
</form>
<a href="./signin.php"><button> Sign In </button></a>

