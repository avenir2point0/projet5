<?php
$this->title = "Commentaires non publié";
if (!\is_null($comments)) { ?>
    <div class="inner">
        <h2>Liste des commentaires en attente de publication</h2>
        <section class="tiles">
            <?php
            foreach ($comments as $comment)
            {
                ?>
            <article class="style2">
                <h4><?php echo htmlspecialchars($comment->getId());?>
                <a href="<?php echo (new Framework\UrlGenerator)->generate('modif_unpublishedComment', ['id' => $comment->getId()]); ?>">
                <?php echo htmlspecialchars($comment->getContent());?></a></h4>
                <p>Par : <?php echo htmlspecialchars($comment->getPseudo());?>
                | Créé le : <?php echo htmlspecialchars($comment->getDateAdded());?></p>
            </article><br>
            <?php } ?> 
        </section>
    </div>
<?php } else { ?>
    <div class="inner">
        <h4>Désolé !</h4>
        <h4>Il n'y a pas de commentaires en attente de publication.</h4>
        <a href="<?php echo (new Framework\UrlGenerator)->generate('admin') ?>"><button class="btn btn-success"> Retour à l'administration</button></a>
    </div>
<?php } ?>
