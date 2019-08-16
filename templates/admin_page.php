<?php
$this->title = "Administration";
?>
<div class="inner">
    <h2>Page Admin</h2>
    <div class="tiles">
        <a href="<?php echo (new Framework\UrlGenerator)->generate('create_article') ?>"><button>Ajouter un article</button></a><br>
    </div>
    <div class="tiles">
        <a href="<?php echo (new Framework\UrlGenerator)->generate('list_article') ?>"><button>Modifier un article</button></a>
    </div>
    <div class="tiles">
        <a href="<?php echo (new Framework\UrlGenerator)->generate('modify_comment_list') ?>"><button>Modifier un commentaire</button></a>
        </div>
    <div class="tiles">
        <a href="<?php echo (new Framework\UrlGenerator)->generate('modify_unpublishedComment_list') ?>"><button>Publier les commentaires</button></a>
    </div>
</div>
