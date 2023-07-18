<?php
include_once('./partials/header.php');
require('./process/get_image.php');
?>

<main>
    <div class="container">
        <section>
            <article>
                <img src="<?=$image['link']?>">
            </article>
            <aside>
                <p> <?=$image['date']?> </p>
                <p> <?=$image['nb_views']?> </p>
                <p> <?=$image['nb_likes']?> </p>
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
                <div>
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
                        <div>
                            <div>
                                <div>
                                    <a href="./profil.php?id=<?=$autor_comment['id_user']?>"> <img src="<?=$avatar?>"> </a>
                                </div>
                                <p> <a href="./profil.php?id=<?=$autor_comment['id_user']?>"> <?=$autor_comment['name']?> </a> </p>
                                <p> <?=$comment['date']?> </p>
                            </div>
                            <div>
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
    </div>
</main>




<?php
include_once('./partials/footer.php');
?>