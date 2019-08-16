<?php
session_destroy();
$this->title = "Deconnexion";
?>
<div class="inner">
    <h2>Vous vous êtes bien déconnecté</h2>
    <div class="tiles">
        <a href="<?php echo (new Framework\UrlGenerator)->generate('home') ?>"><button class="primary">Retour à l'accueil</button></a>
    </div>
</div>
