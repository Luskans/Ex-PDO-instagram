<?php
session_start();

if (isset($_FILES['image']) && (isset($_POST['description']))) {

    require('../utils/db_connect.php');

    $tmpName = $_FILES['image']['tmp_name'];
    $name = $_FILES['image']['name'];
    $size = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];

    $tabExtension = explode('.', $name);    // on sépare dans un tableau le nom du fichier selon le point
    $extension = strtolower(end($tabExtension));    // on récupère la fin du tableau donc l'extension
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];    // tableau des extensions acceptées
    $maxSize = 500000;  // taille de 5mo maximum

    if ((in_array($extension, $extensions)) && ($size <= $maxSize) && $error == 0) {
        $uniqueName = uniqid('', true); // on génère un nom unique
        $file = $uniqueName.".".$extension; // notre fichier prendra ce nom

        move_uploaded_file($tmpName, '../uploads/pictures/'.$file);    // upload le fichier dans le dossier créé

        // on insère dans la database les informations de l'image
        $request = $db->prepare('INSERT INTO images (id_user, link, description, date) VALUES (?, ?, ?, NOW())');
        $request->execute([
            $_SESSION['id'],
            '../uploads/pictures/'.$file,
            // 'C:\Users\Sylvain\Documents\Exercices\Exo-PHP-Instagram\Exercice-php-instagram\uploads\pictures',
            $_POST['description']
        ]);
        
        header('Location: ../index.php');
    }
    else {
        echo "Fichier non correct.";
    }



    // if (!in_array($extension, $extensions)) {
    //     echo "Veuillez joindre une photo au format jpg, jpeg, png ou gif.";
    // } else if ($size >= $maxSize) {
    //     echo "Veuillez joindre une photo de taille 5 mo au maximum.";
    // } else if (!$error == 0) {
    //     echo "Erreur dans l'envoi de la photo.";
    // } else {
    //     $uniqueName = uniqid('', true); // on génère un nom unique
    //     $file = $uniqueName.".".$extension; // notre fichier prendra ce nom

    //     move_uploaded_file($tmpName, './uploads/'.$name);

    //     // on insère dans la database les informations de l'image
    //     $request = $db->prepare('INSERT INTO images (id_user, link, description, date) VALUES (?, ?, ?, NOW())');
    //     $request->execute([
    //         $_SESSION['id'],
    //         '../uploads/'.$file,
    //         $_POST['description']
    //     ]);
    //     echo "Image enregistrée";
    // }


} else {
    echo "Veuillez joindre une photo.";
}


?>