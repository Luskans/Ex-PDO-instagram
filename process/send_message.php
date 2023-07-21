<?php
session_start();
require('../utils/db_connect.php');
if (!$_SESSION['name']) {
    header('Location:./login.php');
}
if(isset($_GET['id']) AND !empty($_GET['id'])){
    $getid = $_GET['id'];
if(isset($_POST['send'])) {
    $message= htmlspecialchars($_POST['message']);
    $insertMessage =$db->prepare('INSERT INTO messages(message,id_sender, id_receiver) VALUES (?, ?, ?)');
    $insertMessage ->execute(array($message, $getid, $_SESSION['id']));
} else{
    echo 'Aucun identifiant trouvé';
}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messagerie privé </title>
</head>

<body>
    <form action="" method="POST">

        <textarea name="message"></textarea>
        <br><br>
        <input type="submit" name="send">
    </form>

    <section id="messages">



    </section>
</body>

</html>