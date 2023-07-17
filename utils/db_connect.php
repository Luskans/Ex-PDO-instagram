<?php 

$dns = 'mysql:hpst=localhost;dbname=instakilo';
$user ='root';
$password = '';

try{
    $db = new PDO($dns, $user, $password);
}
catch (Exception $message){
    echo "Error:"  . "<pre> $message </pre>";
}

?>