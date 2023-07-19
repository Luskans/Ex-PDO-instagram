<?php
include_once('./partials/header.php');
require('./process/get_index.php');
?>

<main class="index_display">
    <div class="d-flex flex-column">
        <!-- <p> <a href="upload.php">Ajouter une image</a> </p>
        <p> <a href="./process/process_logout.php">Se déconnecter</a> </p> -->
        <section class="gallery">
            <?php foreach($images as $image) { ?>
                <div>
                    <a href="./image.php?id=<?=$image['id']?>"> <img src="<?=$image['link']?>"> </a>
                </div>
            <?php } ?>
        </section>
    </div>
</main>




<?php
include_once('./partials/footer.php');
?>