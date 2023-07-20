<?php
include_once('./partials/header.php');
require('./process/get_profil.php');
?>

<form class="profil_display" action="./process/update_profil.php" method="post" enctype="multipart/form-data">
    <main>
        <section class="top d-flex justify-content-evenly border-bottom pb-5">
            <div class="top_left profil_avatar">
                <div>
                    <img src="<?= $avatar ?>" alt="Photo de profil">
                </div>
                <input type="file" name="avatar">
            </div>
            <div class="top_right d-flex flex-column gap-5">
                <p class="profil_name"> <?= $profil['name'] ?> </p>
                <div class="top_right_desciption">
                    <textarea class="profil_description" name="description"> <?= $description ?> </textarea>
                </div>
                <div class="top_right_stats d-flex justify-content-between">
                    <div class="stat1">
                        <p class="text-center"> <?= $profil['nb_images'] ?> </p>
                        <p>Publications</p>
                    </div>
                    <div class="stat1">
                        <p class="text-center"> <?= $profil['nb_followed'] ?> </p>
                        <p>Followers</p>
                    </div>
                    <div class="stat1">
                        <p class="text-center"> <?= $profil['nb_following'] ?> </p>
                        <p>Suivi(e)s</p>
                    </div>
                </div>
                <button type="submit" class="modify_button btn btn-outline-secondary">Valider le profil</button>
            </div>
        </section>
        <section class="gallery d-flex justify-content-center align-items-center pt-5">
        <?php foreach($images as $image) { ?>
            <div>
                <a href="./image.php?id=<?=$image['id']?>"> <img src="<?=$image['link']?>"> </a>
            </div>
        <?php } ?>
    </section>
    </main>
</form>

<?php
include_once('./partials/footer.php');
?>