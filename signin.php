<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>

    <div class="parent2">
        <div class="divsignin">
            <form method="POST" action="/process/add_user.php">
                <h1>Inscrivez-vous</h1>

                <label for="nom"> Votre nom : </label>
                <input type="text" name="name" id="nom" placeholder="Entez votre nom" required>
                <br>
                <label for="email"> Votre adresse mail : </label>
                <input type="text" name="email" id="nom" placeholder="Entrez votre adresse mail" required>
                <br>
                <label for="pass"> Votre mot de passe : </label>
                <input type="password" name="password" placeholder="Entrez votre mot de passe" required>
                <br>
                <button type="submit" class="submit2 btn btn-outline-dark"> Valider </button>

            </form>
        </div>
    </div>

</body>

</html>