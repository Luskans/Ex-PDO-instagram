<?php
include_once('./partials/header.php');
require('./process/get_image.php');
require('./process/get_profil.php');
?>

<main class="profil_display">
    <section class="top d-flex justify-content-evenly border-bottom pb-5">
        <div class="top_left profil_avatar">
            <img src="<?= $avatar ?>" alt="Photo de profil">
        </div>
        <div class="top_right d-flex flex-column gap-5">
            <p class="profil_name"> <?= $profil['name'] ?> </p>
            <div class="top_right_desciption">
                <p class="profil_description"> <?= $description ?> </p>
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
            <div >
                <?php if ($_GET['id'] == $_SESSION['id_profil']) { ?>
                    <a href="modify_profil.php?id=<?=$_SESSION['id_profil']?>">
                        <button class="modify_button btn btn-outline-secondary">Modifier le profil</button>
                    </a>
                <?php } ?>
            </div>
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

<?php
include_once('./partials/footer.php');
?>