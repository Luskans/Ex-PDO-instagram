<?php
session_start();

if ($_POST['description'] !== $_SESSION['description']) {

    require('../utils/db_connect.php');

    $request = $db->prepare('UPDATE profils SET description = :description WHERE id_user = :id_user');
    $request->execute([
        'description' => $_POST['description'],
        'id_user' => $_SESSION['id']
    ]);


} if ($_POST['avatar'] !== $_SESSION['avatar_link']) {

    require('../utils/db_connect.php');

    $tmpName = $_FILES['avatar']['tmp_name'];
    $name = $_FILES['avatar']['name'];
    $size = $_FILES['avatar']['size'];
    $error = $_FILES['avatar']['error'];

    $tabExtension = explode('.', $name);    // on sépare dans un tableau le nom du fichier selon le point
    $extension = strtolower(end($tabExtension));    // on récupère la fin du tableau donc l'extension
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];    // tableau des extensions acceptées
    $maxSize = 500000;  // taille de 5mo maximum

    if ((in_array($extension, $extensions)) && ($size <= $maxSize) && $error == 0) {
        $uniqueName = uniqid('', true); // on génère un nom unique
        $file = $uniqueName.".".$extension; // notre fichier prendra ce nom

        move_uploaded_file($tmpName, '../uploads/avatars/'.$file);    // upload le fichier dans le dossier créé


        $request = $db->prepare('UPDATE profils SET avatar_link = :avatar_link WHERE id_user = :id_user');
        $request->execute([
            // 'avatar_link' => 'C:/Users/Sylvain/Documents/Exercices/Exo-PHP-Instagram/Exercice-php-instagram/uploads/avatars/'.$file,
            'avatar_link' => './uploads/avatars/'.$file,
            'id_user' => $_SESSION['id']
        ]);
        // $profil = $request->fetch();
    }
}

header('Location: ../profil.php?id='.$_SESSION['id']);

?>