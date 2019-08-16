<?php
$this->title = "Mot de passe oublié";
?>
<div class="inner">
    <h2>Mot de passe oublié</h2>
    <h3>Veuillez rentrer des identifiants valides pour recevoir le mail de changement de mot de passe</h3>
    <section>
        <form method="post" action="<?php echo (new Framework\UrlGenerator)->generate('forgotten_password') ?>">
            <div class="fields">
                <div class="field half">
                        <input type="text" id="pseudo" name="pseudo" value="<?php
                        if(isset($post['pseudo'])) {
                            echo $post['pseudo'];
                        }
                        ?>" placeholder="Pseudo" required>
                </div>
            </div>
            <div class="fields">
                <div class="field half">
                        <input type="email" id="email" name="email" value="<?php
                        if(isset($post['email'])) {
                            echo $post['email'];
                        }
                        ?>" placeholder="Email" required>
                </div>
            </div>
            <input type="text" id="csrfToken" name="csrfToken" value="<?php echo $csrfToken ?>" hidden><br>
            <ul class="actions">
                <li><input type="submit" class="primary" value="Envoyer" id="submit" name="submit"></li>
            </ul>
        </form>
    </section>
</div>
