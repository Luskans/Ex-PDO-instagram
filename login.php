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

    <div class="parent1">
        <div class="div10">
            <img src="/assets/icons/InstaKILO-removebg-preview.png" alt="logo">
            <div>
                <h1> InstaKilo</h1>
            </div>
            <form class="" action="./process/process_login.php" method="POST">
                <input type="text" name="email" placeholder="E-mail" required><br>
                <input type="password" name="password" placeholder="Password" class="password" required><br><br>
                <button type="submit" name="submit" class="btn btn-outline-dark">Login</button> <br> <br>
            </form>


            <div>
                <a href="./signin.php"><button class=" signin btn btn-outline-dark"> Sign In </button></a>
            </div>

        </div>



</body>

</html>