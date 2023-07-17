<?php
include_once('./partials/header.php');
?>

<form action="process/add_image.php" method="post" enctype="multipart/form-data">
    <label for="image">Ajouter une photo :</label>
    <input type="file" name="image" required>

    <label for="description">Description :</label>
    <input type="text" name="description" placeholder="Entrez ici la description de votre photo..." required>

    <button type="submit">PUBLIER</button>
</form>

<?php
include_once('./partials/footer.php');
?>