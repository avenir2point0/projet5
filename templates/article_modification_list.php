<?php
$this->title = "Modification article";
?>
<div class="inner">
    <h2>Liste des articles</h2>
    <section class="tiles">
        <?php
        foreach ($articles as $article)
        { ?> 
        <article class="style2">
            <span class="image">
                <img src="/img/pic20.jpg" alt="Article" />
            </span>
            <a href="<?php echo (new Framework\UrlGenerator)->generate('modif_article', ['id' => $article->getId()]); ?>">
                <h2><?php echo htmlspecialchars($article->getTitle());?></h2>
                <div class="content">
                    <p>Sujet : <?php echo htmlspecialchars($article->getChapeau());?></p>
                    <p>Ajouté le : <?php echo htmlspecialchars($article->getDateAdded());?></p>
                    <p><?php if (\is_null(htmlspecialchars($article->getEdited()))) { ?> <em>(Modifié le <?php echo htmlspecialchars($article->getEdited()); ?> ) <?php 
} ?></em></p>
                </div>
            </a>
</article><?php } ?>
    </section><br>
    <a href="<?php echo (new Framework\UrlGenerator)->generate('admin') ?>"><button class="btn btn-success">Retour à l'administration</button></a>
</div>
