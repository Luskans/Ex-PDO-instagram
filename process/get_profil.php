<?php

require('../utils/db_connect.php');

$request = $db->prepare('SELECT * FROM profils WHERE id_user = :id_user');
$request->execute([
    'id_user' => $_GET['id_user']
]);
$response = $request->fetch();

var_dump($response);

// header('Location: ../quizz.php');

?>