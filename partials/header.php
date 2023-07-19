<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instakilo</title>
    <link rel="stylesheet" href="./assets/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body class="d-flex">
    <header>
        <nav class="parent d-flex flex-column gap-3">
            <div class="div1">
                <a class="d-flex" href="#" class="logo"> INSTAKILO </a>
            </div>
            <div class="div2">
                <a class="d-flex" href="../index.php">
                    <img src="../assets/icons/home.png" alt="Icone Accueil">
                    <p> Accueil </p>
                </a>
            </div>
            <div class="div3">
                <a class="d-flex" href="#">
                    <img src="../assets/icons/search.png" alt="rechercher">
                    <p> Recherche </p>
                </a>
            </div>
            <div class="div4">
                <a class="d-flex" href="#">
                    <img src="../assets/icons/message.png" alt="">
                    <p> Messages </p>
                </a>
            </div>
            <div class="div5">
                <a class="d-flex" href="#">
                    <img src="../assets/icons/heart1.png" alt="">
                    <p> Notifications </p>
                </a> 
            </div>
            <div class="div6">
                <a class="d-flex" href="./upload.php">
                    <img src="../assets/icons/create.png" alt="un plus">
                    <p> Ajout </p>
                </a> 
            </div>
            <div class="div7">
                <a class="d-flex" href="./profil.php?id=<?=$_SESSION['id']?>">
                    <img class="avatar_header" src="<?= $_SESSION['avatar_link'] ?>" alt="la photo de profil">
                    <p> Profil </p>
                </a>
            </div>
            <div class="div8">
                <a class="d-flex" href="./process/process_logout.php">
                    <img src="../assets/icons/logout.png" alt="menu hamburger" class="menuhamburger">
                    <p> Déconnexion </p>
                </a> 
            </div>
        </nav>
    </header>