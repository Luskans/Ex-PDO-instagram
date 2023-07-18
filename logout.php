<?php        
session_start();  
// Il faut créer un lien sur les différentes pages qui renvoie sur celle-ci afin de détruire la session et ainsi de déconnecter l'utilisateur.
//session_destroy sert à detruire la session  
session_destroy();  
header("Location : ./login.php");
?>    