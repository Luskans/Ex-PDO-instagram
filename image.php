<?php
include_once('./partials/header.php');
require('./process/get_image.php');
?>

<main class="img_display d-flex">
    <section>
        <article>
            <img src="<?=$image['link']?>">
        </article>
        <aside class="d-flex justify-content-around align-items-center">
            <p> <?=$image['date']?> </p>
            <div class="d-flex flex-column align-items-center">
                <p> <?=$image['nb_views']?> </p>
                <p> Vues </p>
            </div>
            <div class="d-flex flex-column align-items-center">
                <p> <?=$image['nb_likes']?> </p>
                <p> Likes </p>
            </div>
        </aside>
    </section>
    <section>
        <article>
            <div>
                <div>
                    <a href="./profil.php?id=<?=$profil['id_user']?>"> <img src="<?=$profil['avatar_link']?>"> </a>
                </div>
                <p> <?= $profil['name'] ?> </p>
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

                    // Si le profil n'a pas de photo, on en met une par défaut
                    $avatar = ($autor_comment['avatar_link'] == NULL) ? "./uploads/avatars/user1.png" : $autor_comment['avatar_link'];
            ?>
                    <div class="d-flex flex-column">
                        <div class="d-flex gap-3">
                            <div class="avatar">
                                <a href="./profil.php?id=<?=$autor_comment['id_user']?>"> <img src="<?=$avatar?>"> </a>
                            </div>
                            <p> <a href="./profil.php?id=<?=$autor_comment['id_user']?>"> <?=$autor_comment['name']?> </a> </p>
                            <p> <?=$comment['date']?> </p>
                        </div>
                        <div class="mb-5">
                            <p> <?=$comment['comment']?> </p>
                        </div>
                    </div>
                <?php } ?>
        </article>

        <form action="./process/add_comment.php?id=<?=$image['id']?>" method="post">
            <textarea name="comment" required></textarea>
            <button type="submit">Envoyer</button>
        </form>
    </section>
</main>



<?php
include_once('./partials/footer.php');
?>