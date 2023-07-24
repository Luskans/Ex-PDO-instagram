<?php
include_once('./partials/header.php');
require('./process/get_image.php');
?>

<main class="img_display d-flex justify-content-between">
    <section>
        <article class="mb-3">
            <img src="<?=$image['link']?>">
        </article>
        <aside class="d-flex justify-content-around align-items-center">
            <div class="like">
                <img src="./assets/icons/heart1.png" alt="un coeur">
            </div>
            <div class="stat1 d-flex flex-column align-items-center">
                <p> <?=$image['nb_likes']?> </p>
                <p> Likes </p>
            </div>
            <div class="stat2 d-flex flex-column align-items-center">
                <p> <?=$image['nb_views']?> </p>
                <p> Vues </p>
            </div>
        </aside>
    </section>
    <?php
    // Si l'auteur de l'image n'a pas de photo, on en met une par défaut
    $avatar_image = ($profil['avatar_link'] == NULL) ? "./uploads/avatars/user1.png" : $profil['avatar_link'];
    ?>
    <section>
        <article>
            <div class="d-flex gap-3 mb-3">
                <div class="avatar_image">
                    <a href="./profil.php?id=<?=$profil['id']?>"> <img src="<?=$avatar_image?>"> </a>
                </div>
                <a href="./profil.php?id=<?=$profil['id']?>" class="link"> <p class="name_image"> <?= $profil['name'] ?> </p> </a>
                <p class="date_image"> <?=$image['date']?> </p>
            </div>
            <div class="mb-5 border-bottom">
                <p> <?= $image['description'] ?> </p>
            </div>
        </article>
        <article>
            <?php
                foreach($comments as $comment) {
                    
                    // On récupère tous du profil selon l'id_user du commentaire
                    $request = $db->prepare('SELECT * FROM profils WHERE id_user = :id_user');
                    $request->execute([
                        'id_user' => $comment['id_user']
                    ]);
                    $autor_comment = $request->fetch();

                    // Si l'auteur du commentaire n'a pas de photo, on en met une par défaut
                    $avatar_comment = ($autor_comment['avatar_link'] == NULL) ? "./uploads/avatars/user1.png" : $autor_comment['avatar_link'];
            ?>
                    <div class="comment d-flex flex-column mb-3">
                        <div class="d-flex gap-3">
                            <div class="avatar_comment">
                                <a href="./profil.php?id=<?=$autor_comment['id']?>"> <img src="<?=$avatar_comment?>"> </a>
                            </div>
                            <p class="name_comment"> <a href="./profil.php?id=<?=$autor_comment['id']?>" class="link"> <?=$autor_comment['name']?> </a> </p>
                            <p class="date_comment"> <?=$comment['date']?> </p>
                        </div>
                        <div>
                            <p class="text_comment"> <?=$comment['comment']?> </p>
                        </div>
                    </div>
                <?php } ?>
        </article>

        <form class="comment_form d-flex flex-column gap-3" action="./process/add_comment.php?id=<?=$image['id']?>" method="post">
            <textarea name="comment" placeholder="Écrivez votre commentaire ici..."></textarea>
            <button class="btn btn-outline-secondary" type="submit">Envoyer</button>
        </form>
    </section>
</main>



<?php
include_once('./partials/footer.php');
?>