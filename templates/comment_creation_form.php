<?php
$this->title = "Poster un commentaire";
?>
<div class="inner">
    <h2>Poster un commentaire</h2>
    <h3>Article selectionné</h3>
    <h1><?php echo htmlspecialchars($article->getTitle());?></h1>
    <p>Sujet : <?php echo htmlspecialchars($article->getChapeau());?></p>
    <p><?php echo htmlspecialchars($article->getContent());?></p><hr>
    <p>Créé par : <?php echo htmlspecialchars($article->getAuthor());?> | <?php echo htmlspecialchars($article->getDateAdded());?> | <?php if (\is_null(htmlspecialchars($article->getEdited()))) { ?> <em>(Modifié le <?php echo htmlspecialchars($article->getEdited()); ?> ) <?php 
    } ?></em></p>
    <br>
    <section>
        <?php if (isset($_SESSION['user']['pseudo'])) { ?>
            <form method="post" action="<?php echo (new Framework\UrlGenerator)->generate('save_comment') ?>">
                <div class="fields">
                    <div class="field half">
                        <input type="text" id="pseudo" name="pseudo" value="<?php
                        if(isset($_SESSION['user']['pseudo'])) {
                            echo htmlspecialchars($_SESSION['user']['pseudo']);}
                        ?>" hidden>
                    </div>
                </div>
                <div class="fields">
                    <div class="field half">
                        <label for="content">Votre commentaire : </label><br>
                        <textarea id="content" rows="4" cols="25"name="content"><?php if(isset($post['content'])) { echo htmlspecialchar($post['content']); 
                        } ?></textarea><br>
                    </div>
                </div>
                <div class="fields">
                    <div class="field half">                     
                        <input type="text" id="articleId" name="articleId" value="<?php echo ($article->getId());?>" hidden>
                    </div>
                </div>    
                <input type="text" id="csrfToken" name="csrfToken" value="<?php echo $csrfToken ?>" hidden><br>              
                <input type="submit" class="primary" value="Envoyer" id="submit" name="submit">
            </form>
            <div>
                <a href="<?php echo (new Framework\UrlGenerator)->generate('articles') ?>"> <button class="btn btn-success">Retour à la liste des articles</button></a>
            </div>        
            <?php } else { ?>
                <p>Vous devez être connecté pour poster un commentaire</p>
                <a href="<?php echo (new Framework\UrlGenerator)->generate('connection') ?>"><button class="primary">Se connecter</button></a>
            <?php } ?>
    </section>
</div>
