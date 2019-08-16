<?php
$this->title = "modifier un commentaire";
?>
<div class="inner">
    <h2>Modification d'un commentaire</h2>
    <section>
    <p>Le commentaire a été publié par "<?php echo htmlspecialchars($comment->getPseudo());?>" le <?php echo htmlspecialchars($comment->getDateAdded());?></p>
        <form method="post" action="<?php echo (new Framework\UrlGenerator)->generate('modify_comment') ?>">
            <div class="fields">
                <div class="field half">
                    <label for="content">Commentaire :</label>
                    <input type="text" id="content" name="content" value="<?php echo htmlspecialchars($comment->getContent());?>" required>
                </div>
            </div>
            <div class="fields">
                <div class="field half">
                    <input type="text" id="commentId" name="commentId" value="<?php echo htmlspecialchars($comment->getId()); ?>" hidden><br>                
                </div>
            </div>
            <input type="text" id="csrfToken" name="csrfToken" value="<?php echo $csrfToken ?>" hidden><br>
            <ul class="actions">
                <li><input type="submit" class="primary" value="Modifier" id="submit" name="submit"></li>
            </ul>
        </form>
        <form method="post" action="<?php echo (new Framework\UrlGenerator)->generate('delete_comment') ?>">
            <div class="fields">
                <div class="field half">
                    <input type="text" id="commentId" name="commentId" value="<?php echo htmlspecialchars($comment->getId());?>" hidden><br>
                    <input type="text" id="csrfToken" name="csrfToken" value="<?php echo $csrfToken ?>" hidden><br>
                    <input type="submit" class="btn btn-danger" value="Supprimer" id="submit" name="submit">                
                </div>
            </div>
        </form>
        <a href="<?php echo (new Framework\UrlGenerator)->generate('admin') ?>"><button class="btn btn-success">Retour à l'administration</button></a><br>
    </section>
</div>
