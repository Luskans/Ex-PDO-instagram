<?php

require('./partials/header.php');
require('./utils/db_connect.php');
require('./process/send_message.php');
if (!$_SESSION['name']) {
  header('Location:./login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Messagerie privée</title>
  <link rel="stylesheet" href="./assets/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="./assets/style.css">
</head>

<body>
  <div class="container">
    <div class="row mt-5">
      <div class="col-md-4">
        <h3>Utilisateurs</h3>
        <ul class="user-list">
          <?php
          $recupUser = $db->query('SELECT * FROM users');
          while ($user = $recupUser->fetch()) {
            $activeClass = (isset($_GET['id']) && $_GET['id'] == $user['id']) ? 'active' : '';
          ?>
            <li class="user-list-item <?php echo $activeClass; ?>">
              <a href="./message.php?id=<?php echo $user['id'] ?>"><?php echo $user['name']; ?></a>
            </li>
          <?php } ?>
        </ul>
      </div>
      <div class="col-md-8">
        <?php
        if (isset($_GET['id']) && !empty($_GET['id'])) {
          $getid = $_GET['id'];
          $recupUser = $db->prepare('SELECT name FROM users WHERE id = ?');
          $recupUser->execute(array($getid));
          $userInfo = $recupUser->fetch();
        ?>
          <h3>Chat avec <?php echo $userInfo['name']; ?></h3>
          <div class="chat-box-container">
            <?php
            $recupMessages = $db->prepare('SELECT m.*, u.name as sender_name FROM messages m INNER JOIN users u ON m.id_sender = u.id WHERE m.id_sender = ? AND m.id_receiver = ? OR m.id_sender = ? AND m.id_receiver = ?');
            $recupMessages->execute(array($_SESSION['id'], $getid, $getid, $_SESSION['id']));
            while ($message = $recupMessages->fetch()) {
              if ($message['id_receiver'] == $_SESSION['id']) {
            ?>
                <div class="chat-box bubbleleft left">
                  <p><strong><?= $message['sender_name'] ?>:</strong> <?= $message['message']; ?></p>
                </div>
              <?php
              } elseif ($message['id_receiver'] == $getid) {
              ?>
                <div class="chat-box bubbleright right">
                  <p><strong>Vous:</strong> <?= $message['message'] ?></p>
                </div>
            <?php }
            } ?>
          </div>

          <form action="" method="POST" class="mt-3">
            <textarea name="message" class="form-control" rows="3"></textarea>
            <br>
            <button type="submit" name="send" class="btn btn-primary">Envoyer</button>
          </form>
        <?php } else { ?>
          <h3>Aucun utilisateur sélectionné</h3>
        <?php } ?>
      </div>
    </div>
  </div>
</body>

</html>