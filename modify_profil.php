<?php
include_once('./partials/header.php');
require('./process/get_profil.php');
?>

<form action="./process/update_profil.php" method="post" enctype="multipart/form-data">
    <div class="container">
        <main>
            <section class="top">
                <div class="top_left">
                <img src="<?= $avatar ?>">
                <input type="file" name="avatar">
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
                    <!-- <input type="text" name="description" placeholder="Entrez ici la description de votre profil..."> -->
                        <textarea name="description"> <?= $description ?> </textarea>
                    </div>
                </div>
            </section>
            <aside>
                <button type="submit">Valider le profil</button>
            </aside>
            <section class="bot">
                <div class="bot_card">

                </div>
            </section>
        </main>
        <footer>

        </footer>
    </div>
</form>

<?php
include_once('./partials/footer.php');
?>