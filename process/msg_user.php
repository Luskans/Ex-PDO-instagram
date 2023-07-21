<?php 
session_start();
require('../utils/db_connect.php');

if(isset($_POST['send'])) {
    if(!empty($_POST['name'])) {
        $recupUser =$db->prepare('SELECT * FROM users WHERE name = ?');
        $recupUser->execute(array($_POST['name']));

        if($recupUser->rowCount()>0) {
            $_SESSION['name'] = $POST['name'];
            $_SESSION['id'] = $recupUser->fetch()['id'];
            header('Location:../message.php');

         } else{
                echo 'Aucun utilisateur trouvé';
            }
        }else {
            echo 'Veuillez vous connecter';
        }
    }




?>



<form action="" method="POST">

<input type="text" name="name">
<br>
<input type="submit" name="send"> 
</form>
<section id="messages"></section>