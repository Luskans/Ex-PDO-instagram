<?php require('../utils/db_connect.php'); ?>

<?php
if(isset($_POST['ok'])) {
    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $request = $db->prepare("INSERT INTO users VALUES (0, :nom, :email, :pass)");
    $request->execute(
        array(
            "nom" => $nom,
            "email" => $email,
            "pass" => $pass
        )
    );

    // La ligne suivante est supprimée car il n'y a pas de résultat à récupérer lors d'une insertion.

    echo "Enregistrement effectué avec succès.";
}
?>
