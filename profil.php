<?php
include_once('./partials/header.php');
require('./process/get_profil.php');
?>

<div class="container">
    <main>
        <section class="top">
            <div class="top_left">
                <img src="<?= $avatar ?>" alt="Photo de profil">
            </div>
            <div class="top_right">
                <div class="top_right_stats">
                    <div>
                        <p> <?= $profil['nb_images'] ?> </p>
                        <p>Publications</p>
                    </div>
                    <div>
                        <p> <?= $profil['nb_followed'] ?> </p>
                        <p>Followers</p>
                    </div>
                    <div>
                        <p> <?= $profil['nb_following'] ?> </p>
                        <p>Suivi(e)s</p>
                    </div>
                </div>
                <div class="top_right_desciption">
                <p> <?= $description ?> </p>
                </div>
            </div>
        </section>
        <aside>
            <a href="modify-profil.php?id=5"><button>Modifier le profil</button></a>
        </aside>
        <section class="bot">
            <div class="bot_card">

            </div>
        </section>
    </main>
    <footer>

    </footer>
</div>

<?php
include_once('./partials/footer.php');
?>