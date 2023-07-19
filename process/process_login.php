<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (!empty($_POST['email']) && !empty($_POST['password'])) {

        require '../utils/db_connect.php';

        $request = $db->prepare("SELECT * FROM users WHERE email = :email AND password = :password");
        $request->execute([
            "email" => $_POST["email"],
            "password" => $_POST["password"]
        ]);
        $response = $request->fetch();

        if ($response) {

            $token = bin2hex(random_bytes(32));

            $request = $db->prepare("UPDATE users SET token = :token WHERE email = :email AND password = :password");
            $request->execute([
                "token" => $token,
                "email" => $response['email'],
                "password" => $response['password']
            ]);

            // On met le token en cookie, il est supprimé après 1h
            setcookie("token", $token, time() + 3600);

            // On crée une variable de session avec l'id de la personne connectée
            $_SESSION['id'] = $response['id'];

            // On sélectionne le profil lié à l'id de la session, pour mettre en session son avatar et la description
            $request = $db->prepare("SELECT * FROM profils WHERE id_user = :id_user");
            $request->execute([
                'id_user' => $response['id']
            ]);
            $profil = $request->fetch();

            // On met une photo de profil par défaut si l'utilisateur n'en a pas
            $avatar = ($profil['avatar_link'] == NULL) ? '.\uploads\avatars\user1.png' : $profil['avatar_link'];

            // On crée des variables de session avec l'avatar et la description de la personne connectée
            // $_SESSION['avatar_link'] = $profil['avatar_link'];
            $_SESSION['avatar_link'] = $avatar;
            $_SESSION['description'] = $profil['description'];


            header("Location: ../index.php ");
            exit();
            
        } else {
            echo "Email ou mot de passe incorrect";
        }
    }
}
?>