<?php 
session_start();
require('./utils/db_connect.php');
if(!$_SESSION['name']) {
    header('Location:./login.php');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les utilisateurs</title>
</head>
<body>

<?php 

$recupUser =$db->query('SELECT * FROM users');
        while($user = $recupUser-> fetch()) {
          ?>
          <a href="./process/send_message.php?id=<?php echo $user['id'] ?>"> <p><?php echo $user['name'];  ?> <br> </a>  
        <?php } ?>



</body>
</html>

