<?php

require('./utils/db_connect.php');

// On récupère toutes les infos du profil dont l'id est celle reçue dans le get
$request = $db->prepare('SELECT * FROM profils WHERE id_user = :id_user');
$request->execute([
    'id_user' => $_GET['id'],
]);
$profil = $request->fetch();
// var_dump($profil);

// Si des informations ne sont pas remplie dans la base de donnée, on donne des valeurs par défaut
$description = ($profil['description'] == NULL) ? "Entrez ici la description de votre profil..." : $profil['description'];
$avatar = ($profil['avatar_link'] == NULL) ? '.\uploads\avatars\user1.png' : $profil['avatar_link'];
// $avatar = ($profil['avatar_link'] == NULL) ? 'C:\Users\Sylvain\Documents\Exercices\Exo-PHP-Instagram\Exercice-php-instagram\assets\user1.png' : $profil['description'];
// $following = ($profil['nb_following'] == NULL) ? 0 : $profil['nb_following'];
// $followed = ($profil['nb_followed'] == NULL) ? 0 : $profil['nb_followed'];
// $number = ($profil['nb_images'] == NULL) ? 0 : $profil['nb_images'];

?>