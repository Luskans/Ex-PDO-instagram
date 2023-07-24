<?php
require('./utils/db_connect.php');
if (!$_SESSION['name']) {
    header('Location:./login.php');
}


if (isset($_GET['id']) && !empty($_GET['id'])) {
    $getid = $_GET['id'];
    $recupUser = $db->prepare('SELECT * FROM users WHERE id = ?');
    $recupUser->execute(array($getid));
    if ($recupUser->rowCount() > 0) {
        if (isset($_POST['send'])) {
            $message = htmlspecialchars($_POST['message']);
            $insertMessage = $db->prepare('INSERT INTO messages(message, id_receiver, id_sender) VALUES (?, ?, ?)');
            $insertMessage->execute(array($message, $getid, $_SESSION['id']));
        } 
}
}
?>

