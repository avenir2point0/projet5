<?php
$this->title = "Publier un commentaire";
?>
<div class="inner">
    <h2>Publier un commentaire</h2>
    <section>
        <p>Le commentaire a été publié par "<?php echo htmlspecialchars($comment->getPseudo());?>" le <?php echo htmlspecialchars($comment->getDateAdded());?></p>
            <form method="post" action="<?php echo (new Framework\UrlGenerator)->generate('publish_comment') ?>">
            <div class="fields">
                <div class="field half">
                    <label for="content">Commentaire : </label><br>
                    <textarea id="content" name="content"><?php echo htmlspecialchars($comment->getContent());?></textarea><br>
                </div>
            </div>
            <input type="text" id="csrfToken" name="csrfToken" value="<?php echo $csrfToken ?>" hidden><br>
            <input type="text" id="commentId" name="commentId" value="<?php echo htmlspecialchars($comment->getId());?>" hidden><br>
            <input type="submit" class="primary" value="Publier" id="submit" name="submit">
        </form> <br>
        <a href="<?php echo (new Framework\UrlGenerator)->generate('admin') ?>"><button class="btn btn-success">Retour à l'administration</button></a>
    </section>  
</div>
