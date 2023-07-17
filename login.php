<?php 
// session_start();
// require './utils/connexion.php' ?>

<?php 

// if(isset($_POST['submit']))
// {
//     $email = $_POST['email'];
//     $pass = $_POST['pass'];

//     $request = "SELECT * FROM users where email = '$email' ";
//     $result = $db->prepare($request);
//     $result -> execute();

//     if($result->rowCount() > 0) {
//         $date = $result->fetchAll();
//         if (password_verify($pass, $date[0]['password'])) {
//             echo "Connexion effectué";
//             $_SESSION['email'] = $email;


//     } else {
//         $pass = password_hash($pass, PASSWORD_DEFAULT);
//         $request = "INSERT INTO users (email, password) VALUES ('$email', '$pass')";
//         $req =$db -> prepare($request);
//         $req -> execute();
//         echo "Enregistrement effectué ! ";
//     }
// }
// }

?>

<form  class ="" action="login.php" method="POST">


<input type="text" name="email" placeholder="E-mail" required>
<br>
<input type="password" name="password" placeholder="Password" required>
<br><br>
<button type="submit" name="submit"> Login </button>

</form>