<?php 
session_start();

require('../utils/db_connect.php') ?>

<?php
if (isset($_GET['id']) and !empty($_GET['id'])) {
    $getid = $_GET['id'];
    $recupUser = $db->prepare('SELECT * FROM users WHERE id= ?');
    $recupUser->execute(array($getid));
    if ($recupUser->rowCount() > 0) {
        if (isset($_POST['send'])) {
            if (!empty($_POST['message'])) {
                $message = nl2br(htmlspecialchars($_POST['message']));

                $insererMessage = $db->prepare('INSERT INTO messages (message, id_sender, id_receiver) VALUES (?, ?, ?)');

                $insererMessage->execute(array($message, $getid, $_SESSION['id']));
            }
        } else {
            echo 'Aucun utilisateur found bitch';
        }
    } else {
        echo 'Aucun utilisateur trouvé';
    }
}


?>